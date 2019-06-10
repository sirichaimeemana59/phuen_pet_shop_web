<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class widen extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'widen';
    protected $fillable = ['stock_id,amount,widen_code'];

    public $timestamps = true;
    protected $softDelete = true;
}
