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
//
//    public function join_unit ()
//    {
//        return $this->hasOne('App\unit','id','unit_id');
//    }

}
