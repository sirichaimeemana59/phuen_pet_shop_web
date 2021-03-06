<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sick;
use App\sick_transection;
use App\news;
use App\promotion;
use Session;
use App\store_profile;
use App\know;
use DB;
use App\users_list;
use App\stock;

class IndexController extends Controller
{

    public function index($p = null, $u= null)
    {
if(empty(Session::get('locale'))){
    Session::put('locale','th');
}



        $sick = new sick;
//        $sick = $sick->paginate(1);
        $sick = $sick->get();

        //dd($sick);

        $new = new news();
        $p_row = $new->paginate(50);


        $promotion = new promotion();
        $promotion = $promotion->paginate(50);

        $store_profile = new store_profile;
        $store_profile = $store_profile->first();

        $know = new know;
        $know = $know->get();

        $stock = DB::table('stock')
            ->select(DB::raw('count(*) as count'))
            ->where('amount', '<', 50)
            ->get();
        Session::put('stock',$stock);

        $user = DB::table('users')
            ->select(DB::raw('count(*) as count'))
            ->where('status',0)
            ->get();
        Session::put('user',$user);


        return view('index_new')->with(compact('sick','p_row','promotion','store_profile','know','u','p'));
    }


    public function create(Request $request)
{
    $sick_tran = new sick_transection;
    $sick_tran1 = new sick_transection;

    if($request->method('post')) {
        if ($request->input('data')) {
            $sick_tran = $sick_tran->where('detail_th', 'like', "%" . $request->input('data') . "%")
                ->orWhere('detail_en', 'like', "%" . $request->input('data') . "%")
                ->with('join_sick')->where('sick_id',$sick_tran->sick_id)->get();
        }

        if(count($sick_tran)== 0){
            if($request->method('post')) {
                if ($request->input('data')) {
                    $sick_tran1 = $sick_tran1->where('detail_en', 'like', "%" . $request->input('data') . "%")
                        ->orWhere('detail_en', 'like', "%" . $request->input('data') . "%")
                        ->with('join_sick')->where('sick_id',$sick_tran1->sick_id);
                }
            }
            $sick_tran = $sick_tran1->get();
        }


    }


    return response()->json($sick_tran);

}

    public function search_data(Request $request)
    {
        $sick = sick::where('id',$request->input('data'))->first();

        $sick_tran = new sick_transection();

                $sick_tran = $sick_tran->where('sick_id', 'like', "%" . $sick->code . "%")
                    ->with('join_sick')->where('sick_id',$sick->code)->get();

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
