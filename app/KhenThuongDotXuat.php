<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhenThuongDotXuat extends Model
{
    //
    protected $table = "tbkhenthuongdotxuat";
    public $timestamps = false;

    public function LopHoc()
    {
    	return $this->belongsTo('App\LopHoc', 'malophoc', 'malophoc');
    }

     public function HocSinh()
    {
    	return $this->belongsTo('App\HocSinh', 'mahocsinh', 'mahocsinh');
    }
}
