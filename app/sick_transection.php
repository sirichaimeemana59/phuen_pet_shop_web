<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class sick_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'sick_transection';
    protected $fillable = ['sick_id,sick_th,sick_en,detail_th,detail_en'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_sick()
    {
        return $this->hasOne('App\sick','code','sick_id');
    }
}
