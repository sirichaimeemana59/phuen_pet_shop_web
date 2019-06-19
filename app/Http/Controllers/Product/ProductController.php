<?php

namespace App\Http\Controllers\Product;

use App\stock;
use App\stock_log;
use App\unit_transection;
use App\widden__transection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageUploadAndResizer;
use App\product;
use App\user;
use Auth;
use App\unit;
use App\widen;
use App\widden_product;


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

        $widen = new widden_product;
        $widen = $widen->get();

        if(!$request->ajax()){
            return view('product.list_product')->with(compact('product','unit','widen'));
        }else{
            return view('product.list_product_element')->with(compact('product','unit','widen'));
        }
    }


    public function create(Request $request)
    {

        //dd($request->input('data'));

        foreach ($request->input('data') as $t){
            $product = new product;
            $product->unit_sale = $t['unit_sale'];
            $product->price_piece = $t['price'];
            $product->product_id = $t['product_id'];
            $product->amount = $t['amount_widden'];
            $product->bar_code = $t['bar_code'];
            $product->save();
        }


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


    public function edit(Request $request)
    {
        $product = product::find($request->input('id'));

        $unit = new unit;
        $unit = $unit->get();

        $widen = new widden_product;
        $widen = $widen->get();

        $stock = stock::find($product->product_id);
        $stock_log = stock_log::where('product_id',$stock->code)->first();
        $uni_tran = unit_transection::where('product_id',$stock->code)->get();

        return view ('product.edit_product')->with(compact('product','unit','widen','stock','stock_log','uni_tran'));
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

    public function sale(Request $request){
        $widden_product = new widden_product;

        if($request->method('post')) {
            if ($request->input('name')) {
                $widden_product = $widden_product->where('code', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('code', 'like', "%" . $request->input('name') . "%");
            }
        }


        $widden_product = $widden_product->paginate(50);

        if(!$request->ajax()){
            return view('product.list_widen')->with(compact('widden_product'));
        }else{
            return view('product.list_widden_element')->with(compact('widden_product'));
        }
    }

    public function sale_search(Request $request){
        $widen =  widden_product::where('code',$request->input('name'))->first();
        $widen = $widen->toArray();

        $widentran =  widden__transection::where('code',$request->input('name'))->get();
        $widentran = $widentran->toArray();

        foreach ($widentran as $t){
            $product =  stock::find($t['id_product_stock']);

        }
        $product = $product->toArray();

        $data['widen'] = $widen;
        $data['widentran'] = $widentran;
        $data['product'] = $product;

        return response()->json($data);
    }

    public function add_product_form_widen($id = null){

        $widen = widden_product::find($id);

        $widen_transection = widden__transection::where('code',$widen->code)->get();

        return view ('product.add_product_form_widen')->with(compact('widen','widen_transection'));
    }
}
