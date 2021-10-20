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

use Illuminate\Support\Facades\Auth;
//////////login auth
Auth::routes();
///////
//Route::get('/', function () {
//    return view('welcome');
//});
//Auth::routes();
////////////admin book
Route::get('admin_books','Admin\AdminBookController@index')->middleware('auth');
Route::post('delete_book/{id}','Admin\AdminBookController@destroy');
Route::get('admin_add_book','Admin\AdminBookController@create')->middleware('auth');
Route::post('add_book','Admin\AdminBookController@store');
Route::get('admin_edit_book/{id}','Admin\AdminBookController@edit')->middleware('auth');
Route::post('admin_update_book/{id}','Admin\AdminBookController@update');
////////////
Route::get('admin_category','Admin\AdminCategoryController@index')->middleware('auth');
Route::post('admin_add_Category','Admin\AdminCategoryController@store');
Route::get('admin_edit_Category/{id}','Admin\AdminCategoryController@edit')->middleware('auth');
Route::post('admin_update_Category/{id}','Admin\AdminCategoryController@update');
Route::post('delete_category/{id}','Admin\AdminCategoryController@destroy');
//////////
Route::get('admin_place','Admin\AdminPalceController@index')->middleware('auth');
Route::post('admin_add_place','Admin\AdminPalceController@store');
Route::get('edit_place/{id}','Admin\AdminPalceController@edit')->middleware('auth');
Route::post('update_place/{id}','Admin\AdminPalceController@update');
Route::post('delete_place/{id}','Admin\AdminPalceController@destroy');
///////////
Route::get('admin_author','Admin\AdminWriterController@index')->middleware('auth');
Route::post('add_author','Admin\AdminWriterController@store');
Route::get('edit_author/{id}','Admin\AdminWriterController@edit')->middleware('auth');
Route::post('update_author/{id}','Admin\AdminWriterController@update');
Route::delete('delete_author/{id}','Admin\AdminWriterController@destory');
/////////
Route::get('/','User\UserController@index');
Route::post('show','User\UserController@show');
Route::post('search','User\UserController@search');

