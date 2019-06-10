<?php

namespace App\Http\Controllers\Product;

use Request;
use App\Http\Controllers\Controller;
use auth;
use app\user;
use App\store;

class CompanystoreController extends Controller
{

    public function index()
    {
        $store = new store;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $store = $store->where('name', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name', 'like', "%" . Request::input('name') . "%");
            }
        }

        $store = $store->paginate(50);

        if(!Request::ajax()){
            return view('company_store.list_company_store')->with(compact('store'));
        }else{
            return view('company_store.list_company_store_element')->with(compact('store'));
        }
    }


    public function create()
    {
        $store = new store;
        $store->tell = Request::input('tell');
        $store->address = Request::input('address');
        $store->name = Request::input('name');
        $store->tax_id = Request::input('tax_id');
        $store->email = Request::input('email');
        $store->save();

        return redirect('employee/company_store');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $store = store::find(Request::input('id'));

        return view ('company_store.view_store')->with(compact('store'));
    }


    public function edit()
    {
        $store = store::find(Request::input('id'));

        return view ('company_store.edit_store')->with(compact('store'));
    }

    public function update()
    {
        $store = store::find(Request::input('id'));
        $store->tell = Request::input('tell');
        $store->address = Request::input('address');
        $store->name = Request::input('name');
        $store->tax_id = Request::input('tax_id');
        $store->email = Request::input('email');
        $store->save();

        return redirect('employee/company_store');
    }


    public function destroy()
    {
        $store = store::find(Request::input('id'));
        $store->delete();

        return redirect('employee/company_store');
    }
}
