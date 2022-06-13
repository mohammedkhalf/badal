<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Forms\NotificationForm;
use Botble\RealEstate\Http\Requests\NotificationRequest;
use Botble\RealEstate\Repositories\Interfaces\NotificationInterface;
use Botble\RealEstate\Tables\NotificationTable;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class NotificationController extends BaseController
{
    /**
     * @var NotificationInterface
     */
    protected $notificationRepository;

    /**
     * NotificationController constructor.
     * @param NotificationInterface $notificationRepository
     */
    public function __construct(NotificationInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * @param NotificationTable $dataTable
     * @return JsonResponse|View
     * @throws Throwable
     */
    public function index(NotificationTable $dataTable)
    {
        page_title()->setTitle(trans('plugins/real-estate::notification.name'));

        return $dataTable->renderTable();
    }

    /**
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        return $formBuilder->create(NotificationForm::class)->renderForm();
    }

    /**
     * @param NotificationRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(NotificationRequest $request, BaseHttpResponse $response)
    {
dd($request->all());
        $notification = $this->notificationRepository->create($request->all());

        event(new CreatedContentEvent(NOTIFICATION_MODULE_SCREEN_NAME, $request, $notification));

        return $response
            ->setPreviousUrl(route('property_notification.index'))
            ->setNextUrl(route('property_notification.edit', $notification->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    static function save(NotificationRequest $request, BaseHttpResponse $response)
    {
        $notinterface =  \App::make('Botble\RealEstate\Repositories\Interfaces\NotificationInterface');

        $notification = $notinterface->create($request->all());
        // $notification = $this->notificationRepository->create($request->all());

        event(new CreatedContentEvent(NOTIFICATION_MODULE_SCREEN_NAME, $request, $notification));
        return $response
        ->setPreviousUrl(route('property_notification.index'))
        ->setNextUrl(route('property_notification.edit', $notification->id))
        ->setMessage(trans('core/base::notices.create_success_message'));
    }
    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, Request $request, FormBuilder $formBuilder)
    {
        $notification = $this->notificationRepository->findOrFail($id);
        page_title()->setTitle(trans('plugins/real-estate::notification.edit') . ' "' . $notification->name . '"');

        event(new BeforeEditContentEvent($request, $notification));

        return $formBuilder->create(NotificationForm::class, ['model' => $notification])->renderForm();
    }

    /**
     * @param int $id
     * @param NotificationRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, NotificationRequest $request, BaseHttpResponse $response)
    {
        $notification = $this->notificationRepository->findOrFail($id);

        $notification->fill($request->input());
        $this->notificationRepository->createOrUpdate($notification);

        event(new UpdatedContentEvent(NOTIFICATION_MODULE_SCREEN_NAME, $request, $notification));

        return $response
            ->setPreviousUrl(route('property_notification.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $notification = $this->notificationRepository->findOrFail($id);
            $this->notificationRepository->delete($notification);

            event(new DeletedContentEvent(NOTIFICATION_MODULE_SCREEN_NAME, $request, $notification));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
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
            $notification = $this->notificationRepository->findOrFail($id);
            $this->notificationRepository->delete($notification);

            event(new DeletedContentEvent(NOTIFICATION_MODULE_SCREEN_NAME, $request, $notification));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
