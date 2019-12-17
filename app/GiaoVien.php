<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    //
    protected $table = "tbgiaovien";
    public $timestamps = false;

    public function LopHoc()
    {
    	return $this->belongsTo('App\LopHoc', 'magv', 'magv');
    }

    public function RenderMaGV()
    {
        $giaoviencuoi = GiaoVien::orderBy('magv', 'desc')->first();
        if($giaoviencuoi)
        {
            $matieptheo = ((int)($giaoviencuoi->magv) + 1)."";
        }
        else
        {
            $matieptheo = "20190000";
        }
        return $matieptheo;
    }
}
