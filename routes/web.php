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

Route::get('/admindashboard', 'ProductGroupController@admin')->name('admindashboard');
Route::get('/addgroup', 'ProductGroupController@create')->name('addgroup');
Route::post('/storegroup', 'ProductGroupController@store')->name('storegroup');
Route::get('/viewgroup', 'ProductGroupController@view')->name('viewgroup');
Route::get('/editgroup/{id}', 'ProductGroupController@edit')->name('editgroup');
Route::post('/updategroup/{id}', 'ProductGroupController@update')->name('updategroup');
Route::get('/deletegroup/{id}', 'ProductGroupController@destroy')->name('deletegroup');

Route::get('/storefeature/{id}', 'FeatureController@products')->name('products');
Route::post('/storefeature', 'FeatureController@storefeature')->name('storefeature');
Route::get('/editfeature/{id}', 'FeatureController@editfeature')->name('editfeature');
Route::post('/updatefeature/{id}', 'FeatureController@updatefeature')->name('updatefeature');
Route::get('/deletefeature/{id}', 'FeatureController@destroyfeature')->name('destroyfeature');

Route::get('/product', 'ProductController@product')->name('product');
Route::post('/storeproduct', 'ProductController@storeproduct')->name('storeproduct');
Route::get('/viewproduct', 'ProductController@viewproduct')->name('viewproduct');

Route::get('/fetchfeature/{id}', 'ProductGroupController@fetchfeature')->name('fetchfeature');
Route::post('/compare', 'ProductGroupController@compareproduct')->name('compare');
Route::get('/compareproduct', 'ProductGroupController@compareproduct')->name('compare_product');

Route::get('/', 'ProductGroupController@viewpage')->name('viewpage');
