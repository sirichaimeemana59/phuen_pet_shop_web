<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class widden_product extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'widden_product';
    protected $fillable = ['code,user_id,date,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_widen_transection()
    {
        return $this->hasMany('App\widden__transection','code','code');
    }

    public function join_profile()
    {
        return $this->hasOne('App\profile','user_id','user_id');
    }

}
