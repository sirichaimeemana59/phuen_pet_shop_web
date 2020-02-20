<?php

namespace App;

use App\GeneralModel;

class test extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'comment';
    protected $fillable = ['comment,user_id,photo,deleted_at'];
    public $timestamps = true;
    protected $softDelete = true;
}
