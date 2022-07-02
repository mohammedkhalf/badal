<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css2?family={{ urlencode(theme_option('font_heading', 'Jost')) }}:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('font_body', 'Muli')) }}:300,400,600,700" rel="stylesheet" type="text/css">
    <!-- CSS Library-->

    <style>
        :root {
            --primary-color: {{ theme_option('primary_color', '#2b4db9') }};
            --font-body: {{ theme_option('font_body', 'Muli') }}, cairo;
            --font-heading: {{ theme_option('font_heading', 'Jost') }}, cairo;
        }
    </style>

    <script>
        "use strict";
        window.trans = {
            "Price": "السعر",
            "Number of rooms": "عدد الغرف",
            "Number of rest rooms": "عدد الحمامات",
            "Square": "Square",
            "No property found": "لم يتم العثور على بدلات",
            "million": "مليون",
            "billion": "مليار",
            "in": "فى",
            "Added to wishlist successfully!": "تمت الإضافة إلى قائمة الرغبات بنجاح!",
            "Removed from wishlist successfully!": "تمت الإزالة من قائمة الرغبات بنجاح!",
            "I care about this property!!!": "أنا أهتم بهذا العقار !!!",
            "See More Reviews": "رؤية المزيد من التعليقات",
            "Reviews": "المراجعات",
            "out of 5.0": "out of 5.0",
            "service": "خدمة",
            "value": "قيمة المبلغ",
            "location": "المكان",
            "cleanliness": "Cleanliness",
        }
        window.themeUrl = '{{ Theme::asset()->url('') }}';
        window.siteUrl = '{{ url('') }}';
        window.currentLanguage = '{{ App::getLocale() }}';
    </script>

    {!! Theme::header() !!}
</head>
<body class="{{ theme_option('skin', 'blue') }}" @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
<div id="alert-container"></div>

 <!-- ============================================================== 
@if (theme_option('preloader_enabled', 'no') == 'yes')
     Preloader - style you can find in spinners.css 
     ============================================================== 
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
@endif
 -->

