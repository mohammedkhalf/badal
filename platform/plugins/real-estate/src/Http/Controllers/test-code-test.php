<?php

namespace Botble\RealEstate\Http\Controllers;

use Assets;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Botble\RealEstate\Models\Notification;
use App\Events\NotificationEvent;
use Illuminate\Contracts\View\Factory;
use Botble\Setting\Supports\SettingStore;
use Botble\Base\Http\Controllers\BaseController;
use Botble\RealEstate\Http\Controllers\NotificationController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Events\CreatedContentEvent;
use Botble\RealEstate\Http\Requests\NotificationRequest;
use Botble\RealEstate\Repositories\Interfaces\NotificationInterface;

use Botble\RealEstate\Services\StoreCurrenciesService;
use Botble\RealEstate\Http\Requests\UpdateSettingsRequest;
use Botble\RealEstate\Repositories\Interfaces\CurrencyInterface;
use Pusher\Pusher;

class RealEstateController extends BaseController
{

    /**
     * @var CurrencyInterface
     */
    protected $currencyRepository;

    /**
     * RealEstateController constructor.
     * @param CurrencyInterface $currencyRepository
     */
    public function __construct(CurrencyInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * @return Factory|View
     */
    public function getSettings()
    {
        page_title()->setTitle(trans('plugins/real-estate::real-estate.settings'));

        Assets::addScripts(['jquery-ui'])
            ->addScriptsDirectly([
                'vendor/core/plugins/real-estate/js/currencies.js',
            ])
            ->addStylesDirectly([
                'vendor/core/plugins/real-estate/css/currencies.css',
            ]);

        $currencies = $this->currencyRepository
            ->getAllCurrencies()
            ->toArray();

        return view('plugins/real-estate::settings.index', compact('currencies'));
    }

    public function notification()
    {
        page_title()->setTitle('ارسال اشعارات للمستخدمين');

        return view('plugins/real-estate::settings.notifications');
    }

    public function sentNotification(NotificationRequest $request ,  BaseHttpResponse $response)
    {
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

        $pusher->trigger('my-channel', 'my-event', $request->notification);
        $users= \DB::table('re_accounts')->select('id')->get();
        foreach ($users??[] as $key => $user) {
            $request->merge([
                'message' => $request->notification,
                'reciever_id' => $user->id,
                'language'=>'en_US',
                'notification_type'=>'admin',
                'ref_from'=>null,
                'submit'=>'save'
            ]);
            // dd($request->all());
            $notinterface =  \App::make('Botble\RealEstate\Repositories\Interfaces\NotificationInterface');
            $not = new NotificationController($notinterface);
            // NotificationController::save($request,$response);
            $not->save($request,$response);
            // $notification = new Notification();
            // $notification->message=$request->notification;
            // $notification->reciever_id=$user->id;
            // $notification->save();
            // event(new CreatedContentEvent(NOTIFICATION_MODULE_SCREEN_NAME, $request, $notification));

        }
        return $response
        ->setNextUrl(url('admin/real-estate/notification'))
        ->setMessage('تم ارسال الاشعار بنجاح');

    }

    /**
     * @param UpdateSettingsRequest $request
     * @param BaseHttpResponse $response
     * @param StoreCurrenciesService $service
     * @param SettingStore $settingStore
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function postSettings(
        UpdateSettingsRequest $request,
        BaseHttpResponse $response,
        StoreCurrenciesService $service,
        SettingStore $settingStore
    ) {
        $settingStore->set(config('plugins.real-estate.real-estate.prefix') . 'review_fields', json_encode($request->input(config('plugins.real-estate.real-estate.prefix') . 'review_fields')));
        foreach ($request->except(['_token', 'currencies', 'deleted_currencies', config('plugins.real-estate.real-estate.prefix') . 'review_fields']) as $settingKey => $settingValue) {
            $settingStore->set($settingKey, $settingValue);
        }

        $settingStore->save();

        $currencies = json_decode($request->input('currencies'), true) ?: [];

        if (!$currencies) {
            return $response
                ->setNextUrl(route('real-estate.settings'))
                ->setError()
                ->setMessage(trans('plugins/real-estate::currency.require_at_least_one_currency'));
        }

        $deletedCurrencies = json_decode($request->input('deleted_currencies', []), true) ?: [];

        $service->execute($currencies, $deletedCurrencies);

        return $response
            ->setNextUrl(route('real-estate.settings'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }
}
