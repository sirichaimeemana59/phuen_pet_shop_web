<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class expenditure extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'expenditure';
    protected $fillable = ['id_order,order_code,total,user_id'];
    public $timestamps = true;

    public function join_order_company()
    {
        return $this->hasOne('App\order_company','id_order','id');
    }
}
