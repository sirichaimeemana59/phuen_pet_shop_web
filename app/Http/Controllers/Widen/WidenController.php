<?php

namespace App\Http\Controllers\Widen;

use App\unit_transection;
use Request;
use App\Http\Controllers\Controller;
use App\stock;
use App\widen;
use App\widen_report;
use App\stock_log;
use App\widden_product;
use App\widden__transection;
use Redirect;
use Auth;

class WidenController extends Controller
{
    protected $app;

    public function __construct () {
        $this->middleware('auth');
        if( Auth::check() && Auth::user()->role !== 0 ) {
            if(Auth::user()->role !== 2) {
                Redirect::to('/logout')->send();
            }
        }
    }

    public function index()
    {
        $stock = new stock;
        $stock = $stock->get();
        return view ('product.add')->with(compact('stock'));
    }


    public function create()
    {
        if(!empty(Request::input('name'))){
            $stock = stock::where('bar_code',Request::input('name'))->first();
            $stock = $stock->toArray();

            $unit = stock_log::where('product_id',$stock['code'])->first();
            $unit = $unit->toArray();

            $unit_tran = unit_transection::where('product_id',$stock['code'])->get();
            $unit_tran = $unit_tran->toArray();


            $data["stock"] = $stock;
            $data["stock_log"] = $unit;
            $data["unit_tran"] = $unit_tran;
        }

        return response()->json( $data );
    }


    public function store()
    {

        //dd(Request::input('data'));
        $characters_ = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength_ = strlen($characters_);
        $randomString_ = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString_ .= $characters_[rand(0, $charactersLength_ - 1)];
        }

            $widden_product = new widden_product;
            $widden_product->code = $randomString_;
            $widden_product->user_id = Auth::user()->id;
            $widden_product->date = date('Y-m-d');
            $widden_product->save();

            foreach (Request::input('data') as $t){
                $widden_transection = new widden__transection;
                $widden_transection->code = $randomString_;
                $widden_transection->unit_widden = $t['unit_widen'];
                $widden_transection->amount_widden = $t['amount_widden'];
                $widden_transection->product_id = $t['product_code'];
                $widden_transection->id_product_stock = $t['id_product_stock'];
                $widden_transection->bar_code = $t['bar_code'];
                $widden_transection->save();

                $stock = stock::find($t['id_product_stock']);
                $stock->amount = abs($t['amount_widden']- $stock->amount);
                $stock->save();
                //dd($t['product_code']);
            }





        //dd(Request::input('data'));
        $amount = array();
        $amount_unit = array(); //จำนวนหน่วยคงเหลือ
        $product_code = array(); // code สินค้า
        $amount_widden = array(); // จำนวนที่เบิก
        $product_id = array();
        $unit_small = array();

//        foreach (Request::input('data') as $key => $t){
//            if($t['amount_widden'] != null) {
//                $amount[] = abs(($t['amount_'] * $t['amount_widden']) - $t['amount']);
//                $amount_unit[] = abs($t['amount_widden'] - $t['amount_']);
//                $product_code[] = $t['product_code'];
//                $amount_widden[] = $t['amount_widden'];
//                $product_id[] = $t['product_id'];
//                $unit_small[] = $t['unit_small'];
//            }
//        }


//        for($i=0;$i<count($unit_small);$i++){
//            $stock = stock_log::find($unit_small[$i]);
//            $stock->amount = $amount[$i];
//            //$stock->save();
//
//            $stock_ = stock::find($product_id[$i]);
//            $stock_->amount = $amount[$i];
//            //$stock_->save();
//        }//ปรับจำนวนเล็กสุดในตาราง stock

