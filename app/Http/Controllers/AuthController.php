<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use routes\web;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\HocSinh;
use App\GiaoVien;
use App\LopHoc;
use App\MonHoc;
use App\ChiTietMonHoc;
use App\ChiTietLopHoc;
use App\CTKQHocTap;
use App\CTKQNangLucPhamChat;
use App\KhenThuongDotXuat;
use App\KhenThuongThuongNien;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Exports\GiaoVienExport;
use App\Http\Exports\LopHocExport;
use App\Http\Exports\ThongKeKhenThuongExport;
use App\Http\Exports\ThongKeDiemMonHocExport;
use App\Http\Exports\ThongKeMucDatDuocExport;
use App\Http\Exports\ThongKeNLPCExport;
use App\Http\Exports\KetQuaHocTapExport;

class AuthController extends Controller
{
    //
  public function readBieuMau() 
  {
     //$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('bieumau.xls');

    $inputFileType = 'Xls';
    $inputFileName = 'bieumau.xls';

    /**  Create a new Reader of the type defined in $inputFileType  **/
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    /**  Advise the Reader of which WorkSheets we want to load  **/
    $reader->setReadDataOnly(true);

    /**  Load $inputFileName to a Spreadsheet Object  **/
    //$dantoc = $reader->setLoadSheetsOnly('DAN_TOC')->load($inputFileName);

    $data = $reader->load($inputFileName);

    $bieumau = new \stdClass();

    $bieumau->dantoc = $data->getSheet(3)->toArray(null, true, true, true);
    $bieumau->quoctich = $data->getSheet(9)->toArray(null, true, true, true);
    $bieumau->tinh = $data->getSheet(7)->toArray(null, true, true, true);
    $bieumau->huyen = $data->getSheet(8)->toArray(null, true, true, true);
    $bieumau->khuyettat = $data->getSheet(6)->toArray(null, true, true, true);
    $bieumau->cs = $data->getSheet(11)->toArray(null, true, true, true);
    return $bieumau;
  }



  public function login(Request $req)
  {
    $giaovien = GiaoVien::where('taikhoan', $req['taikhoan'])->get();
    $flag = 0;
    $user = new \stdClass();

    foreach ($giaovien as $gv) {
      if (Hash::check($req['matkhau'], $gv->matkhau)) 
      {
        $flag = 1;
        $user->magv = $gv->magv;
        $user->tengv = $gv->tengv;
        $user->chucvu = $gv->nhomchucvu;
        $user->taikhoan = $gv->taikhoan;
        break;
      }
    }
    if($flag == 1)
    {
      //echo $flag;
      //save session
      Session::put('giaovien', $user);
      return redirect('/');
    }
    else
    {
      //echo $flag;
      return redirect('DangNhap')->with('Thất bại', 'Tài khoản hoặc mật khẩu không tồn tại!');
    }
  }

