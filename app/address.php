<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;

use Illuminate\Database\Eloquent\Model;

class address extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'address';
    protected $fillable = ['province_id,dis_id,sub_id,post_code,name,tell,address'];
    public $timestamps = true;
}
