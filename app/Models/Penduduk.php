<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model {
    protected $table = 'penduduk';
    public $timestamps = false;
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'rt', 'rw', 'pekerjaan'];
}