<div class="loader-wrap">
        <div class="preloader">
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>

                </div>
            </div>
        </div>
    </div>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- 
    <div class="topbar bg-brand p-2 d-none d-sm-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                @if (is_plugin_active('language'))
                    <div class="language-wrapper">
                        {!! $languages = apply_filters('language_switcher') !!}
                    </div>
                @endif

                @if (is_plugin_active('real-estate'))
                    <div class="topbar-right d-flex align-items-center">
                        <div class="topbar-wishlist">
                            <a class="text-white" href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                        </div>
                        @php $currencies = get_all_currencies(); @endphp
                        @if (count($currencies) > 1)
                            <div class="choose-currency ms-3 text-white">
                                <span>{{ __('Currency') }}: </span>
                                @foreach ($currencies as $currency)
                                    <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>&nbsp;
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light head-shadow">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header w-100">
                    @if (theme_option('logo'))
                        <a class="nav-brand" href="{{ route('public.index') }}"><img class="logo" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ setting('site_title') }}"></a>
                        <button onclick="history.back()" class="btn" id="back-btn"><i class="fas fa-angle-left"></i></button>

                    @endif
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                <div class="nav-bar-desktop">                  
                    @if (is_plugin_active('real-estate'))
                    <nav class="navbar navbar-expand-md navbar-light bg-white">
  <div class="container">

  @if (theme_option('logo'))
        <a class="nav-brand" href="{{ route('public.index') }}"><img class="logo" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ setting('site_title') }}"></a>
        @else
          <div class="brand-container tc mr2 br2">
            <a class="navbar-brand b white ma0 pa0 dib w-100" href="{{ url('/') }}" title="{{ theme_option('site_title') }}">{{ ucfirst(mb_substr(theme_option('site_title'), 0, 1, 'utf-8')) }}</a>
          </div>
        @endif   
        
        
        {!! Menu::renderMenuLocation('main-menu', [
                        'view'    => 'menu',
                        'options' => ['class' => 'nav-menu'],
                    ]) !!}
        <ul class="navbar-nav ml-auto my-2">
                            @if (auth('account')->check())
                            <li>
                                <a href="{{ route('public.account.properties.create') }}" class="text-success"><img src="{{ Theme::asset()->url('') }}/img/submit.svg" width="20" alt="" class="mr-2" /> {{ __('Add Property') }}</a>
                            </li>
                            <li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.dashboard') }}" title="{{ trans('plugins/real-estate::dashboard.header_profile_link') }}">
              <span>
                <img src="{{ auth('account')->user()->avatar->url ? RvMedia::getImageUrl(auth('account')->user()->avatar->url, 'thumb') : auth('account')->user()->avatar_url }}" class="br-100 v-mid mr1" alt="{{ auth('account')->user()->name }}" style="width: 30px;">
                <span>{{ auth('account')->user()->name }}</span>
              </span>
            </a>
          </li>                        
          <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                            @else
                            <li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.login') }}">
                <i class="fas fa-sign-in-alt"></i> {{ trans('plugins/real-estate::dashboard.login-cta') }}
            </a>
          </li>
          <li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.register') }}">
                <i class="fas fa-user-plus"></i> {{ trans('plugins/real-estate::dashboard.register-cta') }}
            </a>
          </li>
                            @endif
                        </ul>
                </div></div>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            <div class="d-sm-none mobile-menu">
                                <?php $user = auth('account')->user();
                                if($user != null){
                                $avatar = $user->avatar;
                                ?>                           
                                                                        
<!-- ==========================menu login==================================== -->

                                
                                <div class="sidebar-widgets">
                                    <div class="dashboard-navbar">
                                        <div class="d-user-avater">
                                            <img
                                                src="{{ $user->avatar->url ? RvMedia::getImageUrl($user->avatar->url, 'thumb') : $user->avatar_url }}"
                                                alt="{{ $user->name }}" class="img-fluid avater" style="width: 150px;">
                                            <h4>{{ $user->name }}</h4>
                                            <span>{{ $user->phone }}</span>
                                        </div>

                                        <div class="d-navigation">
                                            <ul>
                                                <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                    <a href="{{ route('public.account.dashboard') }}"
                                                       title="profile">
                                                        <i class="far fa-user"></i>
                                                        حسابى
                                                    </a>
                                                    </a>
                                                </li>
                                               
                                                <li class="{{ request()->routeIs('public.account.packages') ? 'active' : '' }}">
                                                    <a
                                                        href="{{ route('public.account.packages') }}"
                                                        title="{{ trans('plugins/real-estate::account.credits') }}">
                                                        <i class="far fa-credit-card mr1"></i>

                                                        المحفظة
                                                        <span
                                                            class="badge badge-info">{{ auth('account')->user()->credits }} {{ trans('plugins/real-estate::account.credits') }}</span>
                                                    </a>
                                                </li>
                                               
                                                 {!! apply_filters(ACCOUNT_TOP_MENU_FILTER, null) !!}
                                                <li class="{{ request()->routeIs('public.account.properties.index') ? 'active' : '' }}">
                                                    <a
                                                        href="{{ route('public.account.properties.index') }}"
                                                        title="{{ trans('plugins/real-estate::account-property.properties') }}">
                                                        <i class="far fa-newspaper mr1"></i>
                                                        عقاراتى
                                                    </a>
                                                </li>
                                                
                                                
                                                <li class="{{ request()->routeIs('public.account.settings') ? 'active' : '' }}">
                                                    <a
                                                        href="{{ route('public.account.settings') }}"
                                                        title="{{ trans('plugins/real-estate::dashboard.header_settings_link') }}">
                                                        <i class="fas fa-cogs mr1"></i>
                                                        الاعدادات
                                                    </a>
                                                </li>

                                                  <li class="{{ request()->routeIs('public.account.security') ? 'active' : '' }}">
                                                    <a href="{{ route('public.account.security') }}">
                                                        <i class="ti-unlock"></i>

                                                        الامان
                                                    </a>
                                                </li>

                                              <!-- properties create 

                                                @if (auth('account')->user()->canPost())
                                                    <li class="{{ request()->routeIs('public.account.properties.create') ? 'active' : '' }}">
                                                        <a
                                                            href="{{ route('public.account.properties.create') }}"
                                                            title="{{ trans('plugins/real-estate::account-property.write_property') }}">
                                                            <i class="far fa-edit mr1"></i>{{ trans('plugins/real-estate::account-property.write_property') }}
                                                        </a>
                                                    </li>
                                                @endif
                                          -->

                                             
                                                <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                    <a href="/toasl-maana"
                                                       title="تواصل معنا">
                                                        <i class="fas fa-phone-alt"></i>
                                                        تواصل معنا
                                                    </a>
                                                    </a>
                                                </li>
                                                <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                    <a href="/properties/map"
                                                       title="مخططات المناطق والتوزيعات اﻷسكانية">
                                                        <i class="fas fa-map"></i>
                                            

                                                        مخططات المناطق والتوزيعات اﻷسكانية
                                                    </a>
                                                    </a>
                                                </li>
                                                <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                    <a href="/alshrot-o-aalhkam"
                                                       title="الشروط واﻷحكام">
                                                       <i class="fas fa-book"></i>
                                                        الشروط واﻷحكام
                                                    </a>
                                                    </a>
                                                </li>
                                                <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                    <a href="#"
                                                       title="قوانين البدل وألية البدل">
                                                        <i class="fas fa-gavel"></i>
                                                        قوانين البدل وألية البدل
                                                    </a>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db"
                                                       href="#"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                       title="{{ trans('plugins/real-estate::dashboard.header_logout_link') }}">
                                                        <i class="fas fa-sign-out-alt mr1"></i>
                                                        <span> تسجيل الخروج</span>

                                                    </a>
                                                    <form id="logout-form" action="{{ route('public.account.logout') }}"
                                                          method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                                {{--                            <div class="mobile-menu-item mobile-wishlist">--}}
                                {{--                                <a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>--}}
                                {{--                            </div>--}}
                                {{--                            @if (count($currencies) > 1)--}}
                                {{--                                <div class="mobile-menu-item">--}}
                                {{--                                    <span>{{ __('Currency') }}: </span>--}}
                                {{--                                    @foreach ($currencies as $currency)--}}
                                {{--                                        <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>&nbsp;--}}
                                {{--                                    @endforeach--}}
                                {{--                                </div>--}}
                                {{--                            @endif--}}
                                {{--                            @if (is_plugin_active('language'))--}}
                                {{--                                <div class="mobile-menu-item language-wrapper">--}}
                                {{--                                    {!! $languages = apply_filters('language_switcher') !!}--}}
                                {{--                                </div>--}}
                                {{--                            @endif--}}
                            </div>



                            <!-- ================================menu logout============================== -->
<?php if (auth('account')->user() == null){?>
                            <div class="sidebar-widgets">
                                <div class="dashboard-navbar">
                                    <div class="d-navigation">

                                        <ul>
                                            <li class="first-li">
                                                <a href="{{ route('public.account.properties.create') }}" class="text-success"><img src="{{ Theme::asset()->url('') }}/img/submit.svg" width="20" alt="" class="mr-2" /> {{ __('Add Property') }}</a>
                                            </li>

                                            @if (auth('account')->check())
                                                <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>
                                            @endif


                                            <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                <a href="{{ route('public.account.dashboard') }}"
                                                   title="{{ trans('plugins/real-estate::dashboard.header_profile_link') }}">
                                                    <i class="ti-dashboard"></i>{{ __('Dashboard') }}</a>
                                                </a>
                                            </li>

                                            <li class="{{ request()->routeIs('public.account.settings') ? 'active' : '' }}">
                                                <a
                                                    href="{{ route('public.account.settings') }}"
                                                    title="{{ trans('plugins/real-estate::dashboard.header_settings_link') }}">
                                                    <i class="fas fa-cogs mr1"></i>
                                                    الاعدادات
                                                </a>
                                            </li>


                                            <li class="{{ request()->routeIs('public.account.security') ? 'active' : '' }}">
                                                <a href="{{ route('public.account.security') }}">
                                                    <i class="ti-unlock"></i>

                                                    الامان
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                <a href="/toasl-maana" title="تواصل معنا">
                                                    <i class="fas fa-phone-alt"></i>
                                                    تواصل معنا
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                <a href="/properties/map" title="مخططات المناطق والتوزيعات اﻷسكانية">
                                                    <i class="fas fa-map"></i>
                                                    مخططات المناطق والتوزيعات اﻷسكانية
                                                </a>
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                <a href="/alshrot-o-aalhkam" title="الشروط واﻷحكام">
                                                    <i class="fas fa-book"></i>
                                                    الشروط واﻷحكام
                                                </a>
                                            </li>
                                            <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                <a href="#" title="قوانين البدل وألية البدل">
                                                <i class="fas fa-gavel"></i>
                                                 قوانين البدل وألية البدل
                                                </a>
                                            </li>

                                            @if (auth('account')->check())
                                                <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                                            @else
                                                <li class="add-listing">
                                                    <a href="{{ route('public.account.login') }}"><img src="{{ Theme::asset()->url('') }}/img/user-light.svg" width="12" alt="" class="mr-2" />{{ __('Sign In') }}</a>
                                                </li>
                                            @endif

                                        </ul>
                                    </div></div></div>
<?php }?>
                            <!-- ============================================================== -->




                        </ul>



                        <div class="clearfix"></div>

                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <script>
        $(document).ready(function(){
            $(".d-navigation li").removeClass("active");
        })
    </script>
    
