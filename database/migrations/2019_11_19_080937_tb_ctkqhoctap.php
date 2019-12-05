<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCtkqhoctap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('TbCtkqhoctap', function (Blueprint $table) {
            $table->string('mactkqhoctap',100);
            $table->string('mactlophoc',100);
            $table->string('mamonhoc',100);
            $table->integer('diemkt');
            $table->string('mucdatduoc');
            $table->primary('mactkqhoctap');
            
            $table->foreign('mactlophoc')->references('mactlophoc')->on('TbCtlophoc')->onDelete('cascade');
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
        Schema::dropIfExists('TbCtkqhoctap');
    }
}
