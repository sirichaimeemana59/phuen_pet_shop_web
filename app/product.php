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
    protected $fillable = ['name_th,name_en,photo,unit_id,user_id,store_id,price,amount,deleted_at'];
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
//
//    public function join_unit ()
//    {
//        return $this->hasOne('App\unit','id','unit_id');
//    }

}
