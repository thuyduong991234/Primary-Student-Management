<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLopHoc extends Model
{
    //
    protected $table = "tbctlophoc";
    public $timestamps = false;

    public function RenderMaCTLH()
    {
        $ctlophoccuoi = ChiTietLopHoc::orderBy('mactlophoc', 'desc')->first();
        if($ctlophoccuoi)
        {
            $matieptheo = ((int)($ctlophoccuoi->mactlophoc) + 1)."";
        }
        else
        {
            $matieptheo = "20190000";;
        }
        return $matieptheo;
    }

     public function LopHoc()
    {
    	return $this->belongsTo('App\LopHoc', 'malophoc', 'malophoc');
    }

    public function HocSinh()
    {
    	return $this->belongsTo('App\HocSinh', 'mahocsinh', 'mahocsinh');
    }

    public function CTKQHocTap()
    {
    	return $this->hasMany('App\CTKQHocTap', 'mactlophoc', 'mactlophoc');
    }

    public function CTKQNangLucPhamChat()
    {
    	return $this->hasMany('App\CTKQNangLucPhamChat', 'mactlophoc', 'mactlophoc');
    }
}
