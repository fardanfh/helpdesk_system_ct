<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pics', function (Blueprint $table) {
            $table->id('id_pic');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama');
            $table->unsignedBigInteger('id_jabatan');
            $table->timestamps();

            // Foreign key
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pics');
    }
}
