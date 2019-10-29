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



//Route::get('detail/{id}', 'RoomController@show')->name('room.detail');

Route::group(['prefix' => 'rooms','middleware'=>'admin'], function () {
    Route::get('/', 'RoomController@index')->name('room.index');
    Route::get('/create', 'RoomController@create')->name('room.create');
    Route::post('/create', 'RoomController@store')->name('room.store');
    Route::get('/update/{id}', 'RoomController@edit')->name('room.edit');
    Route::post('/update/{id}', 'RoomController@update')->name('room.update');
    Route::get('/delete/{id}', 'RoomController@destroy')->name('room.destroy');

});


//Route::get('detail/{id}', 'RoomController@show')->name('room.detail');
Route::group(['prefix' => 'roomUser'], function () {
    Route::get('/list', 'RoomController@list')->name('room.list');/// not admin
    Route::get('/detail/{id}', 'RoomController@show')->name('room.detail');//not admin
    Route::post('/booking', 'RoomController@booking')->middleware('login')->name('room.booking'); // not admin

});


Route::group(['prefix' => 'user'], function () {
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::get('/changePassword/{id}', 'UserController@changePassword')->name('user.changePassword');
    Route::post('/updatePassword/{id}', 'UserController@updatePassword')->name('user.updatePassword');
    Route::post('/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/detail/{id}', 'UserController@show')->name('user.detail');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/detail/{id}', 'AdminController@detail')->name('admin.detail');
    Route::post('/edit/{id}', 'AdminController@editStatus')->name('admin.editStatus');
    Route::get('/create', 'RoomController@create')->name('room.create');
    Route::post('/create', 'RoomController@store')->name('room.store');
});

Route::group(['prefix' => 'contracts','middleware'=>'admin'], function () {
    Route::get('/edit/{id}', 'ContractController@run')->name('contract.run');
    Route::post('/create/{id}', 'ContractController@store')->name('contract.store');
    Route::get('/cancel/{id}', 'ContractController@cancel')->name('contract.cancel');
    Route::get('/endContract/{id}', 'ContractController@endContract')->name('contract.endContract');
    Route::get('/list', 'ContractController@index')->name('contract.index');
    //Hai code
    Route::get('/end/{id}', 'ContractController@end')->name('contract.end');
    Route::get('/cancelEnd/{id}', 'ContractController@cancelEnd')->name('contract.cancelEnd');

});

//User Action - Hải Viết - UserActionController
Route::group(['prefix' => 'userAction','middleware'=>'admin'], function () {
//    Route::get('cancelBookingRequest/{roomId}/{contractId}', 'UserActionController@cancelBookingRequest')->name('UserAction.cancelBookingRequest');


});



Route::group(['prefix' => 'adminRoute','middleware'=>'admin'], function () {
//    Phong
    Route::get('/roomAvailable', 'RouterAdminController@roomAvailable')->name('adminRoute.roomAvailable');
    Route::get('/roomRented', 'RouterAdminController@roomRented')->name('adminRoute.roomRented');
    Route::get('/roomKeeping', 'RouterAdminController@roomKeeping')->name('adminRoute.roomKeeping');
    Route::get('/roomEndRequest', 'RouterAdminController@roomEndRequest')->name('adminRoute.roomEndRequest');

//    Hop Dong
    Route::get('/contractAll', 'RouterAdminController@contractAll')->name('adminRoute.contractAll');
    Route::get('/contractRun', 'RouterAdminController@contractRun')->name('adminRoute.contractRun');
    Route::get('/contractEnd', 'RouterAdminController@contractEnd')->name('adminRoute.contractEnd');
    Route::get('/contractEndRequest', 'RouterAdminController@contractEndRequest')->name('adminRoute.contractEndRequest');
    Route::get('/contractKeepRequest', 'RouterAdminController@contractKeepRequest')->name('adminRoute.contractKeepRequest');
    Route::get('/contractDetail/{id}','RouterAdminController@contractDetail')->name('adminRoute.contractDetail');


    //    User
    Route::get('/userAll', 'RouterAdminController@userAll')->name('adminRoute.userAll');

});


Route::group(['prefix' => 'userRoute','middleware'=>'login'], function () {

    Route::get('/userSite', 'RouterUserController@userSite')->name('userRoute.userSite');
    Route::get('/allContract', 'RouterUserController@allContract')->name('userRoute.allContract');
    Route::get('/contractRun', 'RouterUserController@contractRun')->name('userRoute.contractRun');
    Route::get('/contractKeepRequest', 'RouterUserController@contractKeepRequest')->name('userRoute.contractKeepRequest');
    Route::get('/contractEndRequest', 'RouterUserController@contractEndRequest')->name('userRoute.contractEndRequest');
    Route::get('/contractEnd', 'RouterUserController@contractEnd')->name('userRoute.contractEnd');
    Route::get('/contractDetail/{id}', 'RouterUserController@contractDetail')->name('userRoute.contractDetail');
    Route::get('cancelBookingRequest/{roomId}/{contractId}', 'UserActionController@cancelBookingRequest')->name('UserAction.cancelBookingRequest');
    Route::get('cancelRoom/{roomId}/{contractId}', 'UserActionController@cancelRoom')->name('UserAction.cancelRoom');

});
