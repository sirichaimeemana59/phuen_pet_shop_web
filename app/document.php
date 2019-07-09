<?php

namespace App;

use App\GeneralModel;

class document extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'document';
    protected $fillable = ['detail'];
    public $timestamps = true;
}
