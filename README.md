# Laporan Praktikum 12: Autentikasi dan Session

Autentikasi merupakan fitur penting dalam aplikasi web untuk memastikan bahwa hanya pengguna yang memiliki hak akses yang dapat menggunakan sistem. Pada praktikum ini dibuat sebuah aplikasi PHP berbasis OOP yang mengimplementasikan autentikasi pengguna, manajemen session, pengamanan password, serta pengelolaan artikel sebagai contoh penerapan CRUD (Create, Read).

## Tujuan Praktikum

1. Menerapkan konsep autentikasi dan session pada PHP

2. Menggunakan enkripsi password dengan password_hash()

3. Membuat fitur ubah password dengan validasi

4. Mengimplementasikan modul artikel berbasis CRUD

5. Membuat tampilan web yang rapi dan responsif menggunakan Bootstrap

## Struktur Folder

<img width="295" height="571" alt="image" src="https://github.com/user-attachments/assets/007c04bf-6ebd-4ac4-8015-59b93420c41a" />

## Database

1. Tabel users

Digunakan untuk menyimpan data pengguna dan autentikasi.

Field utama:

- id

- nama

- username

- password

- last_password_change

2. Tabel articles

Digunakan untuk menyimpan data artikel.

Field utama:

- id

- judul

- isi

- kategori

- penulis

- created_at

## Alur Autentikasi Sistem

<img width="254" height="313" alt="image" src="https://github.com/user-attachments/assets/68a4ed43-293e-4fe6-9cfb-1af9bebc170c" />

Keamanan

- Password dienkripsi menggunakan password_hash()

- Verifikasi password menggunakan password_verify()

- Proteksi halaman menggunakan session

- CSRF token pada form penting

- Logout otomatis setelah ganti password

## Halaman Profil User

Fitur:

- Menampilkan nama dan username user

- Menampilkan status login

- Menampilkan waktu terakhir perubahan password

- Form ubah password dengan validasi lengkap

## Modul Artikel

1. Daftar Artikel

- Menampilkan artikel dalam bentuk card grid

- Menampilkan judul, ringkasan, kategori, dan tanggal

- Tombol Baca Selengkapnya

2. Detail Artikel

- Tampilan full-width reading mode

- Menampilkan isi lengkap artikel

- Metadata: penulis, kategori, tanggal

- Breadcrumb navigasi

3. Tambah Artikel

- Form input judul, isi, kategori

- Penulis otomatis dari user login

- Status progres:

✅ Artikel berhasil disimpan

❌ Artikel gagal disimpan

## Flow Diagram Modul Artikel

<img width="249" height="371" alt="image" src="https://github.com/user-attachments/assets/9a2a24b5-a1d5-435d-81d5-11338a700bd4" />

## Screenshot

1. Halaman Login

<img width="957" height="515" alt="image" src="https://github.com/user-attachments/assets/177f14f9-8c45-4595-a460-8e30f24b18bb" />

<img width="957" height="514" alt="image" src="https://github.com/user-attachments/assets/9deef138-41a8-4f27-b52f-6b3cb593f577" />

<img width="958" height="586" alt="image" src="https://github.com/user-attachments/assets/8298068b-2592-47e0-895f-f7d2c7e7b2ff" />

2. Dashboard Profil User

<img width="956" height="731" alt="image" src="https://github.com/user-attachments/assets/7eef6ad2-ab9e-4f5a-9086-052b0ac10b76" />

3. Daftar Artikel

<img width="957" height="680" alt="image" src="https://github.com/user-attachments/assets/7948b76d-557c-4635-87e2-bae165edf009" />

4. Detail Artikel

<img width="957" height="567" alt="image" src="https://github.com/user-attachments/assets/74f0d73b-9e99-4ba4-b58b-bf16070ceb2d" />

5. Form Tambah Artikel

<img width="958" height="780" alt="image" src="https://github.com/user-attachments/assets/b4ff5733-fe10-4d72-bbe9-1391f6367250" />

<img width="956" height="780" alt="image" src="https://github.com/user-attachments/assets/8800597b-0e9b-4b64-9cac-5197a846a468" />

6. Alert sukses simpan artikel

<img width="957" height="841" alt="image" src="https://github.com/user-attachments/assets/abf831f5-db64-455b-be9d-22c279ddf41c" />

7. Database tabel articles

<img width="958" height="656" alt="image" src="https://github.com/user-attachments/assets/e3278bce-58ee-40aa-b182-7a331147d2c2" />

8. Database field last_password_change

<img width="957" height="624" alt="image" src="https://github.com/user-attachments/assets/e0b8e617-b0e8-49cb-8e22-1217d0f0e13a" />

<img width="959" height="614" alt="image" src="https://github.com/user-attachments/assets/1e1d4ede-24bc-4884-82c7-b76e99304096" />

<img width="957" height="595" alt="image" src="https://github.com/user-attachments/assets/0b04af2b-e032-43cf-a304-19f4dda6ce69" />
