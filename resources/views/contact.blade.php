@extends('layouts.app')
@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
        <p class="text-xl text-gray-600">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami!</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h2>
            <form class="space-y-6" onsubmit="return sendMessageToWhatsApp()">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">Nama Depan</label>
                        <input type="text" id="firstName" name="firstName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
                        <input type="text" id="lastName" name="lastName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                    <select id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none" required>
                        <option value="">Pilih Subjek</option>
                        <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                        <option value="Pertanyaan Lowongan">Pertanyaan Lowongan</option>
                        <option value="Masalah Teknis">Masalah Teknis</option>
                        <option value="Kerjasama">Kerjasama</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none resize-none" placeholder="Tulis pesan Anda di sini..." required></textarea>
                </div>

                <button type="submit" class="w-full bg-primary text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                    Kirim Pesan
                </button>
            </form>
        </div>


        <div class="space-y-8">
            <div class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h2>
                <div class="space-y-6">

                    <div class="flex items-start space-x-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-lg">
                            ☎️
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Telepon</h3>
                            <p class="text-gray-600 mt-1">+62 881 02688 6561</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-lg">
                            📧
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Email</h3>
                            <p class="text-gray-600 mt-1">info@jobportal.com</p>
                            <p class="text-gray-600">support@jobportal.com</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">FAQ</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara melamar pekerjaan?</h3>
                        <p class="text-gray-600 text-sm">Anda dapat melamar pekerjaan dengan membuat akun terlebih dahulu, kemudian klik tombol "Lamar Sekarang" pada lowongan yang diminati.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Apakah layanan ini gratis?</h3>
                        <p class="text-gray-600 text-sm">Ya, layanan pencarian kerja di JobPortal sepenuhnya gratis untuk pencari kerja.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara menghubungi perusahaan?</h3>
                        <p class="text-gray-600 text-sm">Setelah melamar, Anda dapat menghubungi perusahaan melalui informasi kontak yang tersedia di detail lowongan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendMessageToWhatsApp() {
            const firstName = document.getElementById('firstName').value.trim();
            const lastName = document.getElementById('lastName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const subject = document.getElementById('subject').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!firstName || !lastName || !email || !subject || !message) {
                alert("Silakan lengkapi semua data yang wajib diisi.");
                return false;
            }

            const fullName = `${firstName} ${lastName}`;
            const whatsappNumber = "62881026886561";
            const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(
                `Halo Admin,Saya ingin menghubungi Anda dengan detail sebagai berikut:👤 Nama: ${fullName}, 📧 Email: ${email},📞 Telepon: ${phone || '-'}, 📌 Subjek: ${subject}, 📝 Pesan: ${message}`
            )}`;

            window.open(url, "_blank");
            return false;
        }
    </script>
@endsection
