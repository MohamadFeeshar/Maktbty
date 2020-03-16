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

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/favorites', 'FavoriteController@index')->middleware('auth');
Route::get('/myBooks', 'LeaseController@index')->middleware('auth');
Route::get('/dashboard', 'AdminController@admin')->middleware('auth')->middleware('is_admin')->name('admin');
Route::resource('users', 'UserController')->middleware('auth')->middleware('is_admin');
Route::resource('admins', 'AdminController')->middleware('auth')->middleware('is_admin');
Route::resource('books', 'BookController')->middleware('auth')->middleware('is_admin');
Route::resource('categories', 'CategoryController')->middleware('auth')->middleware('is_admin');
Route::resource('comments','CommentController')->middleware('auth');
Route::get('/book/{{$book->id}}/edit', 'CommentController@edit')->middleware('auth');

Route::resource('lease','LeaseController')->middleware('auth');
Route::get('/dashboard/users', 'UserController@index')->middleware('auth')->middleware('is_admin');
Route::get('/dashboard/editUser', 'UserController@edit')->middleware('auth')->middleware('is_admin');
Route::get('users', 'UserController@ban')->name('users.ban')->middleware('auth')->middleware('is_admin');

Route::get('/dashboard/categories', 'CategoryController@index')->middleware('is_admin');

Route::get('/dashboard/books', 'BookController@index')->middleware('is_admin');


Route::get('/dashboard/admins', 'AdminController@index')->middleware('auth');
Route::get('/dashboard/editAdmin', 'AdminController@edit')->middleware('auth');

Route::get('book/{book}', 'BookController@getBookDetails')->name('books.getdetails')->middleware('auth');

Route::get('/book', 'BookController@getBookDetails')->name('books.getdetails')->middleware('auth');
Route ::get('/category','HomeController@category')->name('category');
Route ::get('/order','HomeController@order')->name('order');
Route ::get('/favourite','FavoriteController@store')->name('favourite');
