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
Route::get('/employee/product/edit/{id?}','Product\ProductController@edit');
Route::post('/employee/product/update','Product\ProductController@update');
Route::post('/employee/product/delete','Product\ProductController@destroy');
Route::post('/employee/add/product/for_sale','Product\ProductController@product');

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
Route::get('/employee/stock/edit/{id?}','Stock\StockController@edit');
Route::post('/employee/product/update_to_stock','Stock\StockController@update');
Route::post('/employee/stock/delete','Stock\StockController@destroy');

//employee widen stock
Route::any('/employee/widen/stock','Widen\WidenController@index');
Route::post('/employee/widen/search_product','Widen\WidenController@create');
Route::post('/employee/widen/product/widen_product','Widen\WidenController@store');
Route::post('/select/product/unit_','Widen\WidenController@select_unit_');
Route::post('/select/product/unit_amount','Widen\WidenController@select_unit_amount');
Route::post('/select/product/unit_amount_trance','Widen\WidenController@select_unit_amount');
Route::get('widen/list_element','Widen\WidenController@list_widen');
Route::get('/employee/detail/widen/{id?}','Widen\WidenController@widen_detail');
//Stock
Route::get('/employee/add_product_stock','Stock\StockController@stock');
Route::post('/employee/stock/delete/unit','Stock\StockController@delete_unit');


//Report
Route::get('/report/widden/{id}','Widen\WidenController@print_widden');