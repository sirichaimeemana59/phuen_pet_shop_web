<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class Users extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = ['name,email'];
    public $timestamps = true;
    protected $softDelete = true;
}