  public function logout()
  {
    Session::forget('giaovien');
    return redirect('DangNhap');
  }


public function ChonNamHoc(Request $req) {
 return redirect('/');
}

public function getDanhSachHocSinh(Request $request)
{   
  $namhochientai =  $_COOKIE["namhoc"];
  $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->orderBy('tenlophoc')
  ->get();

  $malophoc_first = LopHoc::select('malophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->first();
  if($request['trangthai'])
  {
    $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
    ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
    ->where('trangthaihocsinh', $request['trangthai'])
    ->get();
  }
  else
  {
    $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
    ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
    ->get();
  }

  //bieu mau
  $bieumau = $this->readBieuMau();

  return view('HoSoHocSinh', ['data' => $data_hocsinh, 'data_lophoc' => $data_lophoc,'khoi' => $request['khoi'], 'lop' => $request['lop'], 'trangthai' => $request['trangthai'], 'bieumau' => $bieumau]);
}

public function getXoaHS(Request $request)
{
  if($request->ajax())
  {

    $data = $request->input('list');

    foreach ($data as $mahs) 
    {
     HocSinh::where('mahocsinh',$mahs)->delete();
   }
   return response()->json('Xóa hồ sơ học sinh thành công!',200);
 }
}

public function ghiHS(Request $request)
{
  $hocsinh = new HocSinh();
  $mamoi = $hocsinh->RenderMaHS();
  if($request->ajax())
  {
    $data = $request->hocsinh;
    $validate = Validator::make($data,[
      'tenhocsinh' => 'required',
      'ngaysinh' => 'required'
    ], [
      'tenhocsinh.required' => 'Vui lòng điền họ và tên học sinh.',
      'ngaysinh.required' => 'Vui lòng điền ngày sinh của học sinh.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
     $hocsinhmoi = new HocSinh();
     $hocsinhmoi->mahocsinh = $mamoi;
     $hocsinhmoi->tenhocsinh = $data['tenhocsinh'];
     $hocsinhmoi->ngaysinh = date("Y/m/d", strtotime($data['ngaysinh']));
     $hocsinhmoi->gioitinh= $data['gioitinh'];
     $hocsinhmoi->trangthaihocsinh= $data['trangthaihocsinh'];
     $hocsinhmoi->dantoc= $data['dantoc'];
     $hocsinhmoi->quoctich= $data['quoctich'];
     $hocsinhmoi->tinh= $data['tinh'];
     $hocsinhmoi->huyen= $data['huyen'];
     $hocsinhmoi->xa= $data['xa'];
     $hocsinhmoi->noisinh= $data['noisinh'];
     $hocsinhmoi->choohientai= $data['choohientai'];
     $hocsinhmoi->sodt= $data['sodt'];
     $hocsinhmoi->khuvuc= $data['khuvuc'];
     $hocsinhmoi->loaikhuyettat= $data['loaikhuyettat'] == "Không"? "" : $data['loaikhuyettat'];
     $hocsinhmoi->doituongchinhsach   = $data['doituongchinhsach'] == "Không"? "" : $data['doituongchinhsach'];         
     $hocsinhmoi->mienhocphi= $data['mienhocphi'] == "true"? 1 : 0;
     $hocsinhmoi->giamhocphi= $data['giamhocphi'] == "true"? 1 : 0;
     $hocsinhmoi->doivien= $data['doivien'] == "true"? 1 : 0;
     $hocsinhmoi->luubannamtruoc= $data['luubannamtruoc'] == "true"? 1 : 0;
     $hocsinhmoi->hotencha= $data['hotencha'];
     $hocsinhmoi->nghenghiepcha= $data['nghenghiepcha'];
     $hocsinhmoi->namsinhcha= $data['namsinhcha'];
     $hocsinhmoi->hotenme= $data['hotenme'];
     $hocsinhmoi->nghenghiepme= $data['nghenghiepme'];
     $hocsinhmoi->namsinhme= $data['namsinhme'];
     $hocsinhmoi->hotenngh= $data['hotenngh'];
     $hocsinhmoi->nghenghiepngh= $data['nghenghiepngh'];
     $hocsinhmoi->namsinhngh= $data['namsinhngh'];

     $hocsinhmoi->save();

     $newctlophoc = new ChiTietLopHoc();
     $newctlophoc->mactlophoc = $newctlophoc->RenderMaCTLH();
     $newctlophoc->malophoc = $data['malophoc'];
     $newctlophoc->mahocsinh = $mamoi;
     $newctlophoc->lenlop=0;
     $newctlophoc->hoanthanhctlh=0;
     $newctlophoc->khenthuong=0;

     $newctlophoc->save();

     return response()->json( "Ghi hồ sơ học sinh thành công!",200);
   }

 }

}

public function suaHS(Request $request)
{
  if($request->ajax())
  {
    $data = $request->hocsinh;
    $validate = Validator::make($data,[
      'tenhocsinh' => 'required',
      'ngaysinh' => 'required'
    ], [
      'tenhocsinh.required' => 'Vui lòng điền họ và tên học sinh.',
      'ngaysinh.required' => 'Vui lòng điền ngày sinh của học sinh.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
      HocSinh::where('mahocsinh',$data['mahocsinh'])->update([
        'tenhocsinh' => $data['tenhocsinh'],
        'ngaysinh' => date("Y/m/d", strtotime($data['ngaysinh'])),
        'gioitinh'=> $data['gioitinh'],
        'trangthaihocsinh'=> $data['trangthaihocsinh'],
        'dantoc'=> $data['dantoc'],
        'quoctich'=> $data['quoctich'],
        'tinh'=> $data['tinh'],
        'huyen'=>$data['huyen'],
        'xa'=> $data['xa'],
        'noisinh'=> $data['noisinh'],
        'choohientai'=> $data['choohientai'],
        'sodt'=> $data['sodt'],
        'khuvuc'=> $data['khuvuc'],
        'loaikhuyettat'=> $data['loaikhuyettat'] == "Không"? "" : $data['loaikhuyettat'],
        'doituongchinhsach' => $data['doituongchinhsach'] == "Không"? "" : $data['doituongchinhsach'],         
        'mienhocphi'=> $data['mienhocphi'] == "true"? 1 : 0,
        'giamhocphi'=> $data['giamhocphi'] == "true"? 1 : 0,
        'doivien'=> $data['doivien'] == "true"? 1 : 0,
        'luubannamtruoc'=> $data['luubannamtruoc'] == "true"? 1 : 0,
        'hotencha'=> $data['hotencha'],
        'nghenghiepcha'=> $data['nghenghiepcha'],
        'namsinhcha'=> $data['namsinhcha'],
        'hotenme'=> $data['hotenme'],
        'nghenghiepme'=> $data['nghenghiepme'],
        'namsinhme'=> $data['namsinhme'],
        'hotenngh'=> $data['hotenngh'],
        'nghenghiepngh'=> $data['nghenghiepngh'],
        'namsinhngh'=> $data['namsinhngh'],
      ]);

      return response()->json("Sửa hồ sơ học sinh thành công!",200);
    }

  }
}

public function getDanhSachGiaoVien(Request $request)
{
  $listgv = GiaoVien::all();
  if($request['magiaovien'])
  {
    $data = GiaoVien::where('magv', $request['magiaovien'])->get();
  }
  else
  {
    $data = GiaoVien::all();
  }

  $bieumau = $this->readBieuMau();

  return view('HoSoGiaoVien', ['data' => $data, 'listgv' =>$listgv, 'magiaovien' => $request['magiaovien'], 'bieumau' => $bieumau]);
}

public function ghiGV(Request $request)
{
  $giaovien = new GiaoVien();
  $mamoi = $giaovien->RenderMaGV();
  if($request->ajax())
  {
    $data = $request->giaovien;
    $validate = Validator::make($data,[
      'tengiaovien' => 'required',
      'ngaysinh' => 'required',
      'cmnd' => 'required',
      'taikhoan' => 'required',
      'matkhau' => 'required'
    ], [
      'tengiaovien.required' => 'Vui lòng điền họ và tên giáo viên.',
      'ngaysinh.required' => 'Vui lòng điền ngày sinh của giáo viên.',
      'cmnd.required' => 'Vui lòng điền CMND/TCC của giáo viên.',
      'taikhoan' => 'Vui lòng điền tên tài khoản của giáo viên.',
      'matkhau' => 'Vui lòng điền mật khẩu.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
     $giaovienmoi = new GiaoVien();
     $giaovienmoi->magv = $mamoi;
     $giaovienmoi->tengv = $data['tengiaovien'];
     $giaovienmoi->ngaysinh = date("Y/m/d", strtotime($data['ngaysinh']));
     $giaovienmoi->gioitinh= $data['gioitinh'];
     $giaovienmoi->trangthaicanbo= $data['trangthaicanbo'];
     $giaovienmoi->dantoc= $data['dantoc'];
     $giaovienmoi->quoctich= $data['quoctich'];
     $giaovienmoi->quequan= $data['quequan'];
     $giaovienmoi->dienthoai= $data['sodt'];
     $giaovienmoi->email= $data['email'];
     $giaovienmoi->nhomchucvu= $data['nhomchucvu'];
     $giaovienmoi->cmnd= $data['cmnd'];
     $giaovienmoi->taikhoan= $data['taikhoan'];
     $giaovienmoi->matkhau= Hash::make($data['matkhau']);

     $giaovienmoi->save();

     return response()->json( "Ghi hồ sơ giáo viên thành công!",200);
   }

 }

}
public function getXoaGV(Request $request)
{
  if($request->ajax())
  {

    $data = $request->input('list');

        //App\HocSinh::destroy($data);
    foreach ($data as $magv) 
    {
     GiaoVien::where('magv',$magv)->delete();
   }
   return response()->json('Xóa hồ sơ giáo viên thành công!',200);
 }
}

public function suaGV(Request $request)
{
  if($request->ajax())
  {
    $data = $request->giaovien;
    $validate = Validator::make($data,[
      'tengiaovien' => 'required',
      'ngaysinh' => 'required',
      'cmnd' => 'required'
    ], [
      'tengiaovien.required' => 'Vui lòng điền họ và tên giáo viên.',
      'ngaysinh.required' => 'Vui lòng điền ngày sinh của giáo viên.',
      'cmnd.required' => 'Vui lòng điền CMND/TCC của giáo viên.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
      GiaoVien::where('magv',$data['magv'])->update([
        'tengv' => $data['tengiaovien'],
        'ngaysinh' => date("Y/m/d", strtotime($data['ngaysinh'])),
        'gioitinh'=> $data['gioitinh'],
        'trangthaicanbo'=> $data['trangthaicanbo'],
        'dantoc'=> $data['dantoc'],
        'quoctich'=> $data['quoctich'],
        'quequan'=> $data['quequan'],
        'dienthoai'=>$data['sodt'],
        'email'=> $data['email'],
        'nhomchucvu'=> $data['nhomchucvu'],
        'cmnd'=> $data['cmnd'],
      ]);

      return response()->json("Sửa hồ sơ giáo viên thành công!",200);
    }

  }
}

public function capnhatTaiKhoan(Request $request)
{
  if($request->ajax())
  {
    $data = $request->giaovien;
    $validate = Validator::make($data,[
      'taikhoan' => 'required',
      'matkhau' => 'required'
    ], [
      'taikhoan' => 'Vui lòng điền tên tài khoản của giáo viên.',
      'matkhau' => 'Vui lòng điền mật khẩu.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
      if($data['magv'] != '*')
      {
        GiaoVien::where('magv',$data['magv'])->update([
        'taikhoan' => $data['taikhoan'],
        'matkhau'=> Hash::make($data['matkhau'])
        ]);
      }
      else
      {
        GiaoVien::where('magv',(Session::get('giaovien')->magv))->update([
        'matkhau'=> Hash::make($data['matkhau'])
        ]);
      }
      

      return response()->json("Cập nhật tài khoản thành công!",200);
    }

  }
}

public function GiaoVienEx()
{
  return Excel::download(new GiaoVienExport, 'giaovien.xlsx');
}

public function getDanhSachLopHoc()
{
  $namhochientai =  $_COOKIE["namhoc"];
  $data = LopHoc::select('malophoc', 'tenlophoc', 'khoi', 'tbgiaovien.tengv')
  ->leftjoin('tbgiaovien', 'tbgiaovien.magv', '=', 'tblophoc.magv')
  ->where('namhoc', $namhochientai)
  ->get();
  $listmagv = LopHoc::where('namhoc', $namhochientai)->pluck('magv');
  $flag = 0;
  foreach ($listmagv as $value) {
    if($value != null)
      $flag = 1;
  }
  if($flag != 0)
    $danhsachgiaovien = GiaoVien::whereNotIn('magv', $listmagv)->get();
  else
    $danhsachgiaovien = GiaoVien::all();
        //var_dump($danhsachgiaovien);

  return view('HoSoLopHoc', ['data' => $data, 'listgv' => $danhsachgiaovien]);
}

public function ghiLH(Request $request)
{
  $lophoc = new LopHoc();
  $mamoi = $lophoc->RenderMaLH();
  if($request->ajax())
  {
    $data = $request->lophoc;
    $validate = Validator::make($data,[
      'tenlophoc' => 'required'
    ], [
      'tenlophoc.required' => 'Vui lòng điền tên lớp học.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
     $lophocmoi = new LopHoc();
     $lophocmoi->malophoc = $mamoi;
     $lophocmoi->tenlophoc = $data['tenlophoc'];
     $lophocmoi->khoi = $data['khoi'];
     $lophocmoi->namhoc= $data['namhoc'];
     $lophocmoi->magv= $data['magv'];

     $lophocmoi->save();

     return response()->json("Ghi hồ sơ lớp học thành công!",200);
   }

 }

}
public function getXoaLH(Request $request)
{
  if($request->ajax())
  {

    $data = $request->input('list');

        //App\HocSinh::destroy($data);
    foreach ($data as $malophoc) 
    {
     LopHoc::where('malophoc',$malophoc)->delete();
   }
   return response()->json('Xóa hồ sơ lớp học thành công!',200);
 }
}

public function suaLH(Request $request)
{
  if($request->ajax())
  {
    $data = $request->lophoc;
    $validate = Validator::make($data,[
      'tenlophoc' => 'required'
    ], [
      'tenlophoc.required' => 'Vui lòng điền tên lớp học.'
    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
      LopHoc::where('malophoc',$data['malophoc'])->update([
        'tenlophoc' => $data['tenlophoc'],
        'khoi'=> $data['khoi'],
        'namhoc'=> $data['namhoc'],
        'magv'=> $data['magv'],
      ]);

      return response()->json("Sửa hồ sơ lớp học thành công!",200);
    }

  }
}


public function LopHocEx()
{
  return Excel::download(new LopHocExport, 'DanhSachLopHoc.xlsx');
}


public function getDuLieuMonHoc(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $monhoc=MonHoc::all();


  if($request['list']) {
    $ctmonhoc = ChiTietMonHoc::select('tbctmonhoc.malophoc', 'tbctmonhoc.mamonhoc')
    ->join('tblophoc', 'tbctmonhoc.malophoc', '=', 'tblophoc.malophoc')
    ->where('namhoc', $namhochientai)
    ->where('tblophoc.khoi', $request['list'])
    ->get();

    $data = LopHoc::select('malophoc', 'tenlophoc')
    ->where('namhoc', $namhochientai)
    ->where('khoi', $request['list'])
    ->get();
  }
  else {
    $ctmonhoc = ChiTietMonHoc::select('tbctmonhoc.malophoc', 'tbctmonhoc.mamonhoc')
    ->join('tblophoc', 'tbctmonhoc.malophoc', '=', 'tblophoc.malophoc')
    ->where('namhoc', $namhochientai)
    ->where('tblophoc.khoi', 1)
    ->get();

    $data = LopHoc::select('malophoc', 'tenlophoc')
    ->where('namhoc', $namhochientai)
    ->where('khoi', 1)
    ->get();
  }


  return view('XepMonHoc', ['data' => $data, 'listmonhoc' => $monhoc, 'ctmonhoc' => $ctmonhoc, 'khoi' => $request['list']]);

}

public function capnhatXepMonHoc(Request $request)
{

 if($request->ajax())
 {

  $data = $request->input('list');

            //xoa dữ liệu nếu tồn tại
  foreach ($request->input('list_mlh') as $malophoc) 
  {

    if(ChiTietMonHoc::where('malophoc', $malophoc)->exists())
    {
     ChiTietMonHoc::where('malophoc', $malophoc)->delete();
   }
 }

            //cap nhat lai du lieu
 foreach ($data as $malopmonhoc) 
 {
  $malophoc= explode("-", $malopmonhoc)[1];
  $mamonhoc = explode("-", $malopmonhoc)[0];
  $new = new ChiTietMonHoc();
  $new->malophoc = $malophoc;
  $new->mamonhoc = $mamonhoc;
  $new->save();
}
return response()->json('Cập nhật xếp môn lớp học thành công!',200);
}
}


public function getChuyenLop(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->get();

  $malophoc_first = LopHoc::select('malophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->first();
  $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh')
  ->join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
  ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
  ->get();
  return view('ChuyenLopHoc', ['data' => $data_hocsinh, 'data_lophoc' => $data_lophoc,'khoi' => $request['khoi'], 'lop' => $request['lop']]);
}


public function CapNhatChuyenLop(Request $request)
{
 if($request->ajax())
 {

  $data = $request->input('list');

            //cap nhat lai du lieu
  foreach ($data as $ctlophoc) 
  {
    $malopcu= explode("-", $ctlophoc)[0];
    $mahocsinh = explode("-", $ctlophoc)[1];
    $malopmoi = explode("-", $ctlophoc)[2];
    ChiTietLopHoc::where('malophoc', $malopcu)->where('mahocsinh',$mahocsinh)->update([
      'malophoc' => $malopmoi
    ]);
  }
  return response()->json('Cập nhật chuyển lớp học thành công!',200);
}
}

public function getDanhSachChuyenTruong(Request $request)
{   
  $namhochientai =  $_COOKIE["namhoc"];
  $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->get();

  if($request['khoi'])
  {
    if($request['lop'])
    {
      $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh', 'tbhocsinh.gioitinh', 'tbhocsinh.trangthaihocsinh', 'tblophoc.tenlophoc', 'tblophoc.malophoc')
      ->join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
      ->where('tblophoc.khoi', $request['khoi'])
      ->where('tblophoc.malophoc', $request['lop'])
      ->where('trangthaihocsinh', $request['trangthai'] ? $request['trangthai']: 'Chuyển đến kỳ 1' )
      ->get();
    }
    else
    {
      $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh', 'tbhocsinh.gioitinh', 'tbhocsinh.trangthaihocsinh', 'tblophoc.tenlophoc', 'tblophoc.malophoc')
      ->join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
      ->where('tblophoc.khoi', $request['khoi'])
      ->where('trangthaihocsinh', $request['trangthai'] ? $request['trangthai']: 'Chuyển đến kỳ 1' )
      ->get();
    }

  }
  else
  {
    $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh', 'tbhocsinh.gioitinh', 'tbhocsinh.trangthaihocsinh', 'tblophoc.tenlophoc', 'tblophoc.malophoc')
    ->join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
    ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
    ->where('trangthaihocsinh', $request['trangthai'] ? $request['trangthai']: 'Chuyển đến kỳ 1' )
    ->orderBy('tblophoc.tenlophoc')
    ->get();
  }

  return view('QuanLyChuyenTruong', ['data' => $data_hocsinh, 'data_lophoc' => $data_lophoc,'khoi' => $request['khoi'], 'lop' => $request['lop'], 'trangthai' => $request['trangthai']]);
}

public function getKetQuaHocTap(Request $request)
{   
  $namhochientai =  $_COOKIE["namhoc"];
  $hockyhientai =  $_COOKIE["hocki"];
  $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->get();

  $malophoc_first = LopHoc::select('malophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->first();

  $data_monhoc = ChiTietMonHoc::select('tbctmonhoc.malophoc', 'tbctmonhoc.mamonhoc', 'tbmonhoc.tenmonhoc')
  ->join('tbmonhoc', 'tbmonhoc.mamonhoc', '=', 'tbctmonhoc.mamonhoc')
  ->where('tbctmonhoc.malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
  ->get();


  $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh', 'tbhocsinh.gioitinh', 'tbctlophoc.mactlophoc', 'tbctlophoc.lenlop', 'tbctlophoc.hoanthanhctlh', 'tbctlophoc.khenthuong')
  ->join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
  ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
  ->where('tblophoc.malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
  ->where('trangthaihocsinh', 'Đang học' )
  ->get();

  $data_kqht = CTKQHocTap::join('tbctlophoc', 'tbctlophoc.mactlophoc','=','tbctkqhoctap.mactlophoc')
  ->join('tbhocsinh', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
  ->where('tbctlophoc.malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : '') )
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ 2'))
  ->get();

  $data_kqnlpc = CTKQNangLucPhamChat::join('tbctlophoc', 'tbctlophoc.mactlophoc','=','tbctkqnanglucphamchat.mactlophoc')
  ->join('tbhocsinh', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
  ->where('tbctlophoc.malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : '') )
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->get();

        //var_dump(count($data_hocsinh));
  return view('KetQuaHocTap', ['data_hocsinh' => $data_hocsinh, 'data_kqht' => $data_kqht, 'data_kqnlpc' => $data_kqnlpc, 'data_lophoc' => $data_lophoc,'khoi' => $request['khoi'], 'lop' => $request['lop'], 'thoidiemdanhgia' => $request['thoidiemdanhgia'], 'hocky' => $hockyhientai, 'listmonhoc' => $data_monhoc]);
}

public function capnhatKetQuaHocTap(Request $request)
{

 if($request->ajax())
 {

  $kqht = $request->input('kqht');
  $nlpc = $request->input('nlpc');
  $lenlop = $request->input('arraylenlop');
  $hoanthanhctlh = $request->input('arrayhoanthanhctlh');
  $khenthuong = $request->input('arraykhenthuong');

            //xoa dữ liệu nếu tồn tại
  foreach ($kqht as $KQHT) 
  {
    $giatri = explode('-', $KQHT)[0];
    $mahocsinh = explode('-', $KQHT)[1];
    $mamonhoc = explode('-', $KQHT)[2];
    $mactlophoc = explode('-', $KQHT)[3];
    $loai = explode('-', $KQHT)[4];
    if(CTKQHocTap::where('mactlophoc', $mactlophoc)
      ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
      ->exists())
    {
     CTKQHocTap::where('mactlophoc', $mactlophoc)
     ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
     ->delete();
   }
 }

 foreach ($nlpc as $NLPC) 
 {
  $mahocsinh = explode('-', $NLPC)[1];
  $mactlophoc = explode('-', $NLPC)[3];
  if(CTKQNangLucPhamChat::where('mactlophoc', $mactlophoc)
    ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
    ->exists())
  {
   CTKQNangLucPhamChat::where('mactlophoc', $mactlophoc)
   ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
   ->delete();
 }
}



            //cap nhat lai du lieu
foreach ($kqht as $KQHT) 
{
  $giatri = explode('-', $KQHT)[0];
  $mahocsinh = explode('-', $KQHT)[1];
  $mamonhoc = explode('-', $KQHT)[2];
  $mactlophoc = explode('-', $KQHT)[3];
  $loai = explode('-', $KQHT)[4];
  if( $giatri != '*')
  {
    if(CTKQHocTap::where('mactlophoc', $mactlophoc)
      ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
      ->where('mamonhoc', $mamonhoc)
      ->exists())
    {
      if($loai == 'diemkt')
      {
        CTKQHocTap::where('mactlophoc', $mactlophoc)
        ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
        ->where('mamonhoc', $mamonhoc)
        ->update(['diemkt'=>intval($giatri)]);
      }
      else {
        CTKQHocTap::where('mactlophoc', $mactlophoc)
        ->where('thoidiemdanhgia', $request->input('thoidiemdanhgia'))
        ->where('mamonhoc', $mamonhoc)
        ->update(['mucdatduoc'=> $giatri]);
      }            
    }
    else
    {
      $new = new CTKQHocTap();
      $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
      $new->mactlophoc = $mactlophoc;
      $new->mamonhoc = $mamonhoc;
      if($loai == 'diemkt')
      {
        $new->diemkt = intval($giatri);
        $new->mucdatduoc = null;
      }
      else {
        $new->mucdatduoc = $giatri;
        $new->diemkt = null;
      }
      $new->thoidiemdanhgia = $request->input('thoidiemdanhgia');
      $new->save();
    }
  }


}

            //nlpc
foreach ($nlpc as $NLPC) 
{
  $giatri = explode('-', $NLPC)[0];
  $mahocsinh = explode('-', $NLPC)[1];
  $tendanhgia = explode('-', $NLPC)[2];
  $mactlophoc = explode('-', $NLPC)[3];
  $new = new CTKQNangLucPhamChat();
  $new->mactkqnanglucphamchat = $new->RenderMaCTKQNangLucPhamChat();
  $new->mactlophoc = $mactlophoc;
  $new->tendanhgia = $tendanhgia;
  $new->mucdatduoc = $giatri;
  $new->thoidiemdanhgia = $request->input('thoidiemdanhgia');
  $new->save();

}

if($request->input('thoidiemdanhgia') == 'Cuối năm học')
{
              //capnhat lenlop, hoanthanhctlh, khenthuong
ChiTietLopHoc::where('malophoc', $request->input('malophoc'))
->update([
  'lenlop' => 0,
  'hoanthanhctlh' => 0,
  'khenthuong' => 0
]);

foreach ($lenlop as $ct) 
{
  $mahocsinh = explode('-', $ct)[0];
  $mactlophoc = explode('-', $ct)[1];
  ChiTietLopHoc::where('mahocsinh', $mahocsinh)
  ->where('mactlophoc', $mactlophoc)
  ->update([
    'lenlop' => 1,
  ]);

}

foreach ($hoanthanhctlh as $ct) 
{
  $mahocsinh = explode('-', $ct)[0];
  $mactlophoc = explode('-', $ct)[1];
  ChiTietLopHoc::where('mahocsinh', $mahocsinh)
  ->where('mactlophoc', $mactlophoc)
  ->update([
    'hoanthanhctlh' => 1,
  ]);

}

foreach ($khenthuong as $ct) 
{
  $mahocsinh = explode('-', $ct)[0];
  $mactlophoc = explode('-', $ct)[1];
  ChiTietLopHoc::where('mahocsinh', $mahocsinh)
  ->where('mactlophoc', $mactlophoc)
  ->update([
    'khenthuong' => 1,
  ]);

}
}

}


return response()->json('Cập nhật kết quả học tập thành công!',200);

}

public function getKTQX(Request $request)
{
 $namhochientai =  $_COOKIE["namhoc"];
 $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
 ->where('namhoc', $namhochientai)
 ->where('khoi', $request['khoi']? $request['khoi']:1)
 ->orderBy('tenlophoc')
 ->get();

 $malophoc_first = LopHoc::select('malophoc')
 ->where('namhoc', $namhochientai)
 ->where('khoi', $request['khoi']? $request['khoi']:1)
 ->first();
 $data = LopHoc::where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
 ->get();

 $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
 ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
 ->get();





 $data_khenthuong = KhenThuongDotXuat::join('tbhocsinh', 'tbhocsinh.mahocsinh', '=', 'tbkhenthuongdotxuat.mahocsinh')
 ->join('tblophoc', 'tblophoc.malophoc','=','tbkhenthuongdotxuat.malophoc')
 ->where('tbkhenthuongdotxuat.malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
 ->get();

 return view('KhenThuongDotXuat', ['data_khenthuong' => $data_khenthuong,'data' => $data, 'data_lophoc' => $data_lophoc, 'data_hocsinh' => $data_hocsinh, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'mahocsinh' => $request['mahocsinh']]);

}

public function ghiKTDX(request $request)
{
  $khenthuong = new KhenThuongDotXuat();
  $mamoi = $khenthuong->RenderKTDX();
  if($request->ajax())
  {
    $data = $request->khenthuongdotxuat;
    $validate = Validator::make($data,[
      'noidungkt' => 'required',    
    ], [
      'noidungkt.required' => 'Vui lòng điền nội dung khen thưởng.',

    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
     $khenthuongmoi = new KhenThuongDotXuat();
     $khenthuongmoi->maktdx = $mamoi;
     $khenthuongmoi->mahocsinh = $data['mahocsinh'];
     $khenthuongmoi->malophoc = $data['malophoc'];
     $khenthuongmoi->noidungkt = $data['noidungkt'];

     $khenthuongmoi->save();


     return response()->json( "Ghi khen thưởng thành công!",200);
   }

 }
}
public function suaKTDX(request $request)
{
  if($request->ajax())
  {
    $data = $request->khenthuongdotxuat;
    $validate = Validator::make($data,[
      'noidungkt' => 'required',    
    ], [
      'noidungkt.required' => 'Vui lòng điền nội dung khen thưởng.',

    ]);

    if($validate->fails())
    {
      return response()->json($validate->messages(),200);
    }
    else
    {
      KhenThuongDotXuat::where('malophoc', $data['malophoc'])
      ->where('mahocsinh', $data['mahocsinh'])->update([
        'noidungkt' => $data['noidungkt']]);


      return response()->json( "Sửa khen thưởng thành công!",200);
    }

  }
}

public function getXoaKTDX(Request $request)
{
  if($request->ajax())
  {

    $data = $request->input('list');

        //App\HocSinh::destroy($data);
    foreach ($data as $value) 
    {

      KhenThuongDotXuat::where('maktdx', $value)
      ->delete();
    }
    return response()->json('Xóa khen thưởng thành công!',200);
  }
}

public function capnhatKTTN(Request $request)
{
  if($request->ajax())
  {

    $kttn = $request->input('kttn');

            //xoa dữ liệu nếu tồn tại
    foreach ($kttn as $KTTN) 
    {
      $giatri = explode(' - ', $KTTN)[0];
      $loai = explode(' - ', $KTTN)[1];
      $mahocsinh = explode(' - ', $KTTN)[2];
      $malophoc = explode(' - ', $KTTN)[3];

      if(KhenThuongThuongNien::where('mahocsinh', $mahocsinh)
        ->where('malophoc', $malophoc)
        ->exists())
      {
        KhenThuongThuongNien::where('mahocsinh', $mahocsinh)
        ->where('malophoc', $malophoc)
        ->delete();
      }
    }

            //cap nhat lai du lieu
    foreach ($kttn as $KTTN) 
    {
     $giatri = explode(' - ', $KTTN)[0];
     $loai = explode(' - ', $KTTN)[1];
     $mahocsinh = explode(' - ', $KTTN)[2];
     $malophoc = explode(' - ', $KTTN)[3];
     if( $giatri != '*')
     {
      if(KhenThuongThuongNien::where('mahocsinh', $mahocsinh)
        ->where('malophoc', $malophoc)
        ->exists())
      {
        if($loai == 'khenthuongcanam')
        {
          KhenThuongThuongNien::where('mahocsinh', $mahocsinh)
          ->where('malophoc', $malophoc)
          ->update(['khenthuongcanam'=>$giatri]);
        }
        else if ($loai=='kyluatcanam') {
          KhenThuongThuongNien::where('mahocsinh', $mahocsinh)
          ->where('malophoc', $malophoc)
          ->update(['kyluatcanam'=>$giatri]);
        }
        else 
        {
          KhenThuongThuongNien::where('mahocsinh', $mahocsinh)
          ->where('malophoc', $malophoc)
          ->update(['songaynghicanam'=>intval($giatri)]);  
        }         
      }
      else
      {
        $new = new KhenThuongThuongNien();
        $new->makt = $new->RenderMakt();
        $new->malophoc = $malophoc;
        $new->mahocsinh = $mahocsinh;
        if($loai == 'khenthuongcanam')
        {
          $new->khenthuongcanam = $giatri;
          $new->kyluatcanam = null;
          $new->songaynghicanam = 0;
        }
        else if ($loai == 'kyluatcanam'){
          $new->khenthuongcanam = null;
          $new->kyluatcanam = $giatri;
          $new->songaynghicanam = 0;
        }
        else{
          $new->khenthuongcanam = null;
          $new->kyluatcanam = null;
          $new->songaynghicanam = intval($giatri);
        }


        $new->save();
      }
    }

  }


}
return response()->json('Cập nhật kết quả khen thưởng thành công!',200);

}


public function getKTTN(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi'] : 1 )
  ->orderBy('tenlophoc')
  ->get();

  $malophoc_first = LopHoc::select('malophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', $request['khoi']? $request['khoi']:1)
  ->first();

  $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
  ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
  ->where('tbctlophoc.khenthuong', 1)
  ->get();        
  $data_khenthuong = KhenThuongThuongNien::where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
  ->get();
  return view('KhenThuongThuongNien', ['data_khenthuong' => $data_khenthuong, 'data_lophoc' => $data_lophoc, 'data_hocsinh' => $data_hocsinh, 'khoi' => $request['khoi'], 'lop' => $request['lop']]);
}

public function getHoanThanhCTTieuHoc(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $data_lophoc = LopHoc::select('malophoc', 'tenlophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', 5)
  ->orderBy('tenlophoc')
  ->get();

  $malophoc_first = LopHoc::select('malophoc')
  ->where('namhoc', $namhochientai)
  ->where('khoi', 5)
  ->first();

  $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
  ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
  ->get();

  return view('QLHTCTTieuHoc', ['data_lophoc' => $data_lophoc, 'data_hocsinh' => $data_hocsinh, 'lop' => $request['lop']]);
}
public function capnhatHoanThanhCTTieuHoc(Request $request)


{
  if($request->ajax())
  {

    $data = $request->input('list');
    HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
    ->where('tbctlophoc.malophoc',$request->input('malophoc'))
    ->update(['hoanthanhcttieuhoc'=>0]);

    foreach ($data as $mahs) 
    {

     HocSinh::where('mahocsinh',$mahs)->update(['hoanthanhcttieuhoc'=>1]);
   }
   return response()->json('Cập nhật hoàn thành chương trình tiểu học thành công!',200);
 }
}

public function getChuyenHoSo()
{
  $namhochientai =  $_COOKIE["namhoc"];
  $namhocmoi = (explode(' - ', $namhochientai)[1]).' - '.(intval(explode(' - ', $namhochientai)[1]) + 1);
  $data_lophoc = LopHoc::where('namhoc', $namhochientai)
  ->orderBy('tenlophoc')
  ->get();
  $listsiso = ChiTietLopHoc::select(DB::raw('count(*) as siso, tblophoc.malophoc'))
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('namhoc', $namhochientai)
  ->groupBy('tblophoc.malophoc')
  ->get();

  $data_lophocnamsau = LopHoc::where('namhoc', $namhocmoi)
  ->orderBy('tenlophoc')
  ->get();

  $listsisomoi = ChiTietLopHoc::select(DB::raw('count(*) as siso, tbctlophoc.malophoc'))
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('namhoc', $namhocmoi)
  ->groupBy('tbctlophoc.malophoc')
  ->get();
  return view('ChuyenHSLenNamHocMoi', ['namhoc' => $namhochientai, 'namhocmoi' => $namhocmoi, 'data_lophoc' => $data_lophoc, 'data_lophocnamsau' => $data_lophoc, 'listsiso' => $listsiso, 'listsisomoi' => $listsisomoi, 'data_lophocnamsau' => $data_lophocnamsau]);
}

public function SaoChepLopHoc(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $data_lophoc = LopHoc::where('namhoc', $namhochientai)
  ->orderBy('tenlophoc')
  ->get();
  $namhocmoi = (explode(' - ', $namhochientai)[1]).' - '.(intval(explode(' - ', $namhochientai)[1]) + 1);
  $data_lophocmoi = LopHoc::where('namhoc', $namhocmoi)
  ->orderBy('tenlophoc')
  ->get();

  if($request->ajax())
  {
            //xoa nếu đã có
    foreach ($data_lophoc as $lophoc) 
    {
      foreach ($data_lophocmoi as $lophocmoi)
      {
        if($lophocmoi->tenlophoc == $lophoc->tenlophoc)
        {
          LopHoc::where('malophoc', $lophocmoi->malophoc)->delete();
        }

      }
    }

    foreach ($data_lophoc as $lophoc) 
    {
      $newlophoc = new LopHoc();
      $newlophoc->malophoc = $newlophoc->RenderMaLH();
      $newlophoc->tenlophoc = $lophoc->tenlophoc;
      $newlophoc->khoi = $lophoc->khoi;
      $newlophoc->namhoc = $namhocmoi; 
      $newlophoc->magv = null;
      $newlophoc->save();
    }
    return response()->json('Cập nhật chuyển hồ sơ lớp học thành công!',200);
  }
}

public function SaoChepHocSinh(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $data_ctlophoc = ChiTietLopHoc::join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('namhoc', $namhochientai)
  ->orderBy('tenlophoc')
  ->get();
  if($request->ajax())
  {

    foreach ($request['list'] as $hoso) 
    {
      $malopcu = explode(' - ', $hoso)[0];
      $malopmoi = explode(' - ', $hoso)[1];
      $loai = explode(' - ', $hoso)[2];
      foreach ($data_ctlophoc as $ctlophoc) 
      {
        if($ctlophoc->malophoc == $malopcu && $ctlophoc->lenlop == 1 && $loai == "lophocchuyenlen")
        {
          $newctlophoc = new ChiTietLopHoc();
          $newctlophoc->mactlophoc = $newctlophoc->RenderMaCTLH();
          $newctlophoc->malophoc = $malopmoi;
          $newctlophoc->mahocsinh = $ctlophoc->mahocsinh;
          $newctlophoc->lenlop = 0; 
          $newctlophoc->hoanthanhctlh = 0;
          $newctlophoc->khenthuong = 0;
          $newctlophoc->save();
        }
        else if($ctlophoc->malophoc == $malopcu && $ctlophoc->lenlop == 0 && $loai == "lophocluuban")
        {
          $newctlophoc = new ChiTietLopHoc();
          $newctlophoc->mactlophoc = $newctlophoc->RenderMaCTLH();
          $newctlophoc->malophoc = $malopmoi;
          $newctlophoc->mahocsinh = $ctlophoc->mahocsinh;
          $newctlophoc->lenlop = 0; 
          $newctlophoc->hoanthanhctlh = 0;
          $newctlophoc->khenthuong = 0;
          $newctlophoc->save();
        }   
      }

    }   
    return response()->json('Cập nhật chuyển hồ sơ học sinh thành công!',200);
  }
}

public function ThongKeDiemMH(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $hockyhientai = $_COOKIE["hocki"];
  $listmonhoc = MonHoc::all();
  if($request['khoi'] == 'Tất cả')
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
    ->where('khoi', $request['khoi']? $request['khoi']:1)
    ->orderBy('tenlophoc')
    ->get();
  }

  $data_lophoc = ChiTietLopHoc::select(DB::raw('count(tbctlophoc.mactlophoc) as siso, tblophoc.malophoc, tblophoc.tenlophoc, tblophoc.khoi'))
  ->rightjoin('tblophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
  ->where('namhoc', $namhochientai)
  ->groupBy('tblophoc.malophoc', 'tblophoc.tenlophoc', 'tblophoc.khoi')
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_109= CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('diemkt', '>=', 9)
  ->where('diemkt', '<=', 10)
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_87 = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('diemkt', '>=', 7)
  ->where('diemkt', '<=', 8)
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_65 = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('diemkt', '>=', 5)
  ->where('diemkt', '<=', 6)
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();
  $list_duoi5 = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('diemkt', '<', 5)
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  return view('ThongKeDiemMonHoc', ['list_109' => $list_109, 'list_87' => $list_87,'list_65' => $list_65, 'list_duoi5' => $list_duoi5, 'listmonhoc' => $listmonhoc, 'listlophoc'=>$list_lophoc, 'data_lophoc' => $data_lophoc, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'thoidiemdanhgia' => $request['thoidiemdanhgia'], 'hocky' => $_COOKIE["hocki"]]);
}


public function ThongKeMDD(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $hockyhientai = $_COOKIE["hocki"];
  $listmonhoc = MonHoc::all();
  if($request['khoi'] == 'Tất cả')
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
    ->where('khoi', $request['khoi']? $request['khoi']:1)
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
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_H = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('mucdatduoc', 'H')
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_C = CTKQHocTap::select('tbctkqhoctap.mucdatduoc', 'tbctkqhoctap.mamonhoc', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqhoctap.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('mucdatduoc', 'C')
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  return view('ThongKeMucDatDuoc', ['list_T' => $list_T, 'list_H' => $list_H,'list_C' => $list_C,'listmonhoc' => $listmonhoc, 'listlophoc'=>$list_lophoc, 'data_lophoc' => $data_lophoc, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'thoidiemdanhgia' => $request['thoidiemdanhgia'], 'hocky' => $_COOKIE["hocki"]]);
}

public function ThongKeNLPC(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  $hockyhientai = $_COOKIE["hocki"];
  if($request['khoi'] == 'Tất cả')
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
    ->where('khoi', $request['khoi']? $request['khoi']:1)
    ->orderBy('tenlophoc')
    ->get();
  }

  $data_lophoc = ChiTietLopHoc::select(DB::raw('count(tbctlophoc.mactlophoc) as siso, tblophoc.malophoc, tblophoc.tenlophoc, tblophoc.khoi'))
  ->rightjoin('tblophoc', 'tbctlophoc.malophoc', '=', 'tblophoc.malophoc')
  ->where('namhoc', $namhochientai)
  ->groupBy('tblophoc.malophoc', 'tblophoc.tenlophoc', 'tblophoc.khoi')
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_T = CTKQNangLucPhamChat::select('tbctkqnanglucphamchat.mucdatduoc', 'tbctkqnanglucphamchat.tendanhgia', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqnanglucphamchat.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('mucdatduoc', 'T')
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_H = CTKQNangLucPhamChat::select('tbctkqnanglucphamchat.mucdatduoc', 'tbctkqnanglucphamchat.tendanhgia', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqnanglucphamchat.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('mucdatduoc', 'Đ')
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

  $list_C = CTKQNangLucPhamChat::select('tbctkqnanglucphamchat.mucdatduoc', 'tbctkqnanglucphamchat.tendanhgia', 'tbctlophoc.malophoc')
  ->join('tbctlophoc', 'tbctlophoc.mactlophoc', '=', 'tbctkqnanglucphamchat.mactlophoc')
  ->join('tblophoc', 'tblophoc.malophoc', '=', 'tbctlophoc.malophoc')
  ->where('mucdatduoc', 'C')
  ->where('tblophoc.namhoc', $namhochientai)
  ->where('thoidiemdanhgia', $request['thoidiemdanhgia'] ? $request['thoidiemdanhgia'] : ($hockyhientai == 'Học kỳ I' ? 'Giữa kỳ 1' : 'Giữa kỳ II'))
  ->orderBy('tblophoc.tenlophoc')
  ->get();

    //var_dump($request['khoi']);

  return view('ThongKeNLPC', ['data_lophoc' => $data_lophoc, 'listlophoc' => $list_lophoc, 'list_T' => $list_T, 'list_H' => $list_H,'list_C' => $list_C, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'thoidiemdanhgia' => $request['thoidiemdanhgia'], 'hocky' => $_COOKIE["hocki"]]);
}

public function ThongKeKTLL(Request $request)
{
  $namhochientai =  $_COOKIE["namhoc"];
  if($request['khoi'] == 'Tất cả')
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
    ->where('khoi', $request['khoi']? $request['khoi']:1)
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

  return view('ThongKeKhenThuongLenLop', ['list_khenthuong' => $list_khenthuong, 'listlophoc' => $list_lophoc, 'list_lenlop' => $list_lenlop,'list_hoanthanhctlh' => $list_hoanthanhctlh, 'list_luuban' => $list_luuban, 'list_ktdx' => $list_ktdx, 'data_lophoc' => $data_lophoc, 'khoi' => $request['khoi'], 'lop' => $request['lop']]);
}

public function ThongKeKTLLEx(Request $request)
{
  return Excel::download(new ThongKeKhenThuongExport($request['khoi'], $request['lop']), 'ThongKeKhenThuongLenLop.xlsx');
}

public function ThongKeDiemMonHocEx(Request $request)
{
  return Excel::download(new ThongKeDiemMonHocExport($request['khoi'], $request['lop'], $request['thoidiemdanhgia']), 'ThongKeDiemMonHoc.xlsx');
}

public function ThongKeMucDatDuocEx(Request $request)
{
  return Excel::download(new ThongKeMucDatDuocExport($request['khoi'], $request['lop'], $request['thoidiemdanhgia']), 'ThongKeMucDatDuoc.xlsx');
}

public function ThongKeNLPCEx(Request $request)
{
  return Excel::download(new ThongKeNLPCExport($request['khoi'], $request['lop'], $request['thoidiemdanhgia']), 'ThongKeNangLucPhamChat.xlsx');
}

public function KetQuaHocTapEx(Request $request)
{
  return Excel::download(new KetQuaHocTapExport($request['khoi'], $request['lop'], $request['thoidiemdanhgia']), 'KetQuaHocTap.xlsx');
}

public function importHoSoHocSinh(Request $request)
{
  if($request->file('ThemEx'))
  {
    $inputFileType = 'Xls';

    /**  Create a new Reader of the type defined in $inputFileType  **/
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    /**  Advise the Reader of which WorkSheets we want to load  **/
    $reader->setReadDataOnly(true);

    /**  Load $inputFileName to a Spreadsheet Object  **/
    //$dantoc = $reader->setLoadSheetsOnly('DAN_TOC')->load($inputFileName);

    $data = $reader->load($request->file('ThemEx')->getRealPath());

    $dulieu = new \stdClass();

    $dulieu = $data->getSheet(0)->toArray(null, true, true, true);
    $count = 0;
    foreach ($dulieu as $key => $hs) {
      if($key > 1)
      {
        if($hs['B'] == '' ||$hs['C'] == '' || $hs['D'] == '' ||$hs['E'] == '' ||$hs['F'] == '' ||$hs['G'] == '')
        {
          continue;
        }
        $hocsinhmoi = new HocSinh();
        $hocsinhmoi->mahocsinh = $hocsinhmoi->RenderMaHS();
        $hocsinhmoi->tenhocsinh = $hs['C'];
        $hocsinhmoi->ngaysinh = date("Y/m/d", strtotime($hs['D']));
        $hocsinhmoi->gioitinh= $hs['E'];
        $hocsinhmoi->trangthaihocsinh= $hs['F'];
        $hocsinhmoi->dantoc= $hs['G'];
        $hocsinhmoi->quoctich= $hs['H'];
        $hocsinhmoi->tinh= $hs['I'];
        $hocsinhmoi->huyen= $hs['J'];
        $hocsinhmoi->xa= $hs['K'];
        $hocsinhmoi->noisinh= $hs['L'];
        $hocsinhmoi->choohientai= $hs['M'];
        $hocsinhmoi->sodt= $hs['N'];
        $hocsinhmoi->khuvuc= $hs['O'];
        $hocsinhmoi->loaikhuyettat= $hs['P'];
        $hocsinhmoi->doituongchinhsach   = $hs['Q'];         
        $hocsinhmoi->mienhocphi= $hs['R'] == "x"? 1 : 0;
        $hocsinhmoi->giamhocphi= $hs['S'] == "x"? 1 : 0;
        $hocsinhmoi->doivien= $hs['T'] == "x"? 1 : 0;
        $hocsinhmoi->luubannamtruoc= $hs['U'] == "x"? 1 : 0;
        $hocsinhmoi->hotencha= $hs['V'];
        $hocsinhmoi->nghenghiepcha= $hs['W'];
        $hocsinhmoi->namsinhcha= $hs['X'];
        $hocsinhmoi->hotenme= $hs['Y'];
        $hocsinhmoi->nghenghiepme= $hs['Z'];
        $hocsinhmoi->namsinhme= $hs['AA'];
        $hocsinhmoi->hotenngh= $hs['AB'];
        $hocsinhmoi->nghenghiepngh= $hs['AC'];
        $hocsinhmoi->namsinhngh= $hs['AD'];

        if($hocsinhmoi->save())
        {
          $count++;
        }
        $malophoc_first = LopHoc::select('malophoc', 'tenlophoc')
        ->where('namhoc', $_COOKIE["namhoc"])
        ->where('tenlophoc', $hs['B'])
        ->first();
        $newctlophoc = new ChiTietLopHoc();
        $newctlophoc->mactlophoc = $newctlophoc->RenderMaCTLH();
        $newctlophoc->malophoc = $malophoc_first->malophoc;
        $newctlophoc->mahocsinh = $hocsinhmoi->mahocsinh;
        $newctlophoc->lenlop=0;
        $newctlophoc->hoanthanhctlh=0;
        $newctlophoc->khenthuong=0;

        $newctlophoc->save();
      }
      
    }

    $mess = 'Ghi thành công '.$count.'/'.(count($dulieu)-1).' hồ sơ học sinh của lớp '.$malophoc_first->tenlophoc.'. Mời bạn chọn khối, lớp để kiểm tra lại!';
    return redirect('hshs')->with('Thành công', $mess);
      //var_dump($lophoc)
  }
  else
  {
    return redirect('hshs')->with('Thất bại', 'Lỗi khi đọc file!');
  }
}

public function importKQHT(Request $request)
{
  $tenlop='';
  $thoidiemdanhgia='';
  if($request->file('ThemEx'))
  {
    $inputFileType = 'Xls';

    /**  Create a new Reader of the type defined in $inputFileType  **/
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    /**  Advise the Reader of which WorkSheets we want to load  **/
    $reader->setReadDataOnly(true);

    /**  Load $inputFileName to a Spreadsheet Object  **/
    //$dantoc = $reader->setLoadSheetsOnly('DAN_TOC')->load($inputFileName);

    $data = $reader->load($request->file('ThemEx')->getRealPath());

    $dulieu = new \stdClass();

    $dulieu = $data->getSheet(1)->toArray(null, true, true, true);
    $count = 0;

    foreach ($dulieu as $key => $hs) 
    {
      if($key == 1)
      {
        $tenlop = $hs['C'];
      }
      else if($key == 2)
      {
        $thoidiemdanhgia = $hs['C'];
      }
    }

    $malophoc_first = LopHoc::select('malophoc', 'tenlophoc')
        ->where('namhoc', $_COOKIE["namhoc"])
        ->where('tenlophoc', $tenlop)
        ->first();

      CTKQHocTap::join('tbctlophoc', 'tbctlophoc.mactlophoc','=','tbctkqhoctap.mactlophoc')
                ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                ->where('tblophoc.tenlophoc',$tenlop)
                ->where('tbctkqhoctap.thoidiemdanhgia',$thoidiemdanhgia)
                ->where('tblophoc.namhoc', $_COOKIE["namhoc"])
                ->delete();

      CTKQNangLucPhamChat::join('tbctlophoc', 'tbctlophoc.mactlophoc','=','tbctkqnanglucphamchat.mactlophoc')
                ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                ->where('tblophoc.tenlophoc',$tenlop)
                ->where('tbctkqnanglucphamchat.thoidiemdanhgia',$thoidiemdanhgia)
                ->where('tblophoc.namhoc', $_COOKIE["namhoc"])
                ->delete();

      ChiTietLopHoc::where('malophoc', $malophoc_first->malophoc)
                    ->update([
                        'lenlop' => 0,
                        'hoanthanhctlh' => 0,
                        'khenthuong' => 0
                      ]);

      $listmonhoc = ChiTietMonHoc::select('tbctmonhoc.mamonhoc', 'tbmonhoc.tenmonhoc')
                                ->join('tbmonhoc', 'tbmonhoc.mamonhoc','=','tbctmonhoc.mamonhoc')
                                ->where('tbctmonhoc.malophoc', $malophoc_first->malophoc)
                                ->get();

    foreach ($dulieu as $key => $hs) 
    {
      if($key > 6)
      {
        if($hs['B'] == '')
        {
          continue;
        }

        if(($thoidiemdanhgia == 'Giữa kỳ 1' || $thoidiemdanhgia == 'Giữa kỳ 2') && $tenlop[0] < 4 )
        {
           $mactlophoc = ChiTietLopHoc::select('tbctlophoc.mactlophoc')
                                      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                                      ->join('tbhocsinh', 'tbhocsinh.mahocsinh','=','tbctlophoc.mahocsinh')
                                      ->where('tbhocsinh.tenhocsinh', $hs['B'])
                                      ->where('tblophoc.malophoc',$malophoc_first->malophoc)
                                      ->get();
          foreach ($listmonhoc as $monhoc) 
          {
            $new = new CTKQHocTap();
            $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
            $new->mactlophoc = $mactlophoc[0]->mactlophoc;
            $new->mamonhoc = $monhoc->mamonhoc ;
            $new->diemkt = 0;
            switch ($monhoc->tenmonhoc) {
              case 'Tiếng Việt':
                $new->mucdatduoc = $hs['E'];
                break;
              case 'Toán':
                $new->mucdatduoc = $hs['F'];
                break;
              case 'Tự nhiên và Xã hội':
                $new->mucdatduoc = $hs['G'];
                break;
              case 'Ngoại ngữ':
               $new->mucdatduoc = $hs['H'];
                break;
              case 'Tin học':
               $new->mucdatduoc = $hs['I'];
                break;
              case 'Tiếng dân tộc':
               $new->mucdatduoc = $hs['J'];
                break;
              case 'Đạo đức':
             $new->mucdatduoc = $hs['K'];
                break;
              case 'Âm nhạc':
                $new->mucdatduoc = $hs['L'];
                break;
              case 'Mỹ thuật':
               $new->mucdatduoc = $hs['M'];
                break;
              case 'Thủ công':
                $new->mucdatduoc = $hs['N'];
                break;
              case 'Thể dục':
               $new->mucdatduoc = $hs['O'];
                break;
            }
            $new->thoidiemdanhgia = $thoidiemdanhgia;
            $new->save();
          }


          $nlpc1 = new CTKQNangLucPhamChat();
          $nlpc1->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc1->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc1->tendanhgia = 'Tự phục vụ, tự quản' ;
          $nlpc1->mucdatduoc = $hs['P'];
          $nlpc1->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc1->save();

          $nlpc2 = new CTKQNangLucPhamChat();
          $nlpc2->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc2->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc2->tendanhgia = 'Hợp tác' ;
          $nlpc2->mucdatduoc = $hs['Q'];
          $nlpc2->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc2->save();

          $nlpc3 = new CTKQNangLucPhamChat();
          $nlpc3->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc3->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc3->tendanhgia = 'Tự học và giải quyết vấn đề' ;
          $nlpc3->mucdatduoc = $hs['R'];
          $nlpc3->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc3->save();

          $nlpc4 = new CTKQNangLucPhamChat();
          $nlpc4->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc4->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc4->tendanhgia = 'Chăm học, chăm làm' ;
          $nlpc4->mucdatduoc = $hs['S'];
          $nlpc4->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc4->save();

          $nlpc5 = new CTKQNangLucPhamChat();
          $nlpc5->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc5->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc5->tendanhgia = 'Tự tin, trách nhiệm' ;
          $nlpc5->mucdatduoc = $hs['T'];
          $nlpc5->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc5->save();

          $nlpc6 = new CTKQNangLucPhamChat();
          $nlpc6->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc6->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc6->tendanhgia = 'Trung thực, kỉ luật' ;
          $nlpc6->mucdatduoc = $hs['U'];
          $nlpc6->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc6->save();

          $nlpc7 = new CTKQNangLucPhamChat();
          $nlpc7->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc7->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc7->tendanhgia = 'Đoàn kết, yêu thương' ;
          $nlpc7->mucdatduoc = $hs['V'];
          $nlpc7->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc7->save();

          $nlpc8 = new CTKQNangLucPhamChat();
          $nlpc8->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc8->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc8->tendanhgia = 'Ghi chú' ;
          $nlpc8->mucdatduoc = $hs['W'];
          $nlpc8->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc8->save();
        }
        else if(($thoidiemdanhgia == 'Giữa kỳ 1' || $thoidiemdanhgia == 'Giữa kỳ 2') && $tenlop[0] >= 4 )
        {
           $mactlophoc = ChiTietLopHoc::select('tbctlophoc.mactlophoc')
                                      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                                      ->join('tbhocsinh', 'tbhocsinh.mahocsinh','=','tbctlophoc.mahocsinh')
                                      ->where('tbhocsinh.tenhocsinh', $hs['B'])
                                      ->where('tblophoc.malophoc',$malophoc_first->malophoc)
                                      ->get();
          foreach ($listmonhoc as $monhoc) 
          {
            $new = new CTKQHocTap();
            $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
            $new->mactlophoc = $mactlophoc[0]->mactlophoc;
            $new->mamonhoc = $monhoc->mamonhoc ;
            switch ($monhoc->tenmonhoc) {
              case 'Tiếng Việt':
                $new->mucdatduoc = $hs['E'];
                $new->diemkt = $hs['F'];
                break;
              case 'Toán':
                $new->mucdatduoc = $hs['G'];
                $new->diemkt = $hs['H'];
                break;
              case 'Khoa học':
                $new->mucdatduoc = $hs['I'];
                $new->diemkt ='';
                break;
              case 'Lịch sử và Địa lí':
                $new->mucdatduoc = $hs['J'];
                $new->diemkt ='';
                break;
              case 'Ngoại ngữ':
               $new->mucdatduoc = $hs['K'];
               $new->diemkt ='';
                break;
              case 'Tin học':
               $new->mucdatduoc = $hs['L'];
               $new->diemkt ='';
                break;
              case 'Tiếng dân tộc':
               $new->mucdatduoc = $hs['M'];
               $new->diemkt ='';
                break;
              case 'Đạo đức':
             $new->mucdatduoc = $hs['N'];
             $new->diemkt ='';
                break;
              case 'Âm nhạc':
                $new->mucdatduoc = $hs['O'];
                $new->diemkt ='';
                break;
              case 'Mỹ thuật':
               $new->mucdatduoc = $hs['P'];
               $new->diemkt ='';
                break;
              case 'Kĩ thuật':
                $new->mucdatduoc = $hs['Q'];
                $new->diemkt ='';
                break;
              case 'Thể dục':
               $new->mucdatduoc = $hs['R'];
               $new->diemkt ='';
                break;
            }
            $new->thoidiemdanhgia = $thoidiemdanhgia;
            $new->save();
          }


          $nlpc1 = new CTKQNangLucPhamChat();
          $nlpc1->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc1->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc1->tendanhgia = 'Tự phục vụ, tự quản' ;
          $nlpc1->mucdatduoc = $hs['S'];
          $nlpc1->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc1->save();

          $nlpc2 = new CTKQNangLucPhamChat();
          $nlpc2->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc2->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc2->tendanhgia = 'Hợp tác' ;
          $nlpc2->mucdatduoc = $hs['T'];
          $nlpc2->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc2->save();

          $nlpc3 = new CTKQNangLucPhamChat();
          $nlpc3->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc3->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc3->tendanhgia = 'Tự học và giải quyết vấn đề' ;
          $nlpc3->mucdatduoc = $hs['U'];
          $nlpc3->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc3->save();

          $nlpc4 = new CTKQNangLucPhamChat();
          $nlpc4->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc4->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc4->tendanhgia = 'Chăm học, chăm làm' ;
          $nlpc4->mucdatduoc = $hs['V'];
          $nlpc4->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc4->save();

          $nlpc5 = new CTKQNangLucPhamChat();
          $nlpc5->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc5->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc5->tendanhgia = 'Tự tin, trách nhiệm' ;
          $nlpc5->mucdatduoc = $hs['W'];
          $nlpc5->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc5->save();

          $nlpc6 = new CTKQNangLucPhamChat();
          $nlpc6->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc6->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc6->tendanhgia = 'Trung thực, kỉ luật' ;
          $nlpc6->mucdatduoc = $hs['X'];
          $nlpc6->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc6->save();

          $nlpc7 = new CTKQNangLucPhamChat();
          $nlpc7->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc7->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc7->tendanhgia = 'Đoàn kết, yêu thương' ;
          $nlpc7->mucdatduoc = $hs['Y'];
          $nlpc7->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc7->save();

          $nlpc8 = new CTKQNangLucPhamChat();
          $nlpc8->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc8->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc8->tendanhgia = 'Ghi chú' ;
          $nlpc8->mucdatduoc = $hs['Z'];
          $nlpc8->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc8->save();
        }
        else if($thoidiemdanhgia == 'Cuối kỳ 1' && $tenlop[0] < 4 )
        {
           $mactlophoc = ChiTietLopHoc::select('tbctlophoc.mactlophoc')
                                      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                                      ->join('tbhocsinh', 'tbhocsinh.mahocsinh','=','tbctlophoc.mahocsinh')
                                      ->where('tbhocsinh.tenhocsinh', $hs['B'])
                                      ->where('tblophoc.malophoc',$malophoc_first->malophoc)
                                      ->get();
          foreach ($listmonhoc as $monhoc) 
          {
            $new = new CTKQHocTap();
            $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
            $new->mactlophoc = $mactlophoc[0]->mactlophoc;
            $new->mamonhoc = $monhoc->mamonhoc ;
            switch ($monhoc->tenmonhoc) {
              case 'Tiếng Việt':
                $new->mucdatduoc = $hs['E'];
                $new->diemkt = $hs['F'];
                break;
              case 'Toán':
                $new->mucdatduoc = $hs['G'];
                $new->diemkt = $hs['H'];
                break;
              case 'Tự nhiên và Xã hội':
                $new->mucdatduoc = $hs['I'];
                $new->diemkt = $hs['J'];
                break;
              case 'Ngoại ngữ':
               $new->mucdatduoc = $hs['K'];
               $new->diemkt = $hs['L'];
                break;
              case 'Tin học':
               $new->mucdatduoc = $hs['M'];
               $new->diemkt = $hs['N'];
                break;
              case 'Tiếng dân tộc':
               $new->mucdatduoc = $hs['O'];
               $new->diemkt = $hs['P'];
                break;
              case 'Đạo đức':
             $new->mucdatduoc = $hs['Q'];
             $new->diemkt =0;
                break;
              case 'Âm nhạc':
                $new->mucdatduoc = $hs['R'];
                $new->diemkt = 0 ;
                break;
              case 'Mỹ thuật':
               $new->mucdatduoc = $hs['S'];
               $new->diemkt =0;
                break;
              case 'Thủ công':
                $new->mucdatduoc = $hs['T'];
                $new->diemkt = 0;
                break;
              case 'Thể dục':
               $new->mucdatduoc = $hs['U'];
               $new->diemkt = 0;
                break;
            }
            $new->thoidiemdanhgia = $thoidiemdanhgia;
            $new->save();
          }


          $nlpc1 = new CTKQNangLucPhamChat();
          $nlpc1->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc1->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc1->tendanhgia = 'Tự phục vụ, tự quản' ;
          $nlpc1->mucdatduoc = $hs['V'];
          $nlpc1->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc1->save();

          $nlpc2 = new CTKQNangLucPhamChat();
          $nlpc2->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc2->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc2->tendanhgia = 'Hợp tác' ;
          $nlpc2->mucdatduoc = $hs['W'];
          $nlpc2->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc2->save();

          $nlpc3 = new CTKQNangLucPhamChat();
          $nlpc3->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc3->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc3->tendanhgia = 'Tự học và giải quyết vấn đề' ;
          $nlpc3->mucdatduoc = $hs['X'];
          $nlpc3->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc3->save();

          $nlpc4 = new CTKQNangLucPhamChat();
          $nlpc4->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc4->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc4->tendanhgia = 'Chăm học, chăm làm' ;
          $nlpc4->mucdatduoc = $hs['Y'];
          $nlpc4->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc4->save();

          $nlpc5 = new CTKQNangLucPhamChat();
          $nlpc5->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc5->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc5->tendanhgia = 'Tự tin, trách nhiệm' ;
          $nlpc5->mucdatduoc = $hs['Z'];
          $nlpc5->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc5->save();

          $nlpc6 = new CTKQNangLucPhamChat();
          $nlpc6->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc6->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc6->tendanhgia = 'Trung thực, kỉ luật' ;
          $nlpc6->mucdatduoc = $hs['AA'];
          $nlpc6->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc6->save();

          $nlpc7 = new CTKQNangLucPhamChat();
          $nlpc7->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc7->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc7->tendanhgia = 'Đoàn kết, yêu thương' ;
          $nlpc7->mucdatduoc = $hs['AB'];
          $nlpc7->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc7->save();

          $nlpc8 = new CTKQNangLucPhamChat();
          $nlpc8->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc8->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc8->tendanhgia = 'Ghi chú' ;
          $nlpc8->mucdatduoc = $hs['AC'];
          $nlpc8->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc8->save();
        }
        else if($thoidiemdanhgia == 'Cuối kỳ 1' && $tenlop[0] >= 4 )
        {
           $mactlophoc = ChiTietLopHoc::select('tbctlophoc.mactlophoc')
                                      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                                      ->join('tbhocsinh', 'tbhocsinh.mahocsinh','=','tbctlophoc.mahocsinh')
                                      ->where('tbhocsinh.tenhocsinh', $hs['B'])
                                      ->where('tblophoc.malophoc',$malophoc_first->malophoc)
                                      ->get();
          foreach ($listmonhoc as $monhoc) 
          {
            $new = new CTKQHocTap();
            $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
            $new->mactlophoc = $mactlophoc[0]->mactlophoc;
            $new->mamonhoc = $monhoc->mamonhoc ;
            switch ($monhoc->tenmonhoc) {
              case 'Tiếng Việt':
                $new->mucdatduoc = $hs['E'];
                $new->diemkt = $hs['F'];
                break;
              case 'Toán':
                $new->mucdatduoc = $hs['G'];
                $new->diemkt = $hs['H'];
                break;
              case 'Khoa học':
                $new->mucdatduoc = $hs['I'];
                $new->diemkt = $hs['J'];
                break;
              case 'Lịch sử và Địa lí':
                $new->mucdatduoc = $hs['K'];
                $new->diemkt = $hs['L'];
                break;
              case 'Ngoại ngữ':
               $new->mucdatduoc = $hs['M'];
               $new->diemkt = $hs['N'];
                break;
              case 'Tin học':
               $new->mucdatduoc = $hs['O'];
               $new->diemkt = $hs['P'];
                break;
              case 'Tiếng dân tộc':
               $new->mucdatduoc = $hs['Q'];
               $new->diemkt = $hs['R'];
                break;
              case 'Đạo đức':
             $new->mucdatduoc = $hs['S'];
             $new->diemkt = 0;
                break;
              case 'Âm nhạc':
                $new->mucdatduoc = $hs['T'];
                $new->diemkt = 0;
                break;
              case 'Mỹ thuật':
               $new->mucdatduoc = $hs['U'];
               $new->diemkt = 0;
                break;
              case 'Kĩ thuật':
                $new->mucdatduoc = $hs['V'];
                $new->diemkt = 0;
                break;
              case 'Thể dục':
               $new->mucdatduoc = $hs['W'];
               $new->diemkt = 0;
                break;
            }
            $new->thoidiemdanhgia = $thoidiemdanhgia;
            $new->save();
          }


          $nlpc1 = new CTKQNangLucPhamChat();
          $nlpc1->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc1->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc1->tendanhgia = 'Tự phục vụ, tự quản' ;
          $nlpc1->mucdatduoc = $hs['X'];
          $nlpc1->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc1->save();

          $nlpc2 = new CTKQNangLucPhamChat();
          $nlpc2->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc2->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc2->tendanhgia = 'Hợp tác' ;
          $nlpc2->mucdatduoc = $hs['Y'];
          $nlpc2->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc2->save();

          $nlpc3 = new CTKQNangLucPhamChat();
          $nlpc3->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc3->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc3->tendanhgia = 'Tự học và giải quyết vấn đề' ;
          $nlpc3->mucdatduoc = $hs['Z'];
          $nlpc3->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc3->save();

          $nlpc4 = new CTKQNangLucPhamChat();
          $nlpc4->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc4->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc4->tendanhgia = 'Chăm học, chăm làm' ;
          $nlpc4->mucdatduoc = $hs['AA'];
          $nlpc4->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc4->save();

          $nlpc5 = new CTKQNangLucPhamChat();
          $nlpc5->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc5->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc5->tendanhgia = 'Tự tin, trách nhiệm' ;
          $nlpc5->mucdatduoc = $hs['AB'];
          $nlpc5->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc5->save();

          $nlpc6 = new CTKQNangLucPhamChat();
          $nlpc6->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc6->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc6->tendanhgia = 'Trung thực, kỉ luật' ;
          $nlpc6->mucdatduoc = $hs['AC'];
          $nlpc6->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc6->save();

          $nlpc7 = new CTKQNangLucPhamChat();
          $nlpc7->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc7->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc7->tendanhgia = 'Đoàn kết, yêu thương' ;
          $nlpc7->mucdatduoc = $hs['AD'];
          $nlpc7->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc7->save();

          $nlpc8 = new CTKQNangLucPhamChat();
          $nlpc8->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc8->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc8->tendanhgia = 'Ghi chú' ;
          $nlpc8->mucdatduoc = $hs['AE'];
          $nlpc8->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc8->save();
        }
         else if($thoidiemdanhgia == 'Cuối năm học' && $tenlop[0] < 4 )
        {
           $mactlophoc = ChiTietLopHoc::select('tbctlophoc.mactlophoc')
                                      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                                      ->join('tbhocsinh', 'tbhocsinh.mahocsinh','=','tbctlophoc.mahocsinh')
                                      ->where('tbhocsinh.tenhocsinh', $hs['B'])
                                      ->where('tblophoc.malophoc',$malophoc_first->malophoc)
                                      ->get();
          foreach ($listmonhoc as $monhoc) 
          {
            $new = new CTKQHocTap();
            $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
            $new->mactlophoc = $mactlophoc[0]->mactlophoc;
            $new->mamonhoc = $monhoc->mamonhoc ;
            switch ($monhoc->tenmonhoc) {
              case 'Tiếng Việt':
                $new->mucdatduoc = $hs['E'];
                $new->diemkt = $hs['F'];
                break;
              case 'Toán':
                $new->mucdatduoc = $hs['G'];
                $new->diemkt = $hs['H'];
                break;
              case 'Tự nhiên và Xã hội':
                $new->mucdatduoc = $hs['I'];
                $new->diemkt = $hs['J'];
                break;
              case 'Ngoại ngữ':
               $new->mucdatduoc = $hs['K'];
               $new->diemkt = $hs['L'];
                break;
              case 'Tin học':
               $new->mucdatduoc = $hs['M'];
               $new->diemkt = $hs['N'];
                break;
              case 'Tiếng dân tộc':
               $new->mucdatduoc = $hs['O'];
               $new->diemkt = $hs['P'];
                break;
              case 'Đạo đức':
             $new->mucdatduoc = $hs['Q'];
             $new->diemkt =0;
                break;
              case 'Âm nhạc':
                $new->mucdatduoc = $hs['R'];
                $new->diemkt =0;
                break;
              case 'Mỹ thuật':
               $new->mucdatduoc = $hs['S'];
               $new->diemkt =0;
                break;
              case 'Thủ công':
                $new->mucdatduoc = $hs['T'];
                $new->diemkt =0;
                break;
              case 'Thể dục':
               $new->mucdatduoc = $hs['U'];
               $new->diemkt =0;
                break;
            }
            $new->thoidiemdanhgia = $thoidiemdanhgia;
            $new->save();
          }


          $nlpc1 = new CTKQNangLucPhamChat();
          $nlpc1->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc1->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc1->tendanhgia = 'Tự phục vụ, tự quản' ;
          $nlpc1->mucdatduoc = $hs['V'];
          $nlpc1->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc1->save();

          $nlpc2 = new CTKQNangLucPhamChat();
          $nlpc2->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc2->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc2->tendanhgia = 'Hợp tác' ;
          $nlpc2->mucdatduoc = $hs['W'];
          $nlpc2->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc2->save();

          $nlpc3 = new CTKQNangLucPhamChat();
          $nlpc3->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc3->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc3->tendanhgia = 'Tự học và giải quyết vấn đề' ;
          $nlpc3->mucdatduoc = $hs['X'];
          $nlpc3->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc3->save();

          $nlpc4 = new CTKQNangLucPhamChat();
          $nlpc4->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc4->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc4->tendanhgia = 'Chăm học, chăm làm' ;
          $nlpc4->mucdatduoc = $hs['Y'];
          $nlpc4->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc4->save();

          $nlpc5 = new CTKQNangLucPhamChat();
          $nlpc5->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc5->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc5->tendanhgia = 'Tự tin, trách nhiệm' ;
          $nlpc5->mucdatduoc = $hs['Z'];
          $nlpc5->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc5->save();

          $nlpc6 = new CTKQNangLucPhamChat();
          $nlpc6->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc6->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc6->tendanhgia = 'Trung thực, kỉ luật' ;
          $nlpc6->mucdatduoc = $hs['AA'];
          $nlpc6->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc6->save();

          $nlpc7 = new CTKQNangLucPhamChat();
          $nlpc7->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc7->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc7->tendanhgia = 'Đoàn kết, yêu thương' ;
          $nlpc7->mucdatduoc = $hs['AB'];
          $nlpc7->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc7->save();

          $nlpc8 = new CTKQNangLucPhamChat();
          $nlpc8->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc8->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc8->tendanhgia = 'Ghi chú' ;
          $nlpc8->mucdatduoc = $hs['AC'];
          $nlpc8->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc8->save();
          if($hs['AD'] == 'x')
          {
           ChiTietLopHoc::where('mactlophoc', $mactlophoc[0]->mactlophoc)
                       ->update([
                                  'lenlop' => 1,
                               ]);
          }
          if($hs['AE'] == 'x')
          {
            ChiTietLopHoc::where('mactlophoc', $mactlophoc[0]->mactlophoc)
                       ->update([
                                  'hoanthanhctlh' => 1,
                               ]);
          }
          if($hs['AF'] == 'x')
          {
            ChiTietLopHoc::where('mactlophoc', $mactlophoc[0]->mactlophoc)
                       ->update([
                                  'khenthuong' => 1,
                               ]);
          }
        }
        else if($thoidiemdanhgia == 'Cuối năm học' && $tenlop[0] >= 4 )
        {
           $mactlophoc = ChiTietLopHoc::select('tbctlophoc.mactlophoc')
                                      ->join('tblophoc', 'tblophoc.malophoc','=','tbctlophoc.malophoc')
                                      ->join('tbhocsinh', 'tbhocsinh.mahocsinh','=','tbctlophoc.mahocsinh')
                                      ->where('tbhocsinh.tenhocsinh', $hs['B'])
                                      ->where('tblophoc.malophoc',$malophoc_first->malophoc)
                                      ->get();
          foreach ($listmonhoc as $monhoc) 
          {
            $new = new CTKQHocTap();
            $new->mactkqhoctap = $new->RenderMaCTKQHocTap();
            $new->mactlophoc = $mactlophoc[0]->mactlophoc;
            $new->mamonhoc = $monhoc->mamonhoc ;
            switch ($monhoc->tenmonhoc) {
              case 'Tiếng Việt':
                $new->mucdatduoc = $hs['E'];
                $new->diemkt = $hs['F'];
                break;
              case 'Toán':
                $new->mucdatduoc = $hs['G'];
                $new->diemkt = $hs['H'];
                break;
              case 'Khoa học':
                $new->mucdatduoc = $hs['I'];
                $new->diemkt = $hs['J'];
                break;
              case 'Lịch sử và Địa lí':
                $new->mucdatduoc = $hs['K'];
                $new->diemkt = $hs['L'];
                break;
              case 'Ngoại ngữ':
               $new->mucdatduoc = $hs['M'];
               $new->diemkt = $hs['N'];
                break;
              case 'Tin học':
               $new->mucdatduoc = $hs['O'];
               $new->diemkt = $hs['P'];
                break;
              case 'Tiếng dân tộc':
               $new->mucdatduoc = $hs['Q'];
               $new->diemkt = $hs['R'];
                break;
              case 'Đạo đức':
             $new->mucdatduoc = $hs['S'];
             $new->diemkt =0;
                break;
              case 'Âm nhạc':
                $new->mucdatduoc = $hs['T'];
                $new->diemkt =0;
                break;
              case 'Mỹ thuật':
               $new->mucdatduoc = $hs['U'];
               $new->diemkt =0;
                break;
              case 'Kĩ thuật':
                $new->mucdatduoc = $hs['V'];
                $new->diemkt =0;
                break;
              case 'Thể dục':
               $new->mucdatduoc = $hs['W'];
               $new->diemkt =0;
                break;
            }
            $new->thoidiemdanhgia = $thoidiemdanhgia;
            $new->save();
          }


          $nlpc1 = new CTKQNangLucPhamChat();
          $nlpc1->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc1->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc1->tendanhgia = 'Tự phục vụ, tự quản' ;
          $nlpc1->mucdatduoc = $hs['X'];
          $nlpc1->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc1->save();

          $nlpc2 = new CTKQNangLucPhamChat();
          $nlpc2->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc2->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc2->tendanhgia = 'Hợp tác' ;
          $nlpc2->mucdatduoc = $hs['Y'];
          $nlpc2->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc2->save();

          $nlpc3 = new CTKQNangLucPhamChat();
          $nlpc3->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc3->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc3->tendanhgia = 'Tự học và giải quyết vấn đề' ;
          $nlpc3->mucdatduoc = $hs['Z'];
          $nlpc3->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc3->save();

          $nlpc4 = new CTKQNangLucPhamChat();
          $nlpc4->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc4->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc4->tendanhgia = 'Chăm học, chăm làm' ;
          $nlpc4->mucdatduoc = $hs['AA'];
          $nlpc4->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc4->save();

          $nlpc5 = new CTKQNangLucPhamChat();
          $nlpc5->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc5->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc5->tendanhgia = 'Tự tin, trách nhiệm' ;
          $nlpc5->mucdatduoc = $hs['AB'];
          $nlpc5->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc5->save();

          $nlpc6 = new CTKQNangLucPhamChat();
          $nlpc6->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc6->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc6->tendanhgia = 'Trung thực, kỉ luật' ;
          $nlpc6->mucdatduoc = $hs['AC'];
          $nlpc6->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc6->save();

          $nlpc7 = new CTKQNangLucPhamChat();
          $nlpc7->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc7->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc7->tendanhgia = 'Đoàn kết, yêu thương' ;
          $nlpc7->mucdatduoc = $hs['AD'];
          $nlpc7->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc7->save();

          $nlpc8 = new CTKQNangLucPhamChat();
          $nlpc8->mactkqnanglucphamchat = $nlpc1->RenderMaCTKQNangLucPhamChat();
          $nlpc8->mactlophoc = $mactlophoc[0]->mactlophoc;
          $nlpc8->tendanhgia = 'Ghi chú' ;
          $nlpc8->mucdatduoc = $hs['AE'];
          $nlpc8->thoidiemdanhgia = $thoidiemdanhgia;
          $nlpc8->save();

          if($hs['AF'] == 'x')
          {
           ChiTietLopHoc::where('mactlophoc', $mactlophoc[0]->mactlophoc)
                       ->update([
                                  'lenlop' => 1,
                               ]);
          }
          if($hs['AG'] == 'x')
          {
            ChiTietLopHoc::where('mactlophoc', $mactlophoc[0]->mactlophoc)
                       ->update([
                                  'hoanthanhctlh' => 1,
                               ]);
          }
          if($hs['AH'] == 'x')
          {
            ChiTietLopHoc::where('mactlophoc', $mactlophoc[0]->mactlophoc)
                       ->update([
                                  'khenthuong' => 1,
                               ]);
          }
        }

    
     }
        

  }

  $mess = 'Ghi thành công kết quả học tập của lớp '.$malophoc_first->tenlophoc.'. Mời bạn chọn khối, lớp để kiểm tra lại!';
  return redirect('kqht')->with('Thành công', $mess);
    //var_dump($tenlop);
  }
  else
  {
    return redirect('kqht')->with('Thất bại', 'Lỗi khi đọc file!');
  }
 }
}
