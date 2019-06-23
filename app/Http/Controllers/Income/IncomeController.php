<?php

namespace App\Http\Controllers\Income;

use Request;
use App\Http\Controllers\Controller;
use App\order_walk;
use App\order_walk_transection;
use App\order_customer;
use App\order_customer_transection;

class IncomeController extends Controller
{

    public function index()
    {
        $order = new order_walk;
        $order = $order->get();

        if(!Request::ajax()){
            return view('income.income')->with(compact('order'));
        }else{
            return view('income.income_element')->with(compact('order'));
        }
    }


    public function create()
    {
        //
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
