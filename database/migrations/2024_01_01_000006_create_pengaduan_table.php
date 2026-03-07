<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('no_wa', 20)->nullable();
            $table->text('isi_laporan');
            $table->string('foto', 255)->nullable();
            $table->enum('status', ['Pending', 'Proses', 'Selesai'])->default('Pending');
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pengaduan'); }
};
