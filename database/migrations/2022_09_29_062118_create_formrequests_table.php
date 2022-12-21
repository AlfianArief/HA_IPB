<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formrequests', function (Blueprint $table) {
            $table->id();
            $table->string('pindah_cabang')->nullable();
            $table->unsignedBigInteger('id_users')->nullable(); 
            $table->enum('status', ['PENDING', 'APPROVE', 'REJECTED'])->default('PENDING');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formrequests');
    }
}
