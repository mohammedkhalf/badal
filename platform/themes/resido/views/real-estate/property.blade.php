@php
    Theme::asset()->usePath()->add('leaflet-css', 'plugins/leaflet.css');
    Theme::asset()->usePath()->add('jquery-bar-rating', 'plugins/jquery-bar-rating/themes/fontawesome-stars.css');
    Theme::asset()->container('footer')->usePath()->add('leaflet-js', 'plugins/leaflet.js');
    Theme::asset()->usePath()->add('magnific-css', 'plugins/magnific-popup.css');
    Theme::asset()->container('footer')->usePath()->add('magnific-js', 'plugins/jquery.magnific-popup.min.js');
    Theme::asset()->container('footer')->usePath()->add('property-js', 'js/property.js');
    Theme::asset()->container('footer')->usePath()->add('jquery-bar-rating-js', 'plugins/jquery-bar-rating/jquery.barrating.min.js');
    Theme::asset()->container('footer')->usePath()->add('wishlist', 'js/wishlist.js', [], []);
    $headerLayout = MetaBox::getMetaData($property, 'header_layout', true);
    $headerLayout = $headerLayout ?: 'layout-1';
@endphp
{!! Theme::partial('real-estate.properties.headers.' . $headerLayout, compact('property')) !!}

<!-- ============================ Property Detail Start ================================== -->
<section class="property-detail gray-simple">
    <div data-property-id="{{ $property->id }}"></div>
    <div class="sides_list_property_detail py-3 px-7">
    <span class="prt-types {{ $property->category_slug }}">{!! $property->category->name !!}</span>
    <h3 class="mb-0">
        {!! $property->name !!}
        </h3>
        <div class="row py-3">
            <div class="col">
                <span>
                            <i class="ti-location-pin"></i>
                           {{ $property->city->state->name }}, {{ $property->city->name }}  
                    </span></div>
            
            <div class="col">
           <span>
           <i class="far fa-clock"></i>
                             {!! $property->created_at !!}
                    </span>
            </div>
        </div>
        <div class="row py-3">
        <div class="col">
        <h4 class="property_block_title">للبدل : {{ $property->type_name }} </h4>
        </div>
        <div class="col">
            <h4 class="prt-price-fix"><i class="far fa-money-bill-alt"></i>{{ $property->price_html }}</h4>
            </div>

               <!-- property main detail -->
              
            <!-- Single Block Wrap - Features -->
</div>


</div>
    <div class="container">

  <!-- Single Block Wrap -->
  <div class="property_block_wrap style-2">

<div class="property_block_wrap_header">
    <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo" aria-controls="clTwo"
       href="javascript:void(0);" aria-expanded="true"><h4
            class="property_block_title">{{ __('Description') }}</h4></a>
</div>
<div id="clTwo" class="panel-collapse collapse show">
    <div class="block-body">

    {!! $property->description !!}

    </div>
</div>
</div>

    {!! Theme::partial('real-estate.elements.list-fx-features', compact('property')) !!}
	
    {!! Theme::partial('real-estate.elements.features', ['property' => $property]) !!}

    <!-- Single Block Wrap - is_featured 
    <div class="property_block_wrap style-2">

<div class="property_block_wrap_header">
    <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#cl_featured" aria-controls="clTwo"
       href="javascript:void(0);" aria-expanded="true"><h4
            class="property_block_title">{{ __('التفاصيل') }}</h4></a>
</div>

<div id="cl_featured" class="panel-collapse collapse show">
    <div class="block-body">
    {!! Theme::partial('real-estate.elements.is_featured', ['property' => $property]) !!}
    </div>
</div>

