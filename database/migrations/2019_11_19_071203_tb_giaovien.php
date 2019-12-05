<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbGiaovien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('TbGiaovien', function (Blueprint $table) {
            $table->string('magv',100);
            $table->string('tengv');
            $table->datetime('ngaysinh');
            $table->string('gioitinh');
            $table->string('trangthaicanbo');
            $table->string('cmnd');
            $table->string('dienthoai');
            $table->datetime('email');
            $table->string('quequan');
            $table->string('dantoc');
            $table->string('quoctich');
            $table->string('nhomchucvu');
            $table->primary('magv');
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
        Schema::dropIfExists('TbGiaovien');
    }
}
