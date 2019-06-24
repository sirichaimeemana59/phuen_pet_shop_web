<?php

namespace App\Http\Controllers\Income;

use http\Env\Response;
use Request;
use App\Http\Controllers\Controller;
use App\order_walk;
use App\order_walk_transection;
use App\order_customer;
use App\order_customer_transection;
use DB;
use App\income;
use Auth;

class IncomeController extends Controller
{

    public function index()
    {
        $order = new order_walk;
        $order = $order->get();

        //if(!Request::ajax()){
            return view('income.income')->with(compact('order'));
       // }else{
        //    return view('income.income_element')->with(compact('order'));
        //}
    }


    public function list_income_list()
    {
        if(!empty(Request::get('date_to')) AND !empty(Request::get('date_go'))){
            $from = str_replace('/', '-', Request::get('date_to'));
            $to = str_replace('/', '-', Request::get('date_go'));

            $date = array($from . " 00:00:00", $to . " 00:00:00");

            $order =  order_walk::whereBetween('created_at', $date)->where('status', 0)->get();

            $order_ =  order_walk::select(DB::raw('SUM(grand_total) as sum'))->whereBetween('created_at', $date)->where('status', 0)->get();
        }else{
            $from = str_replace('/', '-', Request::get('date'));


            $date = array($from . " 00:00:00");

            //dd($date);

            $order =  order_walk::whereDate('created_at', $date)->where('status', 0)->get();

            $order_ =  order_walk::select(DB::raw('SUM(grand_total) as sum'))->whereDate('created_at', $date)->where('status', 0)->get();
        }


        $data["order"] = $order;
        $data["order_"] = $order_[0]['sum'];

        return response()->json($data);
    }


    public function income()
    {
        //dd(Request::input('data'));
       foreach (Request::input('data') as $t){
           $order = order_walk::find($t['id_order']);
           $order->status = 1;
           $order->save();
       }

       $income = new income;
       $income->user_id = Auth::user()->id;
       $income->income = Request::input('income');
       $income->date =  date ('Y-m-d');
       $income->status = 1; //จากการขายหน้าร้าน
       $income->save();

        //dd($order);

       return redirect('/employee/list_income');
    }

    public function income_online()
    {
       // dd(Request::input('data'));
        foreach (Request::input('data') as $t){
            $order = order_customer::find($t['id_order']);
            $order->status = 1;
            $order->save();
        }

        $income = new income;
        $income->user_id = Auth::user()->id;
        $income->income = Request::input('income');
        $income->date =  date ('Y-m-d');
        $income->status = 2; //จากการขายออนไลน์
        $income->save();

        //dd($order);

        return redirect('/employee/list_income');
    }



    public function list_income_online()
    {
        if(!empty(Request::get('date_to')) AND !empty(Request::get('date_go'))){
            $from = str_replace('/', '-', Request::get('date_to'));
            $to = str_replace('/', '-', Request::get('date_go'));

            $date = array($from . " 00:00:00", $to . " 00:00:00");

            $order =  order_customer::whereBetween('created_at', $date)->where('status', 2)->get();

            $order_ =  order_customer::select(DB::raw('SUM(grand_total) as sum'))->whereBetween('created_at', $date)->where('status', 2)->get();
        }else{
            $from = str_replace('/', '-', Request::get('date'));


            $date = array($from . " 00:00:00");

            //dd($date);

            $order =  order_customer::whereDate('created_at', $date)->where('status', 2)->get();

            $order_ =  order_customer::select(DB::raw('SUM(total) as sum'))->whereDate('created_at', $date)->where('status', 2)->get();
        }

//dd($date);
        $data["order"] = $order;
        $data["order_"] = $order_[0]['sum'];

        return response()->json($data);
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
