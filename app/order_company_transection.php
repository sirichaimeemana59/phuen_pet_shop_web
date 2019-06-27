<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\Model;

class order_company_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'order_company_transection';
    protected $fillable = ['code,product_id,name,amount,unit,unit_name'];
    public $timestamps = true;

    public function join_order_transection()
    {
        return $this->hasMany('App\order_company_transection','code','code');
    }

    public function join_unit_transection()
    {
        return $this->hasMany('App\unit_transection','product_id','code');
    }

    public function join_stock_log()
    {
        return $this->hasOne('App\stock_log','product_id','code');
    }

    public function join_stock()
    {
        return $this->hasOne('App\stock','id','product_id');
    }

}
