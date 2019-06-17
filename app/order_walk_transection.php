<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class order_walk_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'order_walk_transection';
    protected $fillable = ['code_order,product_id,unit_sale,amount,price_unit,total_price'];
    public $timestamps = true;
}
