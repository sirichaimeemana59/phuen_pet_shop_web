<?php

namespace App\Http\Controllers\Category;

use App\cat_transection;
use Request;
use App\Http\Controllers\Controller;
use App\cat;
use App\group;
use Redirect;
use Auth;

class CategoryController extends Controller
{
    protected $app;

    public function __construct () {
        $this->middleware('admin');
    }

    public function index()
    {
        $cat = new cat;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $cat = $cat->where('name_th', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . Request::input('name') . "%");
            }
        }

        $p_row = $cat->paginate(50);

        $group = new group;
        $group = $group->get();

        if(!Request::ajax()){
            return view('cat.list_cat')->with(compact('p_row','group'));
        }else{
            return view('cat.list_cat_element')->with(compact('p_row','group'));
        }
    }


    public function create()
    {
       // dd(Request::input('data'));
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $cat = new cat;
        $cat->name_th = Request::input('name_th');
        $cat->name_en = Request::input('name_en');
        $cat->code = $randomString;
        $cat->save();

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $cat_tran = new cat_transection;
                $cat_tran->cat_id = $randomString;
                $cat_tran->name_th = $t['name_th'];
                $cat_tran->name_en = $t['name_en'];
                $cat_tran->save();
            }
        }

        return redirect('/employee/category');
    }

    public function create_group()
    {
        $group = new group;
        $group->name_th = Request::input('name_th');
        $group->name_en = Request::input('name_en');
        $group->save();

        if(Request::input('go') == 2){
            return redirect('/employee/group/list');
        }else{
            return redirect('/employee/category');
        }


    }


    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $cat = cat::find(Request::input('id'));

        return view('cat.view_cat')->with(compact('cat'));
    }

    public function show_group()
    {
        $group = group::find(Request::input('id'));

        return view('group.view_group')->with(compact('group'));
    }


    public function edit($id = null)
    {
        $cat = cat::find($id);

        return view('cat.edit_cat')->with(compact('cat'));
    }

    public function edit_group()
    {
        $group = group::find(Request::input('id'));

        return view('group.edit_group')->with(compact('group'));
    }


    public function update()
    {
        $cat = cat::find(Request::input('id_cat'));
        $cat->name_th = Request::input('name_th');
        $cat->name_en = Request::input('name_en');
        $cat->code = $cat->code;
        $cat->save();

        foreach (Request::input('data_') as $t){
            $cat_tran =  cat_transection::find($t['id']);
            $cat_tran->cat_id = $cat->code;
            $cat_tran->name_th = $t['name_th'];
            $cat_tran->name_en = $t['name_en'];
            $cat_tran->save();
        }

        if(!empty(Request::input('data'))){
            foreach (Request::input('data') as $t){
                $cat_tran = new cat_transection;
                $cat_tran->cat_id = $cat->code;
                $cat_tran->name_th = $t['name_th'];
                $cat_tran->name_en = $t['name_en'];
                $cat_tran->save();
            }
        }


        return redirect('/employee/category');
    }

    public function update_group()
    {
        $group = group::find(Request::input('id_group'));
        $group->name_th = Request::input('name_th');
        $group->name_en = Request::input('name_en');
        $group->save();

        return redirect('/employee/group/list');
    }


    public function destroy()
    {
        $cat = cat::find(Request::input('id'));
        $cat->delete();

        return redirect('/employee/category');
    }

    public function destroy_group()
    {
        $group = group::find(Request::input('id'));
        $group->delete();

        return redirect('/employee/group/list');
    }

    public function delete_cat_tran()
    {
        $cat_tran = cat_transection::find(Request::input('id'));
        $cat_tran->delete();

        //return redirect('/employee/cat/edit/'.Request::input('ids'));
    }

    public function list_group(){
        $group = new group;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $group = $group->where('name_th', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . Request::input('name') . "%");
            }
        }

        $p_row = $group->paginate(50);


        if(!Request::ajax()){
            return view('group.list_group')->with(compact('p_row'));
        }else{
            return view('group.list_group_element')->with(compact('p_row'));
        }
    }
}
