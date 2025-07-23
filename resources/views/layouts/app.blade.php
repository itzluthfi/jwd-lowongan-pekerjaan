<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#64748b'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <h1 class="text-xl font-bold text-primary">JobPortal</h1>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="/" class="text-gray-700 hover:text-primary transition-colors duration-200 font-medium">Home</a></li>
                        <li><a href="{{ route('lowongan.index') }}" class="text-gray-700 hover:text-primary transition-colors duration-200 font-medium">Lowongan</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary transition-colors duration-200 font-medium">Contact</a></li>
                        <li><a href="{{ route('informasi-umum') }}" class="text-gray-700 hover:text-primary transition-colors duration-200 font-medium">Informasi Umum</a></li>
                    </ul>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="/login" class="text-gray-700 hover:text-primary transition-colors duration-200 font-medium">Login</a>
                        <a href="/register" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">Register</a>
                    @else
                        <div class="relative inline-block text-left">
                            <button id="profileMenuButton" class="flex items-center space-x-2 focus:outline-none">
                                <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-10">
                                <div class="px-4 py-2 text-gray-700 border-b">{{ Auth::user()->email }}</div>
                                <a href="/profil" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                                <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2">
                                    @csrf
                                    <button type="submit" class="w-full text-left text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md font-medium">Home</a>
                <a href="/lowongan" class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md font-medium">Lowongan</a>
                @auth
                    <a href="/profil" class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md font-medium">Profil</a>
                @endauth
                <a href="/contact" class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md font-medium">Contact</a>
                <a href="/informasi-umum" class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md font-medium">Informasi Umum</a>
                <div class="border-t border-gray-200 pt-2">
                    @guest
                        <a href="/login" class="block px-3 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md font-medium">Login</a>
                        <a href="/register" class="block px-3 py-2 bg-primary text-white hover:bg-blue-700 rounded-md font-medium mx-3">Register</a>
                    @else
                        <a href="/profil" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
                        <form action="{{ route('logout') }}" method="POST" class="block px-3 py-2">
                            @csrf
                            <button type="submit" class="w-full text-left text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: @json(session('success')),
                        timer: 2500,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif
        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: @json(session('error')),
                        timer: 3000,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Error',
                        html: `<ul style='text-align:left;'>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                        showConfirmButton: true
                    });
                });
            </script>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-600">
                <p>&copy; 2024 JobPortal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        const profileMenuButton = document.getElementById('profileMenuButton');
        const profileDropdown = document.getElementById('profileDropdown');
        if (profileMenuButton && profileDropdown) {
            profileMenuButton.addEventListener('click', function() {
                profileDropdown.classList.toggle('hidden');
            });
            document.addEventListener('click', function(e) {
                if (!profileMenuButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>
