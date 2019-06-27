<?php

namespace App\Http\Controllers\Receipt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\order_walk;
use App\order_walk_transection;
use session;
use Redirect;
use Auth;

class ReceiptController extends Controller
{

    protected $app;

    public function __construct () {
        $this->middleware('admin');
    }

    public function index($id = null)
    {
        //dd($id);
        $order = order_walk::where('code_order',$id)->first();

        //dd($order);
        $order_trans = order_walk_transection::where('code_order',$id)->get();

        $customPaper = array(0,0,500.00,250.80);
        //$pdf = PDF::loadView('pdf.retourlabel', compact('retour','barcode'))->setPaper($customPaper, 'landscape');

        if(Session::get('locale') == 'th'){
            $title = 'ใบเสร็จรับเงิน';
        }else{
            $title = 'Receipt';
        }
        $data = [
                 'title' => $title,
                 'data' => $order,
                 'order_trans' => $order_trans
        ];
        $pdf = PDF::loadView('myPDF', $data)->setPaper($customPaper, 'landscape');

        return $pdf->stream();
    }


    public function create()
    {
        //
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


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
