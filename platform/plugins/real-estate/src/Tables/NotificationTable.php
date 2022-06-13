<?php

namespace Botble\RealEstate\Tables;

use Botble\RealEstate\Repositories\Interfaces\NotificationInterface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Throwable;
use Yajra\DataTables\DataTables;

class NotificationTable extends TableAbstract
{

    /**
     *
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * TagTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param NotificationInterface $notificationRepository
     */
    public function __construct(
        DataTables $table,
        UrlGenerator $urlGenerator,
        NotificationInterface $notificationRepository
    ) {
        parent::__construct($table, $urlGenerator);

        $this->repository = $notificationRepository;
    }

    /**
     * Display ajax response.
     *
     * @return JsonResponse
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('reciever_id', function ($item) {
                if (!empty($item->reciever)) {
                    // return '<a href="'.$propertyUrl.'">'.$item->reciever->first_name.'</a>';
//                    return Html::link($item->reviewable->url,
//                        $item->reviewable->name,
//                        ['target' => '_blank']
//                    );
                    if (!\Auth::user()->hasPermission('account.edit')) {
                        return $item->reciever->name;
                    }

                    return Html::link(route('account.edit', $item->reciever->id), $item->reciever->name);
                }
                return null;
            })
            // ->editColumn('message', function ($item) {
            //     return Html::link(route('property_notification.edit', $item->id), $item->message);
            // })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('', 'property_notification.destroy', $item);
            });

        return $this->toJson($data);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|Builder
     * @since 2.1
     */
    public function query()
    {
        $query = $this->repository->getModel()->select([
            're_notifications.id',
            're_notifications.message',
            're_notifications.reciever_id'
        ]);

        return $this->applyScopes($query);
    }

    /**
     * @return array
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id'   => [
                'name'  => 're_notifications.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'reciever_id' => [
                'name'  => 're_notifications.reciever_id',
                'title' => trans('plugins/real-estate::review.user'),
                'class' => 'text-start',
            ],
            'message' => [
                'name'  => 're_notifications.message',
                'title' => __('Message'),
                'class' => 'text-start',
            ],
        ];
    }

    /**
     * @return array
     *
     * @throws Throwable
     * @since 2.1
     */
    public function buttons()
    {
        // return [];
        return $this->addCreateButton(route('real-estate.notification'), 'property_notification.create');
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('property_notification.deletes'), 'property_notification.destroy',
            parent::bulkActions());
    }

    /**
     * @return mixed
     */
    public function getBulkChanges(): array
    {
        return [
            're_notifications.message' => [
                'title'    => trans('core/base::tables.message'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
        ];
    }
}
