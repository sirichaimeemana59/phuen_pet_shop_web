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

    public function join_product()
    {
        return $this->hasOne('App\product','id','product_id');
    }

    public function join_stock()
    {
        return $this->hasOne('App\stock','product_id','id');
    }

    public function join_stock_log()
    {
        return $this->hasOne('App\stock_log','id','unit_sale');
    }

    public function join_unit_tran()
    {
        return $this->hasOne('App\unit_transection','id','unit_sale');
    }
}
