<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    //
    protected $table = "tbhocsinh";
    protected $fillable = [
        'mahocsinh',
        'tenhocsinh',
        'ngaysinh',
        'gioitinh',
        'trangthaihocsinh',
        'dantoc',
        'quoctich',
        'tinh',
        'huyen',
        'xa',
        'noisinh',
        'choohientai',
        'sodt',
        'khuvuc',
        'loaikhuyettat',
        'doituongchinhsach',
        'mienhocphi',
        'giamhocphi',
        'doivien',
        'luubannamtruoc',
        'hotencha',
        'nghenghiepcha',
        'namsinhcha',
        'hotenme',
        'nghenghiepme',
        'namsinhme',
        'hotenngh',
        'nghenghiepngh',
        'namsinhngh'
    ];

    public $timestamps = false;

    public function KhenThuongThuongNien()
    {
    	return $this->hasMany('App\KhenThuongThuongNien', 'mahocsinh', 'mahocsinh');
    }

    public function KhenThuongDotXuat()
    {
    	return $this->hasMany('App\KhenThuongDotXuat', 'mahocsinh', 'mahocsinh');
    }

    public function ChiTietLopHoc()
    {
        return $this->hasMany('App\ChiTietLopHoc','mahocsinh','mahocsinh');
    }

    public function RenderMaHS()
    {
        $hocsinhcuoi = HocSinh::orderBy('mahocsinh', 'desc')->first();
        if($hocsinhcuoi)
        {
            $matieptheo = ((int)($hocsinhcuoi->mahocsinh) + 1)."";
        }
        else
        {
            $matieptheo = "20190000";
        }
        return $matieptheo;
    }
    
}
