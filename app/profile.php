<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class profile extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'profile';
    protected $fillable = ['user_id,name_th,name_en,birthday,tell,address,photo,email,povince_id,distric_id,sub_id,post_code,code,color_top,color_left,color_content'];
    public $timestamps = true;
}
