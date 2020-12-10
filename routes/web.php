<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/* rotas manuais em laravel
Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/{id}', 'ProductController@show')->name('products.show');

Route::get('products/create', 'ProductController@create')->name('products.create');
Route::post('products/store', 'ProductController@store')->name('products.store');

Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::put('products/{id}', 'ProductController@update')->name('products.update');

Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
*/

//rotas usando resource
//usando middleware na rota, nesse caso somente usuários autenticados podem acessar a rota products
//Route::resource('products', 'ProductController')->middleware('auth');
Route::any('products/search', 'ProductController@search')->name('products.search');
Route::resource('products', 'ProductController');

Route::get('/login', function () {
    return 'Aqui será a view de login';
})->name('login');

Route::redirect('/', '/products', 301);
