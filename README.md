# Sistem Lowongan Pekerjaan - Test Junior Web Developer
Proyek Laravel untuk sistem manajemen lowongan pekerjaan yang dikembangkan sebagai bagian dari test Junior Web Developer.

## Persyaratan Sistem
Sebelum instalasi, pastikan sistem Anda memiliki:

- **PHP** >= 8.1
- **Composer** (PHP Package Manager)
- **Node.js** dan **NPM** (untuk asset management)
- **MySQL** atau database lain yang didukung Laravel
- **Web Server** (Apache/Nginx) atau menggunakan Laragon/XAMPP

## Langkah-langkah Instalasi
### 1. Clone Repository

```bash
git clone https://github.com/itzluthfi/jwd-lowongan-pekerjaan.git
cd jwd-lowongan-pekerjaan
```

### 2. Install Dependencies PHP

```bash
composer install
```

### 3. Install Dependencies JavaScript

```bash
npm install
```

### 4. Konfigurasi Environment

1. Salin file environment:
```bash
copy .env.example .env
```

2. Generate application key:
```bash
php artisan key:generate
```

3. Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jwd_lowongan_pekerjaan
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Setup Database

1. Buat database baru dengan nama `jwd_lowongan_pekerjaan`

2. Import file SQL yang disediakan:
```bash
# Jika menggunakan MySQL command line
mysql -u root -p jwd_lowongan_pekerjaan < jwd_lowongan_pekerjaan.sql
```

   Atau gunakan phpMyAdmin/tool database lainnya untuk import file `jwd_lowongan_pekerjaan.sql`

3. Alternatif: Jalankan migration dan seeder:
```bash
php artisan migrate
php artisan db:seed
```

### 6. Build Assets

```bash
npm run build
```

Atau untuk development:
```bash
npm run dev
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://localhost:8000`




## Tentang Proyek

Aplikasi web ini dibuat menggunakan Laravel framework untuk mengelola sistem lowongan pekerjaan dengan fitur-fitur:

- **Autentikasi Pengguna**: Login dan registrasi user
- **Manajemen Lowongan**: Menampilkan daftar lowongan pekerjaan
- **Profil Pengguna**: Pengelolaan profil user
- **Admin Panel**: Panel administrasi untuk mengelola lowongan
- **Responsive Design**: Interface yang responsif untuk berbagai perangkat



## Fitur Utama

### Untuk User Publik:
- **Home Page**: Halaman utama dengan informasi umum
- **Daftar Lowongan**: Melihat semua lowongan yang tersedia
- **Detail Lowongan**: Melihat detail lowongan (perlu login)
- **Contact**: Halaman kontak
- **Informasi Umum**: Halaman informasi umum

### Untuk User Terdaftar:
- **Login/Register**: Sistem autentikasi
- **Profil**: Mengelola profil pribadi
- **Detail Lowongan**: Akses penuh ke detail lowongan

### Untuk Admin:
- **Admin Panel**: Panel administrasi
- **Manajemen Lowongan**: CRUD operasi untuk lowongan
- **Manajemen User**: Pengelolaan user

## Struktur Database

Proyek ini menggunakan tabel utama:
- `users`: Data pengguna
- `lowongans`: Data lowongan pekerjaan
- `password_reset_tokens`: Token reset password
- `personal_access_tokens`: Token API (Sanctum)
- `failed_jobs`: Log pekerjaan yang gagal


## Kontribusi

Proyek ini dibuat untuk keperluan test Junior Web Developer. Jika Anda ingin berkontribusi:

1. Fork repository
2. Buat branch baru untuk fitur Anda
3. Commit perubahan Anda
4. Push ke branch
5. Buat Pull Request

## Kontak

Jika ada pertanyaan atau masalah terkait instalasi, silakan hubungi:
- **Developer**: Luthfi Shidqi Habibulloh
- **Email**: [Email Developer]
- **GitHub**: [itzluthfi](https://github.com/itzluthfi)

## License

Proyek ini menggunakan [MIT license](https://opensource.org/licenses/MIT).
