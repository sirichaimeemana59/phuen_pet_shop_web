<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\company;
use vendor\project\StatusTest;
use App\unit;
use ImageUploadAndResizer;
use App\stock;

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

        $stock = new stock;
        $stock->name_th = $request->input('name_th');
        $stock->name_en = $request->input('name_en');
        $stock->store_id = $request->input('store_id');
        $stock->price = $request->input('price');
        $stock->unit_id = $request->input('unit_id');
        $stock->amount = $request->input('amount');
        $stock->photo = $fileNameToDatabase;
        $stock->psc = $request->input('psc');
        $stock->save();

        return redirect('/employee/stock/product');
    }


    public function store(Request $request)
    {
        //
    }


    public function view(Request $request)
    {
        $stock = stock::find($request->input('id'));

        return view ('stock.view_stock')->with(compact('stock'));
    }


    public function edit(Request $request)
    {
        $stock = stock::find($request->input('id'));

        $company = new company;
        $company = $company->get();

        $unit = new unit;
        $unit = $unit->get();

        return view ('stock.edit_stock')->with(compact('stock','unit','company'));
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
            $stock->store_id = $request->input('store_id');
            $stock->price = $request->input('price');
            $stock->unit_id = $request->input('unit_id');
            $stock->amount = $request->input('amount');
            $stock->photo = $fileNameToDatabase;
            $stock->psc = $request->input('psc');
            $stock->save();

        }else{
            $stock->name_th = $request->input('name_th');
            $stock->name_en = $request->input('name_en');
            $stock->store_id = $request->input('store_id');
            $stock->price = $request->input('price');
            $stock->unit_id = $request->input('unit_id');
            $stock->amount = $request->input('amount');
            $stock->photo = $request->input('photo_');
            $stock->psc = $request->input('psc');
            $stock->save();
        }

        return redirect('/employee/stock/product');
    }


    public function destroy(Request $request)
    {
        $stock = stock::find($request->input('id'));
        $stock->delete();

        return redirect('/employee/stock/product');
    }
}
