<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Geometri SD</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Google: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        'geo-sage-light': '#BEC5AD',
                        'geo-sage': '#A4B494',
                        'geo-emerald': '#519872',
                        'geo-forest': '#3B5249',
                        'geo-plum': '#34252F',
                    },
                    animation: {
                        'fly-slow': 'flyEffect 6s ease-in-out infinite',
                        'fly-medium': 'flyEffect 4.5s ease-in-out infinite',
                        'fly-fast': 'flyEffect 3s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                        'spin-slow': 'spinIcon 10s linear infinite',
                        'rect-open-top': 'rectOpenTopMove 3s ease-in-out infinite',
                        'rect-open-bottom': 'rectOpenBottomMove 3s ease-in-out infinite',
                        'triangle-fly': 'triangleMove 3.5s ease-in-out infinite',
                        'cone-bounce': 'coneBounce 3.5s ease-in-out infinite',
                        'cylinder-float': 'cylinderFloat 4s ease-in-out infinite',
                        'prism-expand': 'prismExpand 4s ease-in-out infinite',
                    },
                    keyframes: {
                        flyEffect: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.6', transform: 'scale(1)' },
                            '50%': { opacity: '0.9', transform: 'scale(1.05)' },
                        },
                        spinIcon: {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' },
                        },
                        rectOpenTopMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(2px, -3px)' },
                        },
                        rectOpenBottomMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(-2px, 3px)' },
                        },
                        triangleMove: {
                            '0%, 100%': { transform: 'translateY(0) scale(1)' },
                            '50%': { transform: 'translateY(-5px) scale(1.08)' },
                        },
                        coneBounce: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-6px)' },
                        },
                        cylinderFloat: {
                            '0%, 100%': { transform: 'translateY(0) rotate(0deg)' },
                            '50%': { transform: 'translateY(-4px) rotate(2deg)' },
                        },
                        prismExpand: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.12)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style type="text/tailwindcss">
        @layer utilities {
            /* Smooth transitions */
            .card-transition {
                transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            }
            /* Dynamic Soft Shadows */
            .geo-shadow {
                box-shadow: 0 15px 35px -10px rgba(52, 37, 47, 0.12), 0 5px 15px -5px rgba(59, 82, 73, 0.08);
            }
            .geo-shadow-hover:hover {
                box-shadow: 0 25px 45px -12px rgba(52, 37, 47, 0.25), 0 10px 25px -5px rgba(81, 152, 114, 0.3);
            }
        }
    </style>
