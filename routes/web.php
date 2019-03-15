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

Auth::routes();

Route::get('/', 'PageController@welcome');
Route::get('/categories/{catID}' , 'PageController@index');


Route::middleware(['auth'])->group(function() {
    Route::resource('/articles', 'ArticleController');
    Route::resource('/orders', 'OrderController');
	Route::get('/dashboard', 'DashboardController@index');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
