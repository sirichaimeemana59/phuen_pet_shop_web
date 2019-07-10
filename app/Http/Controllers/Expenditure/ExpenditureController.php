<?php

namespace App\Http\Controllers\Expenditure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order_company;
use App\order_company_transection;
use App\stock;
use App\company;
use DB;
use App\expenditure;
use auth;

class ExpenditureController extends Controller
{

    public function index(Request $request)
    {
        $order = new order_company;

        if($request->method('post')) {
            if ($request->input('name')) {
                $order = order_company::where('code',$request->input('name'));
            }
        }

        $p_row = $order->where('status',0)->paginate(50);



        if(!$request->ajax()){
            return view('expenditure.list_expenditure')->with(compact('p_row'));
        }else{
            return view('expenditure.list_expenditure_element')->with(compact('p_row'));
        }

    }


    public function create(Request $request)
    {
        if(!empty($request->get('date_to')) AND !empty($request->get('date_go'))){
            $from = str_replace('/', '-', $request->get('date_to'));
            $to = str_replace('/', '-', $request->get('date_go'));

            $date = array($from . " 00:00:00", $to . " 00:00:00");

            $order =  order_company::whereBetween('created_at', $date)->get();

            $order_ =  order_company::select(DB::raw('SUM(grand_total) as sum'))->whereBetween('created_at', $date)->get();
        }else{
            $from = str_replace('/', '-', $request->get('date'));


            $date = array($from . " 00:00:00");

            //dd($date);

            $order =  order_company::whereDate('created_at', $date)->get();

            $order_ =  order_company::select(DB::raw('SUM(grand_total) as sum'))->whereDate('created_at', $date)->get();
        }


        $data["order"] = $order;
        $data["order_"] = $order_[0]['sum'];

        return response()->json($data);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id = null)
    {
        $order = order_company::find($id);

        $order_ = order_company_transection::where('code',$order->code)->get();

        $stock = stock::where('company_id',$order->company_id)->get();

        $store = new company;
        $store = $store->getCompany();

        return view('expenditure.edit_order')->with(compact('order','order_','stock','store'));
    }


    public function update(Request $request)
    {
        $order = order_company::find($request->input('id_order'));
        $order->total = $request->input('total_all');
        $order->status = 1;
        //dd($order);
        $order->save();

        $ex = new expenditure;
        $ex->id_order = $request->input('id_order');
        $ex->order_code = $request->input('order_code');
        $ex->total = $request->input('total_all');
        $ex->user_id = Auth::user()->id;
        $ex->save();

        foreach ($request->input('data_') as $t) {
            $order_ = order_company_transection::find($t['id']);
            $order_->code = $order_->code;
            $order_->product_id = !empty($t['product_id']) ? $t['product_id'] : null;
            $order_->amount = $t['amount'];
            $order_->unit = !empty($t['unit']) ? $t['unit'] : null;
            $order_->name = !empty($t['product_name']) ? $t['product_name'] : null;
            $order_->unit_name = !empty($t['unit_name']) ? $t['unit_name'] : null;
            $order_->price = $t['price'];
            $order_->save();
        }
        //dd($order_);
        return redirect('/employee/list_expenditure');
    }


    public function report(Request $request)
    {
        $order = new expenditure;

        if($request->method('post')) {
            if(!empty($request->get('date_to')) AND !empty($request->get('date_go'))){
                $from = str_replace('/', '-', $request->get('date_to'));
                $to = str_replace('/', '-', $request->get('date_go'));

                $date = array($from . " 00:00:00", $to . " 00:00:00");

                $order =  expenditure::whereBetween('created_at', $date);

            }

            if(!empty($request->input('date'))){
                $from = str_replace('/', '-', $request->get('date'));

                $date = array($from . " 00:00:00");

                $order =  expenditure::whereDate('created_at', $date);
            }
        }

        $p_row = $order->paginate(50);



        if(!$request->ajax()){
            return view('expenditure.list_expenditure_report')->with(compact('p_row'));
        }else{
            return view('expenditure.list_expenditure_report_element')->with(compact('p_row'));
        }
    }
}
