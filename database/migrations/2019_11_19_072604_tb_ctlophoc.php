<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCtlophoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('TbCtlophoc', function (Blueprint $table) {
            $table->string('mactlophoc',100);
            $table->string('malophoc',100);
            $table->string('mahocsinh',100);
            $table->string('thoidiemdanhgia');
            $table->boolean('lenlop');
            $table->boolean('hoanthanhctlh');
            $table->boolean('khenthuong');
            $table->primary('mactlophoc');
            $table->foreign('malophoc')->references('malophoc')->on('TbLophoc')->onDelete('cascade');
            $table->foreign('mahocsinh')->references('mahocsinh')->on('TbHocsinh')->onDelete('cascade');
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
          Schema::dropIfExists('TbCtlophoc');
    }
}
