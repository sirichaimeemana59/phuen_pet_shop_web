<?php

namespace App\Http\Controllers\Product;

use App\stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageUploadAndResizer;
use App\product;
use App\user;
use Auth;
use App\unit;
use App\widen;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $product = new product;

        if($request->method('post')) {
            if ($request->input('name')) {
                $product = $product->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }

        $product = $product->paginate(50);

        $unit = new unit;
        $unit = $unit->get();

        $widen = new widen;
        $widen = $widen->get();

        if(!$request->ajax()){
            return view('product.list_product')->with(compact('product','unit','widen'));
        }else{
            return view('product.list_product_element')->with(compact('product','unit','widen'));
        }
    }


    public function create(Request $request)
    {

        $product = new product;
//        $product->price = $request->input('price');
        $product->unit_sale = $request->input('type_sale');
        $product->price_pack = $request->input('price_pack');
        $product->price_piece = $request->input('price_piece');
        $product->product_id = $request->input('product_id');
        //dd($product);
        $product->save();

        return redirect('/employee/product');
    }


    public function store(Request $request)
    {

    }


    public function show(Request $request)
    {
        $product = product::find($request->input('id'));

        return view ('product.view_product')->with(compact('product'));
    }


    public function edit($id = null)
    {
        $product = product::find($id);

        $unit = new unit;
        $unit = $unit->get();

        $widen = new widen;
        $widen = $widen->get();

        return view ('product.edit_product')->with(compact('product','unit','widen'));
    }


    public function update(Request $request)
    {
        $product = product::find($request->input('id'));

        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $product->name_th = $request->input('name_th');
            $product->amount = $request->input('amount');
            $product->price = $request->input('price');
            $product->user_id = null;
            $product->store_id = null;
            $product->unit_id = $request->input('unit_id');
            $product->photo = $fileNameToDatabase;
            $product->name_en = $request->input('name_en');
            $product->save();

        }else{
            $product->name_th = $request->input('name_th');
            $product->amount = $request->input('amount');
            $product->price = $request->input('price');
            $product->user_id = null;
            $product->store_id = null;
            $product->unit_id = $request->input('unit_id');
            $product->photo = $request->input('photo_');
            $product->name_en = $request->input('name_en');
            $product->save();
        }

        return redirect('/employee/product');
    }


    public function destroy(Request $request)
    {
        $product = product::find($request->input('id'));
        $product->delete();

        return redirect('/employee/product');
    }

    public function product(Request $request){

        $product = stock::find($request->input('id'));


        return response()->json( $product );
    }
}
