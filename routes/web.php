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

use App\Mail\Auth\VerifyMail;
use App\Page;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

//Route::feeds();


Route::group([
    'middleware' => 'enable'
], function() {

    Route::get('/feeds', 'ArticleController@getFeeds');

    Route::get('/articles', 'ArticleController@showAll');
    Route::get('/photo-reviews', 'PhotoReviewController@show');
    Route::get('/cities', 'CityController@show');
    Route::get('/survey/{type?}', 'SurveyController@show');
    Route::get('/pay-services', 'PayServiceController@show');
    Route::get('/pay-services-archive', 'PayServiceController@showArchive');
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



Auth::routes(['verify' => true]);
Route::get('/verify/{token}', [VerifyMail::class, "verify"])->name('register.verify');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::get('user-profile', 'UserController@show');
    Route::post('user-profile', 'UserController@update')->name('user-profile');
});


Route::get('/message', function () {
    return view('message', ['text' => 'Проверьте почту. Вам выслано письмо с подтверждением электронного адреса.']);
});
