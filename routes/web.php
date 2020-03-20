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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('companies', 'CompanyController')->middleware('verified');


Route::resource('addresses', 'AddressController')->middleware('verified');

Route::resource('mealCategories', 'MealCategoryController')->middleware('verified');

Route::resource('kitchens', 'KitchenController')->middleware('verified');

Route::resource('meals', 'MealController')->middleware('verified');

Route::resource('mealCategories', 'MealCategoryController')->middleware('verified');


Route::resource('orders', 'OrderController',  [ 'only' => ['index', 'show', 'edit', 'update', 'destroy']])->middleware('verified');

Route::resource('orderProducts', 'OrderProductController',  [ 'only' => []])->middleware('verified');
