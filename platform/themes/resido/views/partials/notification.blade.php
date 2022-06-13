

<body class="blue-skin" dir="rtl">

    <div id="main-wrapper">
        <div class="clearfix"></div>
    
                    
                
            



        <div class="col-lg-9 col-md-12 bg-light full-height">
                            <div class="row">
                            @if(count($reviews) > 0)
                                @foreach($reviews as $key)
                                    <div class="col-lg-8 order-lg-0 notification-section bg-white mb-3 p-3 border">
                                        <a href="#">
                                            <span>
                                                {{$key->created_at}}
                                            </span>
                                            <p class="font-weight-bold">
                                               <a href="/properties/{{$key->reviewable_id}}/bids"> {{$key->message}} </a>
                                            </p>
                                        </a>
                                    </div>
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