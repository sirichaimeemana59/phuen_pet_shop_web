<?php

namespace App\Http\Controllers\Pet;

use App\unit_transection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pet;
use App\user;
use ImageUploadAndResizer;
use Excel;
use auth;

class PetController extends Controller
{

    public function index(Request $request)
    {
        $pet = new pet;

        if($request->method('post')) {
            if ($request->input('name')) {
                $pet = $pet->where('name_th', 'like', "%" . $request->input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . $request->input('name') . "%");
            }
        }

        $p_row = $pet->paginate(50);

        if(!$request->ajax()){
            return view('pet.list_pet')->with(compact('p_row'));
        }else{
            return view('pet.list_pet_element')->with(compact('p_row'));
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

        return redirect('/employee/pet/show_pet');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request)
    {
        $pet = pet::find($request->input('id'));

        return view('pet.view_pet')->with(compact('pet'));
    }


    public function edit(Request $request)
    {
        $pet = pet::find($request->input('id'));

        return view('pet.edit_pet')->with(compact('pet'));
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
            $pet->user_id = null;
            $pet->photo = $request->input('photo_');
            $pet->save();
        }
        return redirect('/employee/pet/show_pet');
    }


    public function destroy(Request $request)
    {
        $pet = pet::find($request->input('id'));
        $pet->delete();
    }

    public function report_excel()
    {
        $pet = new pet;
        $pet = $pet->get();

        return view('report.report_pet')->with(compact('pet'));


//        $filename = "รายงานใบเสนอราคาที่ออกจากระบบ";
//
//        Excel::create($filename, function ($excel) use ($filename, $pet) {
//            $excel->sheet("Quotation_Output", function ($sheet) use ($pet) {
//                $sheet->setWidth(array(
//                    'A' => 50,
//                    'B' => 20,
//                    'C' => 30,
//                    'D' => 30,
//                    'E' => 30,
//                ));
//                //$sheet->setBorder('A1', 'thin');
//                // $sheet->setBorder('A1:F10', 'thin');
//                //$sheet->setBorder('A1:E17', 'thin');
//                $sheet->loadView('report.report_pet_excel')->with(compact('pet','filename'));
//            });
//        })->download('xls');
    }
}
