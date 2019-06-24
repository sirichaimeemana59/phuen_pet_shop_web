<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class bill_payment extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'bill_payment';
    protected $fillable = ['order_id,order_code,deleted_at,user_id,photo'];
    public $timestamps = true;
    protected $softDelete = true;
}
