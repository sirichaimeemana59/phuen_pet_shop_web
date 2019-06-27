<?php

namespace App;
use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'comment';
    protected $fillable = ['comment,user_id,photo,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_reply()
    {
        return $this->hasMany('App\reply_comment','comment_id','id');
    }
}
