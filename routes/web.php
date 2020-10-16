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
//     return view('pages/index');
// });
//Route::get('/', 'PageController@index');

Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('register', 'AuthController@register');
Route::post('post-register', 'AuthController@postRegister'); 
Route::get('/', 'AuthController@dashboard'); 
Route::get('logout', 'AuthController@logout');

//Products
Route::get('Products', 'ProductsController@index');
Route::get('add-product', 'ProductsController@add_product');
Route::post('/insert-product', "ProductController@insert")->name('product.insert');
Route::get('/products', "ProductController@show")->name('product.home');