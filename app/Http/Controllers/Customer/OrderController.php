<?php

namespace App\Http\Controllers\Customer;

use Request;
use App\Http\Controllers\Controller;
use App\product;
use App\stock;
use App\stock_log;
use auth;
use App\unit_transection;
use App\cat;
use App\cat_transection;

class OrderController extends Controller
{

    public function index()
    {
        $cat = new cat;

        $p_row = $cat->paginate(15);

        if(!Request::ajax()){
            return view ('customer.list_order')->with(compact('p_row'));
        }else{
            return view('customer.list_order_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        //
    }


    public function store()
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


    public function update()
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
