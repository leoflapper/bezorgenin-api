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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['verified']], function () {
    Route::resource('users', 'UserController');
});


Route::group(['middleware' => ['verified', 'crud_permission']], function () {

    Route::resource('companies', 'CompanyController');


    Route::resource('addresses', 'AddressController');

    Route::resource('mealCategories', 'MealCategoryController');

    Route::resource('kitchens', 'KitchenController');

    Route::resource('meals', 'MealController');

    Route::resource('orders', 'OrderController',  [ 'only' => ['index', 'show', 'edit', 'update', 'destroy']]);

    Route::resource('orderProducts', 'OrderProductController',  [ 'only' => []]);

});
