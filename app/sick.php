<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class sick extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'sick';
    protected $fillable = ['name_th,name_en,deleted_at,detail_th,detail_en,code'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_sick_transection()
    {
        return $this->hasMany('App\sick_transection','sick_id','code');
    }

}
