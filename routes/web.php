<?php

//Route::any('/', function () {
//    return view('index');
//});
Route::get('/', 'IndexController@index');
Route::post('/pet', 'IndexController@create');

Auth::routes();

Route::get('/home/user', 'HomeController@index')->name('home');

//Language
Route::get('locale/{locale?}',function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

Route::get('/logout', 'Auth\LoginController@getLogout');


//employee_product
Route::any('employee/home','Product\ProductController@index');
Route::any('/employee/product/list_product','Product\ProductController@index');
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
Route::any('/employee/sell/order_product_sell','Sell\SellproductController@index');
Route::post('/employee/sell/search_product','Sell\SellproductController@create');
Route::post('/employee/sell/product/add_order_product','Sell\SellproductController@store');

//employee stock
Route::any('/employee/stock/product_stock','Stock\StockController@index');
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
Route::get('/print/slip/order_employee/{id?}','Sell\OrderCustomerController@print_slip');

//pet
Route::any('/employee/pet/show_pet','Pet\PetController@index');
Route::post('/employee/pet/add','Pet\PetController@create');
Route::post('/employee/pet/view','Pet\PetController@show');
Route::post('/employee/pet/edit','Pet\PetController@edit');
Route::post('/employee/pet/update','Pet\PetController@update');
Route::post('/employee/pet/delete','Pet\PetController@destroy');
Route::get('/employee/report/pet','Pet\PetController@report_excel');

//sick
Route::any('/employee/sick/list_show_sick','Sick\SickController@index');
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
Route::any('/employee/category','Category\CategoryController@index');
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
Route::post('/address/select/district','Customer\OrderController@selectDistrict');
Route::post('/address/select/district/edit','Customer\OrderController@selectDistrictEdit');
Route::post('/address/select/zip_code','Customer\OrderController@zip_code');
Route::post('/address/select/district/address','Customer\OrderController@selectDistrict_address');
Route::post('/address/select/district/edit/address','Customer\OrderController@selectDistrictEdit_address');
Route::post('/customer/select/editSubDis/address','Customer\OrderController@editSubDis_address');
Route::post('/customer/select/subdistrict/address','Customer\OrderController@Subdistrict_address');
Route::post('/customer/select/zip_code/address','Customer\OrderController@zip_code_address');
Route::post('/customer/select/drive_price','Customer\OrderController@drive_price');

//List Order Customer
Route::any('/employee/list_order_customer','Sell\OrderCustomerController@index');
Route::post('/employee/order/view','Sell\OrderCustomerController@view');
Route::get('/employee/edit/order/{id?}','Sell\OrderCustomerController@edit');
Route::post('/employee/update/order','Sell\OrderCustomerController@update');
Route::post('/employee/order/delete','Sell\OrderCustomerController@destroy');
Route::any('/employee/create/order_bill','Sell\OrderCustomerController@create');
Route::post('/employee/add/order','Sell\OrderCustomerController@store');
Route::post('/employee/approved_order','Sell\OrderCustomerController@approved_order');
Route::post('employee/delete_order','Sell\OrderCustomerController@delete_order');

//user create profile
Route::get('/user/create_profile','User\ProfileController@index');
Route::post('/user/add_profile','User\ProfileController@create');
Route::post('/user/update_profile','User\ProfileController@store');
Route::post('/customer/select/district','User\ProfileController@selectDistrict');
Route::post('/customer/select/subdistrict','User\ProfileController@Subdistrict');
Route::post('/customer/select/zip_code','User\ProfileController@zip_code');
Route::post('/customer/select/district/edit','User\ProfileController@selectDistrictEdit');
Route::post('/customer/select/editSubDis','User\ProfileController@editSubDis');
Route::post('/user/setting/pass_now','User\ProfileController@pass_now');
Route::post('/user/setting/pass','User\ProfileController@pass');

//employee income
Route::get('/employee/list_income','Income\IncomeController@index');
Route::post('/employee/list_income_list','Income\IncomeController@list_income_list');
Route::post('/employee/save/income','Income\IncomeController@income');
Route::post('/employee/list_income_online','Income\IncomeController@list_income_online');
Route::post('/employee/save/income_online','Income\IncomeController@income_online');
Route::post('/customer/bill/add','Income\IncomeController@bill_save');
Route::post('/customer/edit_bill_payment','Income\IncomeController@bill_edit');
Route::post('/customer/bill/edit','Income\IncomeController@bill_edit_file');

//employee post news
Route::any('/customer/news','News\NewController@index');
Route::post('/employee/news/add','News\NewController@create');
Route::post('/employee/news/view','News\NewController@show');
Route::post('/employee/news/edit','News\NewController@edit');
Route::post('/employee/news/update','News\NewController@update');

//customer add comment
Route::any('/customer/add/comment','Customer\CommentController@index');
Route::post('/employee/comment/add','Customer\CommentController@create');
Route::post('/employee/comment/view','Customer\CommentController@show');
Route::post('/employee/comment/edit','Customer\CommentController@edit');
Route::post('/employee/comment/update','Customer\CommentController@update');

//employee comment
Route::any('/employee/list/comment','Comment\CommentController@index');
Route::post('/employee/comment_reply/view','Comment\CommentController@show');
Route::post('/employee/comment_reply/edit','Comment\CommentController@edit');
Route::post('employee/add/reply','Comment\CommentController@reply');

//promotion
Route::any('/employee/list/promotion','Promotion\PromotionController@index');
Route::post('/employee/promotion/add','Promotion\PromotionController@create');
Route::post('/employee/promotion/view','Promotion\PromotionController@show');
Route::post('/employee/promotion/edit','Promotion\PromotionController@edit');
Route::post('/employee/promotion/update','Promotion\PromotionController@update');
Route::post('/employee/promotion/delete','Promotion\PromotionController@destroy');

//order company
Route::any('/employee/company_store/order_company','Product\OrderCompanyController@index');
Route::get('/employee/create/order_company','Product\OrderCompanyController@create');
Route::post('/customer/search/company','Product\OrderCompanyController@company');
Route::post('/company/select_province','Product\OrderCompanyController@selectProvince');
Route::post('/company/select_dis','Product\OrderCompanyController@selectDistrict');
Route::post('/company/select_Subdis','Product\OrderCompanyController@Subdistrict');
Route::post('/customer/search/product','Product\OrderCompanyController@product');
Route::post('/employee/add/order_company','Product\OrderCompanyController@show');
Route::post('/customer/search/unit','Product\OrderCompanyController@unit');
Route::post('/employee/order_company/view','Product\OrderCompanyController@view');
Route::get('/employee/edit/order_company/{id?}','Product\OrderCompanyController@edit');
Route::post('/employee/update/order_company','Product\OrderCompanyController@update');
Route::post('/employee/order_company/delete','Product\OrderCompanyController@delete');
Route::post('/employee/order_company/delete_order','Product\OrderCompanyController@destroy');


//Send Order To customer
Route::post('/employee/order/sent_to_car','Sell\OrderCustomerController@sent_to_car');
Route::post('/employee/print/post_parcle','Sell\OrderCustomerController@post_parcle');

//report sale good
Route::get('/report/sale_good','Report\ReportController@index');
Route::post('/report/chart/sale_good','Report\ReportController@sale_good');
Route::get('report/inventory','Report\ReportController@inventory');
Route::post('/report/chart/inventory','Report\ReportController@inventory_chart');
Route::any('/report/sale_report','Report\ReportController@sale_report');
Route::post('/report/sale_report/view','Report\ReportController@sale_report_view');
Route::get('/report/sale_report/print','Report\ReportController@sale_report_print');


//Active User
Route::any('/approved/user_check','User\ActiveUserController@index');
Route::post('/employee/active/user','User\ActiveUserController@create');
Route::post('/user/register','User\ActiveUserController@register');
Route::post('/employee/active/edit','User\ActiveUserController@edit');
Route::post('/active/add','User\ActiveUserController@store');
Route::post('/active/update','User\ActiveUserController@update');
Route::post('/active/delete','User\ActiveUserController@destroy');
Route::post('/active/view','User\ActiveUserController@show');

//Owner
Route::get('/owner/home','Owner\OwnerController@index');
Route::any('/report/order_owner','Owner\OwnerController@order_owner');
Route::any('/report/order_owner_company','Owner\OwnerController@order_owner_company');
Route::get('/report/order_owner_company_print','Owner\OwnerController@order_owner_company_print');
Route::get('/report/order_owner_company_print','Owner\OwnerController@order_owner_company_print');
Route::get('/report/order_owner_print','Owner\OwnerController@order_owner_print');
Route::any('/report/widen','Owner\OwnerController@list_widen');
Route::get('/report/widen/print','Owner\OwnerController@widen_print');

//Quotation
Route::any('/employee/quotation/order_quotation_list','Quotation\QuotationController@index');
Route::any('/employee/create/quotation','Quotation\QuotationController@create');
Route::post('/employee/add/quotation','Quotation\QuotationController@store');
Route::post('/employee/quotation/view','Quotation\QuotationController@view');
Route::get('/employee/edit/quotation/{id?}','Quotation\QuotationController@edit');
Route::post('/employee/update/quotation','Quotation\QuotationController@update');
Route::post('/employee/delete_order_quotation','Quotation\QuotationController@delete_order_quotation');
Route::post('/employee/quotation/delete','Quotation\QuotationController@destroy');
Route::get('/report/quotation_order_print/{id?}','Quotation\QuotationController@quotation_order_print');

//Driver
Route::any('/employee/driver','Driver\DriveController@index');
Route::post('/employee/driver/add','Driver\DriveController@create');
Route::post('/employee/driver/view','Driver\DriveController@show');
Route::post('/employee/driver/edit','Driver\DriveController@edit');
Route::post('/employee/driver/update','Driver\DriveController@update');
Route::post('/employee/driver/delete','Driver\DriveController@destroy');

//store profile
Route::get('/employee/store_profile','StoreProfile\StoreProfileController@index');
Route::post('/employee/store_profile/add','StoreProfile\StoreProfileController@create');
Route::post('/employee/store_profile/update','StoreProfile\StoreProfileController@update');
Route::any('/employee/list/know','StoreProfile\StoreProfileController@list_know');
Route::post('/employee/know/add','StoreProfile\StoreProfileController@add');
Route::post('/employee/know/view','StoreProfile\StoreProfileController@view');
Route::post('/employee/know/edit','StoreProfile\StoreProfileController@edit_know');
Route::post('/employee/know/update','StoreProfile\StoreProfileController@update_know');
Route::post('/employee/know/delete','StoreProfile\StoreProfileController@delete');

//Document
Route::get('/add/document','Document\DocumentController@index');
Route::post('/add/doc','Document\DocumentController@create');
Route::post('/update/doc','Document\DocumentController@update');
Route::get('/doc/print','Document\DocumentController@print');

//expenditure
Route::any('employee/list_expenditure','Expenditure\ExpenditureController@index');
//Route::post('/employee/list_expenditure_list','Expenditure\ExpenditureController@create');
Route::get('/employee/edit/expenditure/{id?}','Expenditure\ExpenditureController@edit');
Route::post('/employee/update/expenditure/order_company','Expenditure\ExpenditureController@update');
Route::any('/employee/list_expenditure/report','Expenditure\ExpenditureController@report');
