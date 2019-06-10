<?php

namespace App;

use App\GeneralModel;
use Request;
use Auth;
use Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class company extends GeneralModel
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'company';
    protected $fillable = ['name_th,name_en,tax_id,tell,province,districts,subdistricts,deleted_at,email,post_code'];
    public $timestamps = true;
    protected $softDelete = true;

    public function join_province()
    {
        return $this->hasOne('App\province','id','province');
    }

    public function join_Districts()
    {
        return $this->hasOne('App\Districts','id','districts');
    }

    public function join_Subdistricts()
    {
        return $this->hasOne('App\Subdistricts','id','districts');
    }
}
