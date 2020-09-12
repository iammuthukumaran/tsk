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
    return view('admin/dashboard');
});


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

Route::group([ 'prefix' => '/admin' ], function () {
  Route::resource('/products', 'TodoController');
  Route::resource('/user', 'UserController');
  Route::resource('/dailyentry', 'DailyEntryController');
});

Route::get('products/{id}/delete', 'TodoController@destroy')->name('products.destroy');
Route::get('user/{id}/delete', 'UserController@destroy')->name('user.destroy');

Route::get('/dailyentry/get-product-details','DailyEntryController@getproductdetails')->name('get-cur-product-details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Product Module */
Route::resource('/products', 'TodoController', ['names' =>resourse_array('products')]);
 /*Method for replace route name */
  function resourse_array($route_name){
    return [
      'create' => $route_name.'.create',
      'edit' => $route_name.'.edit',
      'update' => $route_name.'.update',
      'show' => $route_name.'.show',
      'store' => $route_name.'.store',
      'index' => $route_name.'.index',
      'destroy' => $route_name.'.destroy',
    ];
}