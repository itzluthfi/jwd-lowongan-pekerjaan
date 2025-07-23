@extends('layouts.app')
@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Informasi Umum</h1>
        <p class="text-xl text-gray-600">Panduan lengkap menggunakan JobPortal</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm p-6 sticky top-8">
                <h3 class="font-semibold text-gray-900 mb-4">Daftar Isi</h3>
                <nav class="space-y-2">
                    <a href="#tentang" class="block text-gray-600 hover:text-primary py-2 px-3 rounded-lg hover:bg-gray-50">Tentang JobPortal</a>
                    <a href="#cara-kerja" class="block text-gray-600 hover:text-primary py-2 px-3 rounded-lg hover:bg-gray-50">Cara Kerja</a>
                    <a href="#panduan-pencari" class="block text-gray-600 hover:text-primary py-2 px-3 rounded-lg hover:bg-gray-50">Panduan Pencari Kerja</a>
                    <a href="#panduan-perusahaan" class="block text-gray-600 hover:text-primary py-2 px-3 rounded-lg hover:bg-gray-50">Panduan Perusahaan</a>
                    <a href="#tips-sukses" class="block text-gray-600 hover:text-primary py-2 px-3 rounded-lg hover:bg-gray-50">Tips Sukses</a>
                    <a href="#faq" class="block text-gray-600 hover:text-primary py-2 px-3 rounded-lg hover:bg-gray-50">FAQ</a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-8">
            <!-- Tentang JobPortal -->
            <section id="tentang" class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Tentang JobPortal</h2>
                <div class="prose max-w-none">
                    <p class="text-gray-700 mb-4">
                        JobPortal adalah platform pencarian kerja terdepan di Indonesia yang menghubungkan pencari kerja dengan perusahaan-perusahaan terbaik.
                        Kami berkomitmen untuk membantu Anda menemukan pekerjaan yang sesuai dengan keahlian dan passion Anda.
                    </p>
                    <p class="text-gray-700 mb-4">
                       JobPortal bisa menjadi pilihan utama untuk
                        memulai atau mengembangkan karir Anda dari sekarang.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="text-center">
                            <div class="bg-primary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">{{ $totalLowongan }}+</h3>
                            <p class="text-gray-600">Lowongan Aktif</p>
                        </div>

                        <div class="text-center">
                            <div class="bg-primary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">{{ $totalUser }}+</h3>
                            <p class="text-gray-600">Pengguna Aktif</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cara Kerja -->
            <section id="cara-kerja" class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Cara Kerja JobPortal</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-primary">1</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Daftar & Buat Profil</h3>
                        <p class="text-gray-600">Buat akun gratis dan lengkapi profil Anda dengan informasi yang menarik</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-primary">2</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Cari & Lamar</h3>
                        <p class="text-gray-600">Temukan lowongan yang sesuai dan lamar dengan mudah melalui platform kami</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-primary">3</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Dapatkan Pekerjaan</h3>
                        <p class="text-gray-600">Ikuti proses seleksi dan raih pekerjaan impian Anda</p>
                    </div>
                </div>
            </section>

            <!-- Panduan Pencari Kerja -->
            <section id="panduan-pencari" class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Panduan untuk Pencari Kerja</h2>
                <div class="space-y-6">
                    <div class="border-l-4 border-primary pl-6">
                        <h3 class="font-semibold text-gray-900 mb-2">1. Membuat Profil yang Menarik</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Gunakan foto profil yang profesional</li>
                            <li>• Tulis ringkasan yang menggambarkan keahlian Anda</li>
                            <li>• Lengkapi pengalaman kerja dan pendidikan</li>
                            <li>• Tambahkan skill dan sertifikasi yang relevan</li>
                        </ul>
                    </div>
                    <div class="border-l-4 border-primary pl-6">
                        <h3 class="font-semibold text-gray-900 mb-2">2. Mencari Lowongan</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Gunakan filter untuk mempersempit pencarian</li>
                            <li>• Baca deskripsi pekerjaan dengan teliti</li>
                            <li>• Perhatikan requirements dan qualifications</li>
                            <li>• Simpan lowongan yang menarik untuk nanti</li>
                        </ul>
                    </div>
                    <div class="border-l-4 border-primary pl-6">
                        <h3 class="font-semibold text-gray-900 mb-2">3. Melamar Pekerjaan</h3>
                        <ul class="text-gray-700 space-y-1">
                            <li>• Pastikan CV Anda up-to-date</li>
                            <li>• Tulis cover letter yang personal</li>
                            <li>• Submit aplikasi sebelum deadline</li>
                            <li>• Follow up jika diperlukan</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Tips Sukses -->
            <section id="tips-sukses" class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Tips Sukses Mencari Kerja</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-3">💼 Persiapan CV</h3>
                        <ul class="text-gray-700 space-y-2 text-sm">
                            <li>• Sesuaikan CV dengan posisi yang dilamar</li>
                            <li>• Gunakan format yang clean dan mudah dibaca</li>
                            <li>• Highlight achievement, bukan hanya job description</li>
                            <li>• Maksimal 2 halaman untuk fresh graduate</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-3">🎯 Strategi Pencarian</h3>
                        <ul class="text-gray-700 space-y-2 text-sm">
                            <li>• Set job alert untuk posisi yang diminati</li>
                            <li>• Apply maksimal 5-10 posisi per hari</li>
                            <li>• Research company sebelum apply</li>
                            <li>• Network dengan profesional di industri</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-3">📝 Interview Preparation</h3>
                        <ul class="text-gray-700 space-y-2 text-sm">
                            <li>• Pelajari common interview questions</li>
                            <li>• Prepare STAR method untuk behavioral questions</li>
                            <li>• Siapkan pertanyaan untuk interviewer</li>
                            <li>• Practice dengan mock interview</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-gray-900 mb-3">🚀 Personal Branding</h3>
                        <ul class="text-gray-700 space-y-2 text-sm">
                            <li>• Optimasi LinkedIn profile</li>
                            <li>• Build portfolio online</li>
                            <li>• Aktif di komunitas profesional</li>
                            <li>• Share knowledge melalui artikel/blog</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- FAQ -->
            <section id="faq" class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="font-semibold text-gray-900 mb-2">Apakah JobPortal gratis untuk pencari kerja?</h3>
                        <p class="text-gray-700">Ya, semua fitur JobPortal untuk pencari kerja sepenuhnya gratis. Anda dapat membuat profil, mencari lowongan, dan melamar pekerjaan tanpa biaya apapun.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara mengetahui status lamaran saya?</h3>
                        <p class="text-gray-700">Anda dapat melihat status lamaran di dashboard profil Anda. Kami juga akan mengirimkan notifikasi email untuk setiap update status lamaran.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="font-semibold text-gray-900 mb-2">Bisakah saya melamar ke beberapa posisi di perusahaan yang sama?</h3>
                        <p class="text-gray-700">Ya, Anda dapat melamar ke beberapa posisi yang berbeda di perusahaan yang sama, asalkan Anda memenuhi kualifikasi untuk masing-masing posisi.</p>
                    </div>
                    <div class="border-b border-gray-200 pb-6">
                        <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara menghapus akun saya?</h3>
                        <p class="text-gray-700">Anda dapat menghapus akun melalui pengaturan profil atau menghubungi customer service kami. Semua data Anda akan dihapus secara permanen.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Apakah data pribadi saya aman?</h3>
                        <p class="text-gray-700">Keamanan data adalah prioritas utama kami. Kami menggunakan enkripsi SSL dan mengikuti standar keamanan internasional untuk melindungi informasi pribadi Anda.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
