<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $title = "Welcome";
    return view('welcome',
[
    'title' => $title
]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
        //about us
		Route::get('aboutus', ['as' => 'pages.aboutus', 'uses' => 'App\Http\Controllers\PageController@aboutus']);

        //user
        Route::get('users/index', ['as' => 'pages.index', 'uses' => 'App\Http\Controllers\UserController@index']);
        Route::get('users/add', ['as' => 'pages.adduser', 'uses' => 'App\Http\Controllers\UserController@adduser']);
		Route::post('users/save', ['as' => 'pages.saveuser', 'uses' => 'App\Http\Controllers\UserController@saveuser']);
        Route::get('users/change/{id}', ['as' => 'pages.changeuser', 'uses' => 'App\Http\Controllers\UserController@changeuser']);
		Route::post('users/update', ['as' => 'pages.updateuser', 'uses' => 'App\Http\Controllers\UserController@updateuser']);
		Route::get('users/delete/{id}', ['as' => 'pages.deleteuser', 'uses' => 'App\Http\Controllers\UserController@deleteuser']);

        //pasien
		Route::get('pasien/view', ['as' => 'pages.viewpasien', 'uses' => 'App\Http\Controllers\PasienController@viewpasien']);
		Route::get('pasien/add', ['as' => 'pages.addpasien', 'uses' => 'App\Http\Controllers\PasienController@addpasien']);
		Route::post('pasien/save', ['as' => 'pages.savepasien', 'uses' => 'App\Http\Controllers\PasienController@savepasien']);
		Route::get('pasien/change/{id}', ['as' => 'pages.changepasien', 'uses' => 'App\Http\Controllers\PasienController@changepasien']);
		Route::post('pasien/update', ['as' => 'pages.updatepasien', 'uses' => 'App\Http\Controllers\PasienController@updatepasien']);
		Route::get('pasien/delete/{id}', ['as' => 'pages.deletepasien', 'uses' => 'App\Http\Controllers\PasienController@deletepasien']);
		Route::get('pasien/detail/{id}', ['as' => 'pages.detailpasien', 'uses' => 'App\Http\Controllers\PasienController@detailpasien']);

         //pendaftaran pasien (admin)
		Route::get('pendaftaran/view', ['as' => 'pages.viewpendaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@viewpendaftaran']);
		Route::get('pendaftaran/add', ['as' => 'pages.addpendaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@addpendaftaran']);
		Route::post('pendaftaran/save', ['as' => 'pages.savependaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@savependaftaran']);
		Route::get('pendaftaran/finish/{id}', ['as' => 'pages.finishpendaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@finishpendaftaran']);
		Route::get('pendaftaran/change/{id}', ['as' => 'pages.changependaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@changependaftaran']);
		Route::post('pendaftaran/update', ['as' => 'pages.updatependaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@updatependaftaran']);
		Route::get('pendaftaran/delete/{id}', ['as' => 'pages.deletependaftaran', 'uses' => 'App\Http\Controllers\PendaftaranController@deletependaftaran']);

        //pendaftaran pasien (pasien)
        Route::get('pendaftaran/pasien/view', ['as' => 'pages.viewpendaftaranpasien', 'uses' => 'App\Http\Controllers\PendaftaranController@viewpendaftaranpasien']);
        Route::get('pendaftaran/pasien/add', ['as' => 'pages.addpendaftaranpasien', 'uses' => 'App\Http\Controllers\PendaftaranController@addpendaftaranpasien']);
		Route::post('pendaftaran/pasien/save', ['as' => 'pages.savependaftaranpasien', 'uses' => 'App\Http\Controllers\PendaftaranController@savependaftaranpasien']);
        Route::get('pendaftaran/pasien/delete/{id}', ['as' => 'pages.deletependaftaranpasien', 'uses' => 'App\Http\Controllers\PendaftaranController@deletependaftaranpasien']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});