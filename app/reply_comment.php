<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class reply_comment extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'reply_comment';
    protected $fillable = ['comment_id,user_id,reply'];
    public $timestamps = true;

    public function join_user()
    {
        return $this->hasOne('App\users_list','id','user_id');
    }

}
