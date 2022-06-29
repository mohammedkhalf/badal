

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
	
	
	