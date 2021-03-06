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
//     return view('start');
//     // return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


//productos
Route::group(['prefix' => 'products', 'middleware' => ['auth', 'checkRoleAdmin']], function() {
    Route::get('/create', 'ProductController@create');
    Route::post('/create', 'ProductController@store');
    Route::get('/{id}/edit', 'ProductController@edit');
    Route::patch('/{id}/edit', 'ProductController@update');
    Route::delete('/delete/{id}', 'ProductController@destroy');
});
Route::group(['prefix' => 'products'], function() {
    Route::get('/', 'ProductController@index');
    Route::get('/{id}', 'ProductController@show');
});

//categorias
Route::group(['prefix' => 'categories', 'middleware' => ['auth', 'checkRoleAdmin']], function() {
    Route::get('/create', 'CategoryController@create');
    Route::post('/create', 'CategoryController@store');
    Route::get('/{id}/edit', 'CategoryController@edit');
    Route::patch('/{id}/edit', 'CategoryController@update');
    Route::delete('/delete/{id}', 'CategoryController@destroy');    
});

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'CategoryController@index');
    Route::get('/{id}', 'CategoryController@show');
    
});

// Usuarios
Route::group(['prefix' => 'users', 'middleware' => ['auth', 'checkRoleAdmin']],
function () {
    Route::get('/', 'UserController@index');
    Route::delete('/delete/{id}', 'UserController@destroy');    
    Route::get('/restore/{id}', 'UserController@restore');    
});

//cart
Route::group(['prefix' => 'cart', 'middleware' => ['auth', 'checkRole']],
function () {
    Route::get('/', 'CartController@index');
    Route::post('/{id}', 'CartController@store');
    Route::get('/remove', 'CartController@remove'); 
});