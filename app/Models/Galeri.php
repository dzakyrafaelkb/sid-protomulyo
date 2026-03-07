<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model {
    protected $table = 'galeri';
    public $timestamps = false;
    protected $fillable = ['judul', 'foto', 'tanggal'];
    protected $casts = ['tanggal' => 'date'];
}
