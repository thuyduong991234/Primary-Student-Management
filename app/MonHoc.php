<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    //
    protected $table = "tbmonhoc";
    public $timestamps = false;

    public function ChiTietMonHoc()
    {
    	return $this->hasMany('App\ChiTietMonHoc', 'mamonhoc', 'mamonhoc');
    }

    public function CTKQHocTap()
    {
    	return $this->hasMany('App\CTKQHocTap', 'mamonhoc', 'mamonhoc');
    }
}
