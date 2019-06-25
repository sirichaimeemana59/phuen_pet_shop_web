<?php

namespace App\Http\Controllers\Promotion;

use Request;
use App\Http\Controllers\Controller;
use App\promotion;

class PromotionController extends Controller
{

    public function index()
    {
        $promotion = new promotion;
        if(Request::method('post')) {
            if (Request::input('name')) {
                $promotion = $promotion->where('name_th', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . Request::input('name') . "%");
            }
        }
        $p_row = $promotion->paginate(50);

        if(!Request::ajax()){
            return view('promotion.list_promotion')->with(compact('p_row'));
        }else{
            return view('promotion.list_promotion_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        $promotion = new promotion;
        $promotion->name_th = Request::input('name_th');
        $promotion->name_en = Request::input('name_en');
        $promotion->detail_th = Request::input('detail_th');
        $promotion->detail_en = Request::input('detail_en');
        $promotion->discount = Request::input('discount');
        $promotion->save();

        return redirect('/employee/list/promotion');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $promotion = promotion::find(Request::input('id'));

        return view('promotion.view_promotion')->with(compact('promotion'));
    }


    public function edit()
    {
        $promotion = promotion::find(Request::input('id'));

        return view('promotion.edit_promotion')->with(compact('promotion'));
    }


    public function update()
    {
        $promotion = promotion::find(Request::input('id_pro'));
        $promotion->name_th = Request::input('name_th');
        $promotion->name_en = Request::input('name_en');
        $promotion->detail_th = Request::input('detail_th');
        $promotion->detail_en = Request::input('detail_en');
        $promotion->discount = Request::input('discount');
        $promotion->save();

        return redirect('/employee/list/promotion');
    }


    public function destroy()
    {
        $promotion = promotion::find(Request::input('id'));
        $promotion->delete();
    }
}
