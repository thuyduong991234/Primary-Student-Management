<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCtkqnanglucphamchat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TbCtkqnanglucphamchat', function (Blueprint $table) {
            $table->string('mactkqnanglucphamchat',100);
            $table->string('mactlophoc',100);
            $table->string('tendanhgia');
            $table->string('mucdatduoc');
            $table->primary('mactkqnanglucphamchat');
            
            $table->foreign('mactlophoc')->references('mactlophoc')->on('TbCtlophoc')->onDelete('cascade');

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
        Schema::dropIfExists('TbCtkqnanglucphamchat');
    }
}
