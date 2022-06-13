<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Forms\FeatureForm8;
use Botble\RealEstate\Http\Requests\FeatureRequest;
use Botble\RealEstate\Repositories\Interfaces\Feature8Interface;
use Botble\RealEstate\Tables\Feature8Table;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;


class Feature8Controller extends BaseController
{
    /**
     * @var Feature8Interface
     */
    protected $feature8Repository;

    /**
     * Feature8Controller constructor.
     * @param Feature8Interface $feature8Repository
     */
    public function __construct(Feature8Interface $feature8Repository)
    {
        $this->feature8Repository = $feature8Repository;
    }


    /**
     * @param Feature8Table $dataTable
     * @return JsonResponse|View
     * @throws Throwable
     */
    public function index(Feature8Table $dataTable)
    {
        page_title()->setTitle(trans('plugins/real-estate::feature8.name'));

        return $dataTable->renderTable();
    }

    /**
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        return $formBuilder->create(FeatureForm8::class)->renderForm();
    }

    /**
     * @param FeatureRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(FeatureRequest $request, BaseHttpResponse $response)
    {
        $feature = $this->feature8Repository->create($request->all());

        event(new CreatedContentEvent(FEATURE8_MODULE_SCREEN_NAME, $request, $feature));

        return $response
            ->setPreviousUrl(route('property_feature8.index'))
            ->setNextUrl(route('property_feature8.edit', $feature->id))
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
        $feature = $this->feature8Repository->findOrFail($id);
        page_title()->setTitle(trans('plugins/real-estate::feature.edit') . ' "' . $feature->name . '"');

        event(new BeforeEditContentEvent($request, $feature));

        return $formBuilder->create(FeatureForm8::class, ['model' => $feature])->renderForm();
    }

    /**
     * @param int $id
     * @param FeatureRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, FeatureRequest $request, BaseHttpResponse $response)
    {
        $feature = $this->feature8Repository->findOrFail($id);

        $feature->fill($request->input());
        $this->feature8Repository->createOrUpdate($feature);

        event(new UpdatedContentEvent(FEATURE8_MODULE_SCREEN_NAME, $request, $feature));

        return $response
            ->setPreviousUrl(route('property_feature8.index'))
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
            $feature = $this->feature8Repository->findOrFail($id);
            $this->feature8Repository->delete($feature);

            event(new DeletedContentEvent(FEATURE8_MODULE_SCREEN_NAME, $request, $feature));

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
            $feature = $this->feature8Repository->findOrFail($id);
            $this->feature8Repository->delete($feature);

            event(new DeletedContentEvent(FEATURE8_MODULE_SCREEN_NAME, $request, $feature));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
