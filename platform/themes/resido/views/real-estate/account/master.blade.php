@php
    Theme::layout('account');
    $user = auth('account')->user();
@endphp
<section class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="filter_search_opt">
                    <a href="javascript:void(0);" class="open_search_menu">
                        {{ __('Dashboard Navigation') }}
                        <i class="ml-2 ti-menu"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-12">
            <div class="d-bar-navigation">
                <div class="simple-sidebar sm-sidebar" id="filter_search">

                    <div class="search-sidebar_header">
                        <h4 class="ssh_heading">{{ __('Close Filter') }}</h4>
                        <button class="w3-bar-item w3-button w3-large close_search_menu"><i
                                class="ti-close"></i></button>
                    </div>

                    
                        <div class="dashboard-navbar">
                            <div class="d-user-avater">
                                <img
                                    src="{{ $user->avatar->url ? RvMedia::getImageUrl($user->avatar->url, 'thumb') : $user->avatar_url }}"
                                    alt="{{ $user->name }}" class="img-fluid avater" style="width: 150px;">
                                <h4>{{ $user->name }}</h4>
                                <span>{{ $user->phone }}</span>
                            </div>

                            
                                <ul>
                                    
                                    <li class="{{ request()->routeIs('public.account.dashboard') ? 'active' : '' }}">
                                                <a href="{{ route('public.account.dashboard') }}"
                                                   title="{{ trans('plugins/real-estate::dashboard.header_profile_link') }}">
                                                    <i class="ti-dashboard"></i>{{ __('Dashboard') }}</a>
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
                                </ul>
                            </div>

                        </div>
                   

                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                @yield('content')
            </div>

        </div>
    </div>
</section>

@php ob_start(); @endphp
<!-- Put translation key to translate in VueJS -->
<script type="text/javascript">
    "use strict";
    window.trans = JSON.parse('{!! addslashes(json_encode(trans('plugins/real-estate::dashboard'))) !!}');
    var BotbleVariables = BotbleVariables || {};
    BotbleVariables.languages = {
        tables: {!! json_encode(trans('core/base::tables'), JSON_HEX_APOS) !!},
        notices_msg: {!! json_encode(trans('core/base::notices'), JSON_HEX_APOS) !!},
        pagination: {!! json_encode(trans('pagination'), JSON_HEX_APOS) !!},
        system: {
            'character_remain': '{{ trans('core/base::forms.character_remain') }}'
        }
    };
    var RV_MEDIA_URL = {'media_upload_from_editor': '{{ route('public.account.upload-from-editor') }}'};
</script>
@stack('header')
@php $masterHeaderScript = ob_get_clean(); @endphp

@php ob_start(); @endphp
{!! Assets::renderFooter() !!}
@stack('scripts')
@stack('footer')
@php $masterFooterScript = ob_get_clean(); @endphp

@php
    Theme::asset()->container('footer')->usePath(false)->add('lodash-js', asset('vendor/core/core/media/libraries/lodash/lodash.min.js'));
    Theme::asset()->usePath(false)->add('real-estate-app_custom-css', asset('vendor/core/plugins/real-estate/css/app_custom.css'));
    Theme::asset()->container('header')->writeContent('master-header-js', $masterHeaderScript);
    Theme::asset()->container('footer')->writeContent('master-footer-js', "<script> 'use strict'; $(document).ready(function () { $('#preloader').remove(); })</script>" . $masterFooterScript);
    Theme::asset()->container('footer')->usePath()->remove('components-js');
@endphp
