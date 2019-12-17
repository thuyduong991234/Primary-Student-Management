<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('DangNhap',function(){
	return view('DangNhap');
})->name('dangnhap');


Route::get('/', function () {
    return view('welcome');
})->middleware('login');
Route::get('hshs','AuthController@getDanhSachHocSinh')->middleware('login');
Route::delete('xoa-hs','AuthController@getXoaHS')->name('xoahocsinh')->middleware('login');
Route::post('ghi-hs','AuthController@ghiHS')->name('ghihocsinh')->middleware('login');
Route::put('ghi-hs','AuthController@suaHS')->name('suahocsinh')->middleware('login');

Route::get('hsgv','AuthController@getDanhSachGiaoVien')->middleware('login');
Route::delete('xoa-gv','AuthController@getXoaGV')->name('xoagiaovien')->middleware('login', 'phanquyen');
Route::post('ghi-gv','AuthController@ghiGV')->name('ghigiaovien')->middleware('login', 'phanquyen');
Route::put('ghi-gv','AuthController@suaGV')->name('suagiaovien')->middleware('login', 'phanquyen');
Route::put('capnhattaikhoan','AuthController@capnhatTaiKhoan')->middleware('login', 'phanquyen');
Route::get('xuatexcelGV','AuthController@GiaoVienEx')->middleware('login');

Route::get('qllh','AuthController@getDanhSachLopHoc')->middleware('login', 'phanquyen');
Route::delete('xoa-lh','AuthController@getXoaLH')->name('xoalophoc')->middleware('login', 'phanquyen');
Route::post('ghi-lh','AuthController@ghiLH')->name('ghilophoc')->middleware('login', 'phanquyen');
Route::put('ghi-lh','AuthController@suaLH')->name('sualophoc')->middleware('login', 'phanquyen');
Route::get('xuatexcelLH','AuthController@LopHocEx')->middleware('login', 'phanquyen');

Route::get('xmlh','AuthController@getDuLieuMonHoc')->middleware('login', 'phanquyen');
Route::post('capnhat-xeplh','AuthController@capnhatXepMonHoc')->name('xepmonhoc')->middleware('login', 'phanquyen');

Route::get('chuyenlop','AuthController@getChuyenLop')->middleware('login');
Route::put('capnhat-chuyenlop','AuthController@CapNhatChuyenLop')->middleware('login');

Route::get('qlchuyentruong','AuthController@getDanhSachChuyenTruong')->middleware('login');

Route::get('kqht','AuthController@getKetQuaHocTap')->middleware('login');
Route::put('capnhat-kqht','AuthController@capnhatKetQuaHocTap')->middleware('login');
Route::get('xuatexcelKQHT', 'AuthController@KetQuaHocTapEx')->middleware('login');

//khenthuong
Route::get('ktdx','AuthController@getKTQX')->middleware('login');
Route::post('ghi-ktdx','AuthController@ghiKTDX')->middleware('login');
Route::put('capnhat-ktdx','AuthController@suaKTDX')->middleware('login');
Route::delete('xoa-ktdx','AuthController@getXoaKTDX')->middleware('login');


Route::get('kttn','AuthController@getKTTN')->middleware('login');
Route::put('capnhat-kttn','AuthController@capnhatKTTN')->middleware('login');

//ql hoan thanh ct tieu hoc
Route::get('qlhtctth','AuthController@getHoanThanhCTTieuHoc')->middleware('login');
Route::put('capnhatqlhtctth','AuthController@capnhatHoanThanhCTTieuHoc')->middleware('login');

Route::get('chuyenhoso','AuthController@getChuyenHoSo')->middleware('login', 'phanquyen');
Route::post('saocheplophoc','AuthController@SaoChepLopHoc')->middleware('login', 'phanquyen');
Route::post('saochephocsinh','AuthController@SaoChepHocSinh')->middleware('login', 'phanquyen');


//thongkebaocao
Route::get('tkdiemmonhoc','AuthController@ThongKeDiemMH')->middleware('login');
Route::get('tkmucdatduoc','AuthController@ThongKeMDD')->middleware('login');
Route::get('tknlpc','AuthController@ThongKeNLPC')->middleware('login');
Route::get('tkktll','AuthController@ThongKeKTLL')->middleware('login');
Route::get('xuatexcelKTLL', 'AuthController@ThongKeKTLLEx')->middleware('login');
Route::get('xuatexcelTKDMH', 'AuthController@ThongKeDiemMonHocEx')->middleware('login');
Route::get('xuatexcelTKMDD', 'AuthController@ThongKeMucDatDuocEx')->middleware('login');
Route::get('xuatexcelTKNLPC', 'AuthController@ThongKeNLPCEx')->middleware('login');

//import
Route::post('nhapexcelHSHS', 'AuthController@importHoSoHocSinh')->name('nhapexcelHSHS')->middleware('login');
Route::post('nhapexcelKQHT', 'AuthController@importKQHT')->name('nhapexcelKQHT')->middleware('login');


Route::post('login','AuthController@login')->name('login');
Route::get('logout','AuthController@logout')->name('logout')->middleware('login');



Route::get('NamHoc', function()
{
	return view('NamHoc');
})->middleware('login');





Route::post('ChonNamHoc','AuthController@ChonNamHoc')->name('ChonNamHoc')->middleware('login');

/*Route::get('model/monhoc/save', function(){
	$monhoc = new App\MonHoc();
	

	var_dump($monhoc);
});

Route::get('lienket', function()
{
	$data = App\LopHoc::where('malophoc', '=', 'LH001')->get();

	var_dump($data[0]->GiaoVien->toArray());
});
Route::get('HoSoHocSinh', function()
{
	return view('HoSoHocSinh');
});

Route::get('qp/get', function()
{
	$data = App\HocSinh::where('mahocsinh','HS001')->get();

	var_dump($data);
});
*/

//Test read Excel
Route::get('/readExcel','AuthController@readBieuMau');