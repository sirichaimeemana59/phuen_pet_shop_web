<?php

namespace App\Http\Controllers\Product;

use Request;
use App\Http\Controllers\Controller;
use auth;
use app\user;
use App\store;
use App\Districts;
use App\Subdistricts;
use App\Province;
use App\company;
use Redirect;

class CompanystoreController extends Controller
{
    protected $app;

    public function __construct () {
        $this->middleware('admin');
    }

    public function index()
    {
        $store = new company;

        if(Request::method('post')) {
            if (Request::input('name')) {
                $store = $store->where('name_th', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . Request::input('name') . "%");
            }
        }

        $store = $store->paginate(50);

        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        if(!Request::ajax()){
            return view('company_store.list_company_store')->with(compact('store','provinces','districts','subdistricts'));
        }else{
            return view('company_store.list_company_store_element')->with(compact('store','provinces','districts','subdistricts'));
        }
    }


    public function create()
    {
        $store = new company;
        $store->tell = Request::input('tell');
        $store->name_th = Request::input('name_th');
        $store->name_en = Request::input('name_en');
        $store->tax_id = Request::input('tax_id');
        $store->email = Request::input('email');
        $store->province = Request::input('province');
        $store->districts = Request::input('district');
        $store->subdistricts = Request::input('sub_district');
        $store->post_code = Request::input('post_code');
        $store->save();

        return redirect('employee/company_store');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        $store = company::find(Request::input('id'));

        return view ('company_store.view_store')->with(compact('store','provinces','districts','subdistricts'));
    }


    public function edit($id = null)
    {
        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        $store = company::find($id);

        return view ('company_store.edit_store')->with(compact('store','provinces','districts','subdistricts'));
    }

    public function update()
    {
        $store = company::find(Request::input('id'));
        $store->tell = Request::input('tell');
        $store->name_th = Request::input('name_th');
        $store->name_en = Request::input('name_en');
        $store->tax_id = Request::input('tax_id');
        $store->email = Request::input('email');
        $store->province = Request::input('province');
        $store->districts = empty(Request::input('district'))?Request::input('dis'):Request::input('district');
        $store->subdistricts = empty(Request::input('sub_district'))?Request::input('subdis'):Request::input('sub_district');
        $store->post_code = Request::input('post_code');
        $store->save();
        //dd($store);

        return redirect('employee/company_store');
    }


    public function destroy()
    {
        $store = company::find(Request::input('id'));
        $store->delete();

        return redirect('employee/company_store');
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
