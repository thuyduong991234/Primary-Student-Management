<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    //
    protected $table = "tblophoc";
    public $timestamps = false;

    public function RenderMaLH()
    {
        $lophoccuoi = LopHoc::orderBy('malophoc', 'desc')->first();
        if($lophoccuoi)
        {
             $matieptheo = ((int)($lophoccuoi->malophoc) + 1)."";
        }
        else
        {
            $matieptheo = "20190000";
        }
        return $matieptheo;
    }

    public function GiaoVien()
    {
    	return $this->hasOne('App\GiaoVien', 'magv', 'magv');
    }

    public function KhenThuongThuongNien()
    {
    	return $this->hasMany('App\KhenThuongThuongNien', 'malophoc', 'malophoc');
    }

    public function KhenThuongDotXuat()
    {
    	return $this->hasMany('App\KhenThuongDotXuat', 'malophoc', 'malophoc');
    }

    public function ChiTietMonHoc()
    {
    	return $this->hasMany('App\ChiTietMonHoc', 'malophoc', 'malophoc');
    }

    public function ChiTietLopHoc()
    {
    	return $this->hasMany('App\ChiTietLopHoc', 'malophoc', 'malophoc');
    }
}
