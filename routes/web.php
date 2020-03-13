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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('/admin/users', function () {
    return view('admin.users');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::get('/admin/books', function () {
    return view('admin.books');
});


Route::get('/admin/admins', function () {
    return view('admin.admins');
});