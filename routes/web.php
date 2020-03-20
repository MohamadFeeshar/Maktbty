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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth')->middleware('is_user');
Route::get('/favorites', 'FavoriteController@index')->middleware('auth')->middleware('is_user')->name('fav');
Route::get('/myBooks', 'LeaseController@index')->middleware('auth')->middleware('is_user')->name('myBooks');
Route::get('/dashboard', 'AdminController@admin')->middleware('auth')->middleware('is_admin')->name('admin');
Route::resource('users', 'UserController')->middleware('auth')->middleware('is_admin');
Route::resource('admins', 'AdminController')->middleware('auth')->middleware('is_admin');
Route::resource('books', 'BookController')->middleware('auth')->middleware('is_admin');
Route::resource('categories', 'CategoryController')->middleware('auth')->middleware('is_admin');
Route::get('/category/{id}', 'CategoryUserController@show')->middleware('auth')->middleware('is_user');
Route::resource('comments', 'CommentController')->middleware('auth')->middleware('is_user');
Route::get('/edit', 'CommentController@edit')->middleware('auth')->middleware('is_user');
Route::post('book/{book}', 'BookController@returnBack')->name('Books.returnBack')->middleware('auth')->middleware('is_user');

Route::resource('lease', 'LeaseController')->middleware('auth')->middleware('is_user');
Route::get('/dashboard/users', 'UserController@index')->middleware('auth')->middleware('is_admin');
Route::get('/dashboard/editUser', 'UserController@edit')->middleware('auth')->middleware('is_admin');
Route::get('users', 'UserController@ban')->name('users.ban')->middleware('auth')->middleware('is_admin');
Route::get('/home/profile', 'UserController@editProfile')->name('users.editProfile')->middleware('auth')->middleware('is_user');
Route::get('users', 'UserController@updateProfile')->name('users.updateProfile')->middleware('auth')->middleware('is_user');

Route::get('/dashboard/categories', 'CategoryController@index')->middleware('is_admin')->middleware('auth');

Route::get('/dashboard/books', 'BookController@index')->middleware('is_admin')->middleware('auth');


Route::get('/dashboard/admins', 'AdminController@index')->middleware('auth')->middleware('is_admin');
Route::get('/dashboard/editAdmin', 'AdminController@edit')->middleware('auth')->middleware('is_admin');

Route::get('book/{book}', 'BookController@getBookDetails')->name('books.getdetails')->middleware('auth')->middleware('is_user');

Route::get('/book', 'BookController@getBookDetails')->name('books.getdetails')->middleware('auth')->middleware('is_user');
Route::get('/category', 'HomeController@category')->name('category')->middleware('is_user');
Route::get('/order', 'HomeController@order')->name('order')->middleware('is_user');
Route::post('favoriteToggle', 'FavoriteController@addRemove')->name('addRemoveFavorite')->middleware('is_user');
Route::post('rateBook', 'RateController@store')->name('rateBook')->middleware('is_user');
Route::get('/favourite', 'FavoriteController@store')->name('favourite')->middleware('is_user');
Route::get('/orderByCategory', 'HomeController@orderByCategory')->name('orderByCategory')->middleware('is_user');
Route::get('/searchByCategory', 'HomeController@searchByCategory')->name('searchByCategory')->middleware('is_user');
Route::get('/userHome', 'HomeController@userHome')->name('userHome')->middleware('is_user');
