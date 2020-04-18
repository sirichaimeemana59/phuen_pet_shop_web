<?php

namespace App\Http\Controllers\News;

use App\pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use App\news;
use ImageUploadAndResizer;

class NewController extends Controller
{

    public function index(Request $request)
    {
        $new = new news;
        if($request->method('post')) {
            if ($request->input('name')) {
                $new = $new->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }
        $p_row = $new->paginate(50);

        if(!$request->ajax()){
            return view ('news.list_new')->with(compact('p_row'));
        }else{
            return view('news.list_new_element')->with(compact('p_row'));
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

        $new = new news;
        $new->photo = $fileNameToDatabase;
        $new->name_th = $request->input('name_th');
        $new->name_en = $request->input('name_en');
        $new->detail_th = $request->input('detail_th');
        $new->detail_en = $request->input('detail_en');
        $new->status = 0;
        $new->user_id = auth::user()->id;
        $new->save();

        return redirect('/customer/news');
    }


    public function store(Request $request)
    {

    }


    public function show(Request $request)
    {
        $new = news::find($request->input('id'));

        //dd($new);
        return view ('news.view_new')->with(compact('new'));
    }


    public function edit(Request $request)
    {
        $new = news::find($request->input('id'));

        //dd($new);
        return view ('news.edit_new')->with(compact('new'));
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

            unlink(public_path($request->input('photo_')));

            $new = news::find($request->input('id_new'));
            $new->photo = $fileNameToDatabase;
            $new->name_th = $request->input('name_th');
            $new->name_en = $request->input('name_en');
            $new->detail_th = $request->input('detail_th');
            $new->detail_en = $request->input('detail_en');
            $new->status = 0;
            $new->user_id = auth::user()->id;
            $new->save();
        }else{
            $new = news::find($request->input('id_new'));
            $new->photo = $request->input('photo_');
            $new->name_th = $request->input('name_th');
            $new->name_en = $request->input('name_en');
            $new->detail_th = $request->input('detail_th');
            $new->detail_en = $request->input('detail_en');
            $new->status = 0;
            $new->user_id = auth::user()->id;
            $new->save();
        }
        return redirect('/customer/news');
    }


    public function delete(Request $request)
    {
        $pet = news::find($request->input('id'));
        $pet->delete();
    }
}
