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
    Route::resource('profile', 'ProfileController')->except(['index','create','store','destroy']);

    /*Friend*/
    Route::get('friend/add/{username}', 'FriendController@getAdd')->name('friend.add');
    Route::get('friend/accept/{username}', 'FriendController@acceptRequest')->name('friend.accept');
    Route::post('friend/delete/{username}', 'FriendController@postDelete')->name('friend.delete');
    Route::post('friend/block/{username}', 'FriendController@blockFriend')->name('friend.block');
    Route::post('friend/unblock/{username}', 'FriendController@unBlockFriend')->name('friend.unblock');
    Route::resource('friend', 'FriendController')->except(['create','store','destroy']);



});