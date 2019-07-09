<?php

namespace App\Http\Controllers\Document;

use Request;
use App\Http\Controllers\Controller;
use App\document;

class DocumentController extends Controller
{

    public function index()
    {
        $doc = new document;
        $doc = $doc->first();

        return view ('doc.add_doc')->with(compact('doc'));
    }


    public function create()
    {
        $doc = new document;
        $doc->detail = Request::input('detail');
        $doc->save();

        return redirect('/add/document');
    }


    public function store(Request $request)
    {
        //
    }


    public function print()
    {
        $doc = new document;
        $doc = $doc->first();

        return view ('doc.print')->with(compact('doc'));
    }


    public function edit($id)
    {
        //
    }


    public function update()
    {
        $doc = document::find(Request::input('id'));
        $doc->detail = Request::input('detail');
        $doc->save();

        return redirect('/add/document');
    }


    public function destroy($id)
    {
        //
    }
}
