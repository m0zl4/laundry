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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::match(["GET", "post"], "/register", function(){
    return redirect('login');
});  

//url
Route::resource('/tampilan', 'layouts.template');
Route::resource('/pelanggan', 'PelangganController');
Route::resource('/paket', 'PaketController');

Route::resource('/transaksi', 'TransaksiController');
Route::resource('/checkout', 'CheckoutController');

Route::resource('user', 'UserController');
Route::resource('/report', 'CetakController');
Route::get('report','CetakController@index')->name('report');
Route::get('cetak_pdf','CetakController@cetak_pdf')->name('cetak_pdf');
Route::get('invoice','TransaksiController@print')->name('invoice');

