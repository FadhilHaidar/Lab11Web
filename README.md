# Lab11WebFramework

Framework web sederhana berbasis PHP OOP — hasil praktikum lab 11.

## Ringkasan
Project ini adalah framework minimal yang:
- Modular (folder `module/` untuk tiap modul)
- Front controller + routing (PATH_INFO)
- Class `Database` & `Form` (OOP)
- UI: Tech Dashboard + Apple Clean UI (Bootstrap 5)
- Fitur: CRUD users, form draft (localStorage), validation checklist, status messages.

## Struktur
(Lihat struktur di README project)

## Cara menjalankan (local)
1. Copy folder `Lab11WebFramework` ke `htdocs` (XAMPP).
2. Pastikan `mod_rewrite` aktif dan `.htaccess` memiliki `RewriteBase` sesuai.
3. Import `migration.sql` di phpMyAdmin (atau jalankan).
4. Edit `config.php` jika user/pass berbeda.
5. Akses `http://localhost/Lab11WebFramework/`

## Fitur penting
- Routing: `/module/action` → `index.php?/module/action`
- Draft: form user auto-save ke localStorage setiap 3 detik + tombol Save Draft + Clear Draft
- Progress checklist: realtime validate nama/email/password
- Debugging: error DB dan query dilempar sebagai Exception dan ditampilkan (berguna untuk praktikum)

## Catatan keamanan & pengembangan
- Password disimpan hashed (password_hash).
- Untuk produksi: tambahkan CSRF, sanitasi output lebih ketat, pagination, dan role-based auth.
- Jika ingin ZIP proyek, minta dan saya akan buatkan.

## Screenshots
Tambahkan screenshot hasil running di folder `screenshots/` dan update README.

