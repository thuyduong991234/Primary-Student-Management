<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTKQNangLucPhamChat extends Model
{
    //
    protected $table = "tbctkqnanglucphamchat";
    public $timestamps = false;

     public function RenderMaCTKQNangLucPhamChat()
    {
        $ctkqnlpccuoi = CTKQNangLucPhamChat::orderBy('mactkqnanglucphamchat', 'desc')->first();
        $matieptheo = ((int)($ctkqnlpccuoi->mactkqnanglucphamchat) + 1)."";
        return $matieptheo;
    }

    public function ChiTietLopHoc()
    {
    	return $this->belongsTo('App\ChiTietLopHoc', 'mactlophoc', 'mactlophoc');
    }

}
