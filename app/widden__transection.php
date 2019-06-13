<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class widden__transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'widden_transection';
    protected $fillable = ['code,product_id,unit_widden,amount_widden'];
    public $timestamps = true;
    protected $softDelete = true;
}
