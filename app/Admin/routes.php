<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('pages', PageController::class);
    $router->resource('sub_pages', SubPageController::class)->middleware('set_page');
    $router->resource('page_blocks', PageBlockController::class)->middleware('set_page');
    $router->get('remove_photo', 'PageBlockController@removePhoto');
    $router->resource('events', CenterEventController::class);
    $router->resource('sliders', SliderController::class)->middleware('set_page_block');
    $router->resource('slider_items', SliderItemController::class)->middleware('set_slider');
    $router->resource('directions', DirectionController::class)->middleware('set_page_block');
    $router->resource('direction_items', DirectionItemController::class)->middleware('set_direction');
    $router->resource('photosets', PhotosetController::class)->middleware('set_page_block');
    $router->resource('photos', PhotoController::class)->middleware('set_photoset');
    $router->resource('mailforms', MailFormController::class)->middleware('set_page_block');
    $router->resource('mailform_fields', MailFormFieldController::class)->middleware('set_mailform');
    $router->resource('photo-reviews', PhotoReviewController::class)->middleware('set_page_block');
    $router->resource('photo-review-itemss', CreatePhotoReviewItems::class)->middleware('set_photo_review');
    $router->resource('map_sub_points', MapSubPointController::class)->middleware('set_point');
    $router->resource('quest_blocks', QuestBlockController::class)->middleware('set_page_block');
    $router->resource('questions', QuestionController::class)->middleware('set_quest_block');

    $router->resource('sub-domains', SubDomainController::class);
});
