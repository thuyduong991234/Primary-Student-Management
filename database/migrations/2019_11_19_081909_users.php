<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Users', function (Blueprint $table) {
            $table->string('username',100);
            $table->string('id',100);
            
            $table->string('password');
            $table->primary(['id', 'username']);
            
            $table->foreign('id')->references('magv')->on('TbGiaovien')->onDelete('cascade');
           

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
        Schema::dropIfExists('Users');
    }
}