</head>
<body class="bg-[#34252F] text-slate-100 min-h-screen font-sans selection:bg-[#519872] selection:text-white relative overflow-x-hidden">

    <!-- Ambient Floating Background Blobs -->
    <div class="fixed top-[-10%] left-[-10%] w-[500px] h-[500px] bg-[#519872]/20 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[600px] h-[600px] bg-[#A4B494]/15 rounded-full blur-[140px] pointer-events-none animate-pulse-glow" style="animation-delay: 1.5s;"></div>
    <div class="fixed top-[40%] right-[20%] w-[350px] h-[350px] bg-[#BEC5AD]/10 rounded-full blur-[100px] pointer-events-none animate-pulse-glow" style="animation-delay: 3s;"></div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 relative z-10">
        
        <!-- DASHBOARD HERO / WELCOME SECTION -->
        <header class="relative rounded-3xl p-8 md:p-12 mb-10 overflow-hidden border border-[#A4B494]/30 bg-gradient-to-r from-[#3B5249]/90 via-[#3B5249]/70 to-[#34252F]/80 backdrop-blur-xl geo-shadow animate-fly-slow">
            <div class="max-w-3xl relative z-10">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#519872]/30 border border-[#519872]/40 text-[#BEC5AD] text-xs font-semibold tracking-wide uppercase mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#519872] animate-ping"></span>
                    Portal Belajar Matematika SD
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                    Selamat Datang di <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#BEC5AD] via-[#A4B494] to-[#519872]">Kalkulator Geometri</span> Interaktif!
                </h1>
                <p class="text-[#BEC5AD] text-base sm:text-lg leading-relaxed mb-6">
                    Solusi praktis untuk membantu siswa Sekolah Dasar memahami dan menghitung keliling, luas, serta volume berbagai macam Bangun Datar 2D dan Bangun Ruang 3D secara presisi.
                </p>

                <!-- Stats / Quick Info Dashboard Cards -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-2 border-t border-[#A4B494]/20">
                    <div class="bg-[#34252F]/60 rounded-xl p-3.5 border border-[#A4B494]/20 backdrop-blur-sm">
                        <span class="block text-2xl font-bold text-white">4</span>
                        <span class="text-xs text-[#BEC5AD]">Bangun Datar (2D)</span>
                    </div>
                    <div class="bg-[#34252F]/60 rounded-xl p-3.5 border border-[#A4B494]/20 backdrop-blur-sm">
                        <span class="block text-2xl font-bold text-white">3</span>
                        <span class="text-xs text-[#BEC5AD]">Bangun Ruang (3D)</span>
                    </div>
                    <div class="col-span-2 sm:col-span-1 bg-[#34252F]/60 rounded-xl p-3.5 border border-[#A4B494]/20 backdrop-blur-sm flex flex-col justify-center">
                        <span class="block text-xs font-bold text-[#519872]">Formula Otomatis</span>
                        <span class="text-xs text-[#BEC5AD]">Cepat & Akurat</span>
                    </div>
                </div>
            </div>
            
            <!-- Floating Decorative Graphic Background Elements -->
            <div class="hidden lg:block absolute -right-6 -bottom-10 opacity-20 pointer-events-none">
                <svg width="340" height="340" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="80" stroke="#BEC5AD" stroke-width="3" stroke-dasharray="8 8"/>
                    <rect x="50" y="50" width="100" height="100" stroke="#519872" stroke-width="3" rx="15"/>
                    <polygon points="100,20 170,160 30,160" stroke="#A4B494" stroke-width="3"/>
                </svg>
            </div>
        </header>

        <!-- DASHBOARD FEATURE INTRODUCTION -->
        <section class="mb-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-2">
                <div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">Fitur Perhitungan Utama</h2>
                    <p class="text-[#BEC5AD] text-sm">Pilih kategori bangun geometri yang ingin Anda hitung di bawah ini.</p>
                </div>
            </div>

            <!-- DASHBOARD OVERVIEW CARDS (BANGUN DATAR VS BANGUN RUANG) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Overview Datar -->
                <div class="p-6 rounded-2xl bg-gradient-to-br from-[#3B5249] to-[#34252F] border border-[#A4B494]/30 geo-shadow relative overflow-hidden group">
                    <div class="w-12 h-12 rounded-xl bg-[#519872]/20 border border-[#519872]/40 flex items-center justify-center text-[#BEC5AD] mb-4">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Bangun Datar (2D)</h3>
                    <p class="text-[#BEC5AD] text-sm mb-4">Menghitung Keliling dan Luas untuk Persegi, Persegi Panjang, Lingkaran, dan Segitiga.</p>
                    <div class="inline-flex items-center gap-2 text-xs font-semibold text-[#519872] bg-[#519872]/10 px-3 py-1.5 rounded-lg border border-[#519872]/20">
                        <span>4 Menu Tersedia</span>
                    </div>
                </div>

                <!-- Overview Ruang -->
                <div class="p-6 rounded-2xl bg-gradient-to-br from-[#3B5249] to-[#34252F] border border-[#A4B494]/30 geo-shadow relative overflow-hidden group">
                    <div class="w-12 h-12 rounded-xl bg-[#A4B494]/20 border border-[#A4B494]/40 flex items-center justify-center text-[#BEC5AD] mb-4">
                        <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Bangun Ruang (3D)</h3>
                    <p class="text-[#BEC5AD] text-sm mb-4">Menghitung Luas Permukaan dan Volume untuk Kerucut, Tabung, dan Prisma.</p>
                    <div class="inline-flex items-center gap-2 text-xs font-semibold text-[#A4B494] bg-[#A4B494]/10 px-3 py-1.5 rounded-lg border border-[#A4B494]/20">
                        <span>3 Menu Tersedia</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAIN MENU CARDS GRID -->
        <section>
            <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#519872]"></span>
                Pilih Bangun Geometri
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Card 1: Persegi -->
                <a href="/Persegi" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#519872] geo-shadow-hover animate-fly-medium flex flex-col justify-between">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#519872]/20 border border-[#519872]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#519872] group-hover:text-white group-hover:shadow-[0_0_20px_rgba(81,152,114,0.5)] group-hover:animate-spin-slow">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="3"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#BEC5AD] border border-[#A4B494]/20">2D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Persegi</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Menghitung rumus Keliling & Luas Persegi secara instan.</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#519872]/10 border border-[#519872]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#519872] group-hover:text-white">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

                <!-- Card 2: Persegi Panjang -->
                <a href="/Persegipanjang" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#519872] geo-shadow-hover animate-fly-slow flex flex-col justify-between" style="animation-delay: 0.2s;">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#519872]/20 border border-[#519872]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#519872] group-hover:text-white group-hover:shadow-[0_0_20px_rgba(81,152,114,0.5)]">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <path class="group-hover:animate-rect-open-top" d="M 2 6 H 22 V 18" stroke-linecap="round" stroke-linejoin="round"/>
                                <path class="group-hover:animate-rect-open-bottom" d="M 22 18 H 2 V 6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#BEC5AD] border border-[#A4B494]/20">2D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Persegi Panjang</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Kalkulasi Keliling & Luas Persegi Panjang dengan cepat.</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#519872]/10 border border-[#519872]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#519872] group-hover:text-white">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

                <!-- Card 3: Lingkaran -->
                <a href="/Lingkaran" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#519872] geo-shadow-hover animate-fly-medium flex flex-col justify-between" style="animation-delay: 0.4s;">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#519872]/20 border border-[#519872]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#519872] group-hover:text-white group-hover:shadow-[0_0_20px_rgba(81,152,114,0.5)] group-hover:animate-spin-slow">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" stroke-dasharray="4 2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#BEC5AD] border border-[#A4B494]/20">2D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Lingkaran</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Hitung Keliling & Luas Lingkaran berdasarkan jari-jari/diameter.</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#519872]/10 border border-[#519872]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#519872] group-hover:text-white">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

                <!-- Card 4: Segitiga -->
                <a href="/Segitiga" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#519872] geo-shadow-hover animate-fly-slow flex flex-col justify-between" style="animation-delay: 0.6s;">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#519872]/20 border border-[#519872]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#519872] group-hover:text-white group-hover:shadow-[0_0_20px_rgba(81,152,114,0.5)] group-hover:animate-triangle-fly">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <polygon points="12,3 2,21 22,21"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#BEC5AD] border border-[#A4B494]/20">2D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Segitiga</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Perhitungan Keliling & Luas Segitiga dengan alas dan tinggi.</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#519872]/10 border border-[#519872]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#519872] group-hover:text-white">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

                <!-- Card 5: Kerucut -->
                <a href="/Kerucut" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#A4B494] geo-shadow-hover animate-fly-medium flex flex-col justify-between" style="animation-delay: 0.8s;">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#A4B494]/20 border border-[#A4B494]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#A4B494] group-hover:text-[#34252F] group-hover:shadow-[0_0_20px_rgba(164,180,148,0.5)] group-hover:animate-cone-bounce">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <path d="M12 3L6 15h12L12 3z"/>
                                <ellipse cx="12" cy="18" rx="6" ry="2"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#A4B494] border border-[#A4B494]/30">3D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Kerucut</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Menghitung Luas Permukaan & Volume bangun ruang Kerucut.</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#A4B494]/10 border border-[#A4B494]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#A4B494] group-hover:text-[#34252F]">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

                <!-- Card 6: Tabung -->
                <a href="/Tabung" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#A4B494] geo-shadow-hover animate-fly-slow flex flex-col justify-between" style="animation-delay: 1s;">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#A4B494]/20 border border-[#A4B494]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#A4B494] group-hover:text-[#34252F] group-hover:shadow-[0_0_20px_rgba(164,180,148,0.5)] group-hover:animate-cylinder-float">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <ellipse cx="12" cy="6" rx="8" ry="3"/>
                                <path d="M4 6v12c0 1.66 3.58 3 8 3s8-1.34 8-3V6"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#A4B494] border border-[#A4B494]/30">3D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Tabung</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Kalkulasi presisi Luas Permukaan & Volume Tabung (Silinder).</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#A4B494]/10 border border-[#A4B494]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#A4B494] group-hover:text-[#34252F]">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

                <!-- Card 7: Prisma -->
                <a href="/Prisma" class="group relative p-6 rounded-2xl bg-gradient-to-b from-[#3B5249]/80 to-[#34252F]/90 border border-[#A4B494]/20 backdrop-blur-md geo-shadow card-transition hover:-translate-y-3 hover:border-[#A4B494] geo-shadow-hover animate-fly-medium flex flex-col justify-between md:col-span-2 lg:col-span-1" style="animation-delay: 1.2s;">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 rounded-2xl bg-[#A4B494]/20 border border-[#A4B494]/30 text-[#BEC5AD] flex items-center justify-center card-transition group-hover:bg-[#A4B494] group-hover:text-[#34252F] group-hover:shadow-[0_0_20px_rgba(164,180,148,0.5)] group-hover:animate-prism-expand">
                            <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                                <path d="M6 4L1 18h10L6 4z"/>
                                <path d="M18 4l-5 14h10l5-14H18z"/>
                                <path d="M6 4l12 0M1 18l12 0M11 18l10 0"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-[#34252F] text-[#A4B494] border border-[#A4B494]/30">3D</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-[#BEC5AD] card-transition">Hitung Prisma</h3>
                        <p class="text-xs text-[#BEC5AD]/80 mb-4">Hitung Luas Permukaan & Volume Prisma secara akurat.</p>
                        <div class="w-full py-2.5 rounded-xl bg-[#A4B494]/10 border border-[#A4B494]/30 text-[#BEC5AD] text-xs font-semibold text-center card-transition group-hover:bg-[#A4B494] group-hover:text-[#34252F]">
                            Mulai Hitung &rarr;
                        </div>
                    </div>
                </a>

            </div>
        </section>

        <!-- FOOTER INFO -->
        <footer class="mt-16 text-center text-xs text-[#BEC5AD]/60 border-t border-[#A4B494]/20 pt-6">
            <p>© Aplikasi Perhitungan Geometri Sekolah Dasar • Dibuat untuk Kemudahan Belajar Matematika</p>
        </footer>

    </main>

</body>
</html>