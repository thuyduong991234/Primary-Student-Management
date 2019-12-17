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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\ChiTietLopHoc;
use App\ChiTietMonHoc;
use App\HocSinh;
use App\LopHoc;
use App\MonHoc;
use App\CTKQHocTap;
use App\CTKQNangLucPhamChat;

class KetQuaHocTapExport implements FromView
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
        $hockyhientai =  $_COOKIE["hocki"];
        $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
                        ->where('namhoc', $namhochientai)
                        ->where('khoi', $this->khoi? $this->khoi:1)
                        ->get();

        $malophoc_first = LopHoc::select('malophoc')
                        ->where('namhoc', $namhochientai)
                        ->where('khoi', $this->khoi? $this->khoi:1)
                        ->first();

        $data_monhoc = ChiTietMonHoc::select('tbctmonhoc.malophoc', 'tbctmonhoc.mamonhoc', 'tbmonhoc.tenmonhoc')
                                    ->join('tbmonhoc', 'tbmonhoc.mamonhoc', '=', 'tbctmonhoc.mamonhoc')
                                    ->where('tbctmonhoc.malophoc', $this->lop ? $this->lop : ($malophoc_first? $malophoc_first->malophoc : ''))
                                    ->get();


         $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh', 'tbhocsinh.gioitinh', 'tbctlophoc.mactlophoc', 'tbctlophoc.lenlop', 'tbctlophoc.hoanthanhctlh', 'tbctlophoc.khenthuong')
                        ->join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
                        ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                        ->where('tblophoc.malophoc', $this->lop ? $this->lop : ($malophoc_first? $malophoc_first->malophoc : ''))
                        ->where('trangthaihocsinh', 'Đang học' )
                        ->get();

          $data_kqht = CTKQHocTap::join('tbctlophoc', 'tbctlophoc.mactlophoc','=','tbctkqhoctap.mactlophoc')
                        ->join('tbhocsinh', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
                        ->where('tbctlophoc.malophoc', $this->lop ? $this->lop : ($malophoc_first? $malophoc_first->malophoc : '') )
                        ->where('thoidiemdanhgia',  $this->thoidiemdanhgia ?  $this->thoidiemdanhgia : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ 2'))
                        ->get();

          $data_kqnlpc = CTKQNangLucPhamChat::join('tbctlophoc', 'tbctlophoc.mactlophoc','=','tbctkqnanglucphamchat.mactlophoc')
                        ->join('tbhocsinh', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
                        ->where('tbctlophoc.malophoc', $this->lop ? $this->lop : ($malophoc_first? $malophoc_first->malophoc : '') )
                        ->where('thoidiemdanhgia',  $this->thoidiemdanhgia ?  $this->thoidiemdanhgia : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
                        ->get();
      
         return view('Export.KetQuaHocTapExport', ['data_hocsinh' => $data_hocsinh, 'data_kqht' => $data_kqht, 'data_kqnlpc' => $data_kqnlpc, 'data_lophoc' => $data_lophoc,'khoi' => $this->khoi, 'lop' => $this->lop, 'thoidiemdanhgia' => $this->thoidiemdanhgia, 'hocky' => $hockyhientai, 'hocky' => $hockyhientai, 'listmonhoc' => $data_monhoc]);
	}
}