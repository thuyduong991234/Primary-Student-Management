<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbLophoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('TbLophoc', function (Blueprint $table) {
            $table->string('malophoc',100);
            $table->string('tenlophoc');
            $table->integer('khoi');
            $table->string('namhoc');
            $table->string('magv', 100);
            $table->primary('malophoc');
            $table->foreign('magv')->references('magv')->on('TbGiaovien')->onDelete('cascade');
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
        Schema::dropIfExists('TbLophoc');
    }
}
