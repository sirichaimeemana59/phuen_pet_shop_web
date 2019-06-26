<?php

namespace App\Http\Controllers\Customer;

use Request;
use App\Http\Controllers\Controller;
use App\product;
use App\stock;
use App\stock_log;
use auth;
use App\unit_transection;
use App\cat;
use App\cat_transection;
use App\order_customer;
use App\order_customer_transection;
use App\address;
use App\profile;
use App\Districts;
use App\Subdistricts;
use App\Province;

class OrderController extends Controller
{

    public function index()
    {
        $cat = new cat;

        $cat = $cat->get();

        $product = new product;



        if(Request::get('group_id') and empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'));
            });
        }

        if(Request::get('group_id') and !empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'))
                    ->Where('cat_id','=',Request::get('cat_id'));
            });
        }


        $p_row = $product->paginate(50);

        $profile = profile::where('user_id',Auth::user()->id)->first();

        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        if(!Request::ajax()){
            return view ('customer.list_order')->with(compact('p_row','cat','profile','provinces','districts','subdistricts'));
        }else{
            return view('customer.list_order_element')->with(compact('p_row','cat','profile','provinces','districts','subdistricts'));
        }
    }


    public function search_group()
    {

        $cat = cat::find(Request::input('id'));
        //dd($cat);
       $cat_tran = cat_transection::where('cat_id',$cat->code)->get();

        return response()->json($cat_tran);
    }


    public function store()
    {
        //dd(Request::input('data'));
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $order_customer = new order_customer;
        $order_customer->user_id = Auth::user()->id;
        $order_customer->order_code = $randomString;
        $order_customer->total = Request::input('sum_total');
        $order_customer->discount = 0;
        $order_customer->vat = 0;
        $order_customer->grand_total = Request::input('sum_tatal');
        $order_customer->save();

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $order_customer_tran = new order_customer_transection;
                $order_customer_tran->order_code = $randomString;
                $order_customer_tran->product_id = $t['product_id'];
                $order_customer_tran->price_product = $t['price'];
                $order_customer_tran->unit_sale = $t['unit_id'];
                $order_customer_tran->amount = $t['amount'];
                $order_customer_tran->total_price = $t['total'];
                $order_customer_tran->save();

                $product = product::find($t['id']);
                $product->amount = abs($product->amount)-$t['amount'];
                $product->save();

                //dd($product); die();
            }
        }

        $address = new address;
        $address-> province_id = Request::input('province');
        $address-> dis_id = Request::input('district');
        $address-> sub_id = Request::input('sub_district');
        $address-> post_code = Request::input('post_code');
        $address-> name = Request::input('name');
        $address-> tell = Request::input('tell');
        $address-> address = Request::input('address');
        $address-> id_order = 0;
        $address-> code_order = $randomString;
        $address->save();
        //dd($order_customer_tran) ; die();

        //dd($address);

        return redirect('/customer/order');
    }


    public function show()
    {

        $order_customer = new order_customer;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $order_customer = order_customer::where('order_code',Request::input('name'));
            }
        }

        $p_row = $order_customer->where('user_id',Auth::user()->id)->paginate(50);

        if(!Request::ajax()){
            return view ('customer.show_order')->with(compact('p_row'));
        }else{
            return view('customer.show_order_element')->with(compact('p_row'));
        }
    }

    public function view(){

        $order_customer = order_customer::find(Request::input('id'));

        $order_tran = order_customer_transection::where('order_code',$order_customer->order_code)->get();

        return view('customer.view_order')->with(compact('order_customer','order_tran'));
    }

    public function edit($id)
    {
        $order_customer = order_customer::find($id);

        $order_tran = order_customer_transection::where('order_code',$order_customer->order_code)->get();

        $cat = new cat;

        $cat = $cat->get();

        $product = new product;

        if(Request::get('group_id') and empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'));
            });
        }

        if(Request::get('group_id') and !empty(Request::get('cat_id'))){
            //dd(Request::get('contract_code'));
            $product = $product->whereHas('join_stock', function ($q) {
                $q ->where('group_id','=',Request::get('group_id'))
                    ->Where('cat_id','=',Request::get('cat_id'));
            });
        }


        $p_row = $product->paginate(50);


        $profile = address::where('code_order',$order_customer->order_code)->first();

        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        //return view('customer.edit_order')->with(compact('order_customer','order_tran'));

        if(!Request::ajax()){
            return view ('customer.edit_order')->with(compact('p_row','cat','order_customer','order_tran','profile','provinces','districts','subdistricts'));
        }else{
            return view('customer.edit_order_element')->with(compact('p_row','cat','order_customer','order_tran','profile','provinces','districts','subdistricts'));
        }
    }


    public function update()
    {
        $order_customer = order_customer::find(Request::input('id_order'));

        $order_customer->user_id = Auth::user()->id;
        $order_customer->order_code = $order_customer->order_code;
        $order_customer->total = Request::input('sum_total');
        $order_customer->discount = 0;
        $order_customer->vat = 0;
        $order_customer->grand_total = Request::input('sum_tatal');
        $order_customer->save();

        foreach (Request::input('data_') as $t){
            $order_customer_tran = order_customer_transection::find($t['id_order']);
            $order_customer_tran->order_code = $order_customer->order_code;
            $order_customer_tran->product_id = $t['product_id'];
            $order_customer_tran->price_product = $t['price'];
            $order_customer_tran->unit_sale = $t['unit_sale'];
            $order_customer_tran->amount = $t['amount'];
            $order_customer_tran->total_price = $t['total'];
            $order_customer_tran->save();
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $order_customer_tran = new order_customer_transection;
                $order_customer_tran->order_code = $order_customer->order_code;
                $order_customer_tran->product_id = $t['product_id'];
                $order_customer_tran->price_product = $t['price'];
                $order_customer_tran->unit_sale = $t['unit_id'];
                $order_customer_tran->amount = $t['amount'];
                $order_customer_tran->total_price = $t['total'];
                $order_customer_tran->save();
            }
        }

        //dd($order_customer_tran);

        return redirect('customer/edit/order/'.Request::input('id_order'));
    }


    public function destroy()
    {
        $order_customer = order_customer::find(Request::input('id'));
        $order_customer_tran = order_customer_transection::where('order_code',$order_customer->order_code);
        $order_customer_tran->delete();
        $order_customer->delete();

        return redirect('/customer/list_order');
    }

    public function selectDistrict(){
        if(Request::isMethod('post')) {
            $d = new Districts;
            $d = $d->where('province_id',Request::get('id'));
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function Subdistrict(){
        if(Request::isMethod('post')){

            $s = new Subdistricts;
            $s = $s->where('district_id',Request::get('id'));
            $s = $s->get();
            return response()->json($s);
        }
    }


    public function selectDistrictEdit(){
        if(Request::isMethod('post')) {

            $property = profile::find(Request::get('id'));

            //dd($property);
            //$p = Districts::find(Request::get('id'));

            $d = new Districts;
            $d = $d->where('province_id',$property['povince_id']);
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function editSubDis(){

        $property = profile::find(Request::get('id'));

        $s = new Subdistricts;
        $s = $s->where('district_id',$property['distric_id']);
        $s = $s->get();

        return response()->json($s);
    }

    public function zip_code(){
        if(Request::isMethod('post')){
            $z = new Subdistricts;
            $z = $z->where('id',Request::get('id'));
            $z = $z->get();

            return response()->json($z);
        }
    }

//Address
    public function selectDistrict_address(){
        if(Request::isMethod('post')) {
            $d = new Districts;
            $d = $d->where('province_id',Request::get('id'));
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function Subdistrict_address(){
        if(Request::isMethod('post')){

            $s = new Subdistricts;
            $s = $s->where('district_id',Request::get('id'));
            $s = $s->get();
            return response()->json($s);
        }
    }


    public function selectDistrictEdit_address(){
        if(Request::isMethod('post')) {

            $property = address::find(Request::get('id'));

            //dd($property);
            //$p = Districts::find(Request::get('id'));

            $d = new Districts;
            $d = $d->where('province_id',$property['province_id']);
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function editSubDis_address(){

        $property = address::find(Request::get('id'));

        $s = new Subdistricts;
        $s = $s->where('district_id',$property['dis_id']);
        $s = $s->get();

        return response()->json($s);
    }

    public function zip_code_address(){
        if(Request::isMethod('post')){
            $z = new Subdistricts;
            $z = $z->where('id',Request::get('id'));
            $z = $z->get();

            return response()->json($z);
        }
    }
}
