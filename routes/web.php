<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('admin/newstudent', 'App\Http\Controllers\HomeController@createNewStudent');
Route::post('admin/addNewStudent', 'App\Http\Controllers\HomeController@storeNewStudent');
Route::get('admin/oneStudent/{id}', 'App\Http\Controllers\HomeController@showOneStudent');
Route::get('admin/editStudent/{id}', 'App\Http\Controllers\HomeController@editStudent');
Route::post('admin/editStudent/update/{id}', 'App\Http\Controllers\HomeController@updateStudent');
Route::get('admin/deleteStudent/{id}', 'App\Http\Controllers\HomeController@deleteStudent');
Route::get('admin/search', 'App\Http\Controllers\HomeController@getsearch');
Route::post('admin/searchdone', 'App\Http\Controllers\HomeController@searchdone');
Route::get('admin/newbook', 'App\Http\Controllers\Book@create');
Route::post('admin/addnewbook', 'App\Http\Controllers\Book@store');
Route::get('admin/onebook/{id}', 'App\Http\Controllers\Book@showOneBook');
Route::get('admin/edit/{id}', 'App\Http\Controllers\Book@edit');
Route::post('admin/edit/update/{id}', 'App\Http\Controllers\Book@update');
Route::get('admin/delete/{id}', 'App\Http\Controllers\Book@delete');
Route::get('borrow/{id}', 'App\Http\Controllers\HomeController@borrow');
Route::get('return/{id}', 'App\Http\Controllers\HomeController@return');
Route::post('admin/updateprofile/{id}', 'App\Http\Controllers\HomeController@updateProfile');
Route::post('updateprofile/{id}', 'App\Http\Controllers\HomeController@updateProfile');
