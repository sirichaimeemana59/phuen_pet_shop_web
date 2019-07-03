<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pet;
use auth;

class CustomerController extends Controller
{
    public function __construct () {
        $this->middleware('Customer');
    }

    public function index(Request $request)
    {
        $pet = pet::where('user_id',Auth::user()->id);

        if($request->method('post')) {
            if ($request->input('name')) {
                $pet = $pet->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }

        $p_row = $pet->paginate(50);

        if(!$request->ajax()){
            return view ('customer.list_pet')->with(compact('p_row'));
        }else{
            return view ('customer.list_pet_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        //
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
