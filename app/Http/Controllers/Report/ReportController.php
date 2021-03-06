<?php

namespace App\Http\Controllers\Report;

use App\pet;
use Request;
use App\Http\Controllers\Controller;
use App\sale_good;
use DB;
use Session;
use App\stock;
use App\cat;
use App\cat_transection;
use App\sell_product;
use App\sell_product_tranction;

class ReportController extends Controller
{

    public function index()
    {
        return view('report_chart.sale');
    }


    public function sale_good()
    {
        //dd(Request::get('date'));
        if(!empty(Request::get('date_to')) AND !empty(Request::get('date_go'))){
            $from = str_replace('/', '-', Request::get('date_to'));
            $to = str_replace('/', '-', Request::get('date_go'));

            $date = array($from . " 00:00:00", $to . " 00:00:00");

            $sale_good =  sale_good::select(DB::raw('product_id,SUM(amount) as sum'))
                ->whereBetween('created_at',$date)->groupBy('product_id')->get();

            $t_ = $sale_good->toArray();

            foreach ($t_ as $t){
                $stock = DB::table('sale_good')
                    ->join('products', 'products.id', '=', 'sale_good.product_id')
                    ->select('sale_good.product_id','products.name', DB::raw('products.name'))
                    ->where('products.id',$t['product_id'])
                    ->groupBy('sale_good.product_id','products.name')
                    ->get();
                $stock_[] = $stock->toArray();
            }

            //dd('aa');
        }elseif(!empty(Request::get('date'))){
            $from = str_replace('/', '-', Request::get('date'));


            $date = array($from . " 00:00:00");

            $sale_good =  sale_good::select(DB::raw('product_id,SUM(amount) as sum'))
                ->whereDate('created_at',$date)->groupBy('product_id')->get();

            $t_ = $sale_good->toArray();
            foreach ($t_ as $t){
                $stock = DB::table('sale_good')
                    ->join('products', 'products.id', '=', 'sale_good.product_id')
                    ->select('sale_good.product_id','products.name', DB::raw('products.name'))
                    ->where('products.id',$t['product_id'])
                    ->groupBy('sale_good.product_id','products.name')
                    ->get();
                $stock_[] = $stock->toArray();
            }

        }else{

            $sale_good =  sale_good::select(DB::raw('product_id,SUM(amount) as sum'))
                ->groupBy('product_id')->get();

            $t_ = $sale_good->toArray();
            foreach ($t_ as $t){
                $stock = DB::table('sale_good')
                    ->join('products', 'products.id', '=', 'sale_good.product_id')
                    ->select('sale_good.product_id','products.name', DB::raw('products.name'))
                    ->where('products.id',$t['product_id'])
                    ->groupBy('sale_good.product_id','products.name')
                    ->get();
                $stock_[] = $stock->toArray();
            }

            //dd($t_);

        }

        $data["stock"] = $stock_;
        $data["sum"] = $t_;

        //dd($data["sum"]);

        return response()->JSON($data);
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

    public function inventory(){
        $cat = new cat;
        $cat = $cat->get();

        $cat_tran = new cat_transection;
        $cat_tran = $cat_tran->get();

        return view('report_chart.inventory')->with(compact('cat','cat_tran'));
    }

    public function inventory_chart(){
        if(!empty(Request::get('group_id'))){
            $stock = new stock;
            $stock = $stock->where('group_id',Request::get('group_id'))->orderBy('amount','ASC')->get();
        }elseif(!empty(Request::get('cat_id'))){
            $stock = new stock;
            $stock = $stock->where('cat_id',Request::get('cat_id'))->orderBy('amount','ASC')->get();
        }else{
            $stock = new stock;
            $stock = $stock->orderBy('amount','ASC')->get();
        }


        //dd($stock);
        return response()->JSON($stock);
    }

    public function sale_report (){
        $sell = new sell_product;

        if(Request::method('post')) {
            if (Request::input('date')) {
                $from = str_replace('/', '-', Request::get('date'));

                $date = array($from . " 00:00:00");
                $sell =  sell_product::whereDate('created_at',$date);
            }
        }

        $p_row = $sell->paginate(50);

        if(!Request::ajax()){
            return view ('report.report_sell')->with(compact('p_row'));
        }else{
            return view ('report.report_sell_element')->with(compact('p_row'));
        }


    }

    public function sale_report_view(){
        $sell = sell_product::find(Request::input('id'));

        return view('report.view_report_sell')->with(compact('sell'));
    }

    public function sale_report_print(){

    }
}

