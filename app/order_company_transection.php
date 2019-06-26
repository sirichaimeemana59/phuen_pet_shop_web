<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\Model;

class order_company_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'order_company_transection';
    protected $fillable = ['code,product_id,name,amount,unit'];
    public $timestamps = true;
}
