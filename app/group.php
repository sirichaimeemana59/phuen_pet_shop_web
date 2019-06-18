<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class group extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'group';
    protected $fillable = ['name_th,name_en,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
