<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class know extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'know';
    protected $fillable = ['name_th,name_en,detail_th,detail_en,photo,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
