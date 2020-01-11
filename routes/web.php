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

/* Route::get('/', function () {
return view('welcome');
});
 */
Auth::routes();
Route::get('/', 'HomeController@index')->middleware(['auth']);
Route::get('/home', 'HomeController@index')->middleware(['auth']);

Route::group(['middleware' => ['auth']], function () {

    /* // Add Category // */
    Route::resource('category', 'CategoryController');
    Route::any('get-delete-category', 'AjaxController@deletecategory');

    /* // Add Product // */
    Route::resource('product', 'ProductController');
    Route::any('get-delete-product', 'AjaxController@deleteproduct');

});
