<?php

namespace App\Http\Controllers\Income;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\order_walk;
use App\order_walk_transection;
use App\order_customer;
use App\order_customer_transection;
use DB;
use App\income;
use Auth;
use App\bill_payment;
use ImageUploadAndResizer;

class IncomeController extends Controller
{

    public function index(Request $request)
    {
        $order = new order_walk;
        $order = $order->get();

        //if(!Request::ajax()){
            return view('income.income')->with(compact('order'));
       // }else{
        //    return view('income.income_element')->with(compact('order'));
        //}
    }


    public function list_income_list(Request $request)
    {
        if(!empty(Request::get('date_to')) AND !empty($request->get('date_go'))){
            $from = str_replace('/', '-', $request->get('date_to'));
            $to = str_replace('/', '-', $request->get('date_go'));

            $date = array($from . " 00:00:00", $to . " 00:00:00");

            $order =  order_walk::whereBetween('created_at', $date)->where('status', 0)->get();

            $order_ =  order_walk::select(DB::raw('SUM(grand_total) as sum'))->whereBetween('created_at', $date)->where('status', 0)->get();
        }else{
            $from = str_replace('/', '-', $request->get('date'));


            $date = array($from . " 00:00:00");

            //dd($date);

            $order =  order_walk::whereDate('created_at', $date)->where('status', 0)->get();

            $order_ =  order_walk::select(DB::raw('SUM(grand_total) as sum'))->whereDate('created_at', $date)->where('status', 0)->get();
        }


        $data["order"] = $order;
        $data["order_"] = $order_[0]['sum'];

        return response()->json($data);
    }


    public function income(Request $request)
    {
        //dd(Request::input('data'));
       foreach ($request->input('data') as $t){
           $order = order_walk::find($t['id_order']);
           $order->status = 1;
           $order->save();
       }

       $income = new income;
       $income->user_id = Auth::user()->id;
       $income->income = $request->input('income');
       $income->date =  date ('Y-m-d');
       $income->status = 1; //จากการขายหน้าร้าน
       $income->save();

        //dd($order);

       return redirect('/employee/list_income');
    }

    public function income_online(Request $request)
    {
       // dd(Request::input('data'));
        foreach ($request->input('data') as $t){
            $order = order_customer::find($t['id_order']);
            $order->status = 1;
            $order->save();
        }

        $income = new income;
        $income->user_id = Auth::user()->id;
        $income->income = $request->input('income');
        $income->date =  date ('Y-m-d');
        $income->status = 2; //จากการขายออนไลน์
        $income->save();

        //dd($order);

        return redirect('/employee/list_income');
    }



    public function list_income_online(Request $request)
    {
        if(!empty($request->get('date_to')) AND !empty($request->get('date_go'))){
            $from = str_replace('/', '-', $request->get('date_to'));
            $to = str_replace('/', '-', $request->get('date_go'));

            $date = array($from . " 00:00:00", $to . " 00:00:00");

            $order =  order_customer::whereBetween('created_at', $date)->where('status', 2)->get();

            $order_ =  order_customer::select(DB::raw('SUM(grand_total) as sum'))->whereBetween('created_at', $date)->where('status', 2)->get();
        }else{
            $from = str_replace('/', '-', $request->get('date'));


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


    public function bill_save(Request $request)
    {
        $order = order_customer::find($request->input('id_bill'));

        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if($request->hasFile('photo')){
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 350;
            $uploader->height = 350;
            $fileNameToDatabase = $uploader->execute();
        }

        $bill = new bill_payment;
        $bill->order_code = $order->order_code;
        $bill->user_id = Auth::user()->id;
        $bill->order_id = $request->input('id_bill');
        $bill->photo = $fileNameToDatabase;
        $bill->save();

        return redirect ('/customer/list_order');
    }


    public function bill_edit(Request $request)
    {
        $bill = bill_payment::where('order_id',$request->input('id'))->first();

        return response()->json($bill);
    }


    public function bill_edit_file(Request $request)
    {
        //dd(unlink(public_path('images/50ed7ebb97ca28a94459106388e5cc37c97db428.jpg')));
        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            unlink(public_path($request->input('name_photo')));

            $bill = bill_payment::find($request->input('id_bill_file'));
            $bill->order_code = $bill->order_code;
            $bill->user_id = Auth::user()->id;
            $bill->order_id = $bill->order_id;
            $bill->photo = $fileNameToDatabase;
            $bill->save();
        }

        return redirect ('/customer/list_order');
    }
}
