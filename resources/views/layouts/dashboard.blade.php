<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lowongan Pekerjaan</title>
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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <h1 class="text-xl font-bold text-primary">JobPortal</h1>
                    </a>
                    <div class="hidden sm:block">
                        <span class="text-gray-400">|</span>
                        <span class="ml-4 font-semibold text-gray-700">Dashboard</span>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobileMenuButton" class="text-gray-700 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 rounded-md p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Profile Dropdown -->
                <div class="hidden md:block">
                    <div class="relative inline-block text-left">
                        <button id="profileMenuButton" class="flex items-center space-x-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors duration-200">
                            <div class="w-8 h-8 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700">{{ Auth::user()->name ?? 'Profil' }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-20 overflow-hidden">
                            <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                                <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email ?? '' }}</p>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('profil') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil Saya
                                </a>

                                <div class="border-t border-gray-100">
                                    <form action="{{ route('logout') }}" method="POST" class="block">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-3 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Profile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white border-t border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                        <p class="text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="py-2">
                <a href="{{ route('profil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar Kiri -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow bg-white border-r border-gray-200 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-grow flex flex-col">
                        <nav class="flex-1 px-4 space-y-1">

                            {{--  admin --}}
                            @if (Auth::user() && Auth::user()->role === 'admin')
                                <a href="{{ route('home') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                                    </svg>
                                    Beranda
                                </a>
                                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.lowongan.index') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                                    </svg>
                                    Kelola Lowongan
                                </a>
                                <a href="{{ route('admin.user.index') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Kelola User
                                </a>
                                <a href="{{ route('profil') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil
                                </a>
                                {{--  user biasa --}}
                            @elseif (Auth::user() && Auth::user()->role === 'user')
                                <a href="{{ route('home') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Beranda
                                </a>
                                <a href="{{ route('profil') }}" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:text-primary hover:bg-blue-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profil
                                </a>
                            @endif
                        </nav>
                    </div>

                    <!-- Sidebar Footer -->
                    <div class="flex-shrink-0 px-4 py-4 border-t border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-primary bg-opacity-10 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name ?? 'User' }}</p>
                                <p class="text-xs text-gray-500 truncate">Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>


        <main class="flex-1 overflow-hidden min-h-screen ">
            <div class="p-4 sm:p-6 lg:p-8">
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
            </div>
        </main>
    </div>

    <script>
        const profileMenuButton = document.getElementById('profileMenuButton');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileMenuButton && profileDropdown) {
            profileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!profileMenuButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }

        // Mobile menu 
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                if (mobileSidebar) {
                    mobileSidebar.classList.toggle('hidden');
                }
            });
        }

        if (closeSidebar && mobileSidebar) {
            closeSidebar.addEventListener('click', function() {
                mobileSidebar.classList.add('hidden');
                if (mobileMenu) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        if (sidebarOverlay && mobileSidebar) {
            sidebarOverlay.addEventListener('click', function() {
                mobileSidebar.classList.add('hidden');
                if (mobileMenu) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // Tutup menu mobile saat klik di luar
        document.addEventListener('click', function(e) {
            if (mobileMenu && mobileMenuButton &&
                !mobileMenuButton.contains(e.target) &&
                !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
