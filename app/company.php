<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class company extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'company';
    protected $fillable = ['name_th,name_en,tex_id,tell,province,districts,subdistricts,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
