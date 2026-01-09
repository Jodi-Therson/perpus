<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibSys - Perpustakaan Digital</title>
    
    <!-- Fonts: Figtree -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons: FontAwesome (Menggunakan versi stabil 6.4.0) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS (Versi 3.4 Script untuk Development) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    },
                    colors: {
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937', 
                            900: '#111827', 
                            950: '#030712', 
                        },
                        indigo: {
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .glass-nav {
            background-color: rgba(17, 24, 39, 0.85);
            backdrop-filter: blur(12px);
        }
        
        /* Custom Scrollbar untuk tampilan lebih rapi di dark mode */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #111827; 
        }
        ::-webkit-scrollbar-thumb {
            background: #374151; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4b5563; 
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans antialiased selection:bg-indigo-500 selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 glass-nav border-b border-gray-200 dark:border-gray-800 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-600 text-white w-8 h-8 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-500/30">
                        <i class="fa-solid fa-book-open text-sm"></i>
                    </div>
                    <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">LibSys</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-white transition">Beranda</a>
                    <a href="#koleksi" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-white transition">Koleksi</a>
                    <a href="#fitur" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-white transition">Fitur</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    <a href="login" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition px-3 py-2">
                        Masuk
                    </a>
                    <a href="register" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold px-4 py-2 rounded-lg transition shadow-lg shadow-indigo-600/20">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
        <!-- Background Gradients -->
        <div class="absolute top-0 left-1/2 w-full -translate-x-1/2 h-full z-0 pointer-events-none opacity-40 dark:opacity-20">
            <div class="absolute top-20 left-1/4 w-96 h-96 bg-indigo-500 rounded-full blur-[128px]"></div>
            <div class="absolute bottom-20 right-1/4 w-80 h-80 bg-purple-500 rounded-full blur-[128px]"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-200 dark:border-indigo-800 text-indigo-600 dark:text-indigo-300 text-xs font-semibold mb-6 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                Sistem Perpustakaan Digital Terintegrasi
            </div>

            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-gray-900 dark:text-white mb-6 leading-tight animate-fade-in-up">
                Akses Pengetahuan <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Tanpa Batas</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed animate-fade-in-up" style="animation-delay: 0.1s;">
                Platform modern untuk meminjam buku fisik, membaca jurnal, dan mengelola referensi akademik Anda dalam satu tempat.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16 animate-fade-in-up" style="animation-delay: 0.2s;">
                <a href="register" class="bg-indigo-600 hover:bg-indigo-700 text-white text-base font-bold px-8 py-3.5 rounded-xl shadow-xl shadow-indigo-600/20 transition hover:-translate-y-1">
                    Mulai Sekarang
                </a>
                <a href="#koleksi" class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-900 dark:text-white border border-gray-200 dark:border-gray-700 text-base font-semibold px-8 py-3.5 rounded-xl transition hover:-translate-y-1">
                    Lihat Koleksi
                </a>
            </div>

            <!-- Dashboard Preview Mockup -->
            <div class="relative mx-auto max-w-5xl rounded-2xl bg-gray-900/5 dark:bg-gray-100/5 p-2 ring-1 ring-inset ring-gray-900/10 dark:ring-white/10 lg:rounded-3xl lg:p-4 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="rounded-xl bg-white dark:bg-gray-800 shadow-2xl ring-1 ring-gray-900/10 dark:ring-black/20 overflow-hidden">
                    <!-- Fake Browser Bar -->
                    <div class="flex items-center gap-2 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-3">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <div class="mx-auto text-xs text-gray-400 font-mono">localhost:8000/dashboard</div>
                    </div>
                    <!-- Mock Content -->
                    <div class="p-6 grid grid-cols-3 gap-6 opacity-50 blur-[1px] select-none pointer-events-none">
                        <div class="col-span-2 space-y-4">
                            <div class="h-32 bg-gray-100 dark:bg-gray-700/50 rounded-lg"></div>
                            <div class="h-64 bg-gray-100 dark:bg-gray-700/50 rounded-lg"></div>
                        </div>
                        <div class="space-y-4">
                            <div class="h-20 bg-gray-100 dark:bg-gray-700/50 rounded-lg"></div>
                            <div class="h-20 bg-gray-100 dark:bg-gray-700/50 rounded-lg"></div>
                            <div class="h-48 bg-gray-100 dark:bg-gray-700/50 rounded-lg"></div>
                        </div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="bg-indigo-600/90 text-white px-6 py-3 rounded-full font-bold backdrop-blur-sm shadow-xl">
                            Tampilan Dashboard User
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="border-y border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100 dark:divide-gray-800">
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white mb-1">100+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Buku & Jurnal</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white mb-1">50+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Anggota Aktif</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white mb-1">24h</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Akses Sistem</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white mb-1">4.9</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Rating Pengguna</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Books Preview Section -->
    <div id="koleksi" class="py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Koleksi Terpopuler</h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-xl">
                        Temukan buku-buku yang paling banyak diminati oleh komunitas kami minggu ini.
                    </p>
                </div>
                <a href="login" class="hidden md:inline-flex items-center text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                    Lihat Semua Koleksi <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Book Card 1 -->
                <div class="group flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=400" alt="Book" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/80 dark:text-indigo-300 backdrop-blur-sm">
                                Fiksi
                            </span>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-1 mb-1 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">The Psychology of Money</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Morgan Housel</p>
                        <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100 dark:border-gray-700">
                            <span class="text-xs font-medium text-green-600 dark:text-green-400 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span> Tersedia
                            </span>
                            <button class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div class="group flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1592496431122-2349e0fbc666?auto=format&fit=crop&q=80&w=400" alt="Book" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/80 dark:text-indigo-300 backdrop-blur-sm">
                                Teknologi
                            </span>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-1 mb-1 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">Clean Code</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Robert C. Martin</p>
                        <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100 dark:border-gray-700">
                            <span class="text-xs font-medium text-yellow-600 dark:text-yellow-400 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-yellow-500"></span> Terbatas
                            </span>
                            <button class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div class="group flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=400" alt="Book" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/80 dark:text-indigo-300 backdrop-blur-sm">
                                Sejarah
                            </span>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-1 mb-1 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">Sapiens: A Brief History</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Yuval Noah Harari</p>
                        <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100 dark:border-gray-700">
                            <span class="text-xs font-medium text-red-600 dark:text-red-400 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-red-500"></span> Habis
                            </span>
                            <button class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div class="group flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 overflow-hidden">
                    <div class="h-48 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1629196914375-f7e48f477b6d?auto=format&fit=crop&q=80&w=400" alt="Book" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/80 dark:text-indigo-300 backdrop-blur-sm">
                                Sains
                            </span>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white line-clamp-1 mb-1 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">Astrophysics</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Neil deGrasse Tyson</p>
                        <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100 dark:border-gray-700">
                            <span class="text-xs font-medium text-green-600 dark:text-green-400 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span> Tersedia
                            </span>
                            <button class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center md:hidden">
                <a href="#" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                    Lihat Semua Koleksi <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="fitur" class="py-24 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 dark:text-gray-400">Dirancang untuk memudahkan pengalaman membaca dan manajemen buku Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/50 rounded-2xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl mb-6 shadow-sm">
                        <!-- SVG Peminjaman Cepat -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current" viewBox="0 0 640 640"><path d="M434.8 54.1C446.7 62.7 451.1 78.3 445.7 91.9L367.3 288L512 288C525.5 288 537.5 296.4 542.1 309.1C546.7 321.8 542.8 336 532.5 344.6L244.5 584.6C233.2 594 217.1 594.5 205.2 585.9C193.3 577.3 188.9 561.7 194.3 548.1L272.7 352L128 352C114.5 352 102.5 343.6 97.9 330.9C93.3 318.2 97.2 304 107.5 295.4L395.5 55.4C406.8 46 422.9 45.5 434.8 54.1z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Peminjaman Cepat</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        Proses peminjaman tanpa antri. Cukup scan QR code atau booking lewat aplikasi.
                    </p>
                </div>
                <!-- Feature 2 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/50 rounded-2xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl mb-6 shadow-sm">
                        <!-- SVG Notifikasi Pintar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current" viewBox="0 0 640 640"><path d="M320 64C302.3 64 288 78.3 288 96L288 99.2C215 114 160 178.6 160 256L160 277.7C160 325.8 143.6 372.5 113.6 410.1L103.8 422.3C98.7 428.6 96 436.4 96 444.5C96 464.1 111.9 480 131.5 480L508.4 480C528 480 543.9 464.1 543.9 444.5C543.9 436.4 541.2 428.6 536.1 422.3L526.3 410.1C496.4 372.5 480 325.8 480 277.7L480 256C480 178.6 425 114 352 99.2L352 96C352 78.3 337.7 64 320 64zM258 528C265.1 555.6 290.2 576 320 576C349.8 576 374.9 555.6 382 528L258 528z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Notifikasi Pintar</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        Dapatkan pengingat otomatis sebelum masa peminjaman Anda habis untuk menghindari denda.
                    </p>
                </div>
                <!-- Feature 3 -->
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/50 rounded-2xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl mb-6 shadow-sm">
                        <!-- SVG Katalog Lengkap -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 fill-current" viewBox="0 0 640 640"><path d="M296.5 69.2C311.4 62.3 328.6 62.3 343.5 69.2L562.1 170.2C570.6 174.1 576 182.6 576 192C576 201.4 570.6 209.9 562.1 213.8L343.5 314.8C328.6 321.7 311.4 321.7 296.5 314.8L77.9 213.8C69.4 209.8 64 201.3 64 192C64 182.7 69.4 174.1 77.9 170.2L296.5 69.2zM112.1 282.4L276.4 358.3C304.1 371.1 336 371.1 363.7 358.3L528 282.4L562.1 298.2C570.6 302.1 576 310.6 576 320C576 329.4 570.6 337.9 562.1 341.8L343.5 442.8C328.6 449.7 311.4 449.7 296.5 442.8L77.9 341.8C69.4 337.8 64 329.3 64 320C64 310.7 69.4 302.1 77.9 298.2L112 282.4zM77.9 426.2L112 410.4L276.3 486.3C304 499.1 335.9 499.1 363.6 486.3L527.9 410.4L562 426.2C570.5 430.1 575.9 438.6 575.9 448C575.9 457.4 570.5 465.9 562 469.8L343.4 570.8C328.5 577.7 311.3 577.7 296.4 570.8L77.9 469.8C69.4 465.8 64 457.3 64 448C64 438.7 69.4 430.1 77.9 426.2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Katalog Lengkap</h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        Ribuan judul dari berbagai kategori, jurnal ilmiah, hingga skripsi digital tersedia.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative py-20 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 bg-indigo-600/10"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Mulai Petualangan Literasi Anda</h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan anggota lainnya dan nikmati kemudahan akses perpustakaan dalam genggaman.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="register" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-indigo-600/30 transition duration-200">
                    Daftar Sekarang - Gratis
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-book-open text-indigo-600"></i>
                        <span class="font-bold text-xl text-gray-900 dark:text-white">LibSys</span>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        Membangun ekosistem literasi digital yang mudah diakses, modern, dan inklusif bagi seluruh masyarakat.
                    </p>
                </div>

                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="#" class="hover:text-indigo-600 dark:hover:text-white transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-indigo-600 dark:hover:text-white transition">Katalog</a></li>
                        <li><a href="#" class="hover:text-indigo-600 dark:hover:text-white transition">E-Journal</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold mb-4">Bantuan</h4>
                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <li><a href="#" class="hover:text-indigo-600 dark:hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-indigo-600 dark:hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-indigo-600 dark:hover:text-white transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-gray-900 dark:text-white font-bold mb-4">Media Sosial</h4>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-500 hover:bg-indigo-600 hover:text-white transition duration-300">
                            <!-- SVG Twitter/X -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 640 640"><path d="M523.4 215.7C523.7 220.2 523.7 224.8 523.7 229.3C523.7 368 418.1 527.9 225.1 527.9C165.6 527.9 110.4 510.7 64 480.8C72.4 481.8 80.6 482.1 89.3 482.1C138.4 482.1 183.5 465.5 219.6 437.3C173.5 436.3 134.8 406.1 121.5 364.5C128 365.5 134.5 366.1 141.3 366.1C150.7 366.1 160.1 364.8 168.9 362.5C120.8 352.8 84.8 310.5 84.8 259.5L84.8 258.2C98.8 266 115 270.9 132.2 271.5C103.9 252.7 85.4 220.5 85.4 184.1C85.4 164.6 90.6 146.7 99.7 131.1C151.4 194.8 229 236.4 316.1 240.9C314.5 233.1 313.5 225 313.5 216.9C313.5 159.1 360.3 112 418.4 112C448.6 112 475.9 124.7 495.1 145.1C518.8 140.6 541.6 131.8 561.7 119.8C553.9 144.2 537.3 164.6 515.6 177.6C536.7 175.3 557.2 169.5 576 161.4C561.7 182.2 543.8 200.7 523.4 215.7z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-500 hover:bg-indigo-600 hover:text-white transition duration-300">
                            <!-- SVG Instagram -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 640 640"><path d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-500 hover:bg-indigo-600 hover:text-white transition duration-300">
                            <!-- SVG Github -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 640 640"><path d="M237.9 461.4C237.9 463.4 235.6 465 232.7 465C229.4 465.3 227.1 463.7 227.1 461.4C227.1 459.4 229.4 457.8 232.3 457.8C235.3 457.5 237.9 459.1 237.9 461.4zM206.8 456.9C206.1 458.9 208.1 461.2 211.1 461.8C213.7 462.8 216.7 461.8 217.3 459.8C217.9 457.8 216 455.5 213 454.6C210.4 453.9 207.5 454.9 206.8 456.9zM251 455.2C248.1 455.9 246.1 457.8 246.4 460.1C246.7 462.1 249.3 463.4 252.3 462.7C255.2 462 257.2 460.1 256.9 458.1C256.6 456.2 253.9 454.9 251 455.2zM316.8 72C178.1 72 72 177.3 72 316C72 426.9 141.8 521.8 241.5 555.2C254.3 557.5 258.8 549.6 258.8 543.1C258.8 536.9 258.5 502.7 258.5 481.7C258.5 481.7 188.5 496.7 173.8 451.9C173.8 451.9 162.4 422.8 146 415.3C146 415.3 123.1 399.6 147.6 399.9C147.6 399.9 172.5 401.9 186.2 425.7C208.1 464.3 244.8 453.2 259.1 446.6C261.4 430.6 267.9 419.5 275.1 412.9C219.2 406.7 162.8 398.6 162.8 302.4C162.8 274.9 170.4 261.1 186.4 243.5C183.8 237 175.3 210.2 189 175.6C209.9 169.1 258 202.6 258 202.6C278 197 299.5 194.1 320.8 194.1C342.1 194.1 363.6 197 383.6 202.6C383.6 202.6 431.7 169 452.6 175.6C466.3 210.3 457.8 237 455.2 243.5C471.2 261.2 481 275 481 302.4C481 398.9 422.1 406.6 366.2 412.9C375.4 420.8 383.2 435.8 383.2 459.3C383.2 493 382.9 534.7 382.9 542.9C382.9 549.4 387.5 557.3 400.2 555C500.2 521.8 568 426.9 568 316C568 177.3 455.5 72 316.8 72zM169.2 416.9C167.9 417.9 168.2 420.2 169.9 422.1C171.5 423.7 173.8 424.4 175.1 423.1C176.4 422.1 176.1 419.8 174.4 417.9C172.8 416.3 170.5 415.6 169.2 416.9zM158.4 408.8C157.7 410.1 158.7 411.7 160.7 412.7C162.3 413.7 164.3 413.4 165 412C165.7 410.7 164.7 409.1 162.7 408.1C160.7 407.5 159.1 407.8 158.4 408.8zM190.8 444.4C189.2 445.7 189.8 448.7 192.1 450.6C194.4 452.9 197.3 453.2 198.6 451.6C199.9 450.3 199.3 447.3 197.3 445.4C195.1 443.1 192.1 442.8 190.8 444.4zM179.4 429.7C177.8 430.7 177.8 433.3 179.4 435.6C181 437.9 183.7 438.9 185 437.9C186.6 436.6 186.6 434 185 431.7C183.6 429.4 181 428.4 179.4 429.7z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 dark:text-gray-600 text-sm">
                    &copy; 2023 LibSys Digital Library. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>