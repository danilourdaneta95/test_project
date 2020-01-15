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

Auth::routes();
Route::get('/Login', function () {
    return view('auth.login');
});
Route::get('logout', 'Auth\LoginController@logout')->name('Logout');
Route::middleware(['auth'])->group(function () {
    
    Route::get('/', 'HomeController@index')->name('Home');
    
    Route::get('/Productos', 'ProductosController@index')->name('Productos');
    Route::get('/Productos/New', 'ProductosController@create')->name('ProductosNew');
    Route::post('/Productos/store', 'ProductosController@store')->name('ProductosStore');
    Route::get('/Productos/Edit/{id}', 'ProductosController@edit')->name('ProductosEdit');
    Route::post('/Productos/update', 'ProductosController@update')->name('ProductosUpdate');
    Route::get('/Productos/Destroy/{id}', 'ProductosController@destroy')->name('ProductosDestroy');
    Route::get('/Productos/Show/{id}', 'ProductosController@show')->name('ProductosShow');
    
    
    Route::get('/Categorias', 'CategoriasController@index')->name('Categorias');
    Route::get('/Categorias/New', 'CategoriasController@create')->name('CategoriasNew');
    Route::post('/Categorias/store', 'CategoriasController@store')->name('CategoriasStore');
    Route::get('/Categorias/Edit/{id}', 'CategoriasController@edit')->name('CategoriasEdit');
    Route::post('/Categorias/update', 'CategoriasController@update')->name('CategoriasUpdate');
    Route::get('/Categorias/Destroy/{id}', 'CategoriasController@destroy')->name('CategoriasDestroy');
    Route::get('/Categorias/Show/{id}', 'CategoriasController@show')->name('CategoriasShow');
    
	Route::get('/Profile', function () {
        return view('user.profile');
    })->name('Profile');

    Route::post('/Profile/save', 'UserController@edit')->name('ProfileSave');
    Route::get('/User/{id}', 'UserController@show')->name('UserShow');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
