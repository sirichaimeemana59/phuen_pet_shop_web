<?php

namespace App\Http\Controllers\Sell;

use Request;
use App\Http\Controllers\Controller;
use Auth;
use App\user;
use App\product;
use App\sell_product;
use App\sell_product_tranction;
use App\order_walk;
use App\order_walk_transection;
use App\sale_good;
use Redirect;

class SellproductController extends Controller
{
    protected $app;

    public function __construct () {
        $this->middleware('tree_role');
    }


    public function index()
    {
        return view('sell.sell_product');
    }


    public function create()
    {
        if(!empty(Request::input('name'))){
            $product = product::where('bar_code',Request::input('name'))->first();
        }
            if ($product) {
                $product_name = product::with('join_stock')->where('id',$product->id)->first();
            }


        return response()->json( $product_name );

    }


    public function store()
    {
        //dd(Request::input('data')); die();

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        foreach (Request::input('data') as $t) {
            $order_tran = new order_walk_transection;
            $order_tran->code_order = $randomString;
            $order_tran->amount = $t['amount'];
            $order_tran->product_id = $t['product_id'];
            $order_tran->price_unit = $t['price_unit'];
            $order_tran->total_price = $t['total_price'];
            $order_tran->unit_sale = $t['unit_sale'];
            $order_tran->save();

            $product = product::find($t['product_id']);
            $product->amount = abs($product->amount)-$t['amount'];
            $product->save();

            $sale_good = sale_good::where('product_id',$t['product_id'])->whereDate('date',date('Y-m-d'))->where('status',1)->first();

            //dd($sale_good);
            if($sale_good){
                $sale_good_ = sale_good::where('product_id',$t['product_id'])->whereDate('date',date('Y-m-d'))->where('status',1)->first();
                $sale_good_->product_id = $t['product_id'];
                $sale_good_->amount = $sale_good->amount + $t['amount'];
                $sale_good_->date = date('Y-m-d');
                $sale_good_->status = 1;
                $sale_good_->stock_id = $t['id_stock'];
                $sale_good_->save();
                //dd($sale_good_);
            }else{
                $sale_good_ = new sale_good;
                $sale_good_->amount =$t['amount'];
                $sale_good_->product_id = $t['product_id'];
                $sale_good_->date = date('Y-m-d');
                $sale_good_->status = 1;
                $sale_good_->stock_id = $t['id_stock'];
                $sale_good_->save();
                //dd($sale_good_);
            }
        }
       // dd($product);


        $order = new order_walk;
        $order->code_order = $randomString;
        $order->user_id = null;
        $order->total = Request::input('total');
        $order->discount = !empty(Request::input('discount'))?Request::input('discount'):0;
        $order->vat = 0;
        $order->grand_total = Request::input('net');
        $order->money  = Request::input('money');
        $order->save();

        //dd($order_tran);


        $sell_product = new sell_product;
        $sell_product->order_id = $randomString;
        $sell_product->discount = Request::input('discount');
        $sell_product->net = Request::input('net');
        $sell_product->total = Request::input('total');
        $sell_product->money = Request::input('money');
        $sell_product->user_id = null;
        //$sell_product->save();

        //dd($sell_product);

//dd($randomString);
        $randomString_ = 'vJZR1exW9Y';
        return redirect('/print/receipt_/'.$randomString);
        //return redirect('/employee/sell/product');
        //return redirect()->route('/print/receipt', ['id' => $randomString]);
        //return \Redirect::route('/print/receipt/', $randomString);
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
