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
    protected $fillable = ['province_id,dis_id,sub_id,post_code,name,tell,address,id_order,code_order'];
    public $timestamps = true;

    public function join_province()
    {
        return $this->hasOne('App\province','id','province_id');
    }

    public function join_Districts()
    {
        return $this->hasOne('App\Districts','id','dis_id');
    }

    public function join_Subdistricts()
    {
        return $this->hasOne('App\Subdistricts','id','sub_id');
    }
}
