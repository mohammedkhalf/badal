<?php

namespace Botble\RealEstate\Forms;

use Botble\RealEstate\Models\PropertyReplacement;
use Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Location\Repositories\Interfaces\CityInterface;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyPeriodEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Botble\RealEstate\Http\Requests\PropertyRequest;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Repositories\Interfaces\CategoryInterface;
use Botble\RealEstate\Repositories\Interfaces\CurrencyInterface;
use Botble\RealEstate\Repositories\Interfaces\FacilityInterface;
use Botble\RealEstate\Repositories\Interfaces\FeatureInterface;
use Botble\RealEstate\Repositories\Interfaces\Feature2Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature3Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature4Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature5Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature6Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature7Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature8Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature9Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature10Interface;
use Botble\RealEstate\Repositories\Interfaces\Feature11Interface;
use Botble\RealEstate\Repositories\Interfaces\PropertyInterface;
use Botble\RealEstate\Repositories\Interfaces\TypeInterface;
use RealEstateHelper;
use Throwable;
use Symfony\Component\HttpFoundation\Cookie;

class PropertyForm extends FormAbstract
{
    /**
     * @var FacilityInterface
     */
    protected $facilityRepository;

    /**
     * @var PropertyInterface
     */
    protected $propertyRepository;

    /**
     * @var FeatureInterface
     */
    protected $featureRepository;

    /**
     * @var Feature2Interface
     */
    protected $feature2Repository;

    /**
     * @var Feature3Interface
     */
    protected $feature3Repository;

      /**
     * @var Feature4Interface
     */
    protected $feature4Repository;

     /**
     * @var Feature5Interface
     */
    protected $feature5Repository;

 /**
     * @var Feature6Interface
     */
    protected $feature6Repository;

     /**
     * @var Feature7Interface
     */
    protected $feature7Repository;

        /**
     * @var Feature8Interface
     */
    protected $feature8Repository;


        /**
     * @var Feature9Interface
     */
    protected $feature9Repository;


        /**
     * @var Feature10Interface
     */
    protected $feature10Repository;


        /**
     * @var Feature11Interface
     */
    protected $feature11Repository;

    /**
     * @var CurrencyInterface
     */
    protected $currencyRepository;

    /**
     * @var CityInterface
     */
    protected $cityRepository;

    /**
     * @var CategoryInterface
     */
    protected $categoryRepository;

    /**
     * @var TypeInterface
     */
    protected $typeRepository;

    /**
     * PropertyForm constructor.
     * @param PropertyInterface $propertyRepository
     * @param FeatureInterface $featureRepository
     * @param Feature2Interface $featureRepository
     * @param Feature3Interface $featureRepository
     * @param Feature4Interface $featureRepository
     * @param Feature5Interface $featureRepository
     * @param Feature6Interface $featureRepository
     * @param Feature7Interface $featureRepository
     * @param CurrencyInterface $currencyRepository
     * @param CityInterface $cityRepository
     * @param CategoryInterface $categoryRepository
     * @param TypeInterface $typeRepository
     * @param FacilityInterface $facilityRepository
     */
    public function __construct(
        PropertyInterface $propertyRepository,
        FeatureInterface $featureRepository,
        Feature2Interface $feature2Repository,
        Feature3Interface $feature3Repository,
        Feature4Interface $feature4Repository,
        Feature5Interface $feature5Repository,
        Feature6Interface $feature6Repository,
        Feature7Interface $feature7Repository,
        Feature8Interface $feature8Repository,
        Feature9Interface $feature9Repository,
        Feature10Interface $feature10Repository,
        Feature11Interface $feature11Repository,
        CurrencyInterface $currencyRepository,
        CityInterface $cityRepository,
        CategoryInterface $categoryRepository,
        TypeInterface $typeRepository,
        FacilityInterface $facilityRepository
    ) {
        parent::__construct();
        $this->propertyRepository = $propertyRepository;
        $this->featureRepository = $featureRepository;
        $this->feature2Repository = $feature2Repository;
        $this->feature3Repository = $feature3Repository;
        $this->feature4Repository = $feature4Repository;
        $this->feature5Repository = $feature5Repository;
        $this->feature6Repository = $feature6Repository;
        $this->feature7Repository = $feature7Repository;
        $this->feature8Repository = $feature8Repository;
        $this->feature9Repository = $feature9Repository;
        $this->feature10Repository = $feature10Repository;
        $this->feature11Repository = $feature11Repository;
        $this->currencyRepository = $currencyRepository;
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->facilityRepository = $facilityRepository;
        $this->typeRepository = $typeRepository;
    }

