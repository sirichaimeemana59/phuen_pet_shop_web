<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class pet extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'pet';
    protected $fillable = ['user_id,name_th,name_en,photo,birthday,deleted_at,age,weight,height,detail'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_user()
    {
        return $this->hasOne('App\users_list','id','user_id');
    }

}

