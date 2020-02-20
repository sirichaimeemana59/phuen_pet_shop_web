<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use Redirect;
use DB;
use App\User;
use Session;
use App\profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        //dd('ddd');
        $profile = profile::where('user_id',Auth::user()->id)->first();

        //dd($profile);
        if(!empty($profile)){
            Session::put('color_left',$profile->color_left);
            Session::put('color_top',$profile->color_top);
            Session::put('color_content',$profile->color_content);
        }else{
            Session::put('color_left','#fafafa');
            Session::put('color_top','#fafafa');
            Session::put('color_content','#fafafa');
        }

        //dd(Session::get('color_left'));

        Session::put('locale','en');
        if( Auth::user()->role == 0 AND Auth::user()->status == 1){
            Redirect::to('/employee/home')->send();
        }elseif(Auth::user()->role == 1 AND Auth::user()->status == 1){
            Redirect::to('/customer/home')->send();
        }elseif(Auth::user()->role == 2 AND Auth::user()->status == 1){
            Redirect::to('/owner/home')->send();
        }elseif(Auth::user()->role == 3 AND Auth::user()->status == 1){
            Redirect::to('/employee/home')->send();
        }else{
            Redirect::to('/logout')->send();
        }
    }
}