    /**
     * @return mixed|void
     * @throws Throwable
     */
    public function buildForm()
    {
        Assets::addStyles(['datetimepicker'])
            ->addScripts(['input-mask'])
            ->addScriptsDirectly([
                'vendor/core/plugins/real-estate/js/real-estate.js',
                'vendor/core/plugins/real-estate/js/components.js',
            ])
            ->addStylesDirectly('vendor/core/plugins/real-estate/css/real-estate.css');

        $currencies = $this->currencyRepository->pluck('re_currencies.title', 're_currencies.id');
        $cities = $this->cityRepository->allBy(['status' => BaseStatusEnum::PUBLISHED], ['state', 'country'],
            ['cities.name', 'cities.state_id', 'cities.country_id', 'cities.id']);

        $cityChoices = [];

        foreach ($cities as $city) {
            if ($city->state->status != BaseStatusEnum::PUBLISHED || $city->country->status != BaseStatusEnum::PUBLISHED) {
                continue;
            }

            $cityChoices[$city->id] = $city->name . ($city->state->name ? ' (' . $city->state->name . ')' : '');
        }

        $categories = $this->categoryRepository->pluck('re_categories.name', 're_categories.id');
        $types = $this->typeRepository->pluck('re_property_types.name', 're_property_types.id');
        $replacements = PropertyReplacement::all()->pluck('name', 'id')->toArray();
        $selectedFeatures = [];
        if ($this->getModel()) {
            $selectedFeatures = $this->getModel()->features()->pluck('re_features.id')->all();
        }

        $features = $this->featureRepository->allBy([], [], ['re_features.id', 're_features.name']);

        $selectedFeatures2 = [];
        if ($this->getModel()) {
            $selectedFeatures2 = $this->getModel()->features2()->pluck('re_features2.id')->all();
        }

        $features2 = $this->feature2Repository->allBy([], [], ['re_features2.id', 're_features2.name']);

        $selectedFeatures3 = [];
        if ($this->getModel()) {
            $selectedFeatures3 = $this->getModel()->features3()->pluck('re_features3.id')->all();
        }

        $features3 = $this->feature3Repository->allBy([], [], ['re_features3.id', 're_features3.name']);

        $selectedFeatures4 = [];
        if ($this->getModel()) {
            $selectedFeatures4 = $this->getModel()->features4()->pluck('re_features4.id')->all();
        }

        $features4 = $this->feature4Repository->allBy([], [], ['re_features4.id', 're_features4.name']);

        $selectedFeatures5 = [];
        if ($this->getModel()) {
            $selectedFeatures5 = $this->getModel()->features5()->pluck('re_features5.id')->all();
        }

        $features5 = $this->feature5Repository->allBy([], [], ['re_features5.id', 're_features5.name']);

        $selectedFeatures6 = [];
        if ($this->getModel()) {
            $selectedFeatures6 = $this->getModel()->features6()->pluck('re_features6.id')->all();
        }

        $features6 = $this->feature6Repository->allBy([], [], ['re_features6.id', 're_features6.name']);


        $selectedFeatures7 = [];
        if ($this->getModel()) {
            $selectedFeatures7 = $this->getModel()->features7()->pluck('re_features7.id')->all();
        }

        $features7 = $this->feature7Repository->allBy([], [], ['re_features7.id', 're_features7.name']);

        $selectedFeatures8 = [];
        if ($this->getModel()) {
            $selectedFeatures8 = $this->getModel()->features8()->pluck('re_features8.id')->all();
        }

        $features8 = $this->feature8Repository->allBy([], [], ['re_features8.id', 're_features8.name']);


        $selectedFeatures9 = [];
        if ($this->getModel()) {
            $selectedFeatures9 = $this->getModel()->features9()->pluck('re_features9.id')->all();
        }

        $features9 = $this->feature9Repository->allBy([], [], ['re_features9.id', 're_features9.name']);

        $selectedFeatures10 = [];
        if ($this->getModel()) {
            $selectedFeatures10 = $this->getModel()->features10()->pluck('re_features10.id')->all();
        }

        $features10 = $this->feature10Repository->allBy([], [], ['re_features10.id', 're_features10.name']);

        $selectedFeatures11 = [];
        if ($this->getModel()) {
            $selectedFeatures11 = $this->getModel()->features11()->pluck('re_features11.id')->all();
        }

        $features11 = $this->feature11Repository->allBy([], [], ['re_features11.id', 're_features11.name']);


        $facilities = $this->facilityRepository->allBy([], [], ['re_facilities.id', 're_facilities.name']);
        $selectedFacilities = [];
        if ($this->getModel()) {
            $selectedFacilities = $this->getModel()->facilities()->select('re_facilities.id', 'distance')->get();
        }

        $this
            ->setupModel(new Property)
            ->setValidatorClass(PropertyRequest::class)
            ->withCustomFields()
            ->add('name', 'text', [
                'label'      => trans('plugins/real-estate::property.form.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('plugins/real-estate::property.form.name'),
                    'data-counter' => 120,
                ],
            ])

            ->add('is_featured', 'onOff', [
                'label'         => trans('core/base::forms.is_featured'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])

              ->add('never_expired', 'onOff', [
                'label'         => trans('plugins/real-estate::property.never_expired'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => true,
            ])
            ->add('auto_renew', 'onOff', [
                'label'         => trans('plugins/real-estate::property.renew_notice',
                    ['days' => RealEstateHelper::propertyExpiredDays()]),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
                'wrapper'       => [
                    'class' => 'form-group auto-renew-form-group' . (!$this->getModel()->id || $this->getModel()->never_expired == true ? ' hidden' : null),
                ],
            ])
   
            ->add('rowOpen10', 'html', [
                'html' => '
                <div class="col-md-12" style="text-align: center;">
                <h4>بيانات الرغبة / أو المطوب </h4>
                <div class="note">
                <p>"<strong class="current_language_text">"أدخل معلومات البدل الذى ترغب فيه ."</strong></p>',
            ])

            ->add('rowClose10', 'html', [
                'html' => '</div></div>',
            ])

            ->add('type_id', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.form.type'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => $types,
            ])

            
            ->add('price', 'text', [
                'label'      => trans('plugins/real-estate::property.form.price'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-4',
                ],
                'attr'       => [
                    'id'          => 'price-number',
                    'placeholder' => trans('plugins/real-estate::property.form.price'),
                    'class'       => 'form-control input-mask-number',
                ],
            ])
            ->add('currency_id', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.form.currency'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-4',
                ],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => $currencies,
            ])
            ->add('period', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.form.period'),
                'label_attr' => ['class' => 'control-label required'],
                'wrapper'    => [
                    'class' => 'form-group period-form-group mb-3 col-md-4' . ($this->getModel()->type->slug != PropertyTypeEnum::RENT ? ' hidden' : null),
                ],
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ],
                'choices'    => PropertyPeriodEnum::labels(),
            ])

            ->add('content', 'editor', [
                'label'      => trans('core/base::forms.content'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'rows'            => 4,
                    'with-short-code' => true,
                ],
            ])




            ->add('rowOpen11', 'html', [
                'html' => '
                <div class="col-md-12" style="text-align: center;">
                <h4>بيانات البدل الأساسية</h4>
                <div class="note">
                <p>"<strong class="current_language_text">"أدخل معلومات البدل الذى تملكه ."</strong></p>',
            ])

            ->add('rowClose11', 'html', [
                'html' => '</div></div>',
            ])

            ->add('category_id', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.form.category'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ],
                'choices'    => $categories,
                'default_value' => true ,
                
            ])

            
            ->add('description', 'textarea', [
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'         => 4,
                    'placeholder'  => trans('core/base::forms.description_placeholder'),
                    'data-counter' => 350,
                ],
            ])
          

           
            ->add('images[]', 'mediaImages', [
                'label'      => trans('plugins/real-estate::property.form.images'),
                'label_attr' => ['class' => 'control-label'],
                'values'     => $this->getModel()->id ? $this->getModel()->images : [],
            ])
            ->add('city_id', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.form.city'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'class' => 'form-control select-search-full',
                ],
                'choices'    => $cityChoices,
            ])
            ->add('location', 'text', [
                'label'      => trans('plugins/real-estate::property.form.location'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('plugins/real-estate::property.form.location'),
                    'data-counter' => 300,
                ],
            ])
            ->add('is_featured2', 'onOff', [
                'label'         => trans('plugins/real-estate::property.form.is_featured2'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('is_featured3', 'onOff', [
                'label'         => trans('plugins/real-estate::property.form.is_featured3'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('is_featured4', 'onOff', [
                'label'         => trans('plugins/real-estate::property.form.is_featured4'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('is_featured5', 'onOff', [
                'label'         => trans('plugins/real-estate::property.form.is_featured5'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])
            ->add('is_featured6', 'onOff', [
                'label'         => trans('plugins/real-estate::property.form.is_featured6'),
                'label_attr'    => ['class' => 'control-label'],
                'default_value' => false,
            ])


            ->add('rowOpen', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('latitude', 'text', [
                'label'      => trans('plugins/real-estate::property.form.latitude'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-6',
                ],
                'attr'       => [
                    'placeholder'  => 'Ex: 1.462260',
                    'data-counter' => 25,
                ],
                'help_block' => [
                    'tag'  => 'a',
                    'text' => trans('plugins/real-estate::property.form.latitude_helper'),
                    'attr' => [
                        'href'   => 'https://www.latlong.net/convert-address-to-lat-long.html',
                        'target' => '_blank',
                        'rel'    => 'nofollow',
                    ],
                ],
            ])
            ->add('longitude', 'text', [
                'label'      => trans('plugins/real-estate::property.form.longitude'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-6',
                ],
                'attr'       => [
                    'placeholder'  => 'Ex: 103.812530',
                    'data-counter' => 25,
                ],
                'help_block' => [
                    'tag'  => 'a',
                    'text' => trans('plugins/real-estate::property.form.longitude_helper'),
                    'attr' => [
                        'href'   => 'https://www.latlong.net/convert-address-to-lat-long.html',
                        'target' => '_blank',
                        'rel'    => 'nofollow',
                    ],
                ],
            ])

            ->add('coords_map', 'text', [
                'label'      => trans('plugins/real-estate::property.form.coords_map'),
                'label_attr' => ['class' => 'control-label'],
                'value'      => $_COOKIE['coords'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-6',
                ],
                'attr'       => [
                    'placeholder'  => 'Ex: 103.812530',
                    'data-counter' => 25,
                ],
                'help_block' => [
                    'tag'  => 'a',
                    'text' => trans('plugins/real-estate::property.form.longitude_helper'),
                    'attr' => [
                        'href'   => route('coords.map'),
                        'target' => 'popup',
                        'rel'    => 'nofollow',
                        'onclick' => "window.open('http://google.com','popup','width=600,height=600')"
                    ],
                ],
                'content'=> @include('core/base::forms.partials.help-block')
            ])


            ->add('rowClose', 'html', [
                'html' => '</div>',
            ])
            ->add('rowOpen1', 'html', [
                'html' => '<div class="row">',
            ])
            ->add('number_bedroom', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_bedroom'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_bedroom'),
                ],
            ])
            ->add('number_bathroom', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_bathroom'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_bathroom'),
                ],
            ])
            ->add('number_floor', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_floor'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_floor'),
                ],
            ])

            ->add('number_floor2', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_floor2'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_floor2'),
                ],
            ])
            ->add('number_floor3', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_floor3'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_floor3'),
                ],
            ])
            ->add('number_floor4', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_floor4'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_floor4'),
                ],
            ])
            ->add('number_floor5', 'text', [
                'label'      => trans('plugins/real-estate::property.form.number_floor5'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_floor5'),
                ],
            ])
            ->add('number_floor6', 'number', [
                'label'      => trans('plugins/real-estate::property.form.number_floor6'),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.number_floor6'),
                ],
            ])



            
            ->add('square', 'number', [
                'label'      => trans('plugins/real-estate::property.form.square', ['unit' => setting('real_estate_square_unit', 'm²') ? '(' . setting('real_estate_square_unit', 'm²') . ')' : null]),
                'label_attr' => ['class' => 'control-label'],
                'wrapper'    => [
                    'class' => 'form-group mb-3 col-md-3',
                ],
                'attr'       => [
                    'placeholder' => trans('plugins/real-estate::property.form.square'),
                ],
            ])
            ->add('rowClose1', 'html', [
                'html' => '</div>',
            ])
            ->add('rowOpen2', 'html', [
                'html' => '<div class="row">',
            ])
           
            ->add('rowClose2', 'html', [
                'html' => '</div>',
            ])
          
            ->addMetaBoxes([
                'features'   => [
                    'title'    => trans('plugins/real-estate::feature.name'),
                    'content'  => view('plugins/real-estate::partials.form-features',
                        compact('selectedFeatures', 'features'))->render(),
                    'priority' => 1,
                ],
                'features2'   => [
                    'title'    => trans('plugins/real-estate::feature2.name'),
                    'content'  => view('plugins/real-estate::partials.form-features2',
                        compact('selectedFeatures2', 'features2'))->render(),
                    'priority' => 1,
                ],
                'features3'   => [
                    'title'    => trans('plugins/real-estate::feature3.name'),
                    'content'  => view('plugins/real-estate::partials.form-features3',
                        compact('selectedFeatures3', 'features3'))->render(),
                    'priority' => 1,
                ],
                'features4'   => [
                    'title'    => trans('plugins/real-estate::feature4.name'),
                    'content'  => view('plugins/real-estate::partials.form-features4',
                        compact('selectedFeatures4', 'features4'))->render(),
                    'priority' => 1,
                ],
                'features5'   => [
                    'title'    => trans('plugins/real-estate::feature5.name'),
                    'content'  => view('plugins/real-estate::partials.form-features5',
                        compact('selectedFeatures5', 'features5'))->render(),
                    'priority' => 1,
                ],
                'features6'   => [
                    'title'    => trans('plugins/real-estate::feature6.name'),
                    'content'  => view('plugins/real-estate::partials.form-features6',
                        compact('selectedFeatures6', 'features6'))->render(),
                    'priority' => 1,
                ],
                'features7'   => [
                    'title'    => trans('plugins/real-estate::feature7.name'),
                    'content'  => view('plugins/real-estate::partials.form-features7',
                        compact('selectedFeatures7', 'features7'))->render(),
                    'priority' => 1,
                ],

                'features8'   => [
                    'title'    => trans('plugins/real-estate::feature8.name'),
                    'content'  => view('plugins/real-estate::partials.form-features8',
                        compact('selectedFeatures8', 'features8'))->render(),
                    'priority' => 1,
                ],

                'features9'   => [
                    'title'    => trans('plugins/real-estate::feature9.name'),
                    'content'  => view('plugins/real-estate::partials.form-features9',
                        compact('selectedFeatures9', 'features9'))->render(),
                    'priority' => 1,
                ],

                'features10'   => [
                    'title'    => trans('plugins/real-estate::feature10.name'),
                    'content'  => view('plugins/real-estate::partials.form-features10',
                        compact('selectedFeatures10', 'features10'))->render(),
                    'priority' => 1,
                ],

                'features11'   => [
                    'title'    => trans('plugins/real-estate::feature11.name'),
                    'content'  => view('plugins/real-estate::partials.form-features11',
                        compact('selectedFeatures11', 'features11'))->render(),
                    'priority' => 1,
                ],

                'facilities' => [
                    'title'    => trans('plugins/real-estate::property.distance_key'),
                    'content'  => view('plugins/real-estate::partials.form-facilities',
                        compact('facilities', 'selectedFacilities')),
                    'priority' => 0,
                ],
            ])
            ->add('moderation_status', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.moderation_status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-conthrefrol select-full',
                ],
                'choices'    => ModerationStatusEnum::labels(),
            ])
        
            ->setBreakFieldPoint('moderation_status')
            ->add('author_id', 'autocomplete', [
                'label'      => trans('plugins/real-estate::property.account'),
                'label_attr' => [
                    'class' => 'control-label',
                ],
                'attr'       => [
                    'id'       => 'author_id',
                    'data-url' => route('account.list'),
                ],
                'choices'    => $this->getModel()->author_id ?
                    [
                        $this->model->author->id => $this->model->author->name,
                    ]
                    :
                    ['' => trans('plugins/real-estate::property.select_account')],
            ])

            ->add('replacement_id', 'customSelect', [
                'label'      => trans('plugins/real-estate::property.form.replacement'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => $replacements,
            ]);
    }
}
