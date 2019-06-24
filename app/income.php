<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;

class income extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'income';
    protected $fillable = ['user_id,income,date,status'];
    public $timestamps = true;
}
