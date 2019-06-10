<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class store extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'store';
    protected $fillable = ['tell,address,name,tell,address,tax_id,email,deleted_at'];
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
