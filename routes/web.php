<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PerangkatController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BeritaPublicController;
use App\Http\Controllers\Public\GaleriPublicController;
use App\Http\Controllers\Public\LayananController;
use App\Http\Controllers\Public\PengaduanPublicController;
use App\Http\Controllers\Public\ProfilController;
use App\Http\Controllers\Public\CekNikController;

// PUBLIC ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [BeritaPublicController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaPublicController::class, 'show'])->name('berita.show');
Route::get('/galeri', [GaleriPublicController::class, 'index'])->name('galeri');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
Route::get('/cek-nik', [CekNikController::class, 'index'])->name('cek.nik');
Route::post('/cek-nik', [CekNikController::class, 'cek'])->name('cek.nik.post');
Route::get('/pengaduan', [PengaduanPublicController::class, 'index'])->name('pengaduan');
Route::post('/pengaduan', [PengaduanPublicController::class, 'store'])->name('pengaduan.store');

// ADMIN AUTH
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// ADMIN ROUTES (Protected)
Route::prefix('admin')->middleware('admin.auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('penduduk', PendudukController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('perangkat', PerangkatController::class);
    Route::resource('dokumen', DokumenController::class)->except(['show', 'edit', 'update']);
    Route::resource('pengaduan', PengaduanController::class)->only(['index', 'destroy']);
    Route::patch('/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::resource('galeri', GaleriController::class)->except(['show']);
});
