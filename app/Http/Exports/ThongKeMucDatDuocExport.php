<?php

namespace App\Http\Exports;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\ChiTietLopHoc;
use App\LopHoc;
use App\MonHoc;
use App\CTKQHocTap;
use App\CTKQNangLucPhamChat;

class ThongKeMucDatDuocExport implements FromView
{

	public function __construct(string $khoi, string $lop, string $thoidiemdanhgia)
    {
        $this->khoi = $khoi;
        $this->lop = $lop;
        $this->thoidiemdanhgia = $thoidiemdanhgia;
    }
	public function view(): View 
	{
		$namhochientai =  $_COOKIE["namhoc"];
    $hockyhientai = $_COOKIE["hocki"];
    $listmonhoc = MonHoc::all();
    if($this->khoi == 'Tất cả')
    {
      $list_lophoc = LopHoc::select('malophoc', 'tenlophoc')
                        ->where('namhoc', $namhochientai)
                        ->orderBy('tenlophoc')
                        ->get();
    }
    else
    {
      $list_lophoc = LopHoc::select('malophoc', 'tenlophoc')
                        ->where('namhoc', $namhochientai)
                        ->where('khoi', $this->khoi? $this->khoi:1)
                        ->orderBy('tenlophoc')
                        ->get();
    }

    $data_lophoc = ChiTietLopHoc::select(DB::raw('count(tbctlophoc.mactlophoc) as siso, tblophoc.malophoc, tblophoc.tenlophoc, tblophoc.khoi'))
                        ->rightjoin('tblophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
                        ->where('namhoc', $namhochientai)
                        ->groupBy('tblophoc.malophoc', 'tblophoc.tenlophoc', 'tblophoc.khoi')
                        ->orderBy('tblophoc.tenlophoc')
                        ->get();

    $list_T = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
                  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
                  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
                  ->where('mucdatduoc', 'T')
                  ->where('tblophoc.namhoc', $namhochientai)
                  ->where('thoidiemdanhgia', $this->thoidiemdanhgia ? $this->thoidiemdanhgia : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
                  ->orderBy('tblophoc.tenlophoc')
                  ->get();

    $list_H = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
                  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
                  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
                  ->where('mucdatduoc', 'H')
                  ->where('tblophoc.namhoc', $namhochientai)
                  ->where('thoidiemdanhgia', $this->thoidiemdanhgia ? $this->thoidiemdanhgia : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
                  ->orderBy('tblophoc.tenlophoc')
                  ->get();

    $list_C = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
                  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
                  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
                  ->where('mucdatduoc', 'C')
                  ->where('tblophoc.namhoc', $namhochientai)
                  ->where('thoidiemdanhgia', $this->thoidiemdanhgia ? $this->thoidiemdanhgia : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
                  ->orderBy('tblophoc.tenlophoc')
                  ->get();

    return view('Export.ThongKeMucDatDuocExport', ['list_T' => $list_T, 'list_H' => $list_H,'list_C' => $list_C,'listmonhoc' => $listmonhoc, 'listlophoc'=>$list_lophoc, 'data_lophoc' => $data_lophoc, 'khoi' => $this->khoi, 'lop' => $this->lop, 'thoidiemdanhgia' => $this->thoidiemdanhgia, 'hocky' => $hockyhientai]);
	}
}