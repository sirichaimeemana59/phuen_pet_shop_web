<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class cat extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'category';
    protected $fillable = ['name_th,name_en,deleted_at,group_id'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_group(){
        return $this->hasOne('App\group','id','group_id');
    }

}
