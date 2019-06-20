<?php

namespace App\Http\Controllers\Customer;

use App\unit_transection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pet;
use App\user;
use ImageUploadAndResizer;
use auth;

class PetController extends Controller
{
    public function index()
    {
        //
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

        $pet = new pet;
        $pet->name_th = $request->input('name_th');
        $pet->name_en = $request->input('name_en');
        $pet->weight = $request->input('weight');
        $pet->height = $request->input('height');
        $pet->birthday = $request->input('birthday');
        $pet->age = $request->input('age');
        $pet->detail = $request->input('detail');
        $pet->user_id = Auth::user()->id;
        $pet->photo = $fileNameToDatabase;
        $pet->save();

        return redirect('/customer/home');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $pet = pet::find($request->input('id'));

        return view('customer.view_pet')->with(compact('pet'));
    }


    public function edit(Request $request)
    {
        $pet = pet::find($request->input('id'));

        return view('customer.edit_pet')->with(compact('pet'));
    }


    public function update(Request $request)
    {
        $pet = pet::find($request->input('id_pet'));

        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 350;
                $uploader->height = 350;
                $fileNameToDatabase = $uploader->execute();
            }

            $pet->name_th = $request->input('name_th');
            $pet->name_en = $request->input('name_en');
            $pet->weight = $request->input('weight');
            $pet->height = $request->input('height');
            $pet->birthday = $request->input('birthday');
            $pet->age = $request->input('age');
            $pet->detail = $request->input('detail');
            $pet->user_id = Auth::user()->id;
            $pet->photo = $fileNameToDatabase;
            $pet->save();
        }else{
            $pet->name_th = $request->input('name_th');
            $pet->name_en = $request->input('name_en');
            $pet->weight = $request->input('weight');
            $pet->height = $request->input('height');
            $pet->birthday = $request->input('birthday');
            $pet->age = $request->input('age');
            $pet->detail = $request->input('detail');
            $pet->user_id = Auth::user()->id;
            $pet->photo = $request->input('photo_');
            $pet->save();
        }
        return redirect('/customer/home');
    }


    public function destroy(Request $request)
    {
        $pet = pet::find($request->input('id'));
        $pet->delete();
    }

}
