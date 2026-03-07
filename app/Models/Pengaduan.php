<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model {
    protected $table = 'pengaduan';
    public $timestamps = false;
  protected $fillable = ['nama', 'no_wa', 'judul', 'isi_laporan', 'foto', 'status', 'tanggal'];
    protected $casts = ['tanggal' => 'datetime'];
}
