<?php

namespace App\Http\Controllers\StoreProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\store_profile;
use ImageUploadAndResizer;
use Image;
use App\know;

class StoreProfileController extends Controller
{

    public function index()
    {
        $profile = new store_profile;
        $profile = $profile->first();

        return view('store_profile.profile')->with(compact('profile'));
    }


    public function create(Request $request)
    {
//        if($request->hasFile('photo_top')){
//            $originalImage_top= $request->file('photo_top');
//            $thumbnailImage_top = Image::make($originalImage_top);
//            $originalPath_top = public_path().'/images/';
//            $thumbnailImage_top->save($originalPath_top.time().$originalImage_top->getClientOriginalName());
//        }
//
//        if($request->hasFile('photo_center')){
//            $originalImage_center= $request->file('photo_center');
//            $thumbnailImage_center = Image::make($originalImage_center);
//            $originalPath_center = public_path().'/images/';
//            $thumbnailImage_center->save($originalPath_center.time().$originalImage_center->getClientOriginalName());
//        }
//
//        if($request->hasFile('photo_foot')){
//            $originalImage_foot= $request->file('photo_foot');
//            $thumbnailImage_foot = Image::make($originalImage_foot);
//            $originalPath_foot = public_path().'/images/';
//            $thumbnailImage_foot->save($originalPath_foot.time().$originalImage_foot->getClientOriginalName());
//        }

        $fileNameToDatabase_top = '//via.placeholder.com/1920x800';
        if($request->hasFile('photo_top')){
            $uploader_top = new ImageUploadAndResizer($request->file('photo_top', '/images/photo'));
            $uploader_top->width = 1920;
            $uploader_top->height = 800;
            $fileNameToDatabase_top = $uploader_top->execute();
        }
        $fileNameToDatabase_center = '//via.placeholder.com/1920x290';
        if($request->hasFile('photo_center')){
            $uploader_center = new ImageUploadAndResizer($request->file('photo_center', '/images/photo'));
            $uploader_center->width = 1920;
            $uploader_center->height = 290;
            $fileNameToDatabase_center = $uploader_center->execute();
        }
        $fileNameToDatabase_foot = '//via.placeholder.com/1920x450';
        if($request->hasFile('photo_foot')){
            $uploader_foot = new ImageUploadAndResizer($request->file('photo_foot', '/images/photo'));
            $uploader_foot->width = 1920;
            $uploader_foot->height = 450;
            $fileNameToDatabase_foot = $uploader_foot->execute();
        }


        $profile = new store_profile;
        $profile->name_th = $request->input('name_th');
        $profile->name_en = $request->input('name_en');
        $profile->tell = $request->input('tell');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        $profile->photo_top = $fileNameToDatabase_top;
        $profile->photo_center = $fileNameToDatabase_center;
        $profile->photo_foot = $fileNameToDatabase_foot;
        $profile->save();

        //dd($profile);

        return redirect('/employee/store_profile');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        if(!empty($request->hasFile('photo_top'))){
            $fileNameToDatabase_top = '//via.placeholder.com/1920x800';
            if($request->hasFile('photo_top')){
                $uploader_top = new ImageUploadAndResizer($request->file('photo_top', '/images/photo'));
                $uploader_top->width = 1920;
                $uploader_top->height = 800;
                $fileNameToDatabase_top = $uploader_top->execute();
            }
        }

        if(!empty($request->hasFile('photo_center'))){
            $fileNameToDatabase_center = '//via.placeholder.com/1920x290';
            if($request->hasFile('photo_center')){
                $uploader_center = new ImageUploadAndResizer($request->file('photo_center', '/images/photo'));
                $uploader_center->width = 1920;
                $uploader_center->height = 290;
                $fileNameToDatabase_center = $uploader_center->execute();
            }
        }

        if(!empty($request->hasFile('photo_foot'))){
            $fileNameToDatabase_foot = '//via.placeholder.com/1920x450';
            if($request->hasFile('photo_foot')){
                $uploader_foot = new ImageUploadAndResizer($request->file('photo_foot', '/images/photo'));
                $uploader_foot->width = 1920;
                $uploader_foot->height = 450;
                $fileNameToDatabase_foot = $uploader_foot->execute();
            }
        }


        $profile = store_profile::find($request->input('id'));
        $profile->name_th = $request->input('name_th');
        $profile->name_en = $request->input('name_en');
        $profile->tell = $request->input('tell');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        $profile->photo_top = empty($fileNameToDatabase_top)?$request->input('photo_top_'):$fileNameToDatabase_top;
        $profile->photo_center = empty($fileNameToDatabase_center)?$request->input('photo_center_'):$fileNameToDatabase_center;
        $profile->photo_foot = empty($fileNameToDatabase_foot)?$request->input('photo_foot_'):$fileNameToDatabase_foot;
        $profile->save();

        //dd($profile);

        return redirect('/employee/store_profile');
    }


    public function destroy($id)
    {
        //
    }

    public function list_know(Request $request){
        $know = new know;

        if($request->method('post')) {
            if ($request->input('name')) {
                $know = $know->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }

        $p_row = $know->paginate(50);

        if(!$request->ajax()){
            return view('know.list_know')->with(compact('p_row'));
        }else{
            return view('know.list_know_element')->with(compact('p_row'));
        }
    }

    public function add(Request $request){
        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if($request->hasFile('photo')){
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 350;
            $uploader->height = 350;
            $fileNameToDatabase = $uploader->execute();
        }

        $know = new know;
        $know->name_th = $request->input('name_th');
        $know->name_en = $request->input('name_en');
        $know->detail_th = $request->input('detail_th');
        $know->detail_en = $request->input('detail_en');
        $know->photo = $fileNameToDatabase;
        $know->save();

        return redirect('/employee/list/know');
    }

    public function view(Request $request){
        $know =  know::find($request->input('id'));

        return view('know.view_know')->with(compact('know'));
    }

    public function edit_know(Request $request){
        $know =  know::find($request->input('id'));

        return view('know.edit_know')->with(compact('know'));
    }

    public function update_know(Request $request){

        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $know =  know::find($request->input('id_pet'));
            $know->name_th = $request->input('name_th');
            $know->name_en = $request->input('name_en');
            $know->detail_th = $request->input('detail_th');
            $know->detail_en = $request->input('detail_en');
            $know->photo = $fileNameToDatabase;
            $know->save();
        }else{
            $know =  know::find($request->input('id_pet'));
            $know->name_th = $request->input('name_th');
            $know->name_en = $request->input('name_en');
            $know->detail_th = $request->input('detail_th');
            $know->detail_en = $request->input('detail_en');
            $know->photo = $request->input('photo_');
            $know->save();
        }
        return redirect('/employee/list/know');

    }

    public function delete(Request $request){
        $know =  know::find($request->input('id'));
        $know->delete();
    }
}
