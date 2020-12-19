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

// Route::get('/', function () {
//     return view('welcome');
// });

//login
Route::get('login', 'PageController@login');
Route::post('login', 'LoginController@login');
//admin
Route::group(['middleware' => 'cek.login', 'prefix' => 'a'], function () {
        Route::get('/', 'Admin\PageController@index');
        //gejala
        Route::group(['prefix' => 'gejala'], function () {
            Route::get('/', 'Admin\PageController@gejala');
            Route::post('/', 'Admin\GejalaController@store');
            Route::get('datatable', 'Admin\GejalaController@loadTable');
            Route::get('table', 'Admin\GejalaController@index');
            Route::post('update/{kode}', 'Admin\GejalaController@update');
            Route::get('edit/{kode}', 'Admin\GejalaController@edit');
            Route::get('delete/{kode}', 'Admin\GejalaController@destroy');
        });

        //penyakit
        Route::group(['prefix' => 'penyakit'], function () {
            Route::get('/', 'Admin\PageController@penyakit');
            Route::post('/', 'Admin\PenyakitController@store');
            Route::get('datatable', 'Admin\PenyakitController@loadTable');
            Route::get('table', 'Admin\PenyakitController@index');
            Route::post('update/{kode}', 'Admin\PenyakitController@update');
            Route::get('edit/{kode}', 'Admin\PenyakitController@edit');
            Route::get('delete/{kode}', 'Admin\PenyakitController@destroy');
        });
        
});
Route::get('/', 'PageController@index');
Route::get('konsultasi', 'PageController@konsultasi');
Route::get('info', 'PageController@info');
Route::get('kontak', 'PageController@kontak');



