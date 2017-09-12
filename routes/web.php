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

Route::get('/admin-login-chat', function () {
    return view('admin/chat_admin');
})->name('adminChat');

Route::get('user-chat', function () {
    return view('user/chat');
})->name('userChat');

Route::get('get-userId', 'Api\AbstractController@getUser');
