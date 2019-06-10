<?php

namespace App\Http\Controllers\Sell;

use Request;
use App\Http\Controllers\Controller;
use Auth;
use App\user;
use App\product;
use App\sell_product;
use App\sell_product_tranction;

class SellproductController extends Controller
{

    public function index()
    {
        return view('sell.sell_product');
    }


    public function create()
    {
        $product = product::find(Request::input('name'));
        return response()->json( $product );

    }


    public function store()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $sell_product = new sell_product;
        $sell_product->order_id = $randomString;
        $sell_product->discount = Request::input('discount');
        $sell_product->net = Request::input('net');
        $sell_product->total = Request::input('total');
        $sell_product->money = Request::input('money');
        $sell_product->user_id = null;
        $sell_product->save();


        if(Request::input('data')) {
            foreach (Request::input('data') as $t) {
                $sell_product_tranction = new sell_product_tranction;
                $sell_product_tranction->order_id = $randomString;
                $sell_product_tranction->amount = $t['amount'];
                $sell_product_tranction->product_id = $t['product_id'];
                $sell_product_tranction->save();
            }
        }

        return redirect('/employee/sell/product');
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
