<?php

namespace App\Http\Controllers\User;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use ImageUploadAndResizer;

use Auth;
use app\user;
use App\Districts;
use App\Subdistricts;
use App\Province;
use App\company;
use App\profile;
use Session;
use App\users_list;

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
        $profile->color_left = empty($request->input('color_left'))?"":$request->input('color_left');
        $profile->color_content = empty($request->input('color_content'))?"":$request->input('color_content');
        $profile->color_top = empty($request->input('color_top'))?"":$request->input('color_top');
        $profile->save();

        Session::put('color_left',empty($request->input('color_left'))?'#fafafa':$request->input('color_left'));
        Session::put('color_top',empty($request->input('color_top'))?'#fafafa':$request->input('color_top'));
        Session::put('color_content',empty($request->input('color_content'))?'#fafafa':$request->input('color_content'));


        if(!empty($request->input('pass_new'))){
            if($request->input('pass_new') == $request->input('pass_new_con')) {
                $user = users_list::find($request->get('user_id'));
                $user->password = Hash::make($request->input('pass_new'));
                $user->save();
                //dd($user);
            }
        }

        return redirect ('/user/create_profile');
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
            $profile->post_code = empty($request->input('post_code'))?$profile->post_code:$request->input('post_code');
            $profile->birthday = $request->input('birthday');
            $profile->photo = $fileNameToDatabase;
            $profile->email = $request->input('email');
            $profile->user_id = Auth::user()->id;
            $profile->code = $profile->code;
            $profile->address = $request->input('address');
            $profile->color_left = empty($request->input('color_left'))?$request->input('color_left_'):$request->input('color_left');
            $profile->color_content = empty($request->input('color_content'))?$request->input('color_content_'):$request->input('color_content');
            $profile->color_top = empty($request->input('color_top'))?$request->input('color_top_'):$request->input('color_top');
            $profile->save();

            if(!empty($request->input('pass_new'))){
                if($request->input('pass_new') == $request->input('pass_new_con')) {
                    $user = users_list::find($request->get('user_id'));
                    $user->password = Hash::make($request->input('pass_new'));
                    $user->save();
                    //dd($user);
                }
            }
        }else{

            $profile = profile::find($request->input('id'));
            $profile->name_th = $request->input('name_th');
            $profile->name_en = $request->input('name_en');
            $profile->tell = $request->input('tell');
            $profile->povince_id =$request->input('province');
            $profile->distric_id =$request->input('district');
            $profile->sub_id = $request->input('sub_district');
            $profile->post_code = empty($request->input('post_code'))?$profile->post_code:$request->input('post_code');
            $profile->birthday = $request->input('birthday');
            $profile->photo = $request->input('photo_');
            $profile->email = $request->input('email');
            $profile->user_id = Auth::user()->id;
            $profile->code = $profile->code;
            $profile->address = $request->input('address');
            $profile->color_left = empty($request->input('color_left'))?$request->input('color_left_'):$request->input('color_left');
            $profile->color_content = empty($request->input('color_content'))?$request->input('color_content_'):$request->input('color_content');
            $profile->color_top = empty($request->input('color_top'))?$request->input('color_top_'):$request->input('color_top');
            $profile->save();

            //dd($request->input('user_id'));
            if(!empty($request->input('pass_new'))){
                if($request->input('pass_new') == $request->input('pass_new_con')) {
                    $user = users_list::find($request->get('user_id'));
                    $user->password = Hash::make($request->input('pass_new'));
                    $user->save();
                    //dd($user);
                }
            }

        }

        Session::put('color_left',empty($request->input('color_left'))?$request->input('color_left_'):$request->input('color_left'));
        Session::put('color_top',empty($request->input('color_top'))?$request->input('color_top_'):$request->input('color_top'));
        Session::put('color_content',empty($request->input('color_content'))?$request->input('color_content_'):$request->input('color_content'));

        return redirect ('/user/create_profile');
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

    public function selectDistrict(Request $request){
        if($request->isMethod('post')) {
            $d = new Districts;
            $d = $d->where('province_id',$request->get('id'));
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function Subdistrict(Request $request){
        if($request->isMethod('post')){

            $s = new Subdistricts;
            $s = $s->where('district_id',$request->get('id'));
            $s = $s->get();
            return response()->json($s);
        }
    }


    public function selectDistrictEdit(Request $request){
        if($request->isMethod('post')) {

            $property = profile::find($request->get('id'));

            //dd($property);
            //$p = Districts::find(Request::get('id'));

            $d = new Districts;
            $d = $d->where('province_id',$property['povince_id']);
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function editSubDis(Request $request){

        $property = profile::find($request->get('id'));

        $s = new Subdistricts;
        $s = $s->where('district_id',$property['distric_id']);
        $s = $s->get();

        return response()->json($s);
    }

    public function zip_code(Request $request){
        if($request->isMethod('post')){
            $z = new Subdistricts;
            $z = $z->where('id',$request->get('id'));
            $z = $z->get();

            return response()->json($z);
        }
    }

    public function pass_now(Request $request){
        if($request->isMethod('post')) {
            $user = users_list::find($request->get('id'));
            return response()->json($user);
        }
    }

    public function pass(Request $request){
        if($request->isMethod('post')) {
            if($request->input('pass_new') == $request->input('pass_new_con')){
                $user = users_list::find($request->get('user_id'));
                $user->password =  Hash::make($request->input('pass_new'));
                $user->save();

                if( Auth::user()->role == 0 AND Auth::user()->status == 1){
                    return redirect('/employee/home');
                }elseif(Auth::user()->role == 1 AND Auth::user()->status == 1){
                    return redirect('/customer/home');
                }elseif(Auth::user()->role == 2 AND Auth::user()->status == 1){
                    return redirect('/owner/home');
                }elseif(Auth::user()->role == 3 AND Auth::user()->status == 1){
                    return redirect('/employee/home');
                }
            }else{
                if( Auth::user()->role == 0 AND Auth::user()->status == 1){
                    return redirect('/employee/home');
                }elseif(Auth::user()->role == 1 AND Auth::user()->status == 1){
                    return redirect('/customer/home');
                }elseif(Auth::user()->role == 2 AND Auth::user()->status == 1){
                    return redirect('/owner/home');
                }elseif(Auth::user()->role == 3 AND Auth::user()->status == 1){
                    return redirect('/employee/home');
                }
            }
        }
    }
}
