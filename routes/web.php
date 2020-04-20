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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('discussions','DiscussionController');
Route::resource('discussion/{discussion}/replies','ReplyController');
Route::get('user/notifications','UsersController@notifications')->name('users.notifications');
Route::post('discussions/{discussion}/replies/{reply}','DiscussionController@reply')->name('discussions.bestreply');
Route::get('channel/{channel}/discussions','ChannelController@show')->name('channels.show');
