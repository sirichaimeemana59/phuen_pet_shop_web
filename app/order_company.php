<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_company extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'order_company';
    protected $fillable = ['code,user_id,date,company_id,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_province()
    {
        return $this->hasOne('App\province','id','province');
    }

    public function join_company()
    {
        return $this->hasOne('App\company','id','company_id');
    }

    public function join_dis()
    {
        return $this->hasOne('App\districts','id','districts');
    }

    public function join_sub()
    {
        return $this->hasOne('App\subdistricts','id','subdistricts');
    }

    public function join_unit_transection()
    {
        return $this->hasMany('App\unit_transection','product_id','code');
    }

    public function join_stock_log()
    {
        return $this->hasOne('App\stock_log','id','unit');
    }


}
