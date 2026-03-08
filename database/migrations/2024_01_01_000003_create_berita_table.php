<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (Schema::hasTable('berita')) return; Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->longText('isi');
            $table->string('gambar', 255)->nullable();
            $table->unsignedBigInteger('penulis_id')->nullable();
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('berita'); }
};
