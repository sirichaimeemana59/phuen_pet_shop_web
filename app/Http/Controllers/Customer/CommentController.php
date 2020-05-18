<?php

namespace App\Http\Controllers\Customer;

use App\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\company;
use App\reply_comment;
use ImageUploadAndResizer;
use auth;

class CommentController extends Controller
{

    public function index(Request $request)
    {
        $comment = new comment;

        if($request->method('post')) {
            if ($request->input('name')) {
                $comment = $comment->where('comment', 'like', "%" . $request->input('name') . "%");
            }
        }

        $p_row = $comment->where('user_id',Auth::user()->id)->paginate(50);

        if(!$request->ajax()){
            return view('comment.list_comment')->with(compact('p_row'));
        }else{
            return view('comment.list_comment_element')->with(compact('p_row'));
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

        $comment = new comment;
        $comment->comment = $request->input('detail');
        $comment->user_id = Auth::user()->id;
        $comment->photo = $fileNameToDatabase;
        $comment->save();

        return redirect('/customer/add/comment');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $comment = comment::find($request->input('id'));
        $reply = reply_comment::where('comment_id',$comment->id)->get();

        return view('comment.view_comment')->with(compact('comment','reply'));
    }


    public function edit(Request $request)
    {
        $comment = comment::find($request->input('id'));
        $reply = reply_comment::where('comment_id',$comment->id)->get();

        return view('comment.edit_comment')->with(compact('comment','reply'));
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

//                unlink(public_path($request->input('photo_')));

            $comment = comment::find($request->input('id_com'));
            $comment->comment = $request->input('comment');
            $comment->user_id = Auth::user()->id;
            $comment->photo = $fileNameToDatabase;
            $comment->save();
        }else{
            $comment = comment::find($request->input('id_com'));
            $comment->comment = $request->input('comment');
            $comment->user_id = Auth::user()->id;
            $comment->photo = $request->input('photo_');
            $comment->save();
        }

        return redirect('/customer/add/comment');
    }


    public function destroy(Request $request)
    {
        $comment = comment::find($request->input('id'));
        $comment->delete();
    }
}
