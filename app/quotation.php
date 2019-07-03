<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class quotation extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'quotation';
    protected $fillable = ['order_code,user_id,total,discount,vat,grand_total,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_order_tran(){
        return $this->hasMany('App\quotation_transection','order_code','order_code');
    }
}
