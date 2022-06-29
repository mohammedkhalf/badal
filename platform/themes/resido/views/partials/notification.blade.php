

<body class="blue-skin" dir="rtl">

    <div id="main-wrapper">
        <div class="clearfix"></div>
    
                    
                
            



        <div class="col-lg-9 col-md-12 bg-light full-height">
                            <div class="row">
                            @if(count($reviews) > 0)
                                @foreach($reviews as $key)
                                @if($key->notification_type == "bidd")
                    
                                     <a href="/badal-new/public/properties/{{$key->property_id}}/bids">
                                    <div class="col-lg-8 order-lg-0 notification-section bg-white mb-3 p-3 border">
                                        
                                            <span>
                                            مزايدة جديدة - {{$key->created_at}}
                                            </span>
                                            <p class="font-weight-bold">
                                              <div class="notification-comment blue-color">{{$key->message}}</div>
                                            </p>
                                    </div>
                                    </a>
                                    @else
                                    <div class="col-lg-8 order-lg-0 notification-section bg-white mb-3 p-3 border">
                                        <a href="#">
                                            <span>
                                         أشعار من للبدل - {{$key->created_at}}
                                            </span>
                                            <p class="font-weight-bold">
                                               <a href=""> {{$key->message}} </a>
                                            </p>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                    @else
                                    <div class="col-lg-8 order-lg-0 notification-section bg-white mb-3 p-3 border">
                                        <a href="#">

                                            <p class="font-weight-bold">
                                              لا يوجد اشعارات
                                            </p>
                                        </a>
                                    </div>
                                    @endif


                            </div>
        </div>
    </div>
                            </body>