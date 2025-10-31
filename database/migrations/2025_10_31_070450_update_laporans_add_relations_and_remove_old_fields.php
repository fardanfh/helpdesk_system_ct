<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            // Hapus field lama jika ada
            if (Schema::hasColumn('laporans', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('laporans', 'prioritas')) {
                $table->dropColumn('prioritas');
            }

            // Tambahkan relasi baru
            $table->foreignId('status_id')->nullable()->constrained('statuses')->onDelete('set null');
            $table->foreignId('priority_id')->nullable()->constrained('priorities')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            // Rollback: hapus relasi dan tambahkan kembali field lama
            $table->dropConstrainedForeignId('status_id');
            $table->dropConstrainedForeignId('priority_id');

            $table->string('status')->nullable();
            $table->string('prioritas')->nullable();
        });
    }
};
