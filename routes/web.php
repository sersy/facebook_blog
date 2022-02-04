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
    return redirect()->route('home');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'],function () {

    /*Search*/
    Route::get('/search', 'SearchController@getResult')->name('search.friend');

    /*Profile*/
    Route::resource('profile', 'ProfileController')->except(['create','store','destroy']);

    /*Friend*/
    Route::resource('friend', 'FriendController')->except(['create','store','destroy']);


});