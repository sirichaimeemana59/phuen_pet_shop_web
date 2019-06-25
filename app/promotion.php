<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class promotion extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'promotion';
    protected $fillable = ['name_th,name_en,discount,detail_th,detail_en,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
