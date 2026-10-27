<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Lingkaran</title>
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
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                        'spin-slow': 'spinIcon 10s linear infinite',
                    },
                    keyframes: {
                        flyEffect: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-8px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.6', transform: 'scale(1)' },
                            '50%': { opacity: '0.9', transform: 'scale(1.05)' },
                        },
                        spinIcon: {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style type="text/tailwindcss">
        @layer utilities {
            .card-transition {
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            }
            .geo-shadow {
                box-shadow: 0 15px 35px -10px rgba(52, 37, 47, 0.2), 0 5px 15px -5px rgba(59, 82, 73, 0.15);
            }
            .backdrop-blur-md, .backdrop-blur-xl {
                -webkit-backdrop-filter: blur(12px);
                backdrop-filter: blur(12px);
            }
        }
    </style>
</head>
<body class="bg-[#34252F] text-slate-100 min-h-screen font-sans selection:bg-[#519872] selection:text-white relative overflow-x-hidden flex items-center justify-center p-4 sm:p-6">

    <!-- Ambient Floating Background Blobs -->
    <div class="fixed top-[-10%] left-[-10%] w-[450px] h-[450px] bg-[#519872]/20 rounded-full blur-[120px] pointer-events-none animate-pulse-glow"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-[#A4B494]/15 rounded-full blur-[140px] pointer-events-none animate-pulse-glow" style="animation-delay: 1.5s;"></div>

    <main class="w-full max-w-2xl relative z-10 my-6">
        
        <!-- TOMBOL KEMBALI -->
        <a href="/" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#3B5249]/60 border border-[#A4B494]/30 text-[#BEC5AD] text-sm font-semibold mb-6 card-transition hover:bg-[#519872] hover:text-white hover:border-[#519872] hover:-translate-x-1 backdrop-blur-md geo-shadow">
            <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Kembali ke Menu Utama
        </a>

        <!-- MAIN INPUT CARD -->
        <div class="rounded-3xl p-6 sm:p-8 border border-[#A4B494]/30 bg-gradient-to-b from-[#3B5249]/90 to-[#34252F]/95 backdrop-blur-xl geo-shadow animate-fly-slow mb-8">
            
            <!-- HEADER FORM -->
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-[#A4B494]/20">
                <div class="w-14 h-14 rounded-2xl bg-[#519872]/20 border border-[#519872]/40 text-[#BEC5AD] flex items-center justify-center flex-shrink-0 animate-spin-slow">
                    <svg class="w-7 h-7 fill-none stroke-current stroke-2" stroke-dasharray="4 2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9"/>
                    </svg>
                </div>
                <div>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-[#519872]/20 text-[#BEC5AD] text-[10px] font-bold tracking-wider uppercase border border-[#519872]/30 mb-1">
                        Bangun Datar (2D)
                    </span>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">Hitung Lingkaran</h1>
                    <p class="text-[#BEC5AD]/80 text-xs sm:text-sm">Masukkan jari-jari untuk menghitung luas & keliling</p>
                </div>
            </div>

            <!-- FORM INPUT -->
            <form action="/Lingkaran" method="post" class="space-y-5">
                @csrf
                <div>
                    <label for="jari_jari" class="block text-xs font-bold text-[#BEC5AD] uppercase tracking-wider mb-2">
                        Masukkan Jari-jari Lingkaran (r):
                    </label>
                    <input 
                        type="number" 
                        step="any" 
                        name="jari_jari" 
                        id="jari_jari" 
                        value="{{ $jari_jari ?? '' }}"
                        placeholder="Contoh: 7 atau 10" 
                        required 
                        class="w-full px-4 py-3 rounded-xl bg-[#34252F]/80 border border-[#A4B494]/30 text-white placeholder-[#BEC5AD]/40 focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/30 card-transition text-sm"
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-[#519872] to-[#3B5249] border border-[#519872]/50 text-white text-sm font-bold tracking-wide shadow-lg card-transition hover:brightness-110 hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2"
                >
                    <svg class="w-4 h-4 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path d="M9 7L14 12L9 17" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Hitung Sekarang
                </button>
            </form>
        </div>

        <!-- HASIL PERHITUNGAN TERPISAH -->
        @isset($luas)
            <div class="space-y-6 animate-fly-slow" style="animation-delay: 0.2s;">
                
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#519872] animate-ping"></span>
                    <h3 class="text-base font-bold text-white uppercase tracking-wider">
                        Hasil Perhitungan Terpisah
                    </h3>
                </div>

                <!-- TABEL 1: LUAS -->
                <div class="rounded-2xl p-6 bg-gradient-to-br from-[#3B5249]/90 to-[#34252F]/90 border border-[#519872]/40 backdrop-blur-xl geo-shadow">
                    <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                        <h4 class="text-base font-bold text-white flex items-center gap-2">
                            <span>📐</span> 1. Perhitungan Luas Lingkaran
                        </h4>
                        <span class="text-xs bg-[#519872]/20 text-[#BEC5AD] border border-[#519872]/30 px-3 py-1 rounded-full font-mono">
                            Rumus: π × r²
                        </span>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-[#A4B494]/20 bg-[#34252F]/60">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-[#3B5249]/50 text-[#BEC5AD] border-b border-[#A4B494]/20">
                                <tr>
                                    <th class="py-3 px-4 font-semibold">Langkah / Komponen</th>
                                    <th class="py-3 px-4 font-semibold text-right">Nilai / Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#A4B494]/10 text-slate-200">
                                <tr>
                                    <td class="py-3 px-4 text-[#BEC5AD]/80">Jari-jari (r)</td>
                                    <td class="py-3 px-4 text-right font-medium text-white">{{ $jari_jari }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 text-[#BEC5AD]/80">Rumus Luas Lingkaran</td>
                                    <td class="py-3 px-4 text-right font-mono text-[#519872]">π × r × r</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 text-[#BEC5AD]/80">Proses Perhitungan</td>
                                    <td class="py-3 px-4 text-right font-mono text-slate-300">π × {{ $jari_jari }} × {{ $jari_jari }}</td>
                                </tr>
                                <tr class="bg-[#519872]/20 font-bold">
                                    <td class="py-3.5 px-4 text-[#BEC5AD]">Hasil Luas Lingkaran</td>
                                    <td class="py-3.5 px-4 text-right text-white text-lg font-extrabold">{{ $luas }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TABEL 2: KELILING -->
                @isset($keliling)
                    <div class="rounded-2xl p-6 bg-gradient-to-br from-[#3B5249]/90 to-[#34252F]/90 border border-[#A4B494]/40 backdrop-blur-xl geo-shadow">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                            <h4 class="text-base font-bold text-white flex items-center gap-2">
                                <span>🔄</span> 2. Perhitungan Keliling Lingkaran
                            </h4>
                            <span class="text-xs bg-[#A4B494]/20 text-[#BEC5AD] border border-[#A4B494]/30 px-3 py-1 rounded-full font-mono">
                                Rumus: 2 × π × r
                            </span>
                        </div>

                        <div class="overflow-x-auto rounded-xl border border-[#A4B494]/20 bg-[#34252F]/60">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-[#3B5249]/50 text-[#BEC5AD] border-b border-[#A4B494]/20">
                                    <tr>
                                        <th class="py-3 px-4 font-semibold">Langkah / Komponen</th>
                                        <th class="py-3 px-4 font-semibold text-right">Nilai / Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#A4B494]/10 text-slate-200">
                                    <tr>
                                        <td class="py-3 px-4 text-[#BEC5AD]/80">Jari-jari (r)</td>
                                        <td class="py-3 px-4 text-right font-medium text-white">{{ $jari_jari }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 text-[#BEC5AD]/80">Rumus Keliling Lingkaran</td>
                                        <td class="py-3 px-4 text-right font-mono text-[#A4B494]">2 × π × r</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 text-[#BEC5AD]/80">Proses Perhitungan</td>
                                        <td class="py-3 px-4 text-right font-mono text-slate-300">2 × π × {{ $jari_jari }}</td>
                                    </tr>
                                    <tr class="bg-[#A4B494]/20 font-bold">
                                        <td class="py-3.5 px-4 text-[#BEC5AD]">Hasil Keliling Lingkaran</td>
                                        <td class="py-3.5 px-4 text-right text-white text-lg font-extrabold">{{ $keliling }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endisset

            </div>
        @endisset

    </main>

</body>
</html>