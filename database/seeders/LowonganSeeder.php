<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_perusahaan' => 'PT. Tech Indonesia',
                'posisi' => 'Frontend Developer',
                'lokasi' => 'Jakarta',
                'deskripsi' => 'Mencari frontend developer dengan pengalaman React.js dan TypeScript.',
                'kualifikasi' => 'Pengalaman min. 2 tahun, menguasai React.js dan TypeScript.',
                'tanggal_kadaluarsa' => now()->addMonth(),
                'kontak' => 'hr@techindonesia.com',
            ],
            [
                'nama_perusahaan' => 'PT. Creative Studio',
                'posisi' => 'UI/UX Designer',
                'lokasi' => 'Bandung',
                'deskripsi' => 'Dibutuhkan UI/UX Designer yang kreatif untuk aplikasi mobile.',
                'kualifikasi' => 'Pengalaman min. 1 tahun, portofolio desain UI/UX.',
                'tanggal_kadaluarsa' => now()->addMonth(),
                'kontak' => 'hr@creativestudio.com',
            ],
            [
                'nama_perusahaan' => 'PT. Digital Solutions',
                'posisi' => 'Backend Developer',
                'lokasi' => 'Surabaya',
                'deskripsi' => 'Mencari backend developer dengan keahlian Node.js dan database management.',
                'kualifikasi' => 'Pengalaman min. 2 tahun, menguasai Node.js dan database.',
                'tanggal_kadaluarsa' => now()->addMonth(),
                'kontak' => 'hr@digitalsolutions.com',
            ],
            [
                'nama_perusahaan' => 'PT. Media Nusantara',
                'posisi' => 'Content Writer',
                'lokasi' => 'Yogyakarta',
                'deskripsi' => 'Menulis konten kreatif untuk website dan media sosial.',
                'kualifikasi' => 'Pengalaman min. 1 tahun, mampu menulis dengan baik.',
                'tanggal_kadaluarsa' => now()->addWeeks(2),
                'kontak' => 'hr@medianusantara.com',
            ],
            [
                'nama_perusahaan' => 'PT. Finance Pro',
                'posisi' => 'Accountant',
                'lokasi' => 'Jakarta',
                'deskripsi' => 'Mengelola laporan keuangan perusahaan.',
                'kualifikasi' => 'S1 Akuntansi, pengalaman min. 2 tahun.',
                'tanggal_kadaluarsa' => now()->addDays(10),
                'kontak' => 'hr@financepro.com',
            ],
            [
                'nama_perusahaan' => 'PT. Retail Mart',
                'posisi' => 'Store Manager',
                'lokasi' => 'Semarang',
                'deskripsi' => 'Memimpin operasional toko dan tim sales.',
                'kualifikasi' => 'Pengalaman retail min. 3 tahun.',
                'tanggal_kadaluarsa' => now()->addMonth(),
                'kontak' => 'hr@retailmart.com',
            ],
            [
                'nama_perusahaan' => 'PT. EduTech',
                'posisi' => 'Mobile App Developer',
                'lokasi' => 'Malang',
                'deskripsi' => 'Membuat aplikasi edukasi berbasis Android/iOS.',
                'kualifikasi' => 'Pengalaman min. 2 tahun, menguasai Flutter/React Native.',
                'tanggal_kadaluarsa' => now()->addMonth(),
                'kontak' => 'hr@edutech.com',
            ],
            [
                'nama_perusahaan' => 'PT. HealthCare',
                'posisi' => 'Marketing Executive',
                'lokasi' => 'Medan',
                'deskripsi' => 'Promosi produk kesehatan ke rumah sakit dan klinik.',
                'kualifikasi' => 'Pengalaman min. 1 tahun di bidang marketing.',
                'tanggal_kadaluarsa' => now()->addWeeks(3),
                'kontak' => 'hr@healthcare.com',
            ],
            [
                'nama_perusahaan' => 'PT. Transportasi Cerdas',
                'posisi' => 'Driver',
                'lokasi' => 'Jakarta',
                'deskripsi' => 'Driver untuk layanan transportasi online.',
                'kualifikasi' => 'Memiliki SIM A, usia min. 21 tahun.',
                'tanggal_kadaluarsa' => now()->addDays(15),
                'kontak' => 'hr@transportasicerdas.com',
            ],
            [
                'nama_perusahaan' => 'PT. Foodies',
                'posisi' => 'Chef',
                'lokasi' => 'Bali',
                'deskripsi' => 'Chef untuk restoran fine dining.',
                'kualifikasi' => 'Pengalaman min. 3 tahun sebagai chef.',
                'tanggal_kadaluarsa' => now()->addMonth(),
                'kontak' => 'hr@foodies.com',
            ],
        ];
        foreach ($data as $item) {
            \App\Models\Lowongan::create($item);
        }
    }
}
