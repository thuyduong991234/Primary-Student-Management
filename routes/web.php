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

Route::get('/', function () {
    return view('welcome');
});



Route::get('DangNhap',function(){
	return view('DangNhap');
});


Route::get('log','AuthController@XinChao');

Route::get('hshs','AuthController@getDanhSachHocSinh');
Route::delete('xoa-hs','AuthController@getXoaHS')->name('xoahocsinh');
Route::post('ghi-hs','AuthController@ghiHS')->name('ghihocsinh');
Route::put('ghi-hs','AuthController@suaHS')->name('suahocsinh');

Route::get('hsgv','AuthController@getDanhSachGiaoVien');
Route::delete('xoa-gv','AuthController@getXoaGV')->name('xoagiaovien');
Route::post('ghi-gv','AuthController@ghiGV')->name('ghigiaovien');
Route::put('ghi-gv','AuthController@suaGV')->name('suagiaovien');

Route::get('qllh','AuthController@getDanhSachLopHoc');
Route::delete('xoa-lh','AuthController@getXoaLH')->name('xoalophoc');
Route::post('ghi-lh','AuthController@ghiLH')->name('ghilophoc');
Route::put('ghi-lh','AuthController@suaLH')->name('sualophoc');

Route::get('xmlh','AuthController@getDuLieuMonHoc');
Route::post('capnhat-xeplh','AuthController@capnhatXepMonHoc')->name('xepmonhoc');

Route::get('chuyenlop','AuthController@getChuyenLop');
Route::put('capnhat-chuyenlop','AuthController@CapNhatChuyenLop');

Route::get('qlchuyentruong','AuthController@getDanhSachChuyenTruong');

Route::get('kqht','AuthController@getKetQuaHocTap');
Route::put('capnhat-kqht','AuthController@capnhatKetQuaHocTap');

//khenthuong
Route::get('ktdx','AuthController@getKTQX');

Route::get('kttn','AuthController@getKTTN');

//ql hoan thanh ct tieu hoc
Route::get('qlhtctth','AuthController@getHoanThanhCTTieuHoc');

Route::get('chuyenhoso','AuthController@getChuyenHoSo');

//thongkebaocao
Route::get('tkmucdatduoc','AuthController@ThongKeMDD');
Route::get('tknlpc','AuthController@ThongKeNLPC');



Route::post('login','AuthController@login')->name('login');

Route::get('qp/get', function()
{
	$data = App\HocSinh::where('mahocsinh','HS001')->get();

	var_dump($data);
});

Route::get('NamHoc', function()
{
	return view('NamHoc');
});

Route::get('HoSoHocSinh', function()
{
	return view('HoSoHocSinh');
});



Route::post('ChonNamHoc','AuthController@ChonNamHoc')->name('ChonNamHoc');

Route::get('model/monhoc/save', function(){
	$monhoc = new App\MonHoc();
	

	var_dump($monhoc);
});

Route::get('lienket', function()
{
	$data = App\LopHoc::where('malophoc', '=', 'LH001')->get();

	var_dump($data[0]->GiaoVien->toArray());
});