<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCtmonhoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TbCtmonhoc', function (Blueprint $table) {
            $table->string('malophoc',100);
            $table->string('mamonhoc',100);
            $table->primary(['malophoc', 'mamonhoc']);
            
            $table->foreign('malophoc')->references('malophoc')->on('TbLophoc')->onDelete('cascade');
            $table->foreign('mamonhoc')->references('mamonhoc')->on('TbMonhoc')->onDelete('cascade');

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
        Schema::dropIfExists('TbCtmonhoc');
    }
}
