<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;


class sell_product extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'sell_product';
    protected $fillable = ['order_id,discount,net,total,money,user_id'];
    public $timestamps = true;

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function ($post) {
//            $post->{$post->getKeyName()} = (string) Str::uuid();
//        });
//    }
//
//    public function getIncrementing()
//    {
//        return false;
//    }
//
//    public function getKeyType()
//    {
//        return 'string';
//    }
}
