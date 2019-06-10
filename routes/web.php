<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Language
Route::get('locale/{locale?}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

//employee_product
Route::any('employee/home','Product\ProductController@index');
Route::any('/employee/product','Product\ProductController@index');
Route::post('/employee/product/add','Product\ProductController@create');
Route::post('/employee/product/view','Product\ProductController@show');
Route::post('/employee/product/edit','Product\ProductController@edit');
Route::post('/employee/product/update','Product\ProductController@update');
Route::post('/employee/product/delete','Product\ProductController@destroy');

//employee_company_store
Route::any('/employee/company_store','Product\CompanystoreController@index');
Route::post('/employee/company_store/add','Product\CompanystoreController@create');
Route::any('/employee/company_store/view','Product\CompanystoreController@show');
//Route::post('/employee/company_store/edit','Product\CompanystoreController@edit');
Route::post('/employee/company_store/edit/file','Product\CompanystoreController@update');
Route::post('/employee/company_store/delete','Product\CompanystoreController@destroy');
Route::post('root/admin/select/district', 'Product\CompanystoreController@selectDistrict');
Route::post('root/admin/select/subdistrict','Product\CompanystoreController@Subdistrict');
Route::post('root/admin/select/zip_code','Product\CompanystoreController@zip_code');
Route::post('root/admin/select/district/edit','Product\CompanystoreController@selectDistrictEdit');
Route::post('root/admin/select/editSubDis','Product\CompanystoreController@editSubDis');
Route::get('employee/update_store_form/{id?}','Product\CompanystoreController@edit');

//employee_unit_store
Route::any('/employee/unit_store','Product\UnitController@index');
Route::post('/employee/unit/add','Product\UnitController@create');

//employee_sell_product
Route::any('/employee/sell/product','Sell\SellproductController@index');
Route::post('/employee/sell/search_product','Sell\SellproductController@create');
Route::post('/employee/sell/product/add_order_product','Sell\SellproductController@store');

//employee stock
Route::any('/employee/stock/product','Stock\StockController@index');
Route::post('/employee/product/add_to_stock','Stock\StockController@create');
Route::post('/employee/stock/view','Stock\StockController@view');
Route::post('/employee/stock/edit','Stock\StockController@edit');
Route::post('/employee/product/update_to_stock','Stock\StockController@update');
Route::post('/employee/stock/delete','Stock\StockController@destroy');