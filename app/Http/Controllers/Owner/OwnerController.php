<?php

namespace App\Http\Controllers\Owner;

use App\company;
use Request;
use App\Http\Controllers\Controller;
use auth;
use App\order_customer;
use App\order_customer_transection;
use App\product;
use App\cat;
use Redirect;
use App\Districts;
use App\Subdistricts;
use App\Province;
use App\address;
use App\profile;
use DB;
use Session;
use App\order_company;
use App\order_company_transection;
use App\stock;
use App\widen;
use App\widen_report;
use App\stock_log;
use App\widden_product;
use App\widden__transection;
use App\store_profile;

class OwnerController extends Controller
{

    public function index()
    {
        return redirect('/approved/user');
    }


    public function order_owner()
    {
        $order = new order_customer;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $order = $order->where('order_code',Request::input('name'));
            }
        }

        $p_row = $order->paginate(50);

        if(!Request::ajax()){
            return view('owner.list_order_customer')->with(compact('p_row'));
        }else{
            return view('owner.list_order_customer_element')->with(compact('p_row'));
        }
    }


    public function order_owner_company()
    {
        $order = new order_company;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $order = order_company::where('code',Request::input('name'));
            }
        }

        $p_row = $order->paginate(50);



        if(!Request::ajax()){
            return view('owner.list_order')->with(compact('p_row'));
        }else{
            return view('owner.list_order_element')->with(compact('p_row'));
        }
    }


    public function order_owner_company_print()
    {
        $order = new order_company;
        $p_row = $order->get();

        $store_profile = new store_profile;
        $store_profile = $store_profile->first();
        return view('report.order_owner_company_print')->with(compact('p_row','store_profile'));
    }


    public function order_owner_print()
    {
        $order = new order_customer;
        $p_row = $order->get();

        $store_profile = new store_profile;
        $store_profile = $store_profile->first();

        return view('report.order_owner_print')->with(compact('p_row','store_profile'));

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
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
            return view('owner.list_widden')->with(compact('widden_product'));
        }else{
            return view('owner.list_widden_element')->with(compact('widden_product'));
        }

    }

    public function widen_print(){
        $widden_product = new widden_product;
        $widden_product = $widden_product->get();

        return view('report.widen_print')->with(compact('widden_product'));

    }
}
