-- ============================================================
-- Seeder untuk Admin Default - SID Desa Protomulyo
-- Jalankan setelah: php artisan migrate
-- ============================================================

-- Password: admin123 (plaintext, sesuai sistem lama)
INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `created_at`, `updated_at`)
VALUES ('admin', 'admin123', 'Administrator Desa', NOW(), NOW());

-- Untuk keamanan lebih baik, ganti password di tabel users setelah setup
