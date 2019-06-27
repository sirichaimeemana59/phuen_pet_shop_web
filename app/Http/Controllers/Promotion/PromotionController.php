<?php

namespace App\Http\Controllers\Promotion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\promotion;
use ImageUploadAndResizer;
use Redirect;
use Auth;

class PromotionController extends Controller
{
    protected $app;

    public function __construct () {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $promotion = new promotion;
        if($request->method('post')) {
            if ($request->input('name')) {
                $promotion = $promotion->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }
        $p_row = $promotion->paginate(50);

        if(!$request->ajax()){
            return view('promotion.list_promotion')->with(compact('p_row'));
        }else{
            return view('promotion.list_promotion_element')->with(compact('p_row'));
        }
    }


    public function create(Request $request)
    {
        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if($request->hasFile('photo')){
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 350;
            $uploader->height = 350;
            $fileNameToDatabase = $uploader->execute();
        }

        $promotion = new promotion;
        $promotion->name_th = $request->input('name_th');
        $promotion->name_en = $request->input('name_en');
        $promotion->detail_th = $request->input('detail_th');
        $promotion->detail_en = $request->input('detail_en');
        $promotion->discount = $request->input('discount');
        $promotion->photo = $fileNameToDatabase;
        $promotion->save();

        return redirect('/employee/list/promotion');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $promotion = promotion::find($request->input('id'));

        return view('promotion.view_promotion')->with(compact('promotion'));
    }


    public function edit(Request $request)
    {
        $promotion = promotion::find($request->input('id'));

        return view('promotion.edit_promotion')->with(compact('promotion'));
    }


    public function update(Request $request)
    {
        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            if(!empty($request->input('photo_'))){
                unlink(public_path($request->input('photo_')));
            }


            $promotion = promotion::find($request->input('id_pro'));
            $promotion->name_th = $request->input('name_th');
            $promotion->name_en = $request->input('name_en');
            $promotion->detail_th = $request->input('detail_th');
            $promotion->detail_en = $request->input('detail_en');
            $promotion->discount = $request->input('discount');
            $promotion->photo = $fileNameToDatabase;
            $promotion->save();
        }else{
            $promotion = promotion::find($request->input('id_pro'));
            $promotion->name_th = $request->input('name_th');
            $promotion->name_en = $request->input('name_en');
            $promotion->detail_th = $request->input('detail_th');
            $promotion->detail_en = $request->input('detail_en');
            $promotion->discount = $request->input('discount');
            $promotion->photo = $request->input('id_pro');
            $promotion->save();
        }


        return redirect('/employee/list/promotion');
    }


    public function destroy(Request $request)
    {
        $promotion = promotion::find($request->input('id'));
        $promotion->delete();
    }
}
