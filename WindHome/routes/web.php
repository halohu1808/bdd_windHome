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

// Hải viết Route vớ vẩn để test giao diện tí thôi!

Route::get('/test', function () {
    return view('listSite.test');
});

Route::get('/', function () {
    return view('homeSite.homeSearch');
});

Route::get('/home', function () {
    return view('homeSite.homeSearch');
})->name('home');
// Xóa sau khi làm xong giao diện


Auth::routes();

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');


Route::group(['prefix' => 'comments'], function () {
    Route::get('/', 'CommentController@index')->name('comment.index');
    Route::get('/create', 'CommentController@create')->name('comment.create');
    Route::post('/create', 'CommentController@store')->name('comment.store');

});

//Route::get('detail/{id}', 'RoomController@show')->name('room.detail');

Route::group(['prefix' => 'rooms'], function () {
    Route::get('/list','RoomController@list')->name('room.list');
    Route::get('/', 'RoomController@index')->name('room.index');
    Route::get('/create', 'RoomController@create')->name('room.create');
    Route::post('/create', 'RoomController@store')->name('room.store');
    Route::get('/update/{id}', 'RoomController@edit')->name('room.edit');
    Route::post('/update/{id}', 'RoomController@update')->name('room.update');
    Route::get('/delete/{id}', 'RoomController@destroy')->name('room.destroy');
    Route::get('/detail/{id}', 'RoomController@show')->name('room.detail');
    Route::post('/booking/{id}','RoomController@booking')->name('room.booking');

});
