<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhenThuongThuongNien extends Model
{
    //
    protected $table = "tbkhenthuongthuongnien";
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
