<?php

namespace App\Http\Controllers\Comment;

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

        $p_row = $comment->paginate(50);

        if(!$request->ajax()){
            return view('reply.list_comment')->with(compact('p_row'));
        }else{
            return view('reply.list_comment_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $comment = comment::find($request->input('id'));

        $reply = reply_comment::where('comment_id',$comment->id)->get();

        return view('reply.view_comment')->with(compact('comment','reply'));
    }


    public function edit(Request $request)
    {
        $comment = comment::find($request->input('id'));

        $reply = reply_comment::where('comment_id',$comment->id)->get();
        //dd($reply);
        return view('reply.edit_comment')->with(compact('comment','reply'));
    }


    public function reply(Request $request)
    {
        //dd($request->input('data1'));
        if(!empty($request->input('data1'))){
            foreach ($request->input('data1') as $t) {
                $reply_comment = reply_comment::find($t['id_re']);
                $reply_comment->reply = $t['reply'];
                $reply_comment->comment_id = $request->input('id_com');
                $reply_comment->user_id = auth::user()->id;
                $reply_comment->save();
            }
            //dd($reply_comment);
        }else{
            $reply_comment = new reply_comment;
            $reply_comment->reply = $request->input('reply');
            $reply_comment->comment_id = $request->input('id_com');
            $reply_comment->user_id = auth::user()->id;
            $reply_comment->save();
        }


        return redirect('/employee/list/comment');
    }


    public function destroy($id)
    {
        //
    }
}
