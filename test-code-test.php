

add more is_featured

/* error save features in ths DB
C:\xampp\htdocs\badal-new\platform\plugins\real-estate\src\Http\Controllers\PropertyController.php


edit the ar translation
C:\xampp\htdocs\badal-new\resources\lang\vendor\plugins\real-estate\ar


google map view in property page
C:\xampp\htdocs\badal-new\platform\themes\resido\partials\real-estate\elements\gmap-canvas.blade.php


add elemnts form dashboard
C:\xampp\htdocs\badal-new\platform\themes\resido\partials\real-estate\elements


C:\xampp\htdocs\badal-new\resources\lang\vendor\core\base\ar\forms.php
C:\xampp\htdocs\badal-new\platform\themes\resido\views\real-estate\account\dashboard\index.blade.php
C:\xampp\htdocs\badal-new\platform\plugins\real-estate\src\Models\Property.php
C:\xampp\htdocs\badal-new\platform\plugins\real-estate\resources\assets\js\real-estate.js


add daynamic map
C:\xampp\htdocs\badal-new\database\seeders\PropertySeeder.php
 C:\xampp\htdocs\badal-new\platform\plugins\real-estate\src\Forms\PropertyForm.php
 
 
 /home/gs4bgu9db872/badal/public/vendor/core/core/base/js/core.js
 --------------------------------------------------------------------------
 
          {!! Theme::partial('real-estate.elements.list-fx-features', compact('property')) !!}
  <shortcode class="bb-shortcode">{!! do_shortcode('[hero-banner-style-map][/hero-banner-style-map]') !!}</shortcode>
  
 
 platform\plugins\real-estate\src\Http\Controllers\AccountPropertyController.php
 
 // re sort bids to show by lastes bids
 // help code --  $bids = Review::where('reviewable_id', $propertyId)->with(['account'])->orderBy('created_at', 'DESC')->get();
 
 
 public function showBid($id) {
        /*$property = $this->propertyRepository->getFirstBy([
            'id'          => $id,
            'author_id'   => auth('account')->id(),
            'author_type' => Account::class,
        ]);*/

      

        $property = Property::with('reviews.account')
        ->where('author_id',auth('account')->id())
        ->where('author_type',Account::class)
        ->findOrFail($id);

        $PropertyReplacement = PropertyReplacement::all();
        //dd($property);

        return Theme::scope('real-estate.choosebids',
        ['property' => $property , 'PropertyReplacement' => $PropertyReplacement])->render();
    }
	
	
	
	
	
	
	
	/home/gs4bgu9db872/badal/public/vendor/core/core/table/css/table.css
	/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/account/dashboard/index.blade.php
	/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/account/table/base.blade.php
badal/platform/themes/resido/partials/shortcodes
/home/gs4bgu9db872/badal/platform/themes/resido/views/page.blade.php
  badal/platform/themes/resido/views/real-estate/property.blade.php

/home/gs4bgu9db872/badal/public/themes/resido/css/rtl-style.css


/home/gs4bgu9db872/badal/platform/themes/resido/partials/real-estate/properties/item-list.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/includes/properties-list.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/account/checkout.blade.php

/home/gs4bgu9db872/badal/platform/themes/resido/partials/footer.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/partials/header.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/account/master.blade.php

badal/platform/themes/resido/partials/shortcodes
platform/themes/resido/partials/

badal/platform/plugins/real-estate/src/Http/Controllers/ReviewController.php


badal/public/vendor/core/core/base/js/app.js


/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/account/master.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/partials/header.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/layouts/splash.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/partials/footer.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/views/real-estate/bids.blade.php
/home/gs4bgu9db872/badal/platform/themes/resido/views/index.blade.php

/home/gs4bgu9db872/badal/platform/themes/resido/views/page.blade.php
badal/platform/plugins/real-estate/routes
/home/gs4bgu9db872/badal/config/app.php
/home/gs4bgu9db872/badal/config/app.php


/home/gs4bgu9db872/badal/platform/plugins/real-estate/src/Http/Controllers/AccountPropertyController.php
/home/gs4bgu9db872/badal/platform/plugins/real-estate/src/Http/Controllers/ReviewController.php
chooes bid - alerts
change 128

/home/gs4bgu9db872/badal/platform/themes/resido/partials/real-estate/properties/map-popup.blade.php
{{ $property->url }}
{{ $property->author->name }}
{{ $property->location }}

/home/gs4bgu9db872/badal/platform/themes/resido/partials/real-estate/properties/item-list.blade.php
.text-decoration-underline {
    /* text-decoration: underline!important; */
}
     <!-- Single Block Wrap - Video -->
                {!! Theme::partial('real-estate.elements.video', ['object' => $property]) !!}

badal\platform\themes\resido\views\partials


 <option value="كاش + اسكان">كاش + اسكان</option>

