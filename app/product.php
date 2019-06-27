<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class product extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = ['price,unit_id,unit_sale,price_pack,price_piece,deleted_at,product_id'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_stock()
    {
        return $this->hasOne('App\stock','id','product_id');
    }

    public function join_stock_log()
    {
        return $this->hasOne('App\stock_log','id','unit_sale');
    }

    public function join_unit_transection_all()
    {
        return $this->hasOne('App\unit_transection','id','unit_sale');
    }

    public function join_unit_transection_all_()
    {
        return $this->hasMany('App\unit_transection','product_id','code');
    }

    public function join_widen_trans()
    {
        return $this->hasOne('App\widden__transection','id_product_stock','product_id');
    }


}
