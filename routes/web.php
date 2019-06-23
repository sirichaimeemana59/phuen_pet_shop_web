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

Route::get('/logout', 'Auth\LoginController@getLogout');


//employee_product
Route::any('employee/home','Product\ProductController@index');
Route::any('/employee/product','Product\ProductController@index');
Route::post('/employee/product/add','Product\ProductController@create');
Route::post('/employee/product/view','Product\ProductController@show');
Route::post('/employee/product/edit','Product\ProductController@edit');
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
Route::any('widen/list_element','Widen\WidenController@list_widen');
Route::get('/employee/detail/widen/{id?}','Widen\WidenController@widen_detail');
Route::get('/employee/widen/edit/{id}/{text?}','Widen\WidenController@widen_edit');
Route::post('/employee/widen/product/update_widen_product','Widen\WidenController@update_widen_product');

//Stock
Route::get('/employee/add_product_stock','Stock\StockController@stock');
Route::post('/employee/stock/delete/unit','Stock\StockController@delete_unit');
Route::post('/select_unit_tran','Stock\StockController@select_unit_tran');


//Report
Route::get('/report/widden/{id}','Widen\WidenController@print_widden');

//pet
Route::any('/employee/pet/list','Pet\PetController@index');
Route::post('/employee/pet/add','Pet\PetController@create');
Route::post('/employee/pet/view','Pet\PetController@show');
Route::post('/employee/pet/edit','Pet\PetController@edit');
Route::post('/employee/pet/update','Pet\PetController@update');
Route::post('/employee/pet/delete','Pet\PetController@destroy');
Route::get('/employee/report/pet','Pet\PetController@report_excel');

//sick
Route::any('/employee/sick/list','Sick\SickController@index');
Route::get('/employee/sick/form','Sick\SickController@create');
Route::post('/employee/analyze/add','Sick\SickController@store');
Route::post('/employee/sick/view','Sick\SickController@show');
Route::get('/employee/sick/edit/{id?}','Sick\SickController@edit');
Route::post('/employee/sick_tran/delete','Sick\SickController@delete_sick_tran');
Route::post('/employee/analyze/update','Sick\SickController@update');

//employee add product for sale
Route::any('/employee/add/product/sale/list','Product\ProductController@sale');
Route::post('/employee/add/product/sale/sale_search','Product\ProductController@sale_search');
Route::get('/employee/add_product_form_widen/{id?}','Product\ProductController@add_product_form_widen');

//category
Route::any('/employee/category/list','Category\CategoryController@index');
Route::post('/employee/cat/add','Category\CategoryController@create');
Route::post('employee/group/add','Category\CategoryController@create_group');
Route::post('/employee/cat/view','Category\CategoryController@show');
Route::get('/employee/cat/edit/{id?}','Category\CategoryController@edit');
Route::post('/employee/cat/update','Category\CategoryController@update');
Route::post('/employee/cat/delete','Category\CategoryController@destroy');

//group
Route::any('/employee/group/list','Category\CategoryController@list_group');
Route::post('/employee/group/view','Category\CategoryController@show_group');
Route::post('/employee/group/edit','Category\CategoryController@edit_group');
Route::post('/employee/group/update','Category\CategoryController@update_group');
Route::post('/employee/group/delete','Category\CategoryController@destroy_group');
Route::post('/employee/cat/delete_cat_tran','Category\CategoryController@delete_cat_tran');

//Receipt
Route::get('/print/receipt_/{id?}','Receipt\ReceiptController@index');

//*
//   Customer
// *

//customer
Route::any('/customer/home','Customer\CustomerController@index');

//customer pet
Route::post('/customer/pet/add','Customer\PetController@create');
Route::post('/customer/pet/view','Customer\PetController@show');
Route::post('/customer/pet/edit','Customer\PetController@edit');
Route::post('/customer/pet/update','Customer\PetController@update');
Route::post('/customer/pet/delete','Customer\PetController@destroy');

//customer Order
Route::any('/customer/order','Customer\OrderController@index');
Route::post('/customer/search/group','Customer\OrderController@search_group');
Route::post('/customer/add/order','Customer\OrderController@store');
Route::any('/customer/list_order','Customer\OrderController@show');
Route::post('/customer/order/view','Customer\OrderController@view');
Route::any('/customer/edit/order/{id?}','Customer\OrderController@edit');
Route::post('/customer/update/order','Customer\OrderController@update');
Route::post('/customer/order/delete','Customer\OrderController@destroy');

//List Order Customer
Route::any('/employee/list_order_customer','Sell\OrderCustomerController@index');
Route::post('/employee/order/view','Sell\OrderCustomerController@view');
Route::get('/employee/edit/order/{id?}','Sell\OrderCustomerController@edit');
Route::post('/employee/update/order','Sell\OrderCustomerController@update');
Route::post('/employee/order/delete','Sell\OrderCustomerController@destroy');
Route::any('/employee/create/order_bill','Sell\OrderCustomerController@create');
Route::post('/employee/add/order','Sell\OrderCustomerController@store');

//user create profile
Route::get('/user/create_profile','User\ProfileController@index');
Route::post('/user/add_profile','User\ProfileController@create');
Route::post('/user/update_profile','User\ProfileController@store');