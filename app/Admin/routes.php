<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/show-anketa/{id}', 'ProfileUserController@index');

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('pages', PageController::class);
    $router->resource('sub_pages', SubPageController::class)->middleware('set_page');
    $router->resource('page_blocks', PageBlockController::class)->middleware('set_page');
    $router->get('remove_photo', 'PageBlockController@removePhoto');
    $router->resource('events', CenterEventController::class);
    $router->resource('sliders', SliderController::class)->middleware('set_page_block');
    $router->resource('slider_items', SliderItemController::class)->middleware('set_slider');
    $router->resource('micro_blocks', MicroBlockController::class)->middleware('set_page_block');
    $router->resource('directions', DirectionController::class)->middleware('set_page_block');
    $router->resource('direction_items', DirectionItemController::class)->middleware('set_direction');
    $router->resource('photosets', PhotosetController::class)->middleware('set_page_block');
    $router->resource('photos', PhotoController::class)->middleware('set_photoset');
    $router->resource('mailforms', MailFormController::class)->middleware('set_page_block');
    $router->resource('mailform_fields', MailFormFieldController::class)->middleware('set_mailform');
    $router->resource('photo-reviews', PhotoReviewController::class)->middleware('set_page_block');
    $router->resource('photo-review-items', PhotoReviewItemController::class)->middleware('set_photo_review');
    $router->resource('map_sub_points', MapSubPointController::class)->middleware('set_point');
    $router->resource('quest_blocks', QuestBlockController::class)->middleware('set_page_block');
    $router->resource('questions', QuestionController::class);
    $router->resource('cities', CityController::class);
    $router->resource('users', UserController::class);
    $router->resource('city-users', ProfileCityController::class)->middleware('set_city');
    $router->resource('profiles', ProfileController::class)->middleware('set_user');

    $router->resource('questions', QuestionController::class);
    $router->resource('answers', AnswerController::class)->middleware('set_question');

    $router->resource('pay-services', PayServiceController::class);

    $router->resource('log-payments', LogPaymentsController::class)->middleware('set_payservice');

    $router->resource('group-codes', GroupCodeController::class);
    $router->resource('codes', CodeController::class)->middleware('set_group_code');

    $router->resource('reviews', ReviewController::class);
    $router->resource('video-files', VideoFilesController::class)->middleware('set_payservice');
    $router->post('video-files/save', 'VideoFilesController@saveFiles');
    $router->post('video-files/delete', 'VideoFilesController@deleteFile');

    $router->resource('settings', SettingController::class);


    Route::get('ajaxImageUpload', 'AjaxFileUploadController@ajaxImageUpload');
    Route::post('ajax-upload', 'AjaxFileUploadController@ajaxFileUploadPost')->name('ajaxFileUpload');

    Route::get('export/vcard30/{id}', 'UserController@exportVCard30');
    Route::get('export/program-pdf/{id}', 'ProfileController@exportProgramPDF');
    Route::get('export/profile-pdf/{id}', 'ProfileController@exportProfilePDF');

    $router->post('set-site-enable', 'SettingController@SetSiteEnable');

//    $router->resource('sub-domains', SubDomainController::class);
});
