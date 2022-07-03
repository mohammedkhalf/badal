<?php

namespace Botble\RealEstate\Http\Controllers;

use Assets;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Models\Notification;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Models\Review;
use Botble\RealEstate\Repositories\Interfaces\ReviewInterface;
use Botble\RealEstate\Repositories\Interfaces\AccountInterface;
use Botble\RealEstate\Repositories\Interfaces\AccountActivityLogInterface;
use Botble\RealEstate\Tables\ReviewTable;
use Botble\RealEstate\Services\PushNotificationService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Throwable;
use Theme;
use Pusher\Pusher;
use Carbon;

class ReviewController extends BaseController
{
    /**
     * @var ReviewInterface
     */

      /**
     * @var AccountInterface
     */
    protected $accountRepository;
    protected $reviewRepository;

       /**
     * @var AccountActivityLogInterface
     */
    protected $activityLogRepository;

    /**
     * ReviewController constructor.
     * @param ReviewInterface $reviewRepository
     * @param AccountInterface $accountRepository
     * @param AccountActivityLogInterface $accountActivityLogRepositorys
     */
    public function __construct(ReviewInterface $reviewRepository  ,AccountInterface $accountRepository , AccountActivityLogInterface $accountActivityLogRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->accountRepository = $accountRepository;
        $this->activityLogRepository = $accountActivityLogRepository;

    }

    /**
     * @param ReviewTable $dataTable
     * @return Factory|View
     * @throws Throwable
     */
    public function index(ReviewTable $dataTable)
    {

        page_title()->setTitle(trans('plugins/real-estate::review.name'));

        Assets::addStylesDirectly('vendor/core/plugins/real-estate/css/review.css');

        return $dataTable->renderTable();
    }

    /**
     * @param Request $request
     * @param int $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $review = $this->reviewRepository->findOrFail($id);
            $this->reviewRepository->delete($review);

            event(new DeletedContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));

            $this->activityLogRepository->createOrUpdate([
                'action'         => 'delete_bidd',
                'reference_name' => $review->id,
            ]);

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $review = $this->reviewRepository->findOrFail($id);
            $this->reviewRepository->delete($review);

            event(new DeletedContentEvent(REVIEW_MODULE_SCREEN_NAME, $request, $review));

            $this->activityLogRepository->createOrUpdate([
                'action'         => 'delete_bidd',
                'reference_name' => $review->id,
            ]);
        }



        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    public function getNotiBidds() {
        $bidd  = Notification::where('account_id','=',auth('account')->user()->id)
          //  ->where('notification_type','=','bidd')
        ->first();

    if($bidd ) {
        $reviews = Notification::where('account_id', '=', auth('account')->user()->id) //<>
         //   ->where('notification_type','=','bidd')
        ->where('created_at' ,'>' , Carbon\Carbon::parse($bidd ->created_at)->format('H:i:s'))
        ->latest()
        ->get();

    } else {
        $reviews = [];
    }



        //return Theme::getThemeNamespace('partials.notification', ['review' => $review])->render();
        return Theme::scope('partials.notification', ['reviews' => $reviews])
        ->render();
    }

    public function create(Request $request , AccountInterface $accountRepository)
    {

        //implement account Notification
        if (auth('account')->user() == null){
            return redirect('/login');
        }
        if (!auth('account')->user()->canPost()) {
            return back()->with(['error_msg' => trans('plugins/real-estate::package.add_credit_alert')]);
        }
      
        $replacement = $request->input('replacement');
        $propertyName = $request->input('propertyName');
        $property = Property::find($request->property_id);

        $comment = $propertyName != null ? $replacement."/".$propertyName : $replacement;
       $review =  Review::create([
            'account_id'        => auth('account')->user()->id,
            'reviewable_id'     => $request->property_id,
            'star'              => $request->cash,
            'reviewable_type'   => 'Botble\RealEstate\Models\Property',
            'comment'           => $comment
        ]);
        $notification =  Notification::create([
            'account_id'        => $property->author_id,     //property owner
            'reciever_id'       => auth('account')->user()->id,   // who want make Bid
            'property_id'       => $request->property_id,
            // 'reviewable_id'     => $request->property_id,
            'star'              => $request->cash,
            'reviewable_type'   => 'Botble\RealEstate\Models\Property',
            'message'           => $comment
        ]);

        //'account_id'        => auth('account')->user()->id,
        //'reciever_id'        => $property->author_id,
        /*$oldReviews=Review::where(['reviewable_id'=>$request->property_id,'reviewable_type'=>'Botble\RealEstate\Models\Property'])->get();
        //    dd($oldReviews);
            $notificationData=[
                'owner'=>$property->author->first_name.' '.$property->author->last_name,
                'badel_name'=>$property->name,
                'creator_id'=>auth('account')->user()?auth('account')->user()->id:1,

                'creator'=>auth('account')->user()?auth('account')->user()->first_name.''.auth('account')->user()->last_name:"creator",
                'owner_id'=>$property->author->id,
                'badel_id'=>$request->property_id
            ];

            $pushObj=new PushNotificationService($notificationData);
            // if($notificationData['owner_id']==auth('account')->user()->id||count()){
            $pushObj->push();*/

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


        $this->activityLogRepository->createOrUpdate([
            'action'         => 'create_bidd',
            'reference_name' => $property->name,
            'reference_url'  => route('public.reviews.create'),
        ]);
        $account = $accountRepository->findOrFail(auth('account')->id());
        $account->credits--;
        $account->save();
        //dd($property->url);
        return redirect()->to($property->url)->with(['success_msg' => trans('تم أنشاء مزايدة بنجاح')]);
    }
}



