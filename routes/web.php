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

Route::resource('companies', 'CompanyController');


Route::resource('addresses', 'AddressController');

Route::resource('mealCategories', 'MealCategoryController');

Route::resource('mealCategories', 'MealCategoryController');

Route::resource('kitchens', 'KitchenController');

Route::resource('mealCategories', 'MealCategoryController');

Route::resource('meals', 'MealController');

Route::resource('mealCategories', 'MealCategoryController');