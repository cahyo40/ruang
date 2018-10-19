<?php

Route::get('/', function () {
    return view('home.index');
});
Route::get('/login', function () {
    return view('home.login');
});
Route::post('/login','PenggunaController@login')->name('prosesLogin');
Route::get('/home/keluar','PenggunaController@keluar')->name('logout');


Route::get('/home/{token}','PenggunaController@index');
Route::get('/home/{token}/jadwal','PenggunaController@jadwal');
Route::get('/home/{token}/peminjam','PenggunaController@peminjam');
Route::get('/home/{token}/ruang','PenggunaController@ruang');
Route::post('/home/ruang','PenggunaController@ruangAdd')->name('tambahruang');
Route::post('/home/ruang/jadwwal/admin','PenggunaController@jadwalAdmin')->name('tambahJadwaladmin');
