<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class stock extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'stock';
    protected $fillable = ['name_th,name_en,photo,deleted_at,code,amount'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_unit()
    {
        return $this->hasOne('App\unit','id','unit_id');
    }

    public function join_store()
    {
        return $this->hasOne('App\company','id','store_id');
    }

    public function join_unit_transection()
    {
        return $this->hasMany('App\unit_transection','product_id','code');
    }

    public function join_stock_log()
    {
        return $this->hasOne('App\stock_log','product_id','code');
    }
}
