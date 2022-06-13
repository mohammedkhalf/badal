<?php

namespace Botble\RealEstate\Tables;

use Botble\RealEstate\Repositories\Interfaces\Feature9Interface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Throwable;
use Yajra\DataTables\DataTables;

class Feature9Table extends TableAbstract
{

    /**
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
     * @param Feature9Interface $featureRepository
     */
    public function __construct(
        DataTables $table,
        UrlGenerator $urlGenerator,
        Feature9Interface $featureRepository
    ) {
        parent::__construct($table, $urlGenerator);

        $this->repository = $featureRepository;
    }

    /**
     * Display ajax response.
     *
     * @return JsonResponse
     * @since 3.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('name', function ($item) {
                return Html::link(route('property_feature9.edit', $item->id), $item->name);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('property_feature9.edit', 'property_feature9.destroy', $item);
            });

        return $this->toJson($data);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|Builder
     * @since 3.1
     */
    public function query()
    {
        $query = $this->repository->getModel()->select([
            're_features9.id',
            're_features9.name',
        ]);

        return $this->applyScopes($query);
    }

    /**
     * @return array
     * @since 3.1
     */
    public function columns()
    {
        return [
            'id'   => [
                'name'  => 're_features9.id',
                'title' => trans('core/base::tables.id'),
                'width' => '30px',
            ],
            'name' => [
                'name'  => 're_features9.name',
                'title' => trans('core/base::tables.name'),
                'class' => 'text-start',
            ],
        ];
    }

    /**
     * @return array
     *
     * @throws Throwable
     * @since 3.1
     */
    public function buttons()
    {
        return $this->addCreateButton(route('property_feature9.create'), 'property_feature9.create');
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('property_feature9.deletes'), 'property_feature9.destroy',
            parent::bulkActions());
    }

    /**
     * @return mixed
     */
    public function getBulkChanges(): array
    {
        return [
            're_features9.name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:130',
            ],
        ];
    }
}
