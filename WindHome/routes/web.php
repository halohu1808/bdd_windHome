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


Route::get('/c', function () {
    return view('adminSite.createRoom');
});
Route::get('/list', function () {
    return view('listSite.listPage');
});
Route::get('/homeSearch', function () {
    return view('homeSite.homeSearch');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');


Route::group(['prefix' => 'comments'], function(){
    Route::get('/', 'CommentController@index')->name('comment.index');
    Route::get('/create', 'CommentController@create')->name('comment.create');
    Route::post('/create', 'CommentController@store')->name('comment.store');
});

Route::group(['prefix' => 'comments'], function () {
    Route::get('/', 'CommentController@index')->name('comment.index');
    Route::get('/create', 'CommentController@create')->name('comment.create');
    Route::post('/create', 'CommentController@store')->name('comment.store');

});

Route::group(['prefix' => 'rooms'], function () {
    Route::get('/', 'RoomController@index')->name('room.index');
    Route::get('/create', 'RoomController@create')->name('room.create');
    Route::post('/create', 'RoomController@store')->name('room.store');
    Route::get('/update/{id}', 'RoomController@edit')->name('room.edit');
    Route::post('/update/{id}', 'RoomController@update')->name('room.update');
    Route::get('/delete/{id}', 'RoomController@destroy')->name('room.destroy');
    Route::get('/detail/{id}', 'RoomController@show')->name('room.detail');

});
