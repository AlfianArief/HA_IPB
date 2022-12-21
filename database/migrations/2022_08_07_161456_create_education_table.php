<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('angkatan')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->string('NIM')->unique()->nullable();
            $table->string('angkatan2')->nullable();
            $table->string('fakultas2')->nullable();
            $table->string('jurusan2')->nullable();
            $table->string('kode_jurusan2')->nullable();
            $table->string('NIM2')->unique()->nullable();
            $table->string('angkatan3')->nullable();
            $table->string('fakultas3')->nullable();
            $table->string('jurusan3')->nullable();
            $table->string('kode_jurusan3')->nullable();
            $table->string('NIM3')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
