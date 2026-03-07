<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model {
    protected $table = 'dokumen';
    public $timestamps = false;
    protected $fillable = ['nama_dokumen', 'kategori', 'file'];
}
