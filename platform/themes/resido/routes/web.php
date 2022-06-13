<?php

use Botble\Location\Models\City;

// Custom routes
Route::group(['namespace' => 'Theme\badal\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get(SlugHelper::getPrefix(City::class, 'city') . '/{slug}',
            'badalController@getPropertiesByCity')
            ->name('public.properties-by-city');

        Route::get('agents', 'badalController@getAgents')->name('public.agents');
        Route::get('agents/{username}', 'badalController@getAgent')->name('public.agent');

        Route::get('wishlist', 'badalController@getWishlist')->name('public.wishlist');

        Route::get('ajax/cities', 'badalController@ajaxGetCities')->name('public.ajax.cities');
        Route::get('ajax/properties', 'badalController@ajaxGetProperties')->name('public.ajax.properties');
        Route::get('ajax/posts', 'badalController@ajaxGetPosts')->name('public.ajax.posts');
        Route::post('ajax/properties/map', 'badalController@ajaxGetPropertiesForMap')
            ->name('public.ajax.properties.map');

        Route::get('ajax/agents/featured', 'badalController@ajaxGetFeaturedAgents')
            ->name('public.ajax.featured-agents');

        Route::get('ajax/testimonials', 'badalController@ajaxGetTestimonials')
            ->name('public.ajax.testimonials');
        Route::get('ajax/real-estate-reviews/{id}', 'badalController@ajaxGetRealEstateReviews')
            ->name('public.ajax.real-estate-reviews');
        Route::get('ajax/real-estate-rating/{id}', 'badalController@ajaxGetRealEstateRating')
            ->name('public.ajax.real-estate-rating');
    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\badal\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'badalController@getIndex')->name('public.index');

        Route::get('sitemap.xml', [
            'as'   => 'public.sitemap',
            'uses' => 'badalController@getSiteMap',
        ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'badalController@getView',
        ]);

    });

});
