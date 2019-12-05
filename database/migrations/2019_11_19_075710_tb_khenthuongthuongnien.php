<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbKhenthuongthuongnien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TbKhenthuongthuongnien', function (Blueprint $table) {
            $table->string('makt',100);
            $table->string('mahocsinh',100);
            $table->string('malophoc',100);
            $table->string('khenthuongcanam');
            $table->string('kyluatcanam');
            $table->integer('songaynghicanam');
            $table->primary('makt');
            
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
        Schema::dropIfExists('TbKhenthuongthuongnien');
    }
}
