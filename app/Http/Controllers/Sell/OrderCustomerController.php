<?php

namespace App\Http\Controllers\Sell;

use App\company;
use Request;
use App\Http\Controllers\Controller;
use auth;
use App\order_customer;
use App\order_customer_transection;
use App\product;
use App\cat;

class OrderCustomerController extends Controller
{

    public function index()
    {
        $order = new order_customer;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $order = $order->where('code_order',Request::input('name'));
            }
        }

        $p_row = $order->paginate(50);

        if(!Request::ajax()){
            return view('order_customer.list_order')->with(compact('p_row'));
        }else{
            return view('order_customer.list_order_element')->with(compact('p_row'));
        }
    }

    public function create()
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
            return view ('order_customer.create_order')->with(compact('p_row','cat'));
        }else{
            return view('order_customer.create_order_element')->with(compact('p_row','cat'));
        }
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

        return redirect('/employee/list_order_customer');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $order_customer = order_customer::find($id);

        $order_tran = order_customer_transection::where('order_code', $order_customer->order_code)->get();

        $cat = new cat;

        $cat = $cat->get();

        $product = new product;

        if (Request::get('group_id') and empty(Request::get('cat_id'))) {
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q->where('group_id', '=', Request::get('group_id'));
            });
        }

        if (Request::get('group_id') and !empty(Request::get('cat_id'))) {
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q->where('group_id', '=', Request::get('group_id'))
                    ->Where('cat_id', '=', Request::get('cat_id'));
            });
        }


        $p_row = $product->paginate(50);

        //return view('customer.edit_order')->with(compact('order_customer','order_tran'));

        if (!Request::ajax()) {
            return view('customer.edit_order')->with(compact('p_row', 'cat', 'order_customer', 'order_tran'));
        } else {
            return view('customer.edit_order_element')->with(compact('p_row', 'cat', 'order_customer', 'order_tran'));
        }
    }

    public function update()
    {
        $order_customer = order_customer::find(Request::input('id_order'));

        $order_customer->user_id = Auth::user()->id;
        $order_customer->order_code = $order_customer->order_code;
        $order_customer->total = Request::input('sum_total');
        $order_customer->discount = 0;
        $order_customer->vat = 0;
        $order_customer->grand_total = Request::input('sum_tatal');
        $order_customer->save();

        foreach (Request::input('data_') as $t){
            $order_customer_tran = order_customer_transection::find($t['id_order']);
            $order_customer_tran->order_code = $order_customer->order_code;
            $order_customer_tran->product_id = $t['product_id'];
            $order_customer_tran->price_product = $t['price'];
            $order_customer_tran->unit_sale = $t['unit_sale'];
            $order_customer_tran->amount = $t['amount'];
            $order_customer_tran->total_price = $t['total'];
            $order_customer_tran->save();
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $order_customer_tran = new order_customer_transection;
                $order_customer_tran->order_code = $order_customer->order_code;
                $order_customer_tran->product_id = $t['product_id'];
                $order_customer_tran->price_product = $t['price'];
                $order_customer_tran->unit_sale = $t['unit_id'];
                $order_customer_tran->amount = $t['amount'];
                $order_customer_tran->total_price = $t['total'];
                $order_customer_tran->save();
            }
        }

        //dd($order_customer_tran);

        return redirect('employee/edit/order/'.Request::input('id_order'));
    }


    public function destroy()
    {
        $order_customer = order_customer::find(Request::input('id'));
        $order_customer_tran = order_customer_transection::where('order_code',$order_customer->order_code);
        $order_customer_tran->delete();
        $order_customer->delete();

        return redirect('/employee/list_order_customer');
    }

    public function view(){

        $order_customer = order_customer::find(Request::input('id'));

        $order_tran = order_customer_transection::where('order_code',$order_customer->order_code)->get();

        return view('order_customer.view_order')->with(compact('order_customer','order_tran'));
    }

    public function approved_order()
    {
        $order_customer = order_customer::find(Request::input('id'));
        $order_customer->status = 2 ;
        $order_customer->save();

        return redirect('/employee/list_order_customer');
    }
}