        //dd($stock_);


        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

//        if(!empty(Request::input('data'))){
//            foreach (Request::input('data') as $t){
//                $widen_report = new widen_report;
//                $widen_report->widen_code = $randomString;
//                $widen_report->stock_id = $t['id'];
//                $widen_report->amount = $t['amount'];
//                $widen_report->widen_date = date("Y-m-d");
//                //$widen_report->save();
//
//                if($widen_ = widen::find($t['id'])){
//                    $widen_->amount = $t['amount']+$widen_->amount;
//                    //$widen_->save();
//
//                    $stock = stock::find($t['id']);
//                    $stock->amount = $stock->amount - $t['amount'];
//
//                    if($t['amount'] < $stock->amount){
//                        //$widen_->save();
//                        //$stock->save();
//                    }
//
//                }else{
//                    $widen = new widen;
//                    $widen->widen_code = $randomString;
//                    $widen->stock_id = $t['id'];
//                    $widen->amount = $t['amount'];
//
//                    $stock = stock::find($t['id']);
//                    $stock->amount = $stock->amount - $t['amount'];
//
//                    if($t['amount'] < $stock->amount){
//                        //$widen->save();
//                        //$stock->save();
//                    }
//                }
//
//            }
//        }
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
        $unit_log = stock_log::find(Request::input('id'));
        $unit_tran = unit_transection::find(Request::input('id'));

        if($unit_log){
            $unit_ = $unit_log;
        }else{
            $unit_ = $unit_tran;
        }

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

    public function print_widden($id = null){

        $widen = widden_product::find($id);

        $widen_transection = widden__transection::where('code',$widen->code)->get();

        return view('report_widden.report_widden')->with(compact('widen','widen_transection'));
    }

    public function list_widen(){
        $widden_product = new widden_product;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $widden_product = widden_product::where('code',Request::input('name'));
            }
        }

        $widden_product = $widden_product->paginate(50);

        if(!Request::ajax()){
            return view('report_widden.list_widden')->with(compact('widden_product'));
        }else{
            return view('report_widden.list_widden_element')->with(compact('widden_product'));
        }

    }

    public function widen_detail($id = null){

        $widen = widden_product::find($id);

        $widen_transection = widden__transection::where('code',$widen->code)->get();

        return view('report_widden.detail_widen')->with(compact('widen','widen_transection'));
    }

    public function widen_edit($id =null, $text = null){
        $widen = widden_product::find($id);

        $widen_transection = widden__transection::where('code',$widen->code)->get();

        //$stock_log = stock_log::where('product_id',$widen_transection->product_id)->first();
        //$unit_tran = unit_transection::where('product_id',$widen_transection->product_id)->get();

        //dd($stock_log);
        $stock = new stock;
        $stock = $stock->get();

        return view('report_widden.edit_widen')->with(compact('widen','widen_transection','stock','text'));
    }

    public function update_widen_product(){
        //dd(Request::input('data'));
        foreach(Request::input('data_') as $t){
            $widen_transection = widden__transection::find($t['id']);
            $widen_transection->unit_widden = $t['unit_widden'];
            if($t['amount_widden'] != $t['amount_log']){
                $widen_transection->amount_widden = $t['amount_widden'];
            }else{
                $widen_transection->amount_widden = $t['amount_log'];
            }

            $stock = stock::find($t['id_product_stock_']);

            if($t['amount_widden'] > $t['amount_log']){
                if($stock->amount < $t['amount_widden']){
                    return redirect ('/employee/widen/edit/'.Request::input('widen_id').'/'.$text=2);
                }else{
                    $stock->amount = abs($stock->amount - $t['amount_widden']);
                }
            }else{
                $stock->amount = $stock->amount+ abs($t['amount_log'] - $t['amount_widden']);
            }
            $widen_transection->save();
            $stock->save();
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $widden_transection = new widden__transection;
                $widden_transection->code = Request::input('widen_code');
                $widden_transection->unit_widden = $t['unit_widen'];
                $widden_transection->amount_widden = $t['amount_widden'];
                $widden_transection->product_id = $t['product_code'];
                $widden_transection->id_product_stock = $t['id_product_stock'];
                $widden_transection->save();

                $stock = stock::find($t['id_product_stock']);
                $stock->amount = abs($t['amount_widden']- $stock->amount);
                $stock->save();
                //dd($t['product_code']);
            }
        }

        return redirect ('/widen/list_element');
    }
}
