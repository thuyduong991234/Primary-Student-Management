<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use routes\web;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
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


class AuthController extends Controller
{
    //
    public function login(Request $req)
    {

    	if(Auth::attempt(['username' =>$req['username'], 'password' => $req['password']]))
    	{
    		return view('welcome');
    	}
    	else
    	{
    		return view('DangNhap');
    	}

    }

    public function XinChao()
    {
    	echo "Chao Tyan!";
    }

    public function ChonNamHoc(Request $req) {
    	return view('welcome',['namhoc' => $req['namhoc'], 'hocki'=>$req['hocki']]);
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
        
        return view('HoSoHocSinh', ['data' => $data_hocsinh, 'data_lophoc' => $data_lophoc,'khoi' => $request['khoi'], 'lop' => $request['lop'], 'trangthai' => $request['trangthai']]);
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
           $hocsinhmoi->loaikhuyettat= $data['loaikhuyettat'];
           $hocsinhmoi->doituongchinhsach   = $data['doituongchinhsach'];         
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
                'loaikhuyettat'=> $data['loaikhuyettat'],
                'doituongchinhsach' => $data['doituongchinhsach'],         
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
        return view('HoSoGiaoVien', ['data' => $data, 'listgv' =>$listgv, 'magiaovien' => $request['magiaovien']]);
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

    public function getDanhSachLopHoc()
    {
        $namhochientai =  $_COOKIE["namhoc"];
        $data = LopHoc::select('malophoc', 'tenlophoc', 'khoi', 'tbgiaovien.tengv')
                        ->join('tbgiaovien', 'tbgiaovien.magv', '=', 'tblophoc.magv')
                        ->where('namhoc', $namhochientai)
                        ->get();
        $listmagv = LopHoc::where('namhoc', $namhochientai)->pluck('magv');
        $danhsachgiaovien = GiaoVien::whereNotIn('magv', $listmagv)->get();

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


         $data_hocsinh = HocSinh::select('tbhocsinh.mahocsinh', 'tbhocsinh.tenhocsinh', 'tbhocsinh.ngaysinh', 'tbhocsinh.gioitinh', 'tbctlophoc.mactlophoc')
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

          $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
                        ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
                        ->get();        
          $data_khenthuong = KhenThuongDotXuat::all();
     return view('KhenThuongDotXuat', ['data_khenthuong' => $data_khenthuong, 'data_lophoc' => $data_lophoc, 'data_hocsinh' => $data_hocsinh, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'mahocsinh' => $request['mahocsinh']]);
   }


   public function getKTTN(Request $request)
   {
      $namhochientai =  $_COOKIE["namhoc"];
        $data_lophoc = lophoc::select('malophoc', 'tenlophoc')
                        ->where('namhoc', $namhochientai)
                        ->where('khoi', $request['khoi']? $request['khoi']:1)
                        ->orderBy('tenlophoc')
                        ->get();

        $malophoc_first = LopHoc::select('malophoc')
                        ->where('namhoc', $namhochientai)
                        ->where('khoi', $request['khoi']? $request['khoi']:1)
                        ->first();

        $data_hocsinh = HocSinh::join('tbctlophoc', 'tbctlophoc.mahocsinh', '=', 'tbhocsinh.mahocsinh')
                        ->where('malophoc', $request['lop'] ? $request['lop'] : ($malophoc_first? $malophoc_first->malophoc : ''))
                        ->get();        
        $data_khenthuong = KhenThuongThuongNien::all();
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

   public function getChuyenHoSo()
   {
    $namhochientai =  $_COOKIE["namhoc"];
    $data_lophoc = LopHoc::where('namhoc', $namhochientai)
                        ->orderBy('tenlophoc')
                        ->get();
    return view('ChuyenHSLenNamHocMoi', ['namhoc' => $namhochientai, 'data_lophoc' => $data_lophoc, 'data_lophocnamsau' => $data_lophoc]);
   }


   public function ThongKeMDD(Request $request)
   {
    $namhochientai =  $_COOKIE["namhoc"];
    $data_lophoc = LopHoc::where('namhoc', $namhochientai)
                        ->orderBy('tenlophoc')
                        ->get();
    $listmonhoc = MonHoc::all();
    return view('ThongKeMucDatDuoc', ['listmonhoc' => $listmonhoc, 'data_lophoc' => $data_lophoc, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'thoidiemdanhgia' => $request['thoidiemdanhgia'], 'hocky' => $_COOKIE["hocki"]]);
   }

   public function ThongKeNLPC(Request $request)
   {
    $namhochientai =  $_COOKIE["namhoc"];
    $data_lophoc = LopHoc::where('namhoc', $namhochientai)
                        ->orderBy('tenlophoc')
                        ->get();
    return view('ThongKeNLPC', ['data_lophoc' => $data_lophoc, 'khoi' => $request['khoi'], 'lop' => $request['lop'], 'thoidiemdanhgia' => $request['thoidiemdanhgia'], 'hocky' => $_COOKIE["hocki"]]);
   }
}
