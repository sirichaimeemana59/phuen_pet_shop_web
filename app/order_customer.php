<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_customer extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'order_customer';
    protected $fillable = ['order_code,user_id,total,discount,vat,grand_total,deleted_at,driver'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_order_tran(){
        return $this->hasMany('App\order_customer_transection','order_code','order_code');
    }

    public function join_bill_payment(){
        return $this->hasOne('App\bill_payment','order_id','id');
    }

}
