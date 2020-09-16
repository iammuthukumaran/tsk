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
    return redirect('/login');
});

Route::group([ 'prefix' => '/admin', 'middleware' => 'auth' ], function () {
    // Dashboards
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
    // Products
    Route::resource('/products', 'TodoController');
    // Buyers & Sellers
    Route::resource('/user', 'UserController');
    // Stocks
    Route::group([ 'prefix' => '/stock' ], function (){
      Route::get('/list', 'StockController@list')->name('stock.list');
      Route::post('/add', 'StockController@add')->name('stock.add');
      Route::get('/{id}/edit', 'StockController@edit')->name('stock.edit');
      Route::post('/update', 'StockController@update')->name('stock.update');
    });
    // Sales
    Route::group([ 'prefix' => '/sales' ], function (){
      Route::get('/list', 'SaleController@list')->name('sale.list');
    });
    // Buyer
    Route::group([ 'prefix' => '/buyer' ], function (){
      Route::get('/{id}/details', 'BuyerController@viewBuyer')->name('buyer.view');
    });
    // Seller
    Route::group([ 'prefix' => '/seller' ], function (){
      Route::get('/{id}/details', 'SellerController@viewSeller')->name('seller.view');
    });
    // Bills
    Route::group([ 'prefix' => '/bill' ], function (){
      Route::get('/create/{bill_type}', 'BillsController@createBill')->name('bill.create');
      Route::get('/make/{bill_id}/{bill_type}', 'BillsController@makeBill')->name('bill.make');
      Route::get('/list', 'BillsController@listBill')->name('bill.list');
      Route::post('/save', 'BillsController@saveBill')->name('bill.save');
      Route::get('/delete/{sale_id}/{bill_id}/{bill_type}', 'BillsController@deleteBill')->name('bill.delete');
      Route::get('/generate/{bill_id}/{bill_type}', 'BillsController@generateBill')->name('bill.generate');
      Route::get('/view/{bill_id}/{bill_type}', 'BillsController@viewBill')->name('bill.view');
    });
    Route::resource('/daily-entry', 'DailyEntryController');
    // Seller
    Route::group([ 'prefix' => '/report' ], function (){
      Route::get('/sales', 'ReportController@salesReport')->name('report.sales');
    });
});

// Delete Routes
Route::get('products/{id}/delete', 'TodoController@destroy')->name('products.destroy');
Route::get('user/{id}/delete', 'UserController@destroy')->name('user.destroy');

// Get Products
Route::get('/dailyentry/get-product-details','DailyEntryController@getproductdetails')->name('get-cur-product-details');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


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