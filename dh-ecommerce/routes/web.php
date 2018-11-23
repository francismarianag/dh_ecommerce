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


// rutas para productos
Route::group(['prefix' => 'products'], function() {
    Route::get('/', 'ProductController@index');
    Route::get('/create', 'ProductController@create');
    Route::post('/create', 'ProductController@store');
    Route::get('/{id}/edit', 'ProductController@edit');
    Route::patch('/{id}/edit', 'ProductController@update');
    Route::get('/{id}', 'ProductController@show');
    Route::delete('/delete/{id}', 'ProductController@destroy');
});

// rutas para categorias
Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'CategoryController@index');
    Route::get('/create', 'CategoryController@create');
    Route::post('/create', 'CategoryController@store');
    Route::get('/{id}/edit', 'CategoryController@edit');
    Route::patch('/{id}/edit', 'CategoryController@update');
    Route::get('/{id}', 'CategoryController@show');
    Route::delete('/delete/{id}', 'CategoryController@destroy');
});

// Comentarios
// Route::post('/comments/store', 'CommentController@store');

// Usuarios
// Route::get('/users', 'UserController@index');
// Route::get('/users/{id}', 'UserController@show');

// rutas para admins/backoffice
// Route::group(['prefix' => 'backoffice', 'middleware' => ['auth', 'checkrole']], function() {
//     Route::get('/', 'BackofficeController@index');
//     Route::get('/carga_categorias', 'BackofficeController@create_category');
//     Route::post('/carga_categorias', 'BackofficeController@store_category');
// });



