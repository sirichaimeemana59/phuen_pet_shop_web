<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class widen_report extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'widen_report';
    protected $fillable = ['stock_id,amount,widen_code,widen_date'];

    public $timestamps = true;
    protected $softDelete = true;

    public function join_stock()
    {
        return $this->hasOne('App\stock','id','stock_id');
    }
}
