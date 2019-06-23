<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageUploadAndResizer;

use Auth;
use app\user;
use App\Districts;
use App\Subdistricts;
use App\Province;
use App\company;
use App\profile;

class ProfileController extends Controller
{

    public function index()
    {
        $profile = profile::where('user_id',Auth::user()->id)->first();

        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        return view('user.profile')->with(compact('provinces','districts','subdistricts','profile'));
    }


    public function create(Request $request)
    {
        //dd($request->all());
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

        $profile = new profile;
        $profile->name_th = $request->input('name_th');
        $profile->name_en = $request->input('name_en');
        $profile->tell = $request->input('tell');
        $profile->povince_id =$request->input('province');
        $profile->distric_id =$request->input('district');
        $profile->sub_id = $request->input('sub_district');
        $profile->post_code = $request->input('post_code');
        $profile->birthday = $request->input('birthday');
        $profile->photo = $fileNameToDatabase;
        $profile->email = $request->input('email');
        $profile->user_id = Auth::user()->id;
        $profile->code = $randomString;
        $profile->address = $request->input('address');
        $profile->save();

        return redirect ('/customer/home');
     }


    public function store(Request $request)
    {
        if(!empty($request->hasfile('photo'))){
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

            $profile = profile::find($request->input('id'));
            $profile->name_th = $request->input('name_th');
            $profile->name_en = $request->input('name_en');
            $profile->tell = $request->input('tell');
            $profile->povince_id =$request->input('province');
            $profile->distric_id =$request->input('district');
            $profile->sub_id = $request->input('sub_district');
            $profile->post_code = $request->input('post_code');
            $profile->birthday = $request->input('birthday');
            $profile->photo = $fileNameToDatabase;
            $profile->email = $request->input('email');
            $profile->user_id = Auth::user()->id;
            $profile->code = $profile->code;
            $profile->address = $request->input('address');
            $profile->save();
        }else{

            $profile = profile::find($request->input('id'));
            $profile->name_th = $request->input('name_th');
            $profile->name_en = $request->input('name_en');
            $profile->tell = $request->input('tell');
            $profile->povince_id =$request->input('province');
            $profile->distric_id =$request->input('district');
            $profile->sub_id = $request->input('sub_district');
            $profile->post_code = $request->input('post_code');
            $profile->birthday = $request->input('birthday');
            $profile->photo = $request->input('photo_');
            $profile->email = $request->input('email');
            $profile->user_id = Auth::user()->id;
            $profile->code = $profile->code;
            $profile->address = $request->input('address');
            $profile->save();

        }
        return redirect ('/customer/home');
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
        //
    }


    public function destroy($id)
    {
        //
    }

    public function selectDistrict(){
        if(Request::isMethod('post')) {
            $d = new Districts;
            $d = $d->where('province_id',Request::get('id'));
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function Subdistrict(){
        if(Request::isMethod('post')){

            $s = new Subdistricts;
            $s = $s->where('district_id',Request::get('id'));
            $s = $s->get();
            return response()->json($s);
        }
    }


    public function selectDistrictEdit(){
        if(Request::isMethod('post')) {

            $property = company::find(Request::get('id'));

            //$p = Districts::find(Request::get('id'));

            $d = new Districts;
            $d = $d->where('province_id',$property['province']);
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function editSubDis(){

        $property = company::find(Request::get('id'));

        $s = new Subdistricts;
        $s = $s->where('district_id',$property['districts']);
        $s = $s->get();

        return response()->json($s);
    }

    public function zip_code(){
        if(Request::isMethod('post')){
            $z = new Subdistricts;
            $z = $z->where('id',Request::get('id'));
            $z = $z->get();

            return response()->json($z);
        }
    }
}