<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTKQHocTap extends Model
{
    //
    protected $table = "tbctkqhoctap";
    public $timestamps = false;

    public function RenderMaCTKQHocTap()
    {
        $ctkqhtcuoi = CTKQHocTap::orderBy('mactkqhoctap', 'desc')->first();
        $matieptheo = ((int)($ctkqhtcuoi->mactkqhoctap) + 1)."";
        return $matieptheo;
    }

    public function ChiTietLopHoc()
    {
    	return $this->belongsTo('App\ChiTietLopHoc', 'mactlophoc', 'mactlophoc');
    }

    public function MonHoc()
    {
    	return $this->belongsTo('App\MonHoc', 'mamonhoc', 'mamonhoc');
    }
}
