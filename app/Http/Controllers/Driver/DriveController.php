<?php

namespace App\Http\Controllers\Driver;

use Request;
use App\Http\Controllers\Controller;
use App\drivers;

class DriveController extends Controller
{

    public function index()
    {
        $driver = new drivers;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $driver = $driver->where('name_th', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . Request::input('name') . "%");
            }
        }
        $p_row = $driver->paginate(50);

        if(!Request::ajax()){
            return view('driver.list_driver')->with(compact('p_row'));
        }else{
            return view('driver.list_driver_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        $driver = new drivers;
        $driver->name_th = Request::input('name_th');
        $driver->name_en = Request::input('name_en');
        $driver->price = Request::input('price');
        $driver->save();

        return redirect('/employee/driver');
    }


    public function store(Request $request)
    {

    }


    public function show()
    {
        $driver = drivers::find(Request::input('id'));

        return view('driver.view_driver')->with(compact('driver'));
    }


    public function edit()
    {
        $driver = drivers::find(Request::input('id'));

        return view('driver.edit_driver')->with(compact('driver'));
    }


    public function update()
    {
        $driver = drivers::find(Request::input('id'));
        $driver->name_th = Request::input('name_th');
        $driver->name_en = Request::input('name_en');
        $driver->price = Request::input('price');
        $driver->save();

        return redirect('/employee/driver');
    }


    public function destroy()
    {
        $driver = drivers::find(Request::input('id'));
        $driver->delete();
    }
}
