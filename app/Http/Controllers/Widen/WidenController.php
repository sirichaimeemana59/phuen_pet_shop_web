<?php

namespace App\Http\Controllers\Widen;

use App\unit_transection;
use Request;
use App\Http\Controllers\Controller;
use App\stock;
use App\widen;
use App\widen_report;

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
                $widen_report->save();

                if($widen_ = widen::find($t['id'])){
                    $widen_->amount = $t['amount']+$widen_->amount;
                    $widen_->save();

                    $stock = stock::find($t['id']);
                    $stock->amount = $stock->amount - $t['amount'];

                    if($t['amount'] < $stock->amount){
                        $widen_->save();
                        $stock->save();
                    }

                }else{
                    $widen = new widen;
                    $widen->widen_code = $randomString;
                    $widen->stock_id = $t['id'];
                    $widen->amount = $t['amount'];

                    $stock = stock::find($t['id']);
                    $stock->amount = $stock->amount - $t['amount'];

                    if($t['amount'] < $stock->amount){
                        $widen->save();
                        $stock->save();
                    }
                }

            }
        }
        return redirect('/employee/widen/stock');
    }


    public function select_unit_()
    {
        $stock = stock::find(Request::input('id'));
        $unit_ = unit_transection::where('product_id',$stock->code)->get();

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
