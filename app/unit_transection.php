<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class unit_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'unit_transection';
    protected $fillable = ['name_th,name_en,product_id,amount,price,amount_unit'];

    public $timestamps = true;
    protected $softDelete = true;

    public function join_stock()
    {
        return $this->hasOne('App\stock','id','stock_id');
    }
}
