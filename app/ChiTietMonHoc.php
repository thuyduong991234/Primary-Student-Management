<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietMonHoc extends Model
{
    //
    protected $table = "tbctmonhoc";
    public $timestamps = false;

    public function LopHoc()
    {
    	return $this->belongsTo('App\LopHoc', 'malophoc', 'malophoc');
    }

     public function MonHoc()
    {
    	return $this->belongsTo('App\MonHoc', 'mamonhoc', 'mamonhoc');
    }
}
