<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class cat_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'cat_transection';
    protected $fillable = ['cat_id,name_th,name_en'];
    public $timestamps = true;

    public function join_cat(){
        return $this->hasOne('App\cat','id','group_id');
    }
}