<section class="bg-light">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-left">
                <div class="sec-heading left">
                    <h2>{!! clean($title) !!}</h2>
                      <a href="{{ route('public.properties') }}" class="float-right" style="float:right">{{ __('Browse More Properties') }}</a>
                    <p>{!! clean($description) !!}</p>
                </div>
            </div>
        </div>

        <div class="row list-layout"><?php // dd($style);?>
            @foreach($properties as $property)
            <!-- Single Property -->
{{--            @if($style == 1)--}}
            <div class="col-lg-6 col-sm-12">
{{--                {!! Theme::partial('real-estate.properties.item-list', compact('property')) !!}--}}
                {!! Theme::partial('real-estate.properties.item-grid', compact('property')) !!}

{{--            @else--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-12">--}}
{{--                {!! Theme::partial('real-estate.properties.item-grid', compact('property')) !!}--}}
{{--            @endif--}}
            </div>
            <!-- End Single Property -->
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="{{ route('public.properties') }}" class="btn btn-theme-light-2 rounded">{{ __('Browse More Properties') }}</a>
            </div>
        </div>
    </div>
</section>


<div class="full-search-2 eclip-search italian-search hero-search-radius shadow"><div class="hero-search-content"><form action="https://badal.sahla-ad.com/properties" method="GET" id="frmhomesearch"><div class="row"><div class="col-lg-4 col-md-4 col-sm-12 b-r"><div class="form-group borders"><div class="input-with-icon"><input type="text" name="k" placeholder="حي" class="form-control"> <i class="ti-search"></i></div></div></div> <div class="col-lg-3 col-md-3 col-sm-12"><div class="form-group borders"><div class="input-with-icon"><select id="ptypes" data-placeholder="قسم" name="category_id" data-select2-id="select2-data-ptypes" tabindex="-1" aria-hidden="true" class="form-control select2-hidden-accessible"><option value="" data-select2-id="select2-data-2-tiq1">&nbsp;</option> <option value="13">
            بيت حكومى </option> <option value="14">
            بناء قائم </option> <option value="15">
            قسيمة </option></select>
			<span class="select2 select2-container select2-container--default" dir="rtl" data-select2-id="select2-data-1-8str" style="width: 1px;">
			<span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-ptypes-container" aria-controls="select2-ptypes-container">
			<span class="select2-selection__rendered" id="select2-ptypes-container" role="textbox" aria-readonly="true" title="قسم"><span class="select2-selection__placeholder">قسم</span></span>
			<span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			<span dir="rtl" data-select2-id="select2-data-1-r8gb" class="select2 select2-container select2-container--default" style="width: 368.812px;"><span class="selection">
			<span role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ptypes-container" aria-controls="select2-ptypes-container" class="select2-selection select2-selection--single">
			<span id="select2-ptypes-container" role="textbox" aria-readonly="true" title="قسم" class="select2-selection__rendered"><span class="select2-selection__placeholder">قسم</span></span>
			<span role="presentation" class="select2-selection__arrow"><b role="presentation"></b></span></span></span><span aria-hidden="true" class="dropdown-wrapper"></span></span> 
			<i class="ti-briefcase"></i></div></div></div> <div class="col-lg-3 col-md-3 col-sm-12"><div class="form-group borders"><div class="input-with-icon b-l">
			<select data-placeholder="مدينة" data-url="https://badal.sahla-ad.com/ajax/cities" name="city_id" id="city_id" data-select2-id="select2-data-city_id" tabindex="-1" aria-hidden="true" class="form-control city_id select2-hidden-accessible"></select>
			<span class="select2 select2-container select2-container--default" dir="rtl" data-select2-id="select2-data-4-02u8" style="width: 1px;"><span class="selection">
			<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-city_id-container" aria-controls="select2-city_id-container">
			<span class="select2-selection__rendered" id="select2-city_id-container" role="textbox" aria-readonly="true" title="مدينة"><span class="select2-selection__placeholder">مدينة</span></span><span class="select2-selection__arrow" role="presentation">
			<b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span dir="rtl" data-select2-id="select2-data-3-rdqt" class="select2 select2-container select2-container--default" style="width: 367.812px;">
			<span class="selection"><span role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-city_id-container" aria-controls="select2-city_id-container" class="select2-selection select2-selection--single">
			<span id="select2-city_id-container" role="textbox" aria-readonly="true" title="مدينة" class="select2-selection__rendered"><span class="select2-selection__placeholder">مدينة</span></span>
			<span role="presentation" class="select2-selection__arrow"><b role="presentation"></b></span></span></span><span aria-hidden="true" class="dropdown-wrapper"></span></span> 
			<i class="ti-location-pin"></i></div></div></div> <div class="col-lg-2 col-md-2 col-sm-12"><div class="form-group"><button type="submit" class="btn search-btn">البحث</button>
			</div></div></div></form></div></div>

	
	