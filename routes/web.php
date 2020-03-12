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
Route::get('/book', function () {
    return view('book');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/dashboard/users', function () {
    return view('admin.users');
});

Route::get('/dashboard/categories', function () {
    return view('admin.categories');
});

Route::get('/dashboard/books', function () {
    return view('admin.books');
});


Route::get('/dashboard/admins', function () {
    return view('admin.admins');
});