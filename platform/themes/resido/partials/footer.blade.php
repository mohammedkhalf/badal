{!! dynamic_sidebar('footer_sidebar_1') !!}

<?php
use Botble\RealEstate\Models\Notification;
if (auth('account')->user()) {
      $bidd = Notification::where('account_id','=',auth('account')->user()->id)
          ->orwhere('reciever_id','=',auth('account')->user()->id)
        ->first();

    if($bidd) {
        $reviews = Notification::where('account_id', '=', auth('account')->user()->id)
            ->where('notification_type','=','bidd')
            ->where('created_at' ,'>' , Carbon\Carbon::parse($bidd->created_at)->format('H:i:s'))
            ->get();
    } else {
        $reviews = [];
    }


    // Sharing is caring
    \View::share('reviews', $reviews);
}
?>
<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div class="py-5">
        <div class="container">
            <div class="row">  
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget"><!--
                        @if (theme_option('logo_white'))
                            <img src="{{ RvMedia::getImageUrl(theme_option('logo_white')) }}" class="img-footer"
                                 style="max-height: 38px" alt="{{ theme_option('site_name') }}">
                        @endif
                        <div class="footer-add">
                            @if (theme_option('address'))
                                <p><i class="fas fa-map-marker-alt"></i> {{ theme_option('address') }}</p>
                            @endif
                            @if (theme_option('hotline'))
                                <p><i class="fas fa-phone-square"></i> {{ theme_option('hotline') }}</p>
                            @endif
                            @if (theme_option('email'))
                                <p><i class="fas fa-envelope"></i> {{ theme_option('email') }}</p>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        {!! dynamic_sidebar('footer_sidebar_2') !!}
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    {!! dynamic_sidebar('footer_sidebar_3') !!}
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">{!! clean(theme_option('copyright')) !!}</p>
                </div>

                <div class="col-lg-6 col-md-6">
                    @if (theme_option('social_links'))
                        <ul class="footer-bottom-social">
                            @foreach (json_decode(theme_option('social_links'), true) as $socialLink)
                                @if (count($socialLink) == 3)
                                    <li><a href="{{ $socialLink[2]['value'] }}" target="_blank"
                                           title="{{ $socialLink[0]['value'] }}"><i
                                                class="{{ $socialLink[1]['value'] }}"></i></a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
    -->
    

        </div>
            </div>
        </div>
    </div>
     </div>
    
</footer>
<!-- ============================ Footer End ================================== -->
<!-- bottom navbar -->
    <div class="row fixed-nav" style="position:fixed;bottom:0px;background-color:white;width: -webkit-fill-available;z-index:99999999">
        
        <ul class="nav d-flex justify-content-around" style="position:relative;flex-direction:initial!important;padding-left:0; padding-right:0">
            <div style="position: absolute; top: -30px;right: 42%;">
                <a href="/public/account/properties/create">
                <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57">
  <g id="Group_11411" data-name="Group 11411" transform="translate(-164 -2060)">
    <g id="Ellipse_10" data-name="Ellipse 10" transform="translate(164 2060)" fill="#fff" stroke="#e4e4e4" stroke-width="1">
      <circle cx="28.5" cy="28.5" r="28.5" stroke="none"/>
      <circle cx="28.5" cy="28.5" r="28" fill="none"/>
    </g>
    <g id="Group_11410" data-name="Group 11410" transform="translate(167 2007)">
      <circle id="Ellipse_8" data-name="Ellipse 8" cx="16.5" cy="16.5" r="16.5" transform="translate(9 65)" fill="#1266e3"/>
      <g id="Icon_feather-plus" data-name="Icon feather-plus" transform="translate(12.122 68.122)">
        <path id="Path_60" data-name="Path 60" d="M18,7.5V19.256" transform="translate(-4.622)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
        <path id="Path_61" data-name="Path 61" d="M7.5,18H19.256" transform="translate(0 -4.622)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
      </g>
    </g>
  </g>
</svg>
</a>
            </div>
  <li class="nav-item home-page" >
    <a class="nav-link" style="    text-align: center;padding: 1rem 2.5rem;" aria-current="page" href="{{url('/alryysy')}}">
    <i class="fas fa-home"></i>
        
<!--        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">-->
<!--  <image id="home" width="24" height="24" xlink:href="data:image/png;base64,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"/>-->
<!--</svg>-->
<br/>
الرئسية
    </a>
  </li>
  <li class="nav-item search-button">
    <a class="nav-link" style="    text-align: center;padding: 1rem 1.5rem;" href="{{url('/properties?k=')}}">
     <i class="fas fa-search"></i>   
