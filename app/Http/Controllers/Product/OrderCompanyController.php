<?php

namespace App\Http\Controllers\Product;

use Request;
use App\Http\Controllers\Controller;
use auth;
use App\stock;
use App\stock_log;
use App\unit_transection;
use App\order_company;
use App\order_company_transection;

class OrderCompanyController extends Controller
{

    public function index()
    {
        $order = new order_company;

        $p_row = $order->paginate(50);



        if(!Request::ajax()){
            return view('company_store.list_order')->with(compact('p_row'));
        }else{
            return view('company_store.list_order_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        $stock = new stock;
        $stock = $stock->get();

        return view('company_store.add_order')->with(compact('stock'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
