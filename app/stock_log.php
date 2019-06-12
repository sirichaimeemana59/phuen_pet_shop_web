<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class stock_log extends GeneralModel
{
//    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'stock_log';
    protected $fillable = ['name_th,name_en,product_id,amount'];
    public $timestamps = true;
//    protected $softDelete = true;

    public function join_unit()
    {
        return $this->hasOne('App\unit','id','unit_id');
    }

    public function join_store()
    {
        return $this->hasOne('App\company','id','store_id');
    }
}
