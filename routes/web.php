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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', 'ArticleController@showAll');
Route::get('/photo-reviews', 'PhotoReviewController@show');
Route::get('/cities', 'CityController@show');
Route::get('/survey/{type?}', 'SurveyController@show');
Route::get('/pay-services', 'PayServiceController@show');
Route::get('/pay-service/{id}', 'PayServiceController@showService');
Route::post('/pay-service/get', 'PayServiceController@showPrivate');
Route::post('/pay-service/get/data', 'PayServiceController@getData');

Route::get('/get-file/{file}', 'PayServiceController@getFile');



Route::post('/survey', 'SurveyController@save');
Route::get('/reviews', 'ReviewController@show');
Route::post('/reviews', 'ReviewController@save');


Route::group(['middleware' => ['auth']], function () {
    Route::post('/survey', 'SurveyController@save');
    Route::post('/reviews', 'ReviewController@save');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
