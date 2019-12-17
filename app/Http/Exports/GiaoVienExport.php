<?php

namespace App\Http\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\GiaoVien;

class GiaoVienExport implements FromView
{
	public function view(): View 
	{
		return view('Export.GiaoVienExport', ['dsgv' => GiaoVien::all()
		]);
	}
}