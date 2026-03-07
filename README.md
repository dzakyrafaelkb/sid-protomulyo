# SID Desa Protomulyo - Laravel

Sistem Informasi Desa Protomulyo dibangun dengan **Laravel 10/11** dan **MySQL**.

## Fitur
- Dashboard dengan statistik & chart
- Manajemen Data Penduduk (CRUD + pencarian)
- Manajemen Berita Desa (CRUD + upload gambar)
- Manajemen Perangkat Desa (CRUD + upload foto)
- Manajemen Dokumen (upload PDF/DOC/XLS)
- Kelola Pengaduan Warga (update status + notif WA)
- Kelola Galeri Foto

---

## Cara Setup

### 1. Buat project Laravel baru
```bash
composer create-project laravel/laravel sid-protomulyo
cd sid-protomulyo
```

### 2. Salin file dari paket ini ke dalam project
Copy semua folder berikut ke project Laravel:
```
app/Http/Controllers/       → ganti/tambahkan
app/Http/Middleware/         → tambahkan AdminAuthenticated.php
app/Models/                  → tambahkan semua model
bootstrap/app.php            → GANTI isi file ini (untuk registrasi middleware)
database/migrations/         → tambahkan semua migration
resources/views/             → salin semua views
routes/web.php               → GANTI isi file ini
```

### 3. Konfigurasi database
```bash
cp .env.example .env
# Edit .env, sesuaikan:
# DB_DATABASE=nama_database_anda
# DB_USERNAME=user_mysql
# DB_PASSWORD=password_mysql
```

> **Catatan:** Database sudah ada? Pastikan nama tabel sesuai dengan migration.
> Jika tabel sudah ada, SKIP langkah 4 dan jalankan hanya `php artisan key:generate`.

### 4. Jalankan migrasi (jika database BELUM ada)
```bash
php artisan key:generate
php artisan migrate
```

### 5. Buat symlink storage
```bash
php artisan storage:link
```

### 6. Insert admin default
Jalankan SQL berikut di database Anda, atau import file `database/seed_admin.sql`:
```sql
INSERT INTO users (username, password, nama_lengkap, created_at, updated_at)
VALUES ('admin', 'admin123', 'Administrator Desa', NOW(), NOW());
```

> Atau sesuaikan dengan data user yang sudah ada di database lama.

### 7. Jalankan server
```bash
php artisan serve
```
Buka: `http://localhost:8000/admin/login`

---

## Struktur Tabel MySQL

| Tabel | Kolom Utama |
|-------|-------------|
| `users` | id, username, password, nama_lengkap |
| `penduduk` | id, nik, nama, jenis_kelamin (L/P), rt, rw, pekerjaan |
| `berita` | id, judul, isi, gambar, penulis_id, tanggal |
| `perangkat_desa` | id, nama, jabatan, nip, foto |
| `dokumen` | id, nama_dokumen, kategori, file |
| `pengaduan` | id, nama, no_wa, isi_laporan, foto, status, tanggal |
| `galeri` | id, judul, foto, tanggal |

---

## Penyimpanan File (Storage)

File diunggah ke `storage/app/public/`:
- Gambar berita: `storage/app/public/img/berita/`
- Foto perangkat: `storage/app/public/img/perangkat/`
- Foto galeri: `storage/app/public/img/galeri/`
- Foto pengaduan: `storage/app/public/img/pengaduan/`
- Dokumen: `storage/app/public/dokumen/`

Setelah `php artisan storage:link`, file bisa diakses via `public/storage/`.

---

## Catatan Keamanan
- Password saat ini disimpan plaintext sesuai database lama. Untuk keamanan lebih baik, update login di `LoginController.php` menggunakan `password_verify()` atau `bcrypt`.
- Ganti default password admin setelah pertama kali login.
