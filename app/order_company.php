<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_company extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'order_company';
    protected $fillable = ['code,user_id,date,company_id,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
