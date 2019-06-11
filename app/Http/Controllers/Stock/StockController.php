<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\company;
use vendor\project\StatusTest;
use App\unit;
use ImageUploadAndResizer;
use App\stock;
use App\unit_transection;

class StockController extends Controller
{

    public function index(Request $request)
    {
        $company = new stock;

        if($request->method('post')) {
            if ($request->input('name')) {
                $company = $company->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }

        $company = $company->paginate(50);

        $company_ = new company;
        $company_ = $company_->get();

        $unit = new unit;
        $unit = $unit->get();

        if($company_ != null){

            if(!$request->ajax()){
                return view('stock.list_stock')->with(compact('company','unit','company_'));
            }else{
                return view('stock.list_stock_element')->with(compact('company','unit','company_'));
                }
        }else{
            return redirect('/employee/product');
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

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $stock = new stock;
        $stock->name_th = $request->input('name_th');
        $stock->name_en = $request->input('name_en');
        $stock->photo = $fileNameToDatabase;
        $stock->code = $randomString;
        $stock->save();

        foreach ($request->input('data') as $t){
            if($t['name_th'] != null){
                $unit_t = new unit_transection;
                $unit_t->name_th = $t['name_th'];
                $unit_t->name_en = $t['name_en'];
                $unit_t->product_id = $randomString;
                $unit_t->amount = $t['amount'];
                $unit_t->price = $t['price'];
                $unit_t->save();
            }
        }


        return redirect('/employee/stock/product');
    }


    public function store(Request $request)
    {
        //
    }


    public function view(Request $request)
    {
        $stock = stock::find($request->input('id'));
        $unit_ = unit_transection::where('product_id',$stock->code)->get();

        return view ('stock.view_stock')->with(compact('stock','unit_'));
    }


    public function edit($id)
    {
        $stock = stock::find($id);
        $unit_ = unit_transection::where('product_id',$stock->code)->get();

        $company_ = new company;
        $company_ = $company_->get();

        $unit = new unit;
        $unit = $unit->get();

        return view ('stock.edit_stock')->with(compact('stock','unit','company_','unit_'));
    }


    public function update(Request $request)
    {
        $stock = stock::find($request->input('id'));

        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $stock->name_th = $request->input('name_th');
            $stock->name_en = $request->input('name_en');
            $stock->photo = $fileNameToDatabase;
            $stock->code = $request->input('code_');
            $stock->save();

        }else{
            $stock->name_th = $request->input('name_th');
            $stock->name_en = $request->input('name_en');
            $stock->photo = $request->input('photo_');
            $stock->code = $request->input('code_');
            $stock->save();
        }

        foreach ($request->input('data_') as $t){
            if($t['name_th'] != null){
                $unit_t = unit_transection::find($t['id_unit']);
                $unit_t->name_th = $t['name_th'];
                $unit_t->name_en = $t['name_en'];
                $unit_t->product_id = $request->input('code_');;
                $unit_t->amount = $t['amount'];
                $unit_t->price = $t['price'];
                $unit_t->save();
            }
        }

        if(!empty($request->input('data'))){
            foreach ($request->input('data') as $t){
                if($t['name_th'] != null){
                    $unit_t = new unit_transection;
                    $unit_t->name_th = $t['name_th'];
                    $unit_t->name_en = $t['name_en'];
                    $unit_t->product_id = $request->input('code_');;
                    $unit_t->amount = $t['amount'];
                    $unit_t->price = $t['price'];
                    $unit_t->save();
                }
            }
        }

        return redirect('/employee/stock/product');
    }


    public function destroy(Request $request)
    {
        $stock = stock::find($request->input('id'));
        $stock->delete();

        return redirect('/employee/stock/product');
    }

    public function delete_unit(Request $request){
        $unit_transection = unit_transection::find($request->input('id'));
        $unit_transection->delete();

    }

    public function stock(){
        $company_ = new company;
        $company_ = $company_->get();

        return view ('stock.add')->with(compact('company_'));
    }
}
