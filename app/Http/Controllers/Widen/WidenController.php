<?php

namespace App\Http\Controllers\Widen;

use Request;
use App\Http\Controllers\Controller;
use App\stock;
use App\widen;

class WidenController extends Controller
{
    public function index()
    {
        return view ('product.add');
    }


    public function create()
    {
        $stock = stock::find(Request::input('name'));
        return response()->json( $stock );
    }


    public function store()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $widen = new widen;
                $widen->widen_code = $randomString;
                $widen->stock_id = $t['id'];
                $widen->amount = $t['amount'];


                $stock = stock::find($t['id']);
                $stock->amount = $stock->amount - $t['amount'];

                if($t['amount'] < $stock->amount){
                    $widen->save();
                    $stock->save();
                }

            }
        }
        return redirect('/employee/widen/stock');
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
