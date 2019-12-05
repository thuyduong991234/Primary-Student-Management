<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbHocsinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TbHocsinh', function (Blueprint $table) {
            $table->bigIncrement('mahocsinh',100);
            $table->string('tenhocsinh');
            $table->datetime('ngaysinh');
            $table->string('gioitinh');
            $table->string('trangthaihocsinh');
            $table->string('dantoc');
            $table->string('quoctich');
            $table->string('tinh');
            $table->string('huyen');
            $table->string('xa');
            $table->string('noisinh');
            $table->string('choohientai');
            $table->string('sodt');
            $table->string('khuvuc');
            $table->string('loaikhuyettat');
            $table->string('doituongchinhsach');
            $table->boolean('mienhocphi');
            $table->boolean('giamhocphi');
            $table->boolean('doivien');
            $table->boolean('luubannamtruoc');
            $table->string('hotencha');
            $table->string('nghenghiepcha');
            $table->string('namsinhcha');
            $table->string('hotenme');
            $table->string('nghenghiepme');
            $table->string('namsinhme');
            $table->string('hotenngh');
            $table->string('nghenghiepngh');
            $table->string('namsinhngh');
            $table->timestamp('failed_at')->useCurrent();
            $table->primary('mahocsinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('TbHocsinh');
    }
}
