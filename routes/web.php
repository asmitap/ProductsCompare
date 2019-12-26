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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminregister','AdminController@create')->name('adminregister')->middleware('admin');

Route::get('/admindashboard', 'ProductGroupController@admin')->name('admindashboard')->middleware('admin');
Route::get('/addgroup', 'ProductGroupController@create')->name('addgroup')->middleware('admin');
Route::post('/storegroup', 'ProductGroupController@store')->name('storegroup')->middleware('admin');
Route::get('/viewgroup', 'ProductGroupController@view')->name('viewgroup')->middleware('admin');
Route::get('/editgroup/{id}', 'ProductGroupController@edit')->name('editgroup')->middleware('admin');
Route::post('/updategroup/{id}', 'ProductGroupController@update')->name('updategroup')->middleware('admin');
Route::get('/deletegroup/{id}', 'ProductGroupController@destroy')->name('deletegroup')->middleware('admin');

Route::get('/storefeature/{id}', 'FeatureController@products')->name('products')->middleware('admin');
Route::post('/storefeature', 'FeatureController@storefeature')->name('storefeature')->middleware('admin');
Route::get('/editfeature/{id}', 'FeatureController@editfeature')->name('editfeature')->middleware('admin');
Route::post('/updatefeature/{id}', 'FeatureController@updatefeature')->name('updatefeature')->middleware('admin');
Route::get('/deletefeature/{id}', 'FeatureController@destroyfeature')->name('destroyfeature')->middleware('admin');

Route::get('/product', 'ProductController@product')->name('product');
Route::post('/storeproduct', 'ProductController@storeproduct')->name('storeproduct')->middleware('admin');
Route::get('/viewproduct', 'ProductController@viewproduct')->name('viewproduct')->middleware('admin');
Route::get('/editProduct/{id}', 'ProductController@editProduct')->name('editProduct')->middleware('admin');
Route::post('/updateProduct/{id}','ProductController@updateProduct')->name('updateProduct')->middleware('admin');
Route::get('/deleteProduct/{id}', 'ProductController@destroyProduct')->name('destroyProduct')->middleware('admin');



Route::get('/fetchfeature/{id}', 'ProductGroupController@fetchfeature')->name('fetchfeature');
Route::post('/compare', 'ProductGroupController@compareproduct')->name('compare');
Route::get('/compareproduct', 'ProductGroupController@compareproduct')->name('compare_product');

Route::get('/', 'ProductGroupController@viewpage')->name('viewpage');
