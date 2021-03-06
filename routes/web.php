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

Route::get('/', 'HomeController@index');

Route::middleware(['auth'])->group(function () {
    Route::get('/products', 'ProductController@index')
        ->name('products.index');
    Route::post('/products', 'ProductController@store')
        ->name('products.store')
        ->middleware('can:create,products');
    Route::get('/products/create', 'ProductController@create')
        ->name('products.create')
        ->middleware('can:create,products');
    Route::get('/products/{product}', 'ProductController@show')
        ->name('products.show');
    Route::get('/products/{product}/edit', 'ProductController@edit')
        ->name('products.edit')
        ->middleware('can:update,product');
    Route::put('/products/{product}', 'ProductController@update')
        ->name('products.update')
        ->middleware('can:update,product');
    Route::delete('/products/{product}', 'ProductController@destroy')
        ->name('products.destroy');
    Route::put('/products/{product}/star', 'RatingController@update')
        ->name('ratings.update');
    Route::get('/products/{product}/review', 'ReviewController@create')
        ->name('reviews.create');
    Route::post('/reviews', 'ReviewController@store')
        ->name('reviews.store');
    Route::get('/reviews/{product}/{review}/edit', 'ReviewController@edit')
        ->name('reviews.edit');
    Route::put('/reviews/{review}', 'ReviewController@update')
        ->name('reviews.update');
    Route::delete('/reviews/{review}', 'ReviewController@destroy')
        ->name('reviews.destroy');
    Route::get('/categories', 'CategoryController@index')
        ->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')
        ->name('categories.create')
        ->middleware('can:create,orders');
    Route::get('/categories/{category}', 'CategoryController@show')
        ->name('categories.show');
    Route::post('/categories', 'CategoryController@store')
        ->name('categories.store');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')
        ->name('categories.edit');
    Route::put('/categories/{category}', 'CategoryController@update')
        ->name('categories.update');
    Route::delete('/categories/{category}', 'CategoryController@destroy')
        ->name('categories.destroy');
    Route::get('/orders', 'OrderController@index')
        ->name('orders.index');
    Route::get('/orders/{order}', 'OrderController@show')
        ->name('orders.show');
    Route::get('/orders/{order}/edit', 'OrderController@edit')
        ->name('orders.edit')
        ->middleware('can:create,App\Order');
    Route::get('/orders/{order}/pay', 'OrderController@pay')
        ->name('orders.pay')
        ->middleware('can:create,App\Order');
    Route::get('/orders/{order}/success', 'OrderController@success')
        ->name('orders.success')
        ->middleware('can:create,App\Order');
    Route::get('/orders/{order}/fail', 'OrderController@fail')
        ->name('orders.fail')
        ->middleware('can:create,App\Order');
    Route::put('/orders/{order}', 'OrderController@update')
        ->name('orders.update')
        ->middleware('can:create,App\Order');
    Route::delete('/orders/{order}', 'OrderController@destroy')
        ->name('orders.destroy')
        ->middleware('can:create,App\Order');
    Route::get('/orderlines/create/{product}', 'OrderLineController@create')
        ->name('orderlines.create')
        ->middleware('can:create,App\Order');
    Route::post('/orderlines', 'OrderLineController@store')
        ->name('orderlines.store')
        ->middleware('can:create,App\Order');
    Route::get('/orderlines/{orderline}/edit', 'OrderLineController@edit')
        ->name('orderlines.edit')
        ->middleware('can:create,App\Order');
    Route::put('/orderlines/{orderline}', 'OrderLineController@update')
        ->name('orderlines.update')
        ->middleware('can:create,App\Order');
    Route::get('/omzet', 'OmzetController@index')
        ->name('omzet.index');
    Route::get('/omzet/{year}', 'OmzetController@year')
        ->name('omzet.year');
    Route::get('/omzet/{year}/{month}', 'OmzetController@month')
        ->name('omzet.month');
    Route::get('users/{user}/edit', 'UserController@edit')
        ->name('users.edit');
    Route::put('users/{user}', 'UserController@update')
        ->name('users.update');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
