<?php

namespace Botble\RealEstate\Http\Controllers;

use Assets;
use Botble\RealEstate\Models\Notification;
use Pusher\Pusher;
use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Forms\AccountPropertyForm;
use Botble\RealEstate\Http\Requests\AccountPropertyRequest;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Models\PropertyReplacement;
use Botble\RealEstate\Models\Review;
use Botble\RealEstate\Repositories\Interfaces\AccountActivityLogInterface;
use Botble\RealEstate\Repositories\Interfaces\AccountInterface;
use Botble\RealEstate\Repositories\Interfaces\PropertyInterface;
use Botble\RealEstate\Services\SaveFacilitiesService;
use Botble\RealEstate\Tables\AccountPropertyTable;
use EmailHandler;
use Exception;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealEstateHelper;
use SeoHelper;
use Theme;

class AccountPropertyController extends Controller
{
    /**
     * @var AccountInterface
     */
    protected $accountRepository;

    /**
     * @var PropertyInterface
     */
    protected $propertyRepository;

    /**
     * @var AccountActivityLogInterface
     */
    protected $activityLogRepository;

    /**
     * PublicController constructor.
     * @param Repository $config
     * @param AccountInterface $accountRepository
     * @param PropertyInterface $propertyRepository
     * @param AccountActivityLogInterface $accountActivityLogRepository
     */
    public function __construct(
        Repository $config,
        AccountInterface $accountRepository,
        PropertyInterface $propertyRepository,
        AccountActivityLogInterface $accountActivityLogRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->propertyRepository = $propertyRepository;
        $this->activityLogRepository = $accountActivityLogRepository;

        Assets::setConfig($config->get('plugins.real-estate.assets'));
    }

    /**
     * @param Request $request
     * @param AccountPropertyTable $propertyTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View|\Response
     * @throws \Throwable
     */
    public function index(Request $request, AccountPropertyTable $propertyTable)
    {
 // dd($propertyTable);
        SeoHelper::setTitle(trans('plugins/real-estate::account-property.properties'));

        $user = auth('account')->user();

        if ($request->isMethod('get') && view()->exists(Theme::getThemeNamespace('views.real-estate.account.table.index'))) {
            return Theme::scope('real-estate.account.table.index', ['user' => $user, 'propertyTable' => $propertyTable])
                ->render();
        }

        return $propertyTable->render('plugins/real-estate::account.table.base');
    }

    public function showBid($id) {
        /*$property = $this->propertyRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('account')->id(),
            'author_type' => Account::class,
        ]);*/

      //  $bids = Review::where('reviewable_id', $propertyId)->with(['account'])->orderBy('created_at', 'DESC')->get();

        $property = Property::with('reviews.account')
        ->where('author_id',auth('account')->id())
        ->where('author_type',Account::class)
        ->findOrFail($id);

        $PropertyReplacement = PropertyReplacement::all();
        //dd($property);

        return Theme::scope('real-estate.choosebids',
        ['property' => $property , 'PropertyReplacement' => $PropertyReplacement])->render();
    }

    public function properetyUpdatePrice($id , Request $request ) {
        $property = Property::findOrFail($id);
        $property->price = $request->price;
        $property->replacement_id = $request->replacement;
        $property->save();

        return redirect()->back()
        ->with(trans('core/base::notices.update_success_message'));
    }

