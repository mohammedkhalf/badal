@extends('plugins/real-estate::account.layouts.skeleton')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="modal-content" id="sign-up">
                    <div class="modal-body">
                        <h2 class="text-center">{{ trans('plugins/real-estate::dashboard.register-title') }}</h2>
                        <br>
                        @include(Theme::getThemeNamespace() . '::views.real-estate.account.auth.includes.messages')

                        <form method="POST" class="simple-form" enctype="multipart/form-data" action="{{ route('public.account.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="first_name" type="text"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ old('first_name') }}" required autofocus
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.first_name') }}">
                                            <i class="ti-user"></i>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="last_name" type="text"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ old('last_name') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.last_name') }}">
                                            <i class="ti-user"></i>
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <span class="d-block invalid-feedback">
                                                 <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.email') }}">
                                            <i class="ti-email"></i>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="username" type="text"
                                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username" value="{{ old('username') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.username') }}">
                                            <i class="ti-user"></i>
                                        </div>
                                        @if ($errors->has('username'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="phone" type="text"
                                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" value="{{ old('phone') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.phone') }}">
                                            <i class="ti-mobile"></i>
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="national_id" type="text"
                                                   class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}"
                                                   name="national_id" value="{{ old('national_id') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.national_id') }}">
                                            <i class="ti-id-badge"></i>
                                        </div>
                                        @if ($errors->has('national_id'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('national_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.password') }}">
                                            <i class="ti-unlock"></i>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.password-confirmation') }}">
                                            <i class="ti-unlock"></i>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                        <label>{{ __('trans.national_image_front') }}</label>
                                            <input id="national_image_front" type="file"
                                                   class="form-control{{ $errors->has('national_image_front') ? ' is-invalid' : '' }}"
                                                   name="national_image_front" value="{{ old('national_image_front') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.national_image_front') }}">
                                                   <i class="ti-upload"></i>
                                        </div>
                                        @if ($errors->has('national_image_front'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('national_image_front') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                        <label>{{ __('trans.national_image_back') }}</label>
                                            <input id="national_image_back" type="file"
                                                   class="form-control{{ $errors->has('national_image_back') ? ' is-invalid' : '' }}"
                                                   name="national_image_back" value="{{ old('national_image_back') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.national_image_back') }}">
                                                   <i class="ti-upload"></i>
                                        </div>
                                        @if ($errors->has('national_image_back'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('national_image_back') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                        <label>{{ __('trans.profile_image') }}</label>
                                            <input id="personal_img" type="file"
                                                   class="form-control{{ $errors->has('personal_img') ? ' is-invalid' : '' }}"
                                                   name="personal_img" value="{{ old('personal_img') }}" required
                                                   placeholder="{{ trans('plugins/real-estate::dashboard.personal_img') }}">
                                                   <i class="ti-upload"></i>
                                        </div>
                                        @if ($errors->has('personal_img'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('personal_img') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                

                            </div>

                            @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                <div class="form-group">
                                    {!! Captcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width btn-black rounded">
                                    {{ trans('plugins/real-estate::dashboard.register-cta') }}
                                </button>
                            </div>

                            <div class="form-group text-center">
                                <p>{{ __('Have an account already?') }}
                                    <a href="{{ route('public.account.login') }}"
                                       class="link d-block d-sm-inline-block text-sm-left text-center">{{ __('Login') }}</a>
                                </p>
                            </div>

                            <div class="text-center">
                                {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\RealEstate\Models\Account::class) !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/core/core/js-validation/js/js-validation.js')}}"></script>
    {!! JsValidator::formRequest(\Botble\RealEstate\Http\Requests\RegisterRequest::class); !!}
@endpush
