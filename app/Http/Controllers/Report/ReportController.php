<?php

namespace App\Http\Controllers\Report;

use Request;
use App\Http\Controllers\Controller;
use App\sale_good;
use DB;
use Session;
use App\stock;

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

//            $stock = DB::table('sale_good')
//                ->join('stock', 'stock.id', '=', 'sale_good.product_id')
//                ->select('stock.*')
//                ->groupBy('sale_good.product_id','stock.id')
//                ->get();

            foreach ($sale_good as $t){
//                dd($t['product_id']); die();
                $stock = DB::table('sale_good')
                    ->join('stock', 'stock.id', '=', 'sale_good.product_id')
                    ->select('stock.*')
                    ->where('stock.id',$t['product_id'])
                    ->groupBy('sale_good.product_id','stock.id')
                    ->get();
            }
            //dd('aa');
        }elseif(!empty(Request::get('date'))){
            $from = str_replace('/', '-', Request::get('date'));


            $date = array($from . " 00:00:00");

            $sale_good =  sale_good::select(DB::raw('product_id,SUM(amount) as sum'))
                ->whereDate('created_at',$date)->groupBy('product_id')->get();

//            $stock = DB::table('sale_good')
//                ->join('stock', 'stock.id', '=', 'sale_good.product_id')
//                ->select('stock.*')
//                ->groupBy('sale_good.product_id','stock.id')
//                ->get();
            //dd('dd');
            //dd($sale_good['product_id']);
            foreach ($sale_good as $t){
//                dd($t['product_id']); die();
                $stock = DB::table('sale_good')
                    ->join('stock', 'stock.id', '=', 'sale_good.product_id')
                    ->select('stock.*')
                    ->where('stock.id',$t['product_id'])
                    ->groupBy('sale_good.product_id','stock.id')
                    ->get();
            }
        }else{
            $sale_good =  sale_good::select(DB::raw('product_id,SUM(amount) as sum'))
                ->groupBy('product_id')->get();

            $stock = DB::table('sale_good')
                ->join('stock', 'stock.id', '=', 'sale_good.product_id')
                ->select('stock.*')
                ->groupBy('sale_good.product_id','stock.id')
                ->get();

//            foreach ($sale_good as $t){
////                dd($t['product_id']); die();
//                $stock = DB::table('sale_good')
//                    ->join('stock', 'stock.id', '=', 'sale_good.product_id')
//                    ->select('stock.*')
//                    ->where('stock.id',$t['product_id'])
//                    ->groupBy('sale_good.product_id','stock.id')
//                    ->get();
//            }
            //dd('cc');
        }

        $data["stock"] = $stock;
        $data["sum"] = $sale_good;

        //dd($chat);

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
}
