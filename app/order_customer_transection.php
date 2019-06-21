<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_customer_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'order_customer_transection';
    protected $fillable = ['order_code,product_id,price_product,unit_sale,amount,total_price'];
    public $timestamps = true;

    public function join_stock()
    {
        return $this->hasOne('App\stock','id','product_id');
    }

    public function join_product()
    {
        return $this->hasOne('App\product','id','product_id');
    }

    public function join_stock_log()
    {
        return $this->hasOne('App\stock_log','id','unit_sale');
    }

    public function join_unit_transection_all()
    {
        return $this->hasOne('App\unit_transection','id','unit_sale');
    }

    public function join_widen_trans()
    {
        return $this->hasOne('App\widden__transection','id_product_stock','product_id');
    }
}
