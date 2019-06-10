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
    protected $fillable = ['name_th,name_en,store_id,price,amount,unit_id,photo'];
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
}
