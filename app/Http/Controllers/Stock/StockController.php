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
use App\stock_log;
use PHPExcel_Style_Border;
use App\cat;
use App\cat_transection;
use Redirect;
use Auth;

class StockController extends Controller
{
    protected $app;

    public function __construct () {
        $this->middleware('admin');
    }

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
        //dd(count($request->input('data')));
        $amount = array();
        foreach ($request->input('data') as $key => $t){
            if($t['amount_unit'] != null) {
                $amount[] = $t['amount_unit'];
            }
        }

        //dd($amount);
        //if(count($amount) > 1){
            //($i=0;$i<count($amount);$i++){
                $total = $amount[count($amount)-1];
                    //}else{
            //for($i=0;$i<count($amount);$i++){
                //$total = $amount[0];
            //}
        //}

        //dd($total);

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

        $unit = new stock_log;
        $unit->name_th = $request->input('name_unit_th');
        $unit->name_en = $request->input('name_unit_en');
        $unit->product_id = $randomString;
        $unit->amount = $request->input('amount1');
        $unit->amount_unit = $request->input('amount2');
        $unit->save();

        $stock = new stock;
        $stock->name_th = $request->input('name_th');
        $stock->name_en = $request->input('name_en');
        $stock->photo = $fileNameToDatabase;
        $stock->code = $randomString;
        $stock->amount = $request->input('amount2');
        $stock->cat_id = $request->input('cat_id');
        $stock->group_id = $request->input('group_id');
        $stock->bar_code = $request->input('bar_code');
        $stock->company_id = $request->input('store_id');
        $stock->save();

        foreach ($request->input('data') as $t){
            if($t['name_th'] != null){
                $unit_t = new unit_transection;
                $unit_t->name_th = $t['name_th'];
                $unit_t->name_en = $t['name_en'];
                $unit_t->product_id = $randomString;
                $unit_t->amount = $t['amount'];
                $unit_t->amount_unit = $t['amount_unit'];
                $unit_t->price = null;
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

        $stock_log = stock_log::where('product_id',$stock->code)->first();

        return view ('stock.view_stock')->with(compact('stock','unit_','stock_log'));
    }


    public function edit($id)
    {
        $stock = stock::find($id);
        $unit_ = unit_transection::where('product_id',$stock->code)->get();

        $company_ = new company;
        $company_ = $company_->get();

        $unit = new unit;
        $unit = $unit->get();

        $stock_log = stock_log::where('product_id',$stock->code)->first();

        $cat = new cat;
        $cat = $cat->get();

        $cat_tran = new cat_transection;
        $cat_tran = $cat_tran->get();

//      dd($stock_log);

        return view ('stock.edit_stock')->with(compact('stock','unit','company_','unit_','stock_log','cat','cat_tran'));
    }


    public function update(Request $request)
    {
        $amount = array();
        $amount_ = array();
        $total = 0;
        $total_ = 0;


        if(!empty($request->input('data'))){
            foreach ($request->input('data') as $key => $t){
                if($t['amount_unit'] != null) {
                    $amount[] = $t['amount_unit'];
                }
            }
            if(count($amount) != 0 ){
                $total = $amount[count($amount)-1];
            }
        }



        foreach ($request->input('data_') as $key => $t){
            if($t['amount_unit'] != null) {
                $amount_[] = $t['amount_unit'];
            }
        }


        $total_ = $amount_[count($amount_)-1];

        if($total != 0 AND $total_ != 0){
            $total_all = $total * $total_;
        }elseif($total == 0 AND $total_ != 0){
            $total_all = $total_;
        }elseif($total != 0 AND $total_ == 0){
            $total_all = $total;
        }else{
            $total_all = 0;
        }


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
            $stock->amount = $request->input('amount2');
            $stock->cat_id = $request->input('cat_id');
            $stock->group_id = $request->input('group_id');
            $stock->bar_code = $request->input('bar_code');
            $stock->company_id = $request->input('store_id');
            $stock->save();

        }else{
            $stock->name_th = $request->input('name_th');
            $stock->name_en = $request->input('name_en');
            $stock->photo = $request->input('photo_');
            $stock->code = $request->input('code_');
            $stock->amount = $total_all;
            $stock->cat_id = $request->input('cat_id');
            $stock->group_id = $request->input('group_id');
            $stock->bar_code = $request->input('bar_code');
            $stock->company_id = $request->input('store_id');
            $stock->save();
        }

        if(!empty($request->input('data_'))){
            foreach ($request->input('data_') as $t){
                if($t['name_th'] != null){
                    $unit_t = unit_transection::find($t['id_unit']);
                    $unit_t->name_th = $t['name_th'];
                    $unit_t->name_en = $t['name_en'];
                    $unit_t->product_id = $request->input('code_');;
                    $unit_t->amount = $t['amount'];
                    $unit_t->price = null;
                    $unit_t->amount_unit = $t['amount_unit'];
                    $unit_t->save();
                }
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
                    $unit_t->price = null;
                    $unit_t->amount_unit = $t['amount_unit'];
                    $unit_t->save();
                }
            }
        }

        $unit = stock_log::find($request->input('stock_log'));
        $unit->name_th = $request->input('name_unit_th');
        $unit->name_en = $request->input('name_unit_en');
        $unit->product_id = $request->input('code_');
        $unit->amount = $request->input('amount1');
        $unit->amount_unit = $request->input('amount2');
        $unit->save();

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

        $store = new company;
        $store = $store->getCompany();

        $unit = new unit;
        $unit = $unit->get();

        $cat = new cat;
        $cat = $cat->get();

        $cat_tran = new cat_transection;
        $cat_tran = $cat_tran->get();

        return view ('stock.add')->with(compact('company_','unit','cat','cat_tran','store'));
    }

    public function select_unit_tran(Request $request){
        $cat = cat::find($request->input('id'));

        $cat_tran = cat_transection::where('cat_id',$cat->code)->get();

        return response()->json($cat_tran);
    }
}

