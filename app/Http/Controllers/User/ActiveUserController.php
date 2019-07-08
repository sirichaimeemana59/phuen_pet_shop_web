<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\users_list;
use Illuminate\Support\Facades\Hash;

class ActiveUserController extends Controller
{

    public function index()
    {
        $user = new users_list;
        if(Request::method('post')) {
            if (Request::input('name')) {
                $user = $user->where('name', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('email', 'like', "%" . Request::input('name') . "%");
            }
        }
        $p_row = $user->OrderBy('status')->paginate(50);

        if(!Request::ajax()){
            return view ('user.list_user')->with(compact('p_row'));
        }else{
            return view('user.list_user_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        $user = users_list::find(Request::input('id'));

        return view('user.view_user')->with(compact('user'));
    }


    public function store()
    {
        $user = users_list::find(Request::input('id'));
        $user->role = Request::input('role');
        $user->status = 1;
        $user->save();
        return redirect('/approved/user');
    }


    public function show()
    {
        $user = users_list::find(Request::input('id'));

        return view('user.show_user')->with(compact('user'));
    }


    public function edit()
    {
        $user = users_list::find(Request::input('id'));

        return view('user.edit_user')->with(compact('user'));
    }


    public function update()
    {
        $user = users_list::find(Request::input('id'));
        $user->role = Request::input('role');
        $user->status = 1;
        $user->save();
        return redirect('/approved/user');
    }


    public function destroy()
    {
        $user = users_list::find(Request::input('id'));
        $user->delete();
    }

    public function register(){
        //dd(Request::all());
        $user = new users_list;
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->password = Hash::make(Request::input('password'));
        $user->save();

        return redirect('/');
    }
}
