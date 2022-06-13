<?php

use Botble\RealEstate\Models\Category;
use Botble\RealEstate\Models\Property;

Route::group(['namespace' => 'Botble\RealEstate\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::post('storeProperety', [
        'as'   => 'storeProperety',
        'uses' => 'AccountPropertyController@store',
    ]);
    Route::group([
        'prefix'     => BaseHelper::getAdminPrefix() . '/real-estate',
        'middleware' => 'auth',
    ], function () {

        Route::get('settings', [
            'as'   => 'real-estate.settings',
            'uses' => 'RealEstateController@getSettings',
        ]);

        Route::get('notification', [
            'as'   => 'real-estate.notification',
            'uses' => 'RealEstateController@notification',
        ]);

        // implement Dashboard Notifications
        Route::post('sentNotification', [
            'as'   => 'real-estate.sentNotification',
            'uses' => 'RealEstateController@sentNotification',
        ]);

        Route::post('settings', [
            'as'         => 'real-estate.settings.post',
            'uses'       => 'RealEstateController@postSettings',
            'permission' => 'real-estate.settings',
        ]);


        Route::group(['prefix' => 'properties', 'as' => 'property.'], function () {
            Route::resource('', 'PropertyController')
                ->parameters(['' => 'property']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PropertyController@deletes',
                'permission' => 'property.destroy',
            ]);


        });

        Route::group(['prefix' => 'property-features', 'as' => 'property_feature.'], function () {
            Route::resource('', 'FeatureController')
                ->parameters(['' => 'property_feature']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'FeatureController@deletes',
                'permission' => 'property_feature.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-notifications', 'as' => 'property_notification.'], function () {
            Route::resource('', 'NotificationController')
                ->parameters(['' => 'property_notification']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'NotificationController@deletes',
                'permission' => 'property_notification.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features2', 'as' => 'property_feature2.'], function () {
            Route::resource('', 'Feature2Controller')
                ->parameters(['' => 'property_feature2']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature2Controller@deletes',
                'permission' => 'property_feature2.destroy',
            ]);
        });


        Route::group(['prefix' => 'property-features3', 'as' => 'property_feature3.'], function () {
            Route::resource('', 'Feature3Controller')
                ->parameters(['' => 'property_feature3']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature3Controller@deletes',
                'permission' => 'property_feature3.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features4', 'as' => 'property_feature4.'], function () {
            Route::resource('', 'Feature4Controller')
                ->parameters(['' => 'property_feature4']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature4Controller@deletes',
                'permission' => 'property_feature4.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features5', 'as' => 'property_feature5.'], function () {
            Route::resource('', 'Feature5Controller')
                ->parameters(['' => 'property_feature5']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature5Controller@deletes',
                'permission' => 'property_feature5.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features6', 'as' => 'property_feature6.'], function () {
            Route::resource('', 'Feature6Controller')
                ->parameters(['' => 'property_feature6']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature6Controller@deletes',
                'permission' => 'property_feature6.destroy',
            ]);
        });


        Route::group(['prefix' => 'property-features7', 'as' => 'property_feature7.'], function () {
            Route::resource('', 'Feature7Controller')
                ->parameters(['' => 'property_feature7']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature7Controller@deletes',
                'permission' => 'property_feature7.destroy',
            ]);
        });


        Route::group(['prefix' => 'property-features8', 'as' => 'property_feature8.'], function () {
            Route::resource('', 'Feature8Controller')
                ->parameters(['' => 'property_feature8']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature8Controller@deletes',
                'permission' => 'property_feature8.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features9', 'as' => 'property_feature9.'], function () {
            Route::resource('', 'Feature9Controller')
                ->parameters(['' => 'property_feature9']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature9Controller@deletes',
                'permission' => 'property_feature9.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features10', 'as' => 'property_feature10.'], function () {
            Route::resource('', 'Feature10Controller')
                ->parameters(['' => 'property_feature10']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature10Controller@deletes',
                'permission' => 'property_feature10.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-features11', 'as' => 'property_feature11.'], function () {
            Route::resource('', 'Feature11Controller')
                ->parameters(['' => 'property_feature11']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'Feature11Controller@deletes',
                'permission' => 'property_feature11.destroy',
            ]);
        });

        Route::group(['prefix' => 'consults', 'as' => 'consult.'], function () {
            Route::resource('', 'ConsultController')
                ->parameters(['' => 'consult'])
                ->except(['create', 'store']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ConsultController@deletes',
                'permission' => 'consult.destroy',
            ]);
        });

        Route::group(['prefix' => 'categories', 'as' => 'property_category.'], function () {
            Route::resource('', 'CategoryController')
                ->parameters(['' => 'category']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CategoryController@deletes',
                'permission' => 'property_category.destroy',
            ]);
        });

        Route::group(['prefix' => 'types', 'as' => 'property_type.'], function () {
            Route::resource('', 'TypeController')
                ->parameters(['' => 'type']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'TypeController@deletes',
                'permission' => 'property_type.destroy',
            ]);
        });

        Route::group(['prefix' => 'property-notifications', 'as' => 'property_notification.'], function () {
            Route::resource('', 'NotificationController')
                ->parameters(['' => 'property_notification']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'NotificationController@deletes',
                'permission' => 'property_notification.destroy',
            ]);
        });
        Route::group(['prefix' => 'facilities', 'as' => 'facility.'], function () {
            Route::resource('', 'FacilityController')
                ->parameters(['' => 'facility']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'FacilityController@deletes',
                'permission' => 'facility.destroy',
            ]);
        });

        Route::group(['prefix' => 'accounts', 'as' => 'account.'], function () {

            Route::resource('', 'AccountController')
                ->parameters(['' => 'account']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'AccountController@deletes',
                'permission' => 'account.destroy',
            ]);

            Route::get('list', [
                'as'         => 'list',
                'uses'       => 'AccountController@getList',
                'permission' => 'account.index',
            ]);

            Route::post('credits/{id}', [
                'as'         => 'credits.add',
                'uses'       => 'TransactionController@postCreate',
                'permission' => 'account.edit',
            ]);
        });

        Route::group(['prefix' => 'packages', 'as' => 'package.'], function () {
            Route::resource('', 'PackageController')
                ->parameters(['' => 'package']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PackageController@deletes',
                'permission' => 'package.destroy',
            ]);
        });

    });

    if (defined('THEME_MODULE_SCREEN_NAME')) {
        Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

            Route::get(SlugHelper::getPrefix(Property::class, 'properties'), 'PublicController@getProperties')
                ->name('public.properties');
            Route::get('properties/{id}/bids', 'PublicController@getBids');
            Route::post('reviews/create', [
                'as'         => 'reviews.new.create',
                'uses'       => 'ReviewController@create',
                'permission' => 'reviews.create',
            ]);

            Route::get(SlugHelper::getPrefix(Category::class, 'property-category') . '/{slug}',
                'PublicController@getPropertyCategory')
                ->name('public.property-category');

            Route::get(SlugHelper::getPrefix(Property::class, 'properties') . '/{slug}',
                'PublicController@getProperty');

            Route::post('send-consult', 'PublicController@postSendConsult')
                ->name('public.send.consult');

            Route::get('currency/switch/{code?}', [
                'as'   => 'public.change-currency',
                'uses' => 'PublicController@changeCurrency',
            ]);

            Route::group(['as' => 'public.account.'], function () {


                Route::group(['middleware' => ['account.guest']], function () {
                    Route::get('login', 'LoginController@showLoginForm')
                        ->name('login');
                    Route::post('login', 'LoginController@login')
                        ->name('login.post');

                    Route::get('register', 'RegisterController@showRegistrationForm')
                        ->name('register');
                    Route::post('register', 'RegisterController@register')
                        ->name('register.post');

                    Route::get('verify', 'RegisterController@getVerify')
                        ->name('verify');

                    Route::get('password/request',
                        'ForgotPasswordController@showLinkRequestForm')
                        ->name('password.request');
                    Route::post('password/email',
                        'ForgotPasswordController@sendResetLinkEmail')
                        ->name('password.email');
                    Route::post('password/reset', 'ResetPasswordController@reset')
                        ->name('password.update');
                    Route::get('password/reset/{token}',
                        'ResetPasswordController@showResetForm')
                        ->name('password.reset');
                });

                Route::group([
                    'middleware' => [
                        setting('verify_account_email',
                            config('plugins.real-estate.real-estate.verify_email')) ? 'account.guest' : 'account',
                    ],
                ], function () {
                    Route::get('register/confirm/resend',
                        'RegisterController@resendConfirmation')
                        ->name('resend_confirmation');
                    Route::get('register/confirm/{user}', 'RegisterController@confirm')
                        ->name('confirm');
                });
            });

            Route::get('feed/properties', [
                'as'   => 'feeds.properties',
                'uses' => 'PublicController@getPropertyFeeds',
            ]);

            Route::group(['middleware' => ['account'], 'as' => 'public.account.'], function () {
                Route::group(['prefix' => 'account'], function () {

                    Route::post('logout', 'LoginController@logout')
                        ->name('logout');

                    Route::get('dashboard', [
                        'as'   => 'dashboard',
                        'uses' => 'PublicAccountController@getDashboard',
                    ]);

                    Route::get('settings', [
                        'as'   => 'settings',
                        'uses' => 'PublicAccountController@getSettings',
                    ]);

                    Route::post('settings', [
                        'as'   => 'post.settings',
                        'uses' => 'PublicAccountController@postSettings',
                    ]);

                    Route::get('security', [
                        'as'   => 'security',
                        'uses' => 'PublicAccountController@getSecurity',
                    ]);

                    Route::put('security', [
                        'as'   => 'post.security',
                        'uses' => 'PublicAccountController@postSecurity',
                    ]);

                    Route::post('avatar', [
                        'as'   => 'avatar',
                        'uses' => 'PublicAccountController@postAvatar',
                    ]);

                    Route::get('packages', [
                        'as'   => 'packages',
                        'uses' => 'PublicAccountController@getPackages',
                    ]);

                    Route::get('transactions', [
                        'as'   => 'transactions',
                        'uses' => 'PublicAccountController@getTransactions',
                    ]);

                });

                Route::group(['prefix' => 'account/ajax'], function () {
                    Route::get('activity-logs', [
                        'as'   => 'activity-logs',
                        'uses' => 'PublicAccountController@getActivityLogs',
                    ]);

                    Route::get('transactions', [
                        'as'   => 'ajax.transactions',
                        'uses' => 'PublicAccountController@ajaxGetTransactions',
                    ]);

                    Route::post('upload', [
                        'as'   => 'upload',
                        'uses' => 'PublicAccountController@postUpload',
                    ]);

                    Route::post('upload-from-editor', [
                        'as'   => 'upload-from-editor',
                        'uses' => 'PublicAccountController@postUploadFromEditor',
                    ]);

                    Route::get('packages', 'PublicAccountController@ajaxGetPackages')
                        ->name('ajax.packages');
                    Route::put('packages', 'PublicAccountController@ajaxSubscribePackage')
                        ->name('ajax.package.subscribe');
                });


                Route::group(['prefix' => '/account/properties', 'as' => 'properties.'], function () {
                    Route::resource('', 'AccountPropertyController')
                        ->parameters(['' => 'property']);


                    Route::post('renew/{id}', [
                        'as'   => 'renew',
                        'uses' => 'AccountPropertyController@renew',
                    ]);
                    Route::get('notifications','ReviewController@getNotiBidds')->name('notifications');

                    Route::get('bid/show/{id}', [
                        'as'   => 'showBidd',
                        'uses' => 'AccountPropertyController@showBid',
                    ]);

                    Route::POST('properetyUpdatePrice/{id}', [
                        'as'   => 'properetyUpdatePrice',
                        'uses' => 'AccountPropertyController@properetyUpdatePrice',
                    ]);
                    Route::GET('approveBidd/{id}', [
                        'as'   => 'approveBidd',
                        'uses' => 'AccountPropertyController@approveBidd',
                    ]);


                });


                Route::group(['prefix' => 'account'], function () {
                    Route::get('packages/{id}/subscribe', 'PublicAccountController@getSubscribePackage')
                        ->name('package.subscribe');

                    Route::get('packages/{id}/subscribe/callback',
                        'PublicAccountController@getPackageSubscribeCallback')
                        ->name('package.subscribe.callback');
                });
            });
        });
    }
});
