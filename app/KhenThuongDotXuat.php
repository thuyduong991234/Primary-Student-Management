<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhenThuongDotXuat extends Model
{
    //
    protected $table = "tbkhenthuongdotxuat";
    protected $fillabe = ['maktdx','mahocsinh', 'malophoc', 'noidungkt'];
    public $timestamps = false;

    public function LopHoc()
    {
        return $this->belongsTo('App\LopHoc', 'malophoc', 'malophoc');
    }

     public function HocSinh()
    {
        return $this->belongsTo('App\HocSinh', 'mahocsinh', 'mahocsinh');
    }
    public function RenderKTDX()
    {
        $khenthuongcuoi = KhenThuongDotXuat::orderBy('maktdx', 'desc')->first();
        if($khenthuongcuoi)
        {
            $matieptheo = ((int)($khenthuongcuoi->maktdx) + 1)."";
        }
        else
        {
            $matieptheo = "20190000";
        }
        return $matieptheo;
    }
}
