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
Route::get('Products', 'ProductController@index');
Route::get('add-product', 'ProductController@add_product');
Route::get('Editproduct/{id}', 'ProductController@EditView');
Route::post('/insert-product', "ProductController@insert")->name('product.insert');
Route::any('/fetchSubCateg', "ProductController@fetch_subcateg")->name('fetchSubCateg');
Route::post('/update-product/{id}', "ProductController@update")->name('product.update');
Route::get('DeleteProduct/{id}', 'ProductController@DeleteProduct');