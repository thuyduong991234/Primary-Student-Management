<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbKhenthuongdotxuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TbKhenthuongdotxuat', function (Blueprint $table) {
            $table->string('maktdx',100);
            $table->string('mahocsinh',100);
            $table->string('malophoc',100);
            $table->string('noidungkt');
            $table->primary('maktdx');
            
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
        Schema::dropIfExists('TbKhenthuongdotxuat');
    }
}
