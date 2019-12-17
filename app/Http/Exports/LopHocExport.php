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
use App\LopHoc;

class LopHocExport implements FromView
{
	public function view(): View 
	{
		$namhochientai =  $_COOKIE["namhoc"];
        $data = LopHoc::select('malophoc', 'tenlophoc', 'khoi', 'tbgiaovien.tengv')
                        ->leftjoin('tbgiaovien', 'tbgiaovien.magv', '=', 'tblophoc.magv')
                        ->where('namhoc', $namhochientai)
                        ->get();
		return view('Export.LopHocExport', [
			'data' => $data
		]);
	}
}