<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//handle login & logout
Route::post('login', function(){
    if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
        return Redirect::intended('pengajuan');
    } else {
        return Redirect::to('/');
    }
});

Route::get('login', function(){
	return Redirect::to('/');
});

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/');
});


//public view
Route::get('/', array('uses' => 'SiteController@showHomePage'));

Route::group(array('before' => 'auth'), function(){
	Route::get('pengajuan', array('uses' => 'PengajuanController@showPengajuanForm'));
	Route::post('pengajuan', array('uses' => 'PengajuanController@showVerifikasi'));
	Route::get('pengajuan/ajukan', array('uses' => 'PengajuanController@ajukanLembur'));

	Route::get('status', array('uses' => 'PengajuanController@getStatusPengajuan'));
	Route::get('status/cetak/{noSpl}', array('uses' => 'PengajuanController@showSuratLembur'));
	Route::get('status/batalkan/{noSpl}', array('uses' => 'PengajuanController@batalkanPengajuan'));

	Route::get('konfirmasi', array('uses' => 'KonfirmasiController@showDataKonfirmasi'));
	Route::get('konfirmasi/setuju/{noSpl}', array('as' => 'setuju', 'uses' => 'KonfirmasiController@setuju'));
	Route::get('konfirmasi/tolak/{noSpl}', array('as' => 'tolak', 'uses' => 'KonfirmasiController@tolak'));
	Route::get('konfirmasi/notifikasi', array('uses' => 'KonfirmasiController@getNotification'));

	Route::resource('karyawan', 'KaryawanController');
	Route::get('karyawan/username-password/{id}', array('as' => 'detail', 'uses' => 'KaryawanController@showUsernameAndPassword'));

	Route::resource('hr', 'HrController');

	Route::resource('bagian', 'BagianController');

	Route::resource('pimpinan', 'PimpinanController');

	Route::get('laporan', array('uses' => 'PengajuanController@showFormKriteriaLaporan'));
	Route::post('laporan/{jenis}', array('uses' => 'PengajuanController@showLaporan'));
});


//notifikasi
Route::get('read/{id}', array('uses' => 'SiteController@readNotification'));
Route::get('notification', array('uses' => 'SiteController@getNotificationFor'));
Route::get('notification-count', array('uses' => 'SiteController@getUnreadNotificationCountFor'));


require "menu.php";