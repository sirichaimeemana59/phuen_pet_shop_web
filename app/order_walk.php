<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class order_walk extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'order_walk';
    protected $fillable = ['code_order,user_id,total,discount,vat,grand_total,money'];
    public $timestamps = true;

    public function join_order_transection()
    {
        return $this->hasMany('App\order_walk_transection','code_order','code_order');
    }



}