<!--        <svg xmlns="http://www.w3.org/2000/svg" width="24.143" height="24.143" viewBox="0 0 24.143 24.143">-->
<!--  <g id="Icon_feather-search" data-name="Icon feather-search" transform="translate(-3 -3)">-->
<!--    <path id="Path_62" data-name="Path 62" d="M22.742,13.621A9.121,9.121,0,1,1,13.621,4.5,9.121,9.121,0,0,1,22.742,13.621Z" fill="none" stroke="#7a7979" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>-->
<!--    <path id="Path_63" data-name="Path 63" d="M29.934,29.934l-4.959-4.959" transform="translate(-4.913 -4.913)" fill="none" stroke="#7a7979" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>-->
<!--  </g>-->
<!--</svg>-->
<br/>
        
        البحث</a>
  </li>


  <li class="nav-item notification-button">
                                    <a class="nav-link" style="text-align: center;padding: 1rem 1.5rem;" href="{{url('account/properties/notifications')}}" role="button">
                                
                                        <i data-count="0" class="fas fa-bell"></i>
                                        <br/>
                                        الاشعارات
                                    </a>
                                    <div class="dropdown-container" style="margin-top: -63px;margin-right: 33px;">
                                        <div class="dropdown-toolbar">
                                            <div class="dropdown-toolbar-actions">
                                                <a href="#"></a>
                                            </div>
                                            <h3 class="dropdown-toolbar-title" style="font-size: 12px"><span
                                                    class="notif-count" style="color: red">{{ isset($reviews) ? count($reviews) : 0 }}</span></h3>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        </ul>

                                    </div>
                                </li>


  <li class="nav-item settings-button">
    <a class="nav-link "style="    text-align: center;padding: 1rem 1.5rem;" href="{{url('/account/dashboard')}}" tabindex="-1" aria-disabled="true">
    <i class="fas fa-cog"></i>
        
        
<!--        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">-->
<!--  <g id="Icon_feather-settings" data-name="Icon feather-settings" transform="translate(-0.5 -0.5)">-->
<!--    <path id="Path_4" data-name="Path 4" d="M22.5,18A4.5,4.5,0,1,1,18,13.5,4.5,4.5,0,0,1,22.5,18Z" transform="translate(-4.5 -4.5)" fill="none" stroke="#70798b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>-->
<!--    <path id="Path_5" data-name="Path 5" d="M21.573,16.773a1.8,1.8,0,0,0,.36,1.985l.065.065a2.183,2.183,0,1,1-3.087,3.087l-.065-.065a1.815,1.815,0,0,0-3.076,1.287v.185a2.182,2.182,0,0,1-4.364,0v-.1a1.8,1.8,0,0,0-1.178-1.647,1.8,1.8,0,0,0-1.985.36L8.176,22a2.183,2.183,0,1,1-3.087-3.087l.065-.065a1.815,1.815,0,0,0-1.287-3.076H3.682a2.182,2.182,0,1,1,0-4.364h.1a1.8,1.8,0,0,0,1.647-1.178,1.8,1.8,0,0,0-.36-1.985L5,8.176A2.183,2.183,0,1,1,8.089,5.089l.065.065a1.8,1.8,0,0,0,1.985.36h.087a1.8,1.8,0,0,0,1.091-1.647V3.682a2.182,2.182,0,1,1,4.364,0v.1a1.815,1.815,0,0,0,3.076,1.287L18.824,5a2.183,2.183,0,1,1,3.087,3.087l-.065.065a1.8,1.8,0,0,0-.36,1.985v.087a1.8,1.8,0,0,0,1.647,1.091h.185a2.182,2.182,0,0,1,0,4.364h-.1a1.8,1.8,0,0,0-1.647,1.091Z" transform="translate(0 0)" fill="none" stroke="#70798b" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>-->
<!--  </g>-->
<!--</svg>-->

<br/>
        
        
        الاعدادات</a>
  </li>
</ul>
        
    </div>
<!-- end bottom navbar -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
</div>

{!! Theme::footer() !!}


@if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
    <script type="text/javascript">
        "use strict";
        $(document).ready(function() {
            @if (session()->has('success_msg'))
                window.showAlert('alert-success', '{{ session('success_msg') }}');
            @endif

            @if (session()->has('error_msg'))
                window.showAlert('alert-danger', '{{ session('error_msg') }}');
            @endif

            @if (isset($error_msg))
                window.showAlert('alert-danger', '{{ $error_msg }}');
            @endif

            @if (isset($errors))
                @foreach ($errors->all() as $error)
                    window.showAlert('alert-danger', '{!! $error !!}');
                @endforeach
            @endif
        });
    </script>
@endif


<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>

@if(auth('account')->user())
<script>

    var pusher = new Pusher('33d53518960b80189496', {
        cluster: 'eu',
        encrypted: false,
    });

  var audio = new Audio('https://soundbible.com/mp3/old-fashioned-door-bell-daniel_simon.mp3');
    var channel = pusher.subscribe('my-channel');

    channel.bind('my-event', function(data) {
        let user = {!! auth('account')->user()->id !!};
        if(user !== data.account_id){
                audio.play();
            }
        var notifications = $('.dropdown-menu');
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;

        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/` + avatar + `.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">` + data.comment + `</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);
        //alert(JSON.stringify(data))
        if (data.id) {
            let pending = parseInt($('.notif-count').html());

            if (pending) {

                $('.notif-count').html(pending + 1);


            } else {
                $('#' + data.id).html(
                    '<a href="#" class="nav-link" data-toggle="dropdown"><i  class="fa fa-bell text-white"><span class="badge badge-danger pending">1</span></i></a>'
                    );
            }
        }
    });
</script>
@endif

</body>

</html>

