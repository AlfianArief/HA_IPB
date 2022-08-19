<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCabangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercabangs', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_cabang');
            $table->unsignedBigInteger('id_users');    


           $table->foreign('id_cabang')->references('id')->on('cabangs');
           $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usercabang');
    }
}
