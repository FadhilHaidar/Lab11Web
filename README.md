# Laporan Praktikum 11: PHP OOP Lanjutan

Framework web sederhana berbasis PHP OOP, dibuat untuk memenuhi tugas praktikum pemrograman web dengan konsep modularisasi, routing, template engine ringan, dan penerapan CRUD.

Proyek ini mengimplementasikan struktur web modern dengan pemisahan core, modules, templates, dan assets, sehingga mudah dikembangkan, dipelihara, dan dipahami oleh pemula.

## Tujuan Praktikum

1. Membuat framework web sederhana berbasis PHP OOP.

2. Menerapkan modularisasi kode (module user, module artikel, dll).

3. Membuat sistem routing otomatis menggunakan parameter URL.

4. Menerapkan CRUD User dengan form lengkap.

5. Menampilkan data dengan tabel + tampilan kartu (card).

6. Membuat search filter dan pagination.

7. Menyimpan data sementara menggunakan localStorage (autosave draft).

8. Menerapkan layout responsif menggunakan Bootstrap 5.

## Struktur Direktori Project

<img width="493" height="558" alt="image" src="https://github.com/user-attachments/assets/92775a63-7eed-490f-82ae-828b0cd114d9" />

## Fitur-Fitur Utama

1. Routing Modular

Menggunakan index.php?mod=user&act=index, router akan:

memilih modul

memilih controller

menjalankan method tertentu
Mirip mini-MVC sederhana.

2. OOP Database Class

Class Database.php menyediakan:

koneksi otomatis

query SELECT/INSERT/UPDATE/DELETE

error handling detail

sanitasi input (escape())

3. Modul User (CRUD Lengkap)

Fitur:

Tambah user

Edit user

Hapus user

Daftar user

Checkbox multi-hobi

Validasi dasar

Avatar opsional

Autosave draft form

4. Pagination & Search

Search berdasarkan nama/email

Pagination otomatis

Pagination tetap menyertakan keyword search

5. Frontend Modern

Bootstrap 5

Layout responsif

Switch tampilan Tabel ↔ Card

Komponen UI reusable

Dark mode toggle

Gallery + modal preview

6. LocalStorage Autosave Draft

Saat mengetik di form:

data disimpan ke localStorage

aman walau tab ditutup atau refresh

## Struktur Database

<img width="567" height="487" alt="image" src="https://github.com/user-attachments/assets/119e71e2-d4cf-450c-8ff6-23de1f7245d6" />

## Tampilan Antarmuka (UI Preview)

Halaman daftar user

<img width="1000" height="494" alt="image" src="https://github.com/user-attachments/assets/87fbb991-8943-4d7f-be80-664ddbd3d3a5" />

Form tambah

<img width="999" height="799" alt="image" src="https://github.com/user-attachments/assets/9e2542f9-f84c-4e08-9d4b-4e501f09c6b9" />

<img width="1001" height="792" alt="image" src="https://github.com/user-attachments/assets/05353103-82e3-46ea-9e91-269facb68c03" />

Form edit

<img width="998" height="600" alt="image" src="https://github.com/user-attachments/assets/9da6e4d0-e8b3-4385-9841-d02ae428dfd4" />

<img width="998" height="691" alt="image" src="https://github.com/user-attachments/assets/4f515a01-a3b7-4296-a7d2-22223718b6c0" />

Tabel ↔ Card switch

<img width="999" height="609" alt="image" src="https://github.com/user-attachments/assets/04d7375a-5d6e-430a-9bf6-cd2993430e58" />

Dark mode

<img width="998" height="582" alt="image" src="https://github.com/user-attachments/assets/f0ee8bdc-f757-4df1-aabc-2e6f2d6fe73e" />
