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
            $table->unsignedBigInteger('id_cabang')->nullable();
            $table->unsignedBigInteger('id_users')->nullable(); 
            $table->boolean('status')->default(1);


           $table->foreign('id_cabang')->references('id')->on('cabangs')->onDelete('cascade');
           $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usercabangs');
    }
}
