# Sistem Pelaporan dan Pemantauan Keamanan Makanan MBG

Mini Project Proyek 3 - D3 Teknik Informatika

Aplikasi web untuk pencatatan keluhan, penelaahan, serta pemantauan tindak lanjut laporan keamanan konsumsi makanan pada program Makan Bergizi Gratis (MBG) di lingkungan sekolah.

## 1. Identitas Mahasiswa

- **Nama:** Rama Dwi Nugraha
- **NIM:** 25151027
- **Kelas:** D3 2A
- **Kasus:** Kasus A - Pelaporan dan Pemantauan Keamanan Makanan MBG

## 2. Kebutuhan Environment

- PHP >= 8.2
- Composer 2.11.1
- MySQL
- Web browser modern, seperti Chrome, Edge, atau Firefox

## 3. Langkah Instalasi

1. Clone repositori ke komputer lokal:

   ```bash
   git clone https://github.com/ramadwinugraha-027/Mini-Project.git
   cd laravel-app
   ```

2. Pasang dependensi PHP:

   ```bash
   composer install
   ```

3. Salin file environment.

   Jika menggunakan Windows Command Prompt:

   ```bat
   copy .env.example .env
   ```

   Jika menggunakan Git Bash:

   ```bash
   cp .env.example .env
   ```

4. Buat kunci enkripsi aplikasi:

   ```bash
   php artisan key:generate
   ```

5. Buat symbolic link untuk penyimpanan berkas bukti:

   ```bash
   php artisan storage:link
   ```

## 4. Konfigurasi Database

Buat database bernama `mbg_db` melalui phpMyAdmin atau MySQL. Kemudian, sesuaikan konfigurasi berikut pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mbg_db
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL lokal yang digunakan.

## 5. Migration dan Seeding

Jalankan perintah berikut untuk membuat tabel sekaligus mengisi data demo:

```bash
php artisan migrate:fresh --seed
```

Perintah ini akan menghapus tabel yang ada, kemudian membuat ulang tabel dan mengisi data awal. Gunakan hanya pada database pengembangan atau pengujian.

Data demo meliputi data master sekolah, jadwal distribusi MBG, akun demonstrasi, dan sampel laporan awal.

## 6. Akun Demo Setiap Role

Semua akun pengujian menggunakan kata sandi yang sama, yaitu `password`.

| Peran (Role) | Alamat Email | Kata Sandi | Kewenangan Akses |
|---|---|---|---|
| **Pelapor 1** | `pelapor@mbg.test` | `password` | Membuat laporan, mengunggah bukti, dan mengedit laporan sendiri saat status masih diajukan. |
| **Pelapor 2** | `pelapor2@mbg.test` | `password` | Akun pembanding untuk menguji isolasi kepemilikan data (Ownership AC-05). |
| **Pemantau Komunitas** | `pemantau@mbg.test` | `password` | Meninjau laporan, melihat keterkaitan laporan sejenis, dan menandai status `ditinjau`. |
| **Koordinator Komunitas** | `koordinator@mbg.test` | `password` | Mencatat penerusan ke instansi eksternal (`diteruskan`), menyelesaikan laporan (`selesai`), dan membuka halaman rekapitulasi. |

## 7. Menjalankan Aplikasi

1. Pastikan server MySQL sudah berjalan.
2. Jalankan server pengembangan Laravel:

   ```bash
   php artisan serve
   ```

3. Buka browser dan akses alamat berikut:

   ```text
   http://127.0.0.1:8000
   ```

## 8. Panduan Pengujian Acceptance Criteria (AC-01 sampai AC-13)

| Kode AC | Area Pengujian | Langkah Pengujian dan Hasil yang Diharapkan |
|---|---|---|
| **AC-01** | Authentication | Akses `/dashboard` saat belum login. Pengguna diarahkan ke `/login`. Login dengan `pelapor@mbg.test` berhasil masuk. |
| **AC-02** | Pelaporan | Buka `/reports/create`, isi data valid, lalu kirim. Data tersimpan di database dan tampil di riwayat laporan. |
| **AC-03** | Server Validation | Kosongkan isian wajib pada formulir laporan. Permintaan ditolak dan pesan kesalahan ditampilkan. |
| **AC-04** | Evidence File | Unggah file yang tidak diizinkan, misalnya `.exe`, atau file berukuran lebih dari 2 MB. File ditolak server. Gambar atau PDF berukuran maksimal 2 MB berhasil disimpan. |
| **AC-05** | Ownership Privacy | Login sebagai `pelapor@mbg.test`, lalu coba buka URL detail laporan milik pengguna lain, misalnya `/reports/2`. Server menolak akses dengan **403 Forbidden**. Pastikan ID tersebut memang milik pengguna lain pada data pengujian. |
| **AC-06** | Alur Status | Login sebagai `pemantau@mbg.test`, telaah laporan, dan ubah status menjadi `ditinjau`. Login sebagai `koordinator@mbg.test`, catat penerusan, lalu selesaikan laporan sesuai alur aplikasi. |
| **AC-07** | Authorization | Pelapor mencoba mengirim permintaan POST untuk menelaah atau meneruskan status laporan. Permintaan ditolak dengan **403 Forbidden**. |
| **AC-08** | Business Rule BR-02 | Masukkan tanggal kejadian yang lebih awal daripada tanggal pembagian makanan MBG. Data ditolak oleh validasi bisnis. |
| **AC-09** | Async Interaction | Pada formulir laporan, ubah pilihan sekolah. Dropdown distribusi memuat data melalui `fetch()` tanpa memuat ulang halaman. Proses dapat diperiksa melalui tab Network di DevTools. |
| **AC-10** | Filter Data | Buka menu Rekapitulasi dan pilih filter sekolah. Daftar rekap tersaring sesuai sekolah yang dipilih. |
| **AC-11** | Pagination | Klik nomor halaman pada tabel rekap saat filter aktif. Parameter filter tetap dipertahankan pada URL melalui `withQueryString`. |
| **AC-12** | Eloquent Observer | Setiap kali status laporan diubah, `ReportObserver` secara otomatis mencatat perubahan ke tabel `report_status_logs`. |
| **AC-13** | Rekap Sederhana | Halaman rekap menampilkan tiga kartu metrik, yaitu Total, Sedang Diproses, dan Selesai, serta tabel ringkasan data aktual. |