<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->string('no_laporan')->unique();
            $table->date('periode');
            $table->string('prioritas');
            $table->unsignedBigInteger('id_pic');
            $table->string('status');
            $table->unsignedBigInteger('id_lokasi');
            $table->string('nama_pelapor');
            $table->unsignedBigInteger('id_area');
            $table->unsignedBigInteger('id_permasalahan');
            $table->text('deskripsi_laporan');
            $table->string('foto_permasalahan')->nullable();
            $table->date('tgl_dikerjakan')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->text('tindakan_perbaikan')->nullable();
            $table->integer('total_nilai_perbaikan')->nullable();
            $table->string('foto_perbaikan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_pic')->references('id_pic')->on('pics')->onDelete('cascade');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasis')->onDelete('cascade');
            $table->foreign('id_area')->references('id_area')->on('areas')->onDelete('cascade');
            $table->foreign('id_permasalahan')->references('id_permasalahan')->on('permasalahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
