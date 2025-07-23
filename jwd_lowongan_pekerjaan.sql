-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jul 2025 pada 07.37
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd_lowongan_pekerjaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongans`
--

CREATE TABLE `lowongans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kualifikasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lowongans`
--

INSERT INTO `lowongans` (`id`, `nama_perusahaan`, `posisi`, `lokasi`, `deskripsi`, `kualifikasi`, `tanggal_kadaluarsa`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'PT. Tech Indonesia', 'Frontend Developer', 'Jakarta', 'Mencari frontend developer dengan pengalaman React.js dan TypeScript.', 'Pengalaman min. 2 tahun, menguasai React.js dan TypeScript.', '2025-08-23', 'hr@techindonesia.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(2, 'PT. Creative Studio', 'UI/UX Designer', 'Bandung', 'Dibutuhkan UI/UX Designer yang kreatif untuk aplikasi mobile.', 'Pengalaman min. 1 tahun, portofolio desain UI/UX.', '2025-08-23', 'hr@creativestudio.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(3, 'PT. Digital Solutions', 'Backend Developer', 'Surabaya', 'Mencari backend developer dengan keahlian Node.js dan database management.', 'Pengalaman min. 2 tahun, menguasai Node.js dan database.', '2025-08-23', 'hr@digitalsolutions.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(4, 'PT. Media Nusantara', 'Content Writer', 'Yogyakarta', 'Menulis konten kreatif untuk website dan media sosial.', 'Pengalaman min. 1 tahun, mampu menulis dengan baik.', '2025-08-06', 'hr@medianusantara.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(5, 'PT. Finance Pro', 'Accountant', 'Jakarta', 'Mengelola laporan keuangan perusahaan.', 'S1 Akuntansi, pengalaman min. 2 tahun.', '2025-08-02', 'hr@financepro.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(6, 'PT. Retail Mart', 'Store Manager', 'Semarang', 'Memimpin operasional toko dan tim sales.', 'Pengalaman retail min. 3 tahun.', '2025-08-23', 'hr@retailmart.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(7, 'PT. EduTech', 'Mobile App Developer', 'Malang', 'Membuat aplikasi edukasi berbasis Android/iOS.', 'Pengalaman min. 2 tahun, menguasai Flutter/React Native.', '2025-08-23', 'hr@edutech.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(8, 'PT. HealthCare', 'Marketing Executive', 'Medan', 'Promosi produk kesehatan ke rumah sakit dan klinik.', 'Pengalaman min. 1 tahun di bidang marketing.', '2025-08-13', 'hr@healthcare.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(9, 'PT. Transportasi Cerdas', 'Driver', 'Jakarta', 'Driver untuk layanan transportasi online.', 'Memiliki SIM A, usia min. 21 tahun.', '2025-08-07', 'hr@transportasicerdas.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(10, 'PT. Foodies', 'Chef', 'Bali', 'Chef untuk restoran fine dining.', 'Pengalaman min. 3 tahun sebagai chef.', '2025-08-23', 'hr@foodies.com', '2025-07-23 00:37:04', '2025-07-23 00:37:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_22_041224_create_lowongans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@jobportal.com', '$2y$12$69MVZ10MjNkF9KLTQwOe0OfKQc85GVFWMfw1qIISKNrDer8kOkkuy', 'admin', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(2, 'User Satu', 'user1@jobportal.com', '$2y$12$R9eu1azzQO4pYG1e1zUc3On5onCFKqgMC0nm00KTXI54zvItndcdu', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(3, 'User Dua', 'user2@jobportal.com', '$2y$12$cLNdnh57N62.pxMLjhTHKeD1DcMyQkRc1PK1lTrKTi6dT31joE4fq', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(4, 'User Tiga', 'user3@jobportal.com', '$2y$12$eQI0k7WVQkOZtOzlRc.DM.6yY7rUpFc4tsNfLsrpUQLT24kT9JZ7q', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(5, 'User Empat', 'user4@jobportal.com', '$2y$12$yYF/c8DJ1A7psb2913UKCOrGF17eaE365ou0jJgCqAA/rNgnVG65W', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(6, 'User Lima', 'user5@jobportal.com', '$2y$12$j5Q5A.MGXOnl5zqLBR2T3uz9RMHVD18I89q1hC8kGZyxN1K1doeeK', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(7, 'User Enam', 'user6@jobportal.com', '$2y$12$eDYi/4W8UjwV6JluZJd3dOiDr2gUZoj2ptosfgeqP65x7YOrlZ3hG', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(8, 'User Tujuh', 'user7@jobportal.com', '$2y$12$BB1ze8kD9MVGgUHauv1cE.ydaaoox.RfT4Wpispoe7FU1iy.v77ki', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(9, 'User Delapan', 'user8@jobportal.com', '$2y$12$EVONr5uLArCFLJA1DGSqpulu1dTEkr4gjow4CjBrutrjQo4ivKJQO', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(10, 'User Sembilan', 'user9@jobportal.com', '$2y$12$TVlTk3LaV5UnhL51j1Fo5uINWCuh3/sbunOeh01HwaSi52BvvBh4u', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04'),
(11, 'User Sepuluh', 'user10@jobportal.com', '$2y$12$eCRP2XSL5BCqP7i/wgoM4ulkXzPpRLeoLuVwN6D.2DxSZ4wWG7LOm', 'user', '2025-07-23 00:37:04', '2025-07-23 00:37:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
