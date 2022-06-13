{{--@include(Theme::getThemeNamespace('views.real-estate.includes.properties-page-title'))--}}
{{--@include(Theme::getThemeNamespace('views.real-estate.includes.properties-list'))--}}



    <!-- start page content -->
    
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="scontent">
                            
    <div class="modal-dialog">
        <div class="modal-content">
        
                            <form action="{{url('/reviews/create')}}" method="POST" id="frmhomesearch">
                             {{csrf_field()}}
                                <div class="hero-search-content side-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control bg-white" name="replacement">
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
                                    <select class="form-control bg-white" name="propertyName" required required  id="doc_type"   oninvalid="this.setCustomValidity('برجاء اختيار من القائمة')" oninput="setCustomValidity('')">
                                        <option value="">أختار من قائمتك</option>
                                        @foreach($authorProperties as $authorProperty)
                                            <option value="{{$authorProperty->name}}">{{$authorProperty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                        <div class="col-12">
                                            <p class="position-relative">
                                                <i class="fas fa-minus minus" id="minus1"></i>
                                                <input id="qty1" type="text" value="1"
                                                       class="form-control bg-white text-center qty w-100 position-relative" />
                                                <i class="fas fa-plus add" id="add1"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-7 ">
                                    <input type="submit" value="أضف مزايدة" class="btn btn-primary rounded-pill bg-blue row w-75 mx-auto d-block border-0 btn btn-primary"  data-bs-dismiss="modal">

                                </div>      </div>
                </div>
            
                            </form>
                            <!-- start bottom sections -->
                            @foreach($bids as $bid)
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
                                            <a class="blue-color" href="#" title="{{$bid->comment}}">{{$bid->comment}}</a>
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
                                </div>
                        @endforeach
                        <!-- end bottom sections -->
                        </div>
                    </div>
                </div>
            </div>
       
   

