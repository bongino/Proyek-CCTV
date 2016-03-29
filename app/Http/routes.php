<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'LoginController@index');
    Route::post('checkLogin', 'LoginController@checkLogin');
    Route::get('dashboard', 'AdminController@dashboard');

    Route::get('manageProfile', 'AdminController@manageProfile');
    Route::post('manageProfile', 'AdminController@updateProfile');

    Route::get('manageAdmin', 'AdminController@manageAdmin');
    Route::get('tambahAdmin', 'AdminController@formTambahAdmin');
    Route::post('tambahAdmin', 'AdminController@prosesTambahAdmin');
    Route::get('editAdmin/{idAdmin}', 'AdminController@formEditAdmin');
    Route::post('editAdmin', 'AdminController@prosesEditAdmin');

    Route::get('manageCustomer', 'AdminController@manageCustomer');
    Route::get('tambahCustomer', 'AdminController@formTambahCustomer');
    Route::post('tambahCustomer', 'AdminController@prosesTambahCustomer');
    Route::get('editCustomer/{idCustomer}', 'AdminController@formEditCustomer');
    Route::post('editCustomer', 'AdminController@prosesEditCustomer');

    Route::get('manageKota', 'AdminController@manageKota');
    Route::get('tambahKota', 'AdminController@formTambahKota');
    Route::post('tambahKota', 'AdminController@prosesTambahKota');
    Route::get('editKota/{idKota}', 'AdminController@formEditKota');
    Route::post('editKota', 'AdminController@prosesEditKota');

    Route::get('manageExpedisi', 'AdminController@manageExpedisi');
    Route::get('tambahExpedisi', 'AdminController@formTambahExpedisi');
    Route::post('tambahExpedisi', 'AdminController@prosesTambahExpedisi');
    Route::get('editExpedisi/{idExpedisi}', 'AdminController@formEditExpedisi');
    Route::post('editExpedisi', 'AdminController@prosesEditExpedisi');

    Route::get('manageDetailExpedisi', 'AdminController@manageDetailExpedisi');
    Route::get('tambahDetailExpedisi', 'AdminController@formTambahDetailExpedisi');
    Route::post('tambahDetailExpedisi', 'AdminController@prosesTambahDetailExpedisi');
    Route::get('editDetailExpedisi/{idDetailExpedisi}', 'AdminController@formEditDetailExpedisi');
    Route::post('editDetailExpedisi', 'AdminController@prosesEditDetailExpedisi');

    Route::get('manageKategoriProduk', 'AdminController@manageKategoriProduk');
    Route::get('tambahKategoriProduk', 'AdminController@formTambahKategoriProduk');
    Route::post('tambahKategoriProduk', 'AdminController@prosesTambahKategoriProduk');
    Route::get('editKategoriProduk/{idKategoriProduk}', 'AdminController@formEditKategoriProduk');
    Route::post('editKategoriProduk', 'AdminController@prosesEditKategoriProduk');

    Route::get('logout', 'LoginController@logout');
});





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//
//Route::group(['middleware' => ['web']], function () {
//    //
//});
//
//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//
//    Route::get('/home', 'HomeController@index');
//});