</div>
-->

                <!-- Single Block Wrap - Amenities -->
                {!! Theme::partial('real-estate.elements.amenities11', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities2', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities3', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities4', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities5', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities6', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities7', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities8', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities9', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities10', ['property' => $property]) !!}
                {!! Theme::partial('real-estate.elements.amenities', ['property' => $property]) !!}
                
                
                <!-- Single Block Wrap - Nearby -->
                {!! Theme::partial('real-estate.elements.nearby', ['property' => $property]) !!}

                <!-- Single Block Wrap - Video -->
                {!! Theme::partial('real-estate.elements.video', ['object' => $property]) !!}
              
                <!-- Single Block Wrap - Gallery -->
                {!! Theme::partial('real-estate.elements.gallery', compact('property')) !!}

                  <!-- Single Block Wrap -->
            <div class="property_block_wrap style-2">

                <div class="property_block_wrap_header">
                    <a data-bs-toggle="collapse" data-parent="#loca" data-bs-target="#clSix" aria-controls="clSix"
                    href="javascript:void(0);" aria-expanded="true" class="collapsed"><h4
                            class="property_block_title">{{ __('Location') }}</h4></a>
                </div>

                <div id="clSix" class="panel-collapse collapse show">
                    <div class="block-body">
                        @if ($property->latitude && $property->longitude)
                            {!! Theme::partial('real-estate.elements.traffic-map-modal', ['location' => $property->location . ', ' . $property->city_name]) !!}
                        @else
                            {!! Theme::partial('real-estate.elements.gmap-canvas', ['location' => $property->location]) !!}
                        @endif
                    </div>
                </div>

            </div>

                    <!-- add coords distributed
                    <div class="property_block_wrap style-2">

                        <div class="property_block_wrap_header">

                            <div class="property_block_wrap_header">
                                <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#coords_map" aria-controls="clTwo" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">
                                    {{ trans('plugins/real-estate::property.form.coords_map') }}</h4>            
                                </h4></a>
                            </div>
                        

                        </div>
                        
       
                        <div id="coords_map" class="panel-collapse collapse show">
                            <div class="block-body">
                            <div class="data-section map1" id="map1">
        <img src="{{url('/storage/properties/map-1.png')}}" usemap="#image-map" class="map" >
       <!--  <map name="image-map">  
        <area id="coords_map222" target="" coords="{!! $property->coords_map !!}" shape="rect" class="area-element" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' selected="selected">
        
                            </div>
                        </div>
      
                    </div>
        
-->
<!-- Badal request data -->
<div class="property_block_wrap style-2">

<div class="property_block_wrap_header">
    <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#cl_content" aria-controls="clTwo" href="javascript:void(0);" aria-expanded="true"><h4 class="property_block_title">{{ __('أرغب فى البدل بـ') }}</h4></a>
</div>
<div id="cl_content" class="panel-collapse collapse show">
    <div class="block-body">
    {!! clean($property->content) !!}
    </div>
</div>
</div>
            

            <!-- property Sidebar 
            <div class="col-lg-4 col-md-12 col-sm-12">

                <!-- Like And Share 
                <div class="like_share_wrap b-0">
                    <ul class="like_share_list justify-content-center">
                        <li class="social_share_list">
                            <a href="JavaScript:void(0);" class="btn btn-likes" data-toggle="tooltip"
                               data-original-title="Share"><i class="fas fa-share"></i>{{ __('Share') }}</a>
                            <div class="social_share_panel">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&title={{ $property->description }}"
                                   target="_blank" class="cl-facebook"><i class="lni-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ $property->description }}"
                                   target="_blank" class="cl-twitter"><i class="lni-twitter"></i></a>
                                <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&summary={{ rawurldecode($property->description) }}&source=Linkedin"
                                   target="_blank" class="cl-linkedin"><i class="lni-linkedin"></i></a>
                            </div>
                        </li>
                        <li><a href="JavaScript:Void(0);" data-id="{{ $property->id }}"
                               class="btn btn-likes add-to-wishlist" data-toggle="tooltip" data-original-title="Save"><i
                                    class="fas fa-heart"></i>{{ __('Save') }}</a></li>
                    </ul>
                </div>

                <div class="details-sidebar">
                @if ($author = $property->author)
                    <!-- Agent Detail 
                        <div class="sides-widget">
                            <div class="sides-widget-header">
                                @if ($author->username)
                                    <div class="agent-photo">
                                        <img src="{{ RvMedia::getImageUrl($author->avatar->url, 'thumb') }}"
                                             alt="{{ $author->name }}">
                                    </div>
                                    <div class="sides-widget-details">
                                        <h4>
                                            <a href="{{ route('public.agent', $author->username) }}"> {{ $author->username }}</a>
                                        </h4>
                                        <span><i class="lni-phone-handset"></i>{{ $author->phone }}</span>
                                    </div>
                                    <div class="clearfix"></div>
                                @endif
                            </div>

                            <div class="sides-widget-body simple-form">
                                {!! Theme::partial('real-estate.elements.form-contact-consult', ['data' => $property]) !!}
                            </div>
                        </div>
                    @endif
                    {!! dynamic_sidebar('property_sidebar') !!}
                </div>


            </div>
            -->
        
        </div>
        </div>
    </div>

<!-- end gray section -->
<!-- start auction -->
<div class="auctions px-7 pt-3">
 
    <a href="{{url('/properties/'.$property->id.'/bids')}}" class="text-decoration-underline d-block blue-color">جميع المزايدات( {{ $property->reviews_count }})</a>
    @foreach($propertyBidds as $bid)
        <div class="col-sm-12">
            
            
            
            <div class="property-listing property-1 my-3 border shadow-none border-radius-none">
                <div class="listing-img-wrapper">
                    <div class="listing-content">
                        <div class="listing-detail-wrapper-box">
                            <div class="listing-detail-wrapper">
                                <div class="listing-short-detail">
                                    <h4 class="d-flex align-items-center listing-name blue-color mb-2 d-flex flex-row">
                                        <p>
                                            <i class="fas fa-plus"></i>
                                        </p>
                                        <p>
                                            <span class="d-block">{{$bid->star}}</span>
                                            <a class="blue-color" href="{{$bid->reviewable_id}}" title="{{$bid->comment}}">{{$bid->comment}}</a>
                                        </p>
                                    </h4>
                                </div> 
                                <div class="list-price d-flex flex-row">
                                     <h6 class="fs-14px gray-color font-weight-bold listing-card-info-price d-inline-block w-50"><i class="far fa-user"></i> {{$bid->account->username}}</h6>

                                    <div class="d-inline-block w-50">

                                        <div class="time_bid">
                                            
                                        {{-- <pre>      </pre><span class="gray-color">{{$bid->star}}</span>--}}
                                            <span class="gray-color fs-14px"><i class="far fa-clock"></i> {{$bid->created_at}}</span></div>
                                         </div> 
                                        </div>
                                    </div>
                                </div> 
            </div></div></div>
          

@if(auth('account')->user() && $property->approveBidd !== auth('account')->user()->id)
<!-- start add confirm bid -->  @if(auth('account')->user() && $property->author_id !== auth('account')->user()->id)


                                               <form action="/public/account/properties/approveBidd/{{$bid->id}}" method="GET" id="frmhomesearch">
                                                        @csrf
                                                    <div class="mt-3  mb-2 px-7 ">
                                                   
                                                  
                                                                    
                                                    @if($bid->status == "accepted")
                                                     @php $bid ;
                                                     @endphp
                                                    <a  href="/agents/{{$author->username}}" target="_blank" class="green-color rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                  بروفايل صاحب البدل
                                                    </a>
                                                    @elseif($bid->status == "pending")
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#confirmbid" class="rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                   تأكيد المزاد
                                                    </button>
                                                                    	<!-- start confirmbid -->
                     <div class="modal fade" id="confirmbid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                    {{csrf_field()}}
                    <div class="hero-search-content side-form">
                        <div class="row">
                            <h3 class="blue-color my-3">سيتم خصم 125 دينار كويتى</h3>
                            <p>سيتم خصم 125 دينار كويتى رسوم تأكيد المزاد . وإذا لم يكن لديك رصيد أشحن المحفظة.</p>
                            <a href="/account/packages"> <span class="blue-color fs-14px">أشحن المحفظة الان </span></a>
                        </div>
                    </div>
                    
                    <div class="modal-footer border-0">
                    <button type="submit" href="" class="rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                   تأكيد المزاد
                                                    </button>
                    </div>
                
            </div>

        </div>
    </div>
</div>
<!-- end confirmbid -->	
                                                    @else
                                                    @if(isset($bid))
                                                    <button style="display:none !important;" href="/agents/{{$bid->account->username}}" class="rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                        تأكيد المزاد
                                                    </button>
														

													@endif
                                                    @endif
                                                    @endif
                                                    @endif
                                                </div>
                                                    </form>
<!-- end add confirm bid -->  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach


</div>
<!-- end auction -->
<!-- start add auction -->
<!-- Button trigger modal -->


@if(auth('account')->user() && $property->author_id !== auth('account')->user()->id)
<div class="px-7 ">
    <button type="button" data-bs-toggle="modal" data-bs-target="#creditModal"  class="mb-4 rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
        أضف مزايدة
    </button>
</div>
@endif

<!-- start add auction modal -->
<div class="modal fade" id="AddAcutionModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <h3>أختار نوع المزايدة</h3>
                <form action="{{url('/reviews/create')}}" method="POST" id="frmhomesearch">
                    {{csrf_field()}}
                    <div class="hero-search-content side-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control bg-white" name="replacement" required required  id="doc_type"     oninvalid="this.setCustomValidity('برجاء اختيار من القائمة')" oninput="setCustomValidity('')">
                                        <option value="">أختار نوع المزايدة</option>
                                        <option value="بيت حكومي">بيت حكومي</option>
                                        <option value="كاش + بيت حكومي">كاش + بيت حكومي</option>
                                        <option value="قسيمة">قسيمة</option>
                                        <option value="كاش + قسيمة">كاش + قسيمة</option>
                                        <option value="اسكان">اسكان</option>
                                        <option value="كاش + اسكان">كاش + اسكان</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control bg-white" name="propertyName" required required  id="doc_type"     oninvalid="this.setCustomValidity('برجاء اختيار من القائمة')" oninput="setCustomValidity('')">
                                        <option value="">أختار من قائمتك</option>
                                        @foreach($authorProperties as $authorProperty)
                                            <option value="{{$authorProperty->name}}">{{$authorProperty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="position-relative">
                                    <i class="fas fa-minus minus"  id="minus1"></i>
                                    <input type="text" value="1" class="form-control bg-white text-center qty w-100 position-relative" name="cash" required/>
                                    <i class="fas fa-plus add" id="add1"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$property->toArray()['id']}}" name="property_id">
                    <div class="modal-footer border-0">
                        <input type="submit" value="أضف مزايدة" class="btn btn-primary rounded-pill bg-blue row w-75 mx-auto d-block border-0 btn btn-primary"  data-bs-dismiss="modal disabled">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end add auction modal-->
<!-- start credit modal -->
<div class="modal fade" id="creditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                    {{csrf_field()}}
                    <div class="hero-search-content side-form">
                        <div class="row">
                            <h3 class="blue-color my-3">سيتم خصم 1 دينار كويتى</h3>
                            <p> حتى تستطيع ان تزايد في اي من المزادات المتاحة في الموقع وسيتم سحب هذا المبلغ من المحفظة الخاصة بك كل مزايدة وإذا لم يكن لديك رصيد أشحن المحفظة.</p>
                            <a href="/account/packages"> <span class="blue-color fs-14px">أشحن المحفظة الان </span></a>
                        </div>
                    </div>
                    
                    <div class="modal-footer border-0">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#AddAcutionModel" class="charge-btn mb-4 rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
        موافق
    </button>
                    </div>
                
            </div>

        </div>
    </div>
 </div>
 </div>
</div>

</section>
<!-- end credit modal -->
<script>
    $(document).ready(function(){
        $(".add").on("click", function () {
            var $qty = $(this).closest("p").find(".qty");
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $(".minus").on("click", function () {
            var $qty = $(this).closest("p").find(".qty");
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $qty.val(currentVal - 1);
            }
        });
        $(".charge-btn").click(function(){
            $("#creditModal").hide();
        });
        $("#AddAcutionModel .btn-close").click(function(){
             location.reload();
        })
    })

</script>


<script>
    
       $(document).ready(function(){
       
	   
          $('area').ready(function(e) {
			  
			 if ($('#coords_map222').attr('selected')){
		console.log(  "invoked" );           
    //  var colorx = $(this).attr('title');
        var data = {};
        data.alwaysOn = !data.alwaysOn;
        data.stroke = 'none';
        data.strokeWidth = 0.0000001;
        data.strokeColor = '0fca98';
        data.fillColor = 'dd0000'; // Sample color
        data.fillOpacity = 0.7;
        $('#coords_map222').data('maphilight', data).trigger('alwaysOn.maphilight');
} 		
    });
	    
        });

    </script>


@if ($property->latitude && $property->longitude)
    <div
        data-magnific-popup="#trafficMap"
        data-map-id="trafficMap"
        data-popup-id="#traffic-popup-map-template"
        data-map-icon="{{ $property->map_icon }}"
        data-center="{{ json_encode([$property->latitude, $property->longitude]) }}">
    </div>
@endif

<script id="traffic-popup-map-template" type="text/x-custom-template">
    {!! Theme::partial('real-estate.properties.map', ['property' => $property]) !!}
</script>
<!-- ============================ Property Detail End ================================== -->
