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
