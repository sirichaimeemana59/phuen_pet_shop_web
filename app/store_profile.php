<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class store_profile extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'store_profile';
    protected $fillable = ['name_th,name_en,tell,email,fax,photo_top,photo_center,photo_foot,address,photo_logo'];
    public $timestamps = true;
}
