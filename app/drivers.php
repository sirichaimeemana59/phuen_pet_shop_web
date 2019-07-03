<?php

namespace App;

use App\GeneralModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class drivers extends GeneralModel
{
    protected $table = 'drivers';
    public $timestamps = false;
    use SoftDeletes;

    public function getDriver()
    {
        /*$lang = session()->get('lang');
        $provinces = array(''=> trans('messages.AboutProp.province') );
        return $provinces += $this->orderBy('name_'.$lang, 'ASC')->lists('name_'.$lang,'code')->toArray();*/

        $lang = app()->getLocale();
        $provinces = $this->orderBy('name_'.$lang, 'ASC')->pluck('name_'.$lang,'id')->toArray();
        asort($provinces);
        $provinceFirst = array(''=> trans('messages.driver.driver'));
        $provincesAll = $provinceFirst + $provinces;
        return $provincesAll;
    }
}
