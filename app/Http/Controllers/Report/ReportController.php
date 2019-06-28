<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
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
        $sale_good =  sale_good::select(DB::raw('product_id,SUM(amount) as sum'))
            ->groupBy('product_id')->get();

        $stock = DB::table('sale_good')
            ->join('stock', 'stock.id', '=', 'sale_good.product_id')
            ->select('stock.*')
            ->groupBy('sale_good.product_id','stock.id')
            ->get();

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
