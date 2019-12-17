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
use App\KhenThuongThuongNien;
use App\ChiTietLopHoc;
use App\KhenThuongDotXuat;
use App\LopHoc;

class ThongKeKhenThuongExport implements FromView
{

	public function __construct(string $khoi, string $lop)
    {
        $this->khoi = $khoi;
        $this->lop = $lop;
    }
	public function view(): View 
	{
		$namhochientai =  $_COOKIE["namhoc"];
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

    $list_khenthuong = LopHoc::select(DB::raw('count(*) as slkhenthuong, tblophoc.malophoc'))
                              ->leftjoin('tbctlophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
                              ->where('tblophoc.namhoc', $namhochientai)
                              ->where('tbctlophoc.khenthuong', 1)
                              ->groupBy('tblophoc.malophoc')
                              ->orderBy('tblophoc.tenlophoc')
                              ->get();
    $list_lenlop = LopHoc::select(DB::raw('count(*) as sllenlop, tblophoc.malophoc'))
                              ->leftjoin('tbctlophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
                              ->where('tblophoc.namhoc', $namhochientai)
                              ->where('tbctlophoc.lenlop', 1)
                              ->groupBy('tblophoc.malophoc')
                              ->orderBy('tblophoc.tenlophoc')
                              ->get();
    $list_hoanthanhctlh = LopHoc::select(DB::raw('count(*) as slhoanthanhctlh, tblophoc.malophoc'))
                              ->leftjoin('tbctlophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
                              ->where('tblophoc.namhoc', $namhochientai)
                              ->where('tbctlophoc.hoanthanhctlh', 1)
                              ->groupBy('tblophoc.malophoc')
                              ->orderBy('tblophoc.tenlophoc')
                              ->get();
    $list_luuban = LopHoc::select(DB::raw('count(*) as slluuban, tblophoc.malophoc'))
                              ->leftjoin('tbctlophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
                              ->where('tblophoc.namhoc', $namhochientai)
                              ->where('tbctlophoc.lenlop', 0)
                              ->groupBy('tblophoc.malophoc')
                              ->orderBy('tblophoc.tenlophoc')
                              ->get();

     $list_ktdx = LopHoc::select(DB::raw('count(*) as slktdx, tbkhenthuongdotxuat.malophoc'))
                              ->leftjoin('tbkhenthuongdotxuat', 'tbkhenthuongdotxuat.malophoc', '=', 'tblophoc.malophoc')
                              ->where('tblophoc.namhoc', $namhochientai)
                              ->groupBy('tbkhenthuongdotxuat.malophoc')
                              ->orderBy('tblophoc.tenlophoc')
                              ->get();
		return view('Export.ThongKeKTLLExport', ['list_khenthuong' => $list_khenthuong, 'listlophoc' => $list_lophoc, 'list_lenlop' => $list_lenlop,'list_hoanthanhctlh' => $list_hoanthanhctlh, 'list_luuban' => $list_luuban, 'list_ktdx' => $list_ktdx, 'data_lophoc' => $data_lophoc, 'khoi' => $this->khoi, 'lop' => $this->lop]);
	}
}