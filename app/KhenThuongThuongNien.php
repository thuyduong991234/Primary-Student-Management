<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhenThuongThuongNien extends Model
{
    //
    protected $table = "tbkhenthuongthuongnien";
     protected $fillable = [
        'makt',
        'mahocsinh',
        'malophoc',
        'khenthuongcanam',
        'kyluatcanam',
        'songaynghicanam'];
    public $timestamps = false;

    public function LopHoc()
    {
        return $this->belongsTo('App\LopHoc', 'malophoc', 'malophoc');
    }

     public function HocSinh()
    {
        return $this->belongsTo('App\HocSinh', 'mahocsinh', 'mahocsinh');
    }
     public function RenderMakt()
    {

        $hocsinhcuoi = KhenThuongThuongNien::orderBy('makt', 'desc')->first();
        if($hocsinhcuoi)
            $matieptheo = ((int)($hocsinhcuoi->makt) + 1)."";
        else
            $matieptheo = "20190000";
        return $matieptheo;
    }
    
}
