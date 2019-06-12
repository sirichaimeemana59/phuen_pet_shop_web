<?php

namespace App\Http\Controllers\Product;

use Request;
use App\Http\Controllers\Controller;

use App\unit;

class UnitController extends Controller
{

    public function index()
    {
        $unit = new unit;
        $unit = $unit->paginate(50);


        if(!Request::ajax()){
            return view('unit.list_unit')->with(compact('unit'));
        }else{
            return view('unit.list_unit_element')->with(compact('unit'));
        }
    }


    public function create()
    {
        $unit = new unit;
        $unit->name_th = Request::input('name_th');
        $unit->name_en = Request::input('name_en');
        $unit->save();

        return redirect('employee/add_product_stock');
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
