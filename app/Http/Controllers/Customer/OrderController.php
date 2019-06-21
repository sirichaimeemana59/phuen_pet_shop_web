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
use App\order_customer;
use App\order_customer_transection;

class OrderController extends Controller
{

    public function index()
    {
        $cat = new cat;

        $cat = $cat->get();

        $product = new product;

        if(Request::get('group_id') and empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'));
            });
        }

        if(Request::get('group_id') and !empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'))
                    ->Where('cat_id','=',Request::get('cat_id'));
            });
        }


        $p_row = $product->paginate(50);

        if(!Request::ajax()){
            return view ('customer.list_order')->with(compact('p_row','cat'));
        }else{
            return view('customer.list_order_element')->with(compact('p_row','cat'));
        }
    }


    public function search_group()
    {

        $cat = cat::find(Request::input('id'));
        //dd($cat);
       $cat_tran = cat_transection::where('cat_id',$cat->code)->get();

        return response()->json($cat_tran);
    }


    public function store()
    {
        //dd(Request::input('data'));
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $order_customer = new order_customer;
        $order_customer->user_id = Auth::user()->id;
        $order_customer->order_code = $randomString;
        $order_customer->total = Request::input('sum_total');
        $order_customer->discount = 0;
        $order_customer->vat = 0;
        $order_customer->grand_total = Request::input('sum_tatal');
        $order_customer->save();

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $order_customer_tran = new order_customer_transection;
                $order_customer_tran->order_code = $randomString;
                $order_customer_tran->product_id = $t['product_id'];
                $order_customer_tran->price_product = $t['price'];
                $order_customer_tran->unit_sale = $t['unit_id'];
                $order_customer_tran->amount = $t['amount'];
                $order_customer_tran->total_price = $t['total'];
                $order_customer_tran->save();
            }
        }
        //dd($order_customer_tran) ; die();

        return redirect('/customer/order');
    }


    public function show()
    {

        $order_customer = new order_customer;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $order_customer = order_customer::where('order_code',Request::input('name'));
            }
        }

        $p_row = $order_customer->paginate(50);

        if(!Request::ajax()){
            return view ('customer.show_order')->with(compact('p_row'));
        }else{
            return view('customer.show_order_element')->with(compact('p_row'));
        }
    }

    public function view(){

        $order_customer = order_customer::find(Request::input('id'));

        $order_tran = order_customer_transection::where('order_code',$order_customer->order_code)->get();

        return view('customer.view_order')->with(compact('order_customer','order_tran'));
    }

    public function edit($id)
    {
        $order_customer = order_customer::find($id);

        $order_tran = order_customer_transection::where('order_code',$order_customer->order_code)->get();

        $cat = new cat;

        $cat = $cat->get();

        $product = new product;

        if(Request::get('group_id') and empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'));
            });
        }

        if(Request::get('group_id') and !empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'))
                    ->Where('cat_id','=',Request::get('cat_id'));
            });
        }


        $p_row = $product->paginate(50);

        //return view('customer.edit_order')->with(compact('order_customer','order_tran'));

        if(!Request::ajax()){
            return view ('customer.edit_order')->with(compact('p_row','cat','order_customer','order_tran'));
        }else{
            return view('customer.edit_order_element')->with(compact('p_row','cat','order_customer','order_tran'));
        }
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
