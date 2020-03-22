<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('companies', 'CompanyAPIController', [ 'only' => ['index', 'show']]);

//Route::resource('addresses', 'AddressAPIController', [ 'only' => ['index', 'show']]);

Route::resource('kitchens', 'KitchenAPIController', [ 'only' => ['index', 'show']]);

//Route::resource('meals', 'MealAPIController');


Route::resource('orders', 'OrderAPIController', [ 'only' => ['store']]);


//Route::resource('order_products', 'OrderProductAPIController');


//Route::resource('users', 'UserAPIController');
