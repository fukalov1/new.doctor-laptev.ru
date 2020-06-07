<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Page;
use Illuminate\Support\Facades\Route;

Route::feeds();


Route::group([
    'middleware' => 'enable'
], function() {

    Route::get('/feeds', 'ArticleController@getFeeds');

    Route::get('/articles', 'ArticleController@showAll');
    Route::get('/photo-reviews', 'PhotoReviewController@show');
    Route::get('/cities', 'CityController@show');
    Route::get('/survey/{type?}', 'SurveyController@show');
    Route::get('/pay-services', 'PayServiceController@show');
    Route::post('/get-pay-service', 'PayServiceController@getData');
    Route::post('/check-pay-service', 'PayServiceController@checkData');

    Route::post('/pay-service/get', 'PayServiceController@showPrivate');
    Route::get('/get-file/{file}', 'PayServiceController@getFile');

    Route::post('/send_form/{id}', 'PageController@sendFormData');

    Route::post('/survey', 'SurveyController@save');
    Route::get('/reviews', 'ReviewController@show');
    Route::post('/reviews', 'ReviewController@save');


    Route::group(['middleware' => ['auth']], function () {
        Route::post('/survey', 'SurveyController@save');
        Route::post('/reviews', 'ReviewController@save');
        Route::get('/pay-service/{id}', 'PayServiceController@showService');
    });
});

Route::group([
    'prefix' => 'payment'
], function() {
    Route::get('result', 'PayServiceController@payResult');
    Route::get('success', 'PayServiceController@paySuccess');
    Route::get('fail', 'PayServiceController@payFail');
});



Auth::routes();

Route::group([
    'middleware' => 'auth'
], function() {
    Route::get('user-profile', 'UserController@show');
    Route::post('user-profile', 'UserController@update')->name('user-profile');
});


//Route::get('/home', 'HomeController@index')->name('home');
