<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class news extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'new';
    protected $fillable = ['photo,name_th,name_en,detail_th,detail_en,status,user_id,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
