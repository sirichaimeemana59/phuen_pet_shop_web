<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class sale_good extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'sale_good';
    protected $fillable = ['amount,product_id,date,stock_id,status'];
    public $timestamps = true;
}
