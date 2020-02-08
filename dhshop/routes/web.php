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

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});


########### Marks #############
Route::get('/adminMarks', 'MarksController@index');
Route::get('/addMark', 'MarksController@create');
Route::post('/addMark', 'MarksController@store');
Route::get('/editMark/{id}', 'MarksController@edit');
Route::post('/editMark/{id}', 'MarksController@update');
Route::get('/deleteMark/{id}', 'MarksController@delete');
Route::post('/deleteMark/{id}', 'MarksController@destroy');

########### Categories #############
Route::get('/adminCategories', 'CategoriesController@index');
Route::get('/addCategory', 'CategoriesController@create');
Route::post('/addCategory', 'CategoriesController@store');
Route::get('/editCategory/{id}', 'CategoriesController@edit');
Route::post('/editCategory/{id}', 'CategoriesController@update');
Route::get('/deleteCategory/{id}', 'CategoriesController@delete');
Route::post('/deleteCategory/{id}', 'CategoriesController@destroy');

########### Prodcuts #############
Route::get('/adminProducts', 'ProductsController@index');
Route::get('/addProduct', 'ProductsController@create');
Route::post('/addProduct', 'ProductsController@store');
Route::get('/editProduct/{id}', 'ProductsController@edit');
Route::post('/editProduct/{id}', 'ProductsController@update');
Route::get('/deleteProduct/{id}', 'ProductsController@delete');
Route::post('/deleteProduct/{id}', 'ProductsController@destroy');

########### Customers #############
Route::get('/adminCustomers', 'CustomersController@index');
Route::get('/deleteCustomer/{id}', 'CustomersController@delete');
Route::post('/deleteCustomer/{id}', 'CustomersController@destroy');


