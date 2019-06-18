<?php

namespace App\Http\Controllers\Category;

use Request;
use App\Http\Controllers\Controller;
use App\cat;
use App\group;

class CategoryController extends Controller
{

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
        $cat = new cat;
        $cat->name_th = Request::input('name_th');
        $cat->name_en = Request::input('name_en');
        $cat->group_id = Request::input('group');
        $cat->save();

        return redirect('/employee/category/list');
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
            return redirect('/employee/category/list');
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


    public function edit()
    {
        $cat = cat::find(Request::input('id'));

        $group = new group;
        $group = $group->get();

        return view('cat.edit_cat')->with(compact('cat','group'));
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
        $cat->group_id = Request::input('group');
        $cat->save();

        return redirect('/employee/category/list');
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

        return redirect('/employee/category/list');
    }

    public function destroy_group()
    {
        $group = group::find(Request::input('id'));
        $group->delete();

        return redirect('/employee/group/list');
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
