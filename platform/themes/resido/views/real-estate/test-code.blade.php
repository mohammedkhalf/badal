

        <section>
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading center mb-0">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="scontent">
                            <h3 class="blue-color text-center" style="text-align:right!important;">{!! $property->name !!}</h3>
							</br>
                            <form action="/account/properties/properetyUpdatePrice/{{$property->id}}" method="POST" id="frmhomesearch">
                                @csrf
                                <div class="hero-search-content side-form">
                                    <div class="row">
                                        <div class="col-12">
<div class="form-group">
                                                <select class="form-control bg-white" name="replacement">
                                                    <option value="">أختار نوع المزايدة</option>
                                                    @foreach($PropertyReplacement as $PR)
                                                    <option value="{{$PR->id}}" {{$PR->id == $property->replacement_id ? 'selected': ''}}>{{$PR->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="position-relative">
                                                <i class="fas fa-minus minus" id="minus1"></i>
                                                <input id="qty1" name="price" type="text" value="{{$property->price}}"
                                                    class="form-control bg-white text-center qty w-100 position-relative" />
                                                <i class="fas fa-plus add" id="add1"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-7 ">
                                    <button type="submit"
                                        class="mb-4 rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                        تعديل السعر
                                    </button>
                                </div>
                            </form>
                            <h5 class="gray-color text-center" style="text-align:right!important;">جميع المزايدات( {{ $property->reviews_count }})</h5>
							 </br>
                            <!-- start bottom sections -->
                            @foreach($property->reviews as $K=>$P)
                            <div class="col-sm-12">

                                <div class="property-listing property-1 my-3 border shadow-none border-radius-none">
                                    <div class="listing-img-wrapper">
                                        <div class="listing-content">
                                            <div class="listing-detail-wrapper-box">
                                                <div class="listing-detail-wrapper">
                                                    <div class="listing-short-detail">
                                                        <h4 class="blue-color listing-name mb-2">
                                                            <a class="blue-color"
                                                                href=""
                                                                title="{{$P->comment}}">{{$P->comment}}</a>
                                                        </h4>
                                                    </div>



                                                    <div class="list-price d-flex flex-row">
                                     <h6 class="fs-14px gray-color font-weight-bold listing-card-info-price d-inline-block w-50"><i class="far fa-user"></i> {{$P->account->username}}</h6>

                                    <div class="d-inline-block w-50">

                                        <div class="time_bid">

                                        {{-- <pre>      </pre><span class="gray-color">{{$P->star}}</span>--}}
                                            <span class="gray-color fs-14px"><i class="far fa-clock"></i> {{$P->created_at}}</span></div>
                                         </div>
                                        </div>
                                    </div>
                                </div>








                                                    <form action="{{route('public.account.properties.approveBiddapproveBidd',$P->id)}}" method="GET" id="frmhomesearch">
                                                        @csrf
                                                    <div class="mt-3  mb-2 px-7 ">
                                                        @if($P->status == "accepted" || $P->status == "pending")
                                                     @php $key = $K ; @endphp
                                                    <a  href="/agents/{{$P->account->username}}" target="_blank" class="green-color rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                        بروفايل صاحب المزايدة الفائزة
                                                    </a>
                                                    @else
                                                    @if(isset($key))
                                                    <button disabled href="" class="rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                        أختار المزايدة الفائزة
                                                    </button>
                                                    @else
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#creditModal"  class="mb-4 rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
        أختار المزايدة الفائزة
    </button>





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
                            <h3 class="blue-color my-3">سيتم خصم 128 دينار كويتى</h3>
                            <p>سيتم خصم 128 دينار كويتى رسوم أختيار المزايدة الفائزة . وإذا لم يكن لديك رصيد أشحن المحفظة.</p>
                            <a href="/account/packages"> <span class="blue-color fs-14px">أشحن المحفظة الان </span></a>
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="submit" href="" class="rounded-pill bg-blue row w-100 mx-auto d-block border-0 btn btn-primary">
                                                        أختار المزايدة الفائزة
                                                    </button>
                    </div>

            </div>

        </div>
    </div>
</div>
<!-- end credit modal -->


                                                    @endif
                                                    @endif
                                                </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- end bottom sections -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end page content -->



<script>'undefined' === typeof _trfq || (window._trfq = []); 'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({ 'tccl.baseHost': 'secureserver.net' }), _trfd.push({ 'ap': 'cpsh' }, { 'server': 'a2plcpnl0014' }, { 'id': '5451430' }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>

