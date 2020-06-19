<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group( function (){
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store')->name('tweet.store');
    Route::post('/profiles/{user:name}/follow', 'FollowsController@store')->name('follow');
    Route::get('/profiles/{user:name}/edit', 'profilesController@edit')->middleware('can:edit,user');
});

Route::get('/profiles/{user:name}', 'profilesController@show')->name('profile');


Auth::routes();
