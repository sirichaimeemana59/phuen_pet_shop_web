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
    protected $fillable = ['code,product_id,unit_widden,amount_widden,id_product_stock'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_product()
    {
        return $this->hasOne('App\stock','id','id_product_stock');
    }

    public function join_unit()
    {
        return $this->hasOne('App\unit','id','unit_widden');
    }

    public function join_unit_transection()
    {
        return $this->hasOne('App\unit_transection','id','unit_widden');
    }
}
