<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // contoh: "Low", "Medium", "High"
            $table->string('color')->default('#6c757d'); // warna untuk tampilan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
}
