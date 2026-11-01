# Sistem Pelaporan dan Pemantauan Keamanan Makanan MBG

Mini Project Proyek 3, D3 Teknik Informatika

Aplikasi web untuk mencatat laporan, meninjau laporan, dan memantau tindak lanjut masalah keamanan makanan pada program Makan Bergizi Gratis (MBG) di lingkungan sekolah.

## 1. Identitas Mahasiswa

- **Nama:** Rama Dwi Nugraha
- **NIM:** 25151027
- **Kelas:** D3 2A
- **Kasus:** Kasus A, Pelaporan dan Pemantauan Keamanan Makanan MBG

## 2. Kebutuhan Environment

Perangkat lunak yang dibutuhkan untuk menjalankan aplikasi:

- PHP versi 8.2 atau lebih baru
- Composer 2.11.1
- MySQL
- Browser seperti Google Chrome, Microsoft Edge, atau Mozilla Firefox

## 3. Langkah Instalasi

### 1. Clone repositori

Jalankan perintah berikut untuk mengunduh proyek ke komputer:

```bash
git clone https://github.com/ramadwinugraha-027/Mini-Project.git
cd Mini-Project
```

Pastikan masuk ke folder proyek yang berisi file `artisan` sebelum menjalankan perintah Laravel berikutnya.

### 2. Pasang dependensi

Jalankan perintah berikut untuk memasang kebutuhan aplikasi:

```bash
composer install
```

### 3. Siapkan file environment

Buat file `.env` dari file `.env.example`.

Jika menggunakan Windows Command Prompt:

```bat
copy .env.example .env
```

Jika menggunakan Git Bash:

```bash
cp .env.example .env
```

### 4. Buat kunci aplikasi

Jalankan perintah berikut:

```bash
php artisan key:generate
```

### 5. Siapkan penyimpanan file bukti

Jalankan perintah berikut agar file bukti yang diunggah dapat diakses melalui aplikasi:

```bash
php artisan storage:link
```

## 4. Konfigurasi Database

Buat database dengan nama `mbg_db` melalui phpMyAdmin atau MySQL.

Selanjutnya, buka file `.env` dan sesuaikan konfigurasi database berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mbg_db
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan pengaturan MySQL di komputer yang digunakan.

## 5. Migration dan Seeding

Jalankan perintah berikut untuk membuat tabel dan mengisi database dengan data awal:

```bash
php artisan migrate:fresh --seed
```

Perintah tersebut akan menghapus tabel yang sudah ada, membuat ulang tabel, dan memasukkan data awal. Oleh karena itu, gunakan perintah ini hanya pada database pengembangan atau pengujian.

Data awal yang disiapkan meliputi:

- Data sekolah.
- Jadwal distribusi MBG.
- Akun untuk pengujian setiap peran.
- Contoh laporan untuk pengujian aplikasi.

## 6. Akun Demo Setiap Role

Gunakan akun berikut untuk menguji fitur sesuai dengan perannya.

Semua akun demo menggunakan kata sandi `password`.

| Peran | Alamat Email | Kata Sandi | Hak Akses |
|---|---|---|---|
| Pelapor 1 | `pelapor@mbg.test` | `password` | Membuat laporan, mengunggah bukti, dan mengedit laporan sendiri selama status masih diajukan. |
| Pelapor 2 | `pelapor2@mbg.test` | `password` | Digunakan untuk menguji pembatasan akses terhadap laporan milik pengguna lain. |
| Pemantau Komunitas | `pemantau@mbg.test` | `password` | Meninjau laporan, melihat laporan sejenis, dan mengubah status menjadi `ditinjau`. |
| Koordinator Komunitas | `koordinator@mbg.test` | `password` | Mencatat penerusan laporan ke instansi terkait, menyelesaikan laporan, dan membuka halaman rekapitulasi. |

## 7. Menjalankan Aplikasi

Pastikan server MySQL sudah berjalan sebelum memulai aplikasi.

### 1. Jalankan server Laravel

Buka terminal pada folder proyek, kemudian jalankan:

```bash
php artisan serve
```

### 2. Buka aplikasi

Buka browser dan akses alamat berikut:

```text
http://127.0.0.1:8000
```

Aplikasi siap digunakan untuk pengujian.

## 8. Panduan Pengujian Acceptance Criteria (AC-01 sampai AC-13)

Bagian ini menjelaskan cara menguji fitur aplikasi dan hasil yang diharapkan dari setiap pengujian.

| Kode AC | Fitur yang Diuji | Langkah Pengujian dan Hasil yang Diharapkan |
|---|---|---|
| **AC-01** | Login | Buka `/dashboard` sebelum login. Sistem mengarahkan pengguna ke halaman login. Setelah login menggunakan `pelapor@mbg.test`, pengguna dapat masuk ke aplikasi. |
| **AC-02** | Pelaporan | Buka `/reports/create`, isi formulir dengan data yang valid, lalu kirim. Laporan tersimpan di database dan muncul pada riwayat laporan. |
| **AC-03** | Validasi Formulir | Kosongkan kolom yang wajib diisi, lalu kirim formulir. Sistem menolak data dan menampilkan pesan kesalahan. |
| **AC-04** | Unggah Bukti | Coba unggah file dengan format yang tidak diizinkan, seperti `.exe`, atau file berukuran lebih dari 2 MB. Sistem menolak file tersebut. Gambar atau PDF berukuran maksimal 2 MB dapat diunggah jika sesuai dengan aturan validasi. |
| **AC-05** | Hak Akses Laporan | Login sebagai `pelapor@mbg.test`, lalu coba buka detail laporan milik pengguna lain, misalnya `/reports/2`. Sistem menolak akses dengan kode HTTP 403 Forbidden. Pastikan laporan tersebut memang milik pengguna lain. |
| **AC-06** | Perubahan Status | Login sebagai pemantau untuk meninjau laporan dan mengubah status menjadi `ditinjau`. Selanjutnya, login sebagai koordinator untuk mencatat penerusan dan menyelesaikan laporan sesuai alur aplikasi. |
| **AC-07** | Hak Akses Fitur | Coba kirim permintaan POST untuk meninjau atau meneruskan laporan menggunakan akun pelapor. Sistem menolak permintaan dengan kode HTTP 403 Forbidden. |
| **AC-08** | Validasi Tanggal | Masukkan tanggal kejadian yang lebih awal daripada tanggal distribusi makanan MBG. Sistem menolak data tersebut karena tidak sesuai dengan aturan yang berlaku. |
| **AC-09** | Pengambilan Data Distribusi | Pada formulir laporan, ubah pilihan sekolah. Sistem mengambil data distribusi menggunakan `fetch()` tanpa memuat ulang halaman. Proses dapat diperiksa melalui tab Network pada Developer Tools. |
| **AC-10** | Filter Laporan | Buka halaman rekapitulasi dan pilih sekolah tertentu. Sistem menampilkan laporan sesuai dengan sekolah yang dipilih. |
| **AC-11** | Pagination | Pindah halaman pada tabel rekap saat filter sekolah aktif. Pilihan filter tetap tersimpan pada URL menggunakan `withQueryString()`. |
| **AC-12** | Pencatatan Perubahan Status | Ubah status laporan, kemudian periksa tabel `report_status_logs`. Observer mencatat perubahan status secara otomatis, termasuk status sebelumnya dan status terbaru. |
| **AC-13** | Rekapitulasi | Buka halaman rekapitulasi. Sistem menampilkan tiga kartu ringkasan, yaitu Total, Sedang Diproses, dan Selesai, serta tabel yang berisi data laporan. |