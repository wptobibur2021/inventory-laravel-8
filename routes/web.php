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
    return view('auth.login');
});

//Route::get('dashboard/category-all', 'Backend\CategoryController@index')->name('index.category');


/* Category Route */

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('category-all', 'CategoryController@index')->name('index.category');
    Route::post('store', 'CategoryController@store')->name('store.category');
    Route::get('edit/{cat_id}', 'CategoryController@edit')->name('edit.category');
    Route::post('update/{cat_id}', 'CategoryController@update')->name('update.category');
    Route::get('delete/{cat_id}', 'CategoryController@destroy')->name('delete.category');
});





/* Brand Route */

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('brand-all', 'BrandController@index')->name('index.brand');
    Route::post('brand-store', 'BrandController@store')->name('store.brand');
    Route::get('brand-edit/{brand_id}', 'BrandController@edit')->name('edit.brand');
    Route::post('brand-update/{brand_id}', 'BrandController@update')->name('update.brand');
    Route::get('brand-delete/{brand_id}', 'BrandController@destroy')->name('delete.brand');
});


/* Product Route */

Route::group(['prefix'=>'product','namespace'=>'Backend'],function() {
    Route::get('product-all', 'ProductController@index')->name('index.product');
    Route::get('product-create', 'ProductController@create')->name('create.product');
    Route::post('product-store', 'ProductController@store')->name('store.product');
    Route::get('product-edit/{product_id}', 'ProductController@edit')->name('edit.product');
    Route::get('product-view/{product_id}', 'ProductController@edit')->name('view.product');
    Route::post('product-update/{product_id}', 'ProductController@update')->name('update.product');
    Route::get('product-delete/{product_id}', 'ProductController@destroy')->name('delete.product');
});


/* Customer Route */

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('employee-all', 'EmployeeController@index')->name('index.employee');
    Route::get('employee-create', 'EmployeeController@create')->name('create.employee');
    Route::post('employee-store', 'EmployeeController@store')->name('store.employee');
    Route::get('employee-edit/{id}', 'EmployeeController@edit')->name('edit.employee');
    Route::get('employee-view/{id}', 'EmployeeController@edit')->name('view.employee');
    Route::post('employee-update/{id}', 'EmployeeController@update')->name('update.employee');
    Route::get('employee-delete/{id}', 'EmployeeController@destroy')->name('delete.employee');
});

/* Customer Route */

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('customer-all', 'CustomerController@index')->name('index.customer');
    Route::get('customer-create', 'CustomerController@create')->name('create.customer');
    Route::post('customer-store', 'CustomerController@store')->name('store.customer');
    Route::get('customer-edit/{id}', 'CustomerController@edit')->name('edit.customer');
    Route::get('customer-view/{id}', 'CustomerController@edit')->name('view.customer');
    Route::post('customer-update/{id}', 'CustomerController@update')->name('update.customer');
    Route::get('customer-delete/{id}', 'CustomerController@destroy')->name('delete.customer');
});

/* Expense Route */

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('expense-all', 'ExpenseController@index')->name('index.expense');
    Route::get('expense-create', 'ExpenseController@index')->name('create.expense');
    Route::post('expense-store', 'ExpenseController@store')->name('store.expense');
    Route::get('expense-edit/{id}', 'ExpenseController@edit')->name('edit.expense');
    Route::get('expense-view/{id}', 'ExpenseController@edit')->name('view.expense');
    Route::post('expense-update/{id}', 'ExpenseController@update')->name('update.expense');
    Route::get('expense-delete/{id}', 'ExpenseController@destroy')->name('delete.expense');
});


/* POS Route */

// Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
//     Route::get('pos-all', 'PosController@index')->name('index.pos');
//     Route::post('pos-create', 'PosController@create')->name('create.pos');
//     Route::post('pos-store', 'PosController@store')->name('store.pos');
//     Route::post('pos-invoice', 'PosController@invoice')->name('invoice.pos');
//     Route::get('pos-edit/{id}', 'PosController@edit')->name('edit.pos');
//     Route::get('pos-view/{id}', 'PosController@edit')->name('view.pos');
//     Route::post('pos-update/{id}', 'PosController@update')->name('update.pos');
//     Route::get('pos-delete/{id}', 'PosController@destroy')->name('delete.pos');
// });



Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('invoice-index', 'InvoiceController@index')->name('index.invoice');
    Route::get('invoice-all', 'InvoiceController@invoice')->name('all.invoice');
    Route::get('invoice-create', 'InvoiceController@create')->name('create.invoice');
    Route::post('invoice-store', 'InvoiceController@store')->name('store.invoice');
    Route::get('invoice-view/{id}', 'InvoiceController@show')->name('view.invoice');
    Route::get('invoice-edit/{id}', 'InvoiceController@edit')->name('edit.invoice');
    Route::get('invoice-delete/{id}', 'InvoiceController@destroy')->name('delete.invoice');
    Route::post('invoice-update/{id}', 'InvoiceController@update')->name('update.invoice');
    Route::get('invoice-final', 'InvoiceController@final')->name('final.invoice');
    Route::get('invoice-print/{id}', 'InvoiceController@print')->name('print.invoice');
   // Route::get('product-stock', 'InvoiceController@stock')->name('stock');
  //  Route::post('pos-invoice', 'PosController@invoice')->name('invoice.pos');

});


/* Stock Management */


Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function() {
    Route::get('product-stock-index', 'StockManagement@index')->name('stock');
    Route::get('product-stock-edit/{id}', 'StockManagement@edit')->name('edit.stock');
    Route::post('product-stock-update/{id}', 'StockManagement@update')->name('update.stock');
    Route::get('AllProduct-stock', 'StockManagement@allProductStocks')->name('allproduct.stock');
    Route::get('sales', 'StockManagement@sales')->name('index.sales');
});


/* Cart Route */

Route::group(['prefix'=>'admin','namespace'=>'Backend'],function() {
    Route::get('cart-all', 'CartController@index')->name('cart.page');
    Route::post('cart-store/{product_id}', 'CartController@store')->name('cart.product');
    Route::post('cart-update/{product_id}', 'CartController@update')->name('update.cart');
});




Auth::routes();

Route::get('/admin ', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
