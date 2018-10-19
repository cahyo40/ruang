<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/mahasiswa','PenggunaController@mahasiswa')->name('mhs');
Route::get('/mahasiswa/{id}','PenggunaController@mahasiswa_detail');
Route::get('/admin','PenggunaController@admin');
Route::get('/admin/{id}','PenggunaController@admin_detail');
Route::get('/dosen','PenggunaController@dosen');
Route::get('/dosen/{id}','PenggunaController@dosen_detail');
