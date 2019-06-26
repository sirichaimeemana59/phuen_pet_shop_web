<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sick;
use App\sick_transection;
use App\news;
use App\promotion;

class IndexController extends Controller
{

    public function index()
    {
        $sick = new sick;
        $sick = $sick->get();

        //dd($sick);

        $new = new news();
        $new = $new->get();

        $promotion = new promotion();
        $promotion = $promotion->get();

        return view('index')->with(compact('sick','new','promotion'));
    }


    public function create(Request $request)
    {
        //dd($request->input('data'));
        $sick_tran = new sick_transection;
//        if($request->get('data')){
//            $sick = $sick->whereHas('join_sick_transection', function ($q,$request) {
//                $q ->where('detail_th', 'like', "%" . $request->input('data') . "%")
//                    ->orWhere('detail_en', 'like', "%" . $request->input('data') . "%");
//            });
//        }

        if($request->method('post')) {
            if ($request->input('data')) {
                $sick_tran = $sick_tran->where('detail_th', 'like', "%" . $request->input('data') . "%")
                    ->orWhere('detail_en', 'like', "%" . $request->input('data') . "%")
                ->with('join_sick')->where('sick_id',$sick_tran->sick_id);
            }
        }

        $sick_tran = $sick_tran->get();


        //$data["sick_tran"] = $sick_tran;
        //$data["sick"] = $sick;
        return response()->json($sick_tran);

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