    public function approveBidd( $id  ,  AccountInterface $accountRepository , BaseHttpResponse $response ) {
        if (!auth('account')->user()->canPost()) {
            return back()->with(['error_msg' => trans('plugins/real-estate::package.add_credit_alert')]);
        }

        $account = $accountRepository->findOrFail(auth('account')->id());

       // dd($account);
        if ($account->credits < 125) {
            return $response->setError(true)->setMessage(__('لا يوجد رصيد كافى فى المحفظة. برجاء الشحن أولا'));
        }
        $review = Review::findOrFail($id);
        $review->status = $review->status=='published'?'pending': "accepted";

        $review->save();

        $accountCredit = $account->credits;
        $account->credits = $accountCredit - (RealEstateHelper::rewiewCreateCoast());
        $account->save();

        
        $options = array(
            'cluster' => 'eu',
            'encrypted' => false
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('my-channel', 'my-event', $review);

       /* return redirect()->back()
        ->with(trans('core/base::notices.update_success_message')); */
        if($review->status=='pending'){
            $comment = $review->status ;
            $notification =  Notification::create([
                'account_id'        => $review->account_id,     //property owner
                'reciever_id'       => auth('account')->user()->id,   // who want make Bid
               // 'property_id'       => $property->id,
                'reviewable_type'   => 'Botble\RealEstate\Models\Property',
                'message'           => "تهانينا - تم أختيار المزايدة الخاصة بك من قبل صاحب البدل وبأنتظار تأكيدك للمزايدة",
            'notification_type' => 'info'
            ]);
    
            return $response->setMessage(__('تم أختيار شخص للمزاد سيتم ارسال اشعار بخصم 125 دينار منه لتاكيد المزاد'));
            }else
            {
                $comment = $review->status ;
                $notification =  Notification::create([
                    'account_id'        => $review->account_id,     //property owner
                    'reciever_id'       => auth('account')->user()->id,   // who want make Bid
                   // 'property_id'       => $property->id,
                    'reviewable_type'   => 'Botble\RealEstate\Models\Property',
                    'message'           => "تم تأكيد المزاد بنجاح وخصم 125 دينار من حسابك",
                    'notification_type' => 'info'
                ]);
              
            return $response->setMessage(__('تم تأكيد المزاد بنجاح وخصم 125 دينار من حسابك'));
            }    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     * @throws \Throwable
     */
    public function create(FormBuilder $formBuilder)
    {
        //        if (!auth('account')->user()->canPost()) {
//            return back()->with(['error_msg' => trans('plugins/real-estate::package.add_credit_alert')]);
//        }

//dd("hello");

        SeoHelper::setTitle(trans('plugins/real-estate::account-property.write_property'));

        if (view()->exists(Theme::getThemeNamespace('views.real-estate.account.forms.index'))) {
            $user = auth('account')->user();
            $form = $formBuilder->create(AccountPropertyForm::class);
            //dd(Theme::getThemeNamespace('views.real-estate.account.forms.index'));
            $form->setFormOption('template', Theme::getThemeNamespace() . '::views.real-estate.account.forms.properetybase');
            return Theme::scope('real-estate.account.forms.index',
                ['user' => $user, 'formBuilder' => $formBuilder, 'form' => $form])->render();
        }

        return $formBuilder->create(AccountPropertyForm::class)->renderForm();
    }

    /**
     * @param AccountPropertyRequest $request
     * @param BaseHttpResponse $response
     * @param AccountInterface $accountRepository
     * @param SaveFacilitiesService $saveFacilitiesService
     * @return BaseHttpResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(
        AccountPropertyRequest $request,
        BaseHttpResponse $response,
        AccountInterface $accountRepository,
        SaveFacilitiesService $saveFacilitiesService
    ) {



        if (!auth('account')->user()->canPost()) {
           // save credit when add any propertiy 
           // return back()->with(['error_msg' => trans('plugins/real-estate::package.add_credit_alert')]);
        }

        $request->merge(['expire_date' => now()->addDays(RealEstateHelper::propertyExpiredDays())]);

        $property = $this->propertyRepository->getModel();

        $property->fill(array_merge($request->input(), [
            'author_id'   => auth('account')->id(),
            'author_type' => Account::class,
        ]));

        if (setting('enable_post_approval', 1) == 0) {
            $property->moderation_status = ModerationStatusEnum::APPROVED;
        }

        $property = $this->propertyRepository->createOrUpdate($property);

        if ($property) {
            $property->features()->sync($request->input('features', []));

            $saveFacilitiesService->execute($property, $request->input('facilities', []));
        }

        event(new CreatedContentEvent(PROPERTY_MODULE_SCREEN_NAME, $request, $property));

        $this->activityLogRepository->createOrUpdate([
            'action'         => 'create_property',
            'reference_name' => $property->name,
            'reference_url'  => route('public.account.properties.edit', $property->id),
        ]);

        $account = $accountRepository->findOrFail(auth('account')->id());
        // $account->credits--;
       // $account->save();

        EmailHandler::setModule(REAL_ESTATE_MODULE_SCREEN_NAME)
            ->setVariableValues([
                'post_name'   => $property->name,
                'post_url'    => route('property.edit', $property->id),
                'post_author' => $property->author->name,
            ])
            ->sendUsingTemplate('new-pending-property');

        return $response
            ->setPreviousUrl(route('public.account.properties.index'))
            ->setNextUrl(route('public.account.properties.edit', $property->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return string
     *
     * @throws \Throwable
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {

        $property = $this->propertyRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('account')->id(),
            'author_type' => Account::class,
        ]);

        if (!$property) {
            abort(404);
        }

        event(new BeforeEditContentEvent($request, $property));

        SeoHelper::setTitle(trans('plugins/real-estate::property.edit') . ' "' . $property->name . '"');

        if (view()->exists(Theme::getThemeNamespace('views.real-estate.account.forms.index'))) {
            $user = auth('account')->user();
            $form = $formBuilder->create(AccountPropertyForm::class, ['model' => $property]);
            $form->setFormOption('template', Theme::getThemeNamespace() . '::views.real-estate.account.forms.base');
            return Theme::scope('real-estate.account.forms.index',
                ['user' => $user, 'formBuilder' => $formBuilder, 'form' => $form])->render();
        }

        return $formBuilder
            ->create(AccountPropertyForm::class, ['model' => $property])
            ->renderForm();
    }

    /**
     * @param int $id
     * @param AccountPropertyRequest $request
     * @param BaseHttpResponse $response
     * @param SaveFacilitiesService $saveFacilitiesService
     * @return BaseHttpResponse
     *
     */
    public function update(
        $id,
        AccountPropertyRequest $request,
        BaseHttpResponse $response,
        SaveFacilitiesService $saveFacilitiesService
    ) {
        $property = $this->propertyRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('account')->id(),
            'author_type' => Account::class,
        ]);

        if (!$property) {
            abort(404);
        }

        $property->fill($request->except(['expire_date']));

        $this->propertyRepository->createOrUpdate($property);

        $property->features()->sync($request->input('features', []));

        $saveFacilitiesService->execute($property, $request->input('facilities', []));

        event(new UpdatedContentEvent(PROPERTY_MODULE_SCREEN_NAME, $request, $property));

        $this->activityLogRepository->createOrUpdate([
            'action'         => 'update_property',
            'reference_name' => $property->name,
            'reference_url'  => route('public.account.properties.edit', $property->id),
        ]);

        return $response
            ->setPreviousUrl(route('public.account.properties.index'))
            ->setNextUrl(route('public.account.properties.edit', $property->id))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function destroy($id, BaseHttpResponse $response)
    {
        $property = $this->propertyRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('account')->id(),
            'author_type' => Account::class,
        ]);

        if (!$property) {
            abort(404);
        }

        $this->propertyRepository->delete($property);

        $this->activityLogRepository->createOrUpdate([
            'action'         => 'delete_property',
            'reference_name' => $property->name,
        ]);

        return $response->setMessage(__('Delete property successfully!'));
    }

    /**
     * @param $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function renew($id, BaseHttpResponse $response)
    {
        $job = $this->propertyRepository->findOrFail($id);

        $account = auth('account')->user();

        if ($account->credits < 1) {
            return $response->setError(true)->setMessage(__('You don\'t have enough credit to renew this property!'));
        }

        $job->expire_date = $job->expire_date->addDays(RealEstateHelper::propertyExpiredDays());
        $job->save();

        //$account->credits--;
        //$account->save();

        return $response->setMessage(__('Renew property successfully'));
    }
}
