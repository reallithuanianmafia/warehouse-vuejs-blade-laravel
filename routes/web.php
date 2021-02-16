<?php

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

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/home', 'MainController@home')->name('home');
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/expenditures', 'ExpendituresController@expenditures')->name('expenditures.expenditures');
    Route::get('/notes', 'NotesController@index')->name('notes.index');
    Route::get('/myaccount', 'AccountsController@index')->name('accounts.index');

    Route::get('/api/products/{id}/edit', 'MainController@edit')->name('home.products.edit');
    Route::put('/api/products/{id}/update', 'MainController@update')->name('home.products.update');

    Route::get('/api/products', 'MainController@index');
    Route::post('/api/products/store', 'MainController@store');
    Route::delete('/api/products/{id}/destroy', 'ProductsController@destroy');
    Route::get('/api/deleteall', 'MainController@deleteallproduct');

    Route::get('/api/expenditures', 'ExpendituresController@index');
    Route::post('/api/expenditures/store', 'ExpendituresController@store');
    Route::delete('/api/expenditures/{id}/destroy', 'ExpendituresController@destroy');
    Route::POST('/api/relations', 'ExpendituresController@relations');
    Route::get('/api/users', 'MainController@users');

    
});