<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class sell_product_tranction extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'sell_product_tranction';
    protected $fillable = ['product_id,amount,order_id'];
    public $timestamps = true;
    protected $softDelete = true;

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
