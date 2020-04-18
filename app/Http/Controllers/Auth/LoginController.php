<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Auth;
use Session;
use Request;
use App\users_list;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home/user';

    /**
     * Create a new controller instance.
     ** @return void
     */
    public function __construct()
    {
        //dd(Request::input('email'));
        $user= users_list::where('email',Request::input('email'))->first();
//dd(count($user));
        if(!empty($user->email) && $user->email != null){
           if($user->password == Request::input('password')){
               $this->middleware('guest', ['except' => 'getLogout']);
           }else{
               Auth::logout();
           }
        }else{
            Auth::logout();
        }


//dd($user);
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogout(){
        Auth::logout();
//        session_start();
//        session_destroy();
        return redirect('/');
    }
}
