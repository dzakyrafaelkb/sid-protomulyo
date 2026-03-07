<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen', 255);
            $table->string('kategori', 100);
            $table->string('file', 255);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('dokumen'); }
};
