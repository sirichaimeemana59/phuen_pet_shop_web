<?php

namespace App\Http\Controllers\Product;

use App\order_customer_transection;
use http\Env\Response;
use Request;
use App\Http\Controllers\Controller;
use auth;
use App\stock;
use App\stock_log;
use App\unit_transection;
use App\order_company;
use App\order_company_transection;
use App\company;
use App\Districts;
use App\Subdistricts;
use App\Province;

class OrderCompanyController extends Controller
{

    public function index()
    {
        $order = new order_company;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $order = order_company::where('code',Request::input('name'));
            }
        }

        $p_row = $order->paginate(50);



        if(!Request::ajax()){
            return view('company_store.list_order')->with(compact('p_row'));
        }else{
            return view('company_store.list_order_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        $stock = new stock;
        $stock = $stock->get();

        $store = new company;
        $store = $store->getCompany();

        return view('company_store.add_order')->with(compact('stock','store'));
    }


    public function company()
    {
        //$product_name = product::with('join_stock')->where('id',$product->id)->first();
        $store =  company::find(Request::input('id'));

        //if(!empty($store)){
            //$store_ = company::with('join_province')->where('id',$store->province)->first();
       // }

        //dd($store_);
        return response()->json($store);
    }


    public function show()
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $com = new order_company;
        $com->code = $randomString;
        $com->user_id = Auth::user()->id;
        $com->company_id = Request::input('company_id');
        $com->date = Date('Y-m-d');
        $com->save();
        //dd(Request::input('data'));
        foreach (Request::input('data') as $t){
            $order = new order_company_transection;
            $order->code = $randomString;
            $order->product_id = !empty($t['product_id'])?$t['product_id']:null;
            $order->amount = $t['amount'];
            $order->unit = !empty($t['unit_id'])?$t['unit_id']:null;
            $order->name = !empty($t['product'])?$t['product']:null;
            $order->unit_name = !empty($t['unit_name'])?$t['unit_name']:null;
            $order->save();
        }

        return redirect('/employee/company_store/order');
    }


    public function edit($id)
    {
        $order = order_company::find($id);

        $order_ = order_company_transection::where('code',$order->code)->get();

        $stock = stock::where('company_id',$order->company_id)->get();

        $store = new company;
        $store = $store->getCompany();

        return view('company_store.edit_order')->with(compact('order','order_','stock','store'));
    }


    public function update()
    {
        //dd(Request::input('data_'));
        foreach (Request::input('data_') as $t) {
            $order_ = order_company_transection::find($t['id']);
            $order_->code = $order_->code;
            $order_->product_id = !empty($t['product_id']) ? $t['product_id'] : null;
            $order_->amount = $t['amount'];
            $order_->unit = !empty($t['unit']) ? $t['unit'] : null;
            $order_->name = !empty($t['product_name']) ? $t['product_name'] : null;
            $order_->unit_name = !empty($t['unit_name']) ? $t['unit_name'] : null;
            $order_->save();
        }

        foreach (Request::input('data') as $t){
            $order = new order_company_transection;
            $order->code = $order_->code;
            $order->product_id = !empty($t['product_id'])?$t['product_id']:null;
            $order->amount = $t['amount'];
            $order->unit = !empty($t['unit_id'])?$t['unit_id']:null;
            $order->name = !empty($t['product'])?$t['product']:null;
            $order->unit_name = !empty($t['unit_name'])?$t['unit_name']:null;
            $order->save();
        }

        //dd($order_); die();

        return redirect('/employee/edit/order_company/'.Request::input('id_order'));
    }


    public function destroy()
    {
        $order = order_company::find(Request::input('id'));
        $order_ = order_company_transection::where('code',$order->code);

        $order_->delete();
        $order->delete();

    }

    public function selectProvince(){
        if(Request::isMethod('post')) {
            $d = Province::find(Request::get('id'));
            return response()->json($d);
        }
    }

    public function selectDistrict(){
        if(Request::isMethod('post')) {
            $d = Districts::find(Request::get('id'));

            return response()->json($d);
        }
    }

    public function Subdistrict(){
        if(Request::isMethod('post')){
            $s = Subdistricts::find(Request::get('id'));

            return response()->json($s);
        }
    }

    public function product(){
        if(Request::isMethod('post')){
            $s = stock::where('company_id',Request::get('id'))->get();

            return response()->json($s);
        }
    }

    public function unit(){
        $stock = stock::find(Request::input('id'));

        $unit = stock_log::where('product_id',$stock->code)->first();

        $unit_ = unit_transection::where('product_id',$stock->code)->get();

        $data["unit"] = $unit;
        $data["unit_"] = $unit_;

        return response()->json($data);
    }
    public function view(){
        $order = order_company::find(Request::input('id'));

        $order_ = order_company_transection::where('code',$order->code)->get();
        //dd($order_);
        return view('company_store.view_order')->with(compact('order','order_'));
    }

    public function delete(){
        $order_ = order_company_transection::find(Request::input('id'));
        $order_->delete();
    }
}
