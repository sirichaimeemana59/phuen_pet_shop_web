<?php

namespace App\Http\Controllers\Widen;

use App\unit_transection;
use Request;
use App\Http\Controllers\Controller;
use App\stock;
use App\widen;
use App\widen_report;
use App\stock_log;

class WidenController extends Controller
{
    public function index()
    {
        $stock = new stock;
        $stock = $stock->get();
        return view ('product.add')->with(compact('stock'));
    }


    public function create()
    {
        $stock = stock::find(Request::input('name'));
        return response()->json( $stock );
    }


    public function store()
    {
        dd(Request::input('data'));
        $amount = array();
        $amount_unit = array(); //จำนวนหน่วยคงเหลือ
        $product_code = array(); // code สินค้า
        $amount_widden = array(); // จำนวนที่เบิก
        $product_id = array();
        $unit_small = array();

        foreach (Request::input('data') as $key => $t){
            if($t['amount_widden'] != null) {
                $amount[] = abs(($t['amount_'] * $t['amount_widden']) - $t['amount']);
                $amount_unit[] = abs($t['amount_widden'] - $t['amount_']);
                $product_code[] = $t['product_code'];
                $amount_widden[] = $t['amount_widden'];
                $product_id[] = $t['product_id'];
                $unit_small[] = $t['unit_small'];
            }
        }


        for($i=0;$i<count($unit_small);$i++){
            $stock = stock_log::find($unit_small[$i]);
            $stock->amount = $amount[$i];
            $stock->save();

            $stock_ = stock::find($product_id[$i]);
            $stock_->amount = $amount[$i];
            $stock_->save();
        }//ปรับจำนวนเล็กสุดในตาราง stock

        //dd($stock_);


        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $widen_report = new widen_report;
                $widen_report->widen_code = $randomString;
                $widen_report->stock_id = $t['id'];
                $widen_report->amount = $t['amount'];
                $widen_report->widen_date = date("Y-m-d");
                //$widen_report->save();

                if($widen_ = widen::find($t['id'])){
                    $widen_->amount = $t['amount']+$widen_->amount;
                    //$widen_->save();

                    $stock = stock::find($t['id']);
                    $stock->amount = $stock->amount - $t['amount'];

                    if($t['amount'] < $stock->amount){
                        //$widen_->save();
                        //$stock->save();
                    }

                }else{
                    $widen = new widen;
                    $widen->widen_code = $randomString;
                    $widen->stock_id = $t['id'];
                    $widen->amount = $t['amount'];

                    $stock = stock::find($t['id']);
                    $stock->amount = $stock->amount - $t['amount'];

                    if($t['amount'] < $stock->amount){
                        //$widen->save();
                        //$stock->save();
                    }
                }

            }
        }
        return redirect('/employee/widen/stock');
    }


    public function select_unit_()
    {
        $stock = stock::find(Request::input('id'));
        $unit_1 = unit_transection::where('product_id',$stock->code)->get();
        $unit_2 = stock_log::where('product_id',$stock->code)->first();

        $stock = $stock->toArray();
        $unit_1 = $unit_1->toArray();
        $unit_2 = $unit_2->toArray();


        $data["unit_1"] = $unit_1;
        $data["unit_2"] = $unit_2;
        $data["stock"] = $stock;

        return response()->json( $data );

    }

    public function select_unit_amount()
    {
        $unit_ = unit_transection::find(Request::input('id'));

        return response()->json( $unit_ );

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
