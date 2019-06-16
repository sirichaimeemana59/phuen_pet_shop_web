<?php

namespace App\Http\Controllers\Sick;

use Request;
use App\Http\Controllers\Controller;
use App\sick;
use App\sick_transection;

class SickController extends Controller
{

    public function index()
    {
        $sick = new sick;
        $p_row = $sick->paginate(50);

        if(!Request::ajax()){
            return view ('sick.list_sick')->with(compact('p_row'));
        }else{
            return view('sick.list_sick_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        return view('sick.form_add');
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

        $sick = new sick;
        $sick->name_th = Request::input('name_th');
        $sick->name_en = Request::input('name_en');
        $sick->detail_th = Request::input('detail_th');
        $sick->detail_en = Request::input('detail_en');
        $sick->code = $randomString;
        $sick->save();


        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $sick_tran = new sick_transection;
                $sick_tran->sick_id = $randomString;
                $sick_tran->sick_th = $t['sick_th'];
                $sick_tran->sick_en = $t['sick_en'];
                $sick_tran->detail_th = $t['detail_th'];
                $sick_tran->detail_en = $t['detail_en'];
                $sick_tran->save();
            }
        }

        return redirect('/employee/sick/list');

    }


    public function show()
    {
        $sick = sick::find(Request::input('id'));

        return view('sick.view_sick')->with(compact('sick'));
    }


    public function edit($id)
    {
        $sick = sick::find($id);


        return view('sick.edit_sick')->with(compact('sick'));
    }


    public function update()
    {
        $sick = sick::find(Request::input('id'));
        $sick->name_th = Request::input('name_th');
        $sick->name_en = Request::input('name_en');
        $sick->detail_th = Request::input('detail_th');
        $sick->detail_en = Request::input('detail_en');
        $sick->code = Request::input('code');
        $sick->save();

        foreach (Request::input('data_') as $t){
            $sick_tran =  sick_transection::find($t['id_']);
            $sick_tran->sick_id = Request::input('code');
            $sick_tran->sick_th = $t['sick_th'];
            $sick_tran->sick_en = $t['sick_en'];
            $sick_tran->detail_th = $t['detail_th'];
            $sick_tran->detail_en = $t['detail_en'];
            $sick_tran->save();
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $sick_tran = new sick_transection;
                $sick_tran->sick_id = Request::input('code');
                $sick_tran->sick_th = $t['sick_th'];
                $sick_tran->sick_en = $t['sick_en'];
                $sick_tran->detail_th = $t['detail_th'];
                $sick_tran->detail_en = $t['detail_en'];
                $sick_tran->save();
            }
        }

        return redirect('/employee/sick/edit/'.Request::input('id'));
    }


    public function destroy($id)
    {
        //
    }

    public function delete_sick_tran(){
        $sick_tran = sick_transection::find(Request::input('id'));
        $sick_tran->delete();
    }
}
