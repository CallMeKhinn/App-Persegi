<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Persegi Panjang</title>
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
                        'rect-open-top': 'rectOpenTopMove 3s ease-in-out infinite',
                        'rect-open-bottom': 'rectOpenBottomMove 3s ease-in-out infinite',
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
                        rectOpenTopMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(2px, -3px)' },
                        },
                        rectOpenBottomMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(-2px, 3px)' },
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

    <main class="w-full max-w-lg relative z-10 my-6">
        
        <!-- TOMBOL KEMBALI -->
        <a href="/" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#3B5249]/60 border border-[#A4B494]/30 text-[#BEC5AD] text-sm font-semibold mb-6 card-transition hover:bg-[#519872] hover:text-white hover:border-[#519872] hover:-translate-x-1 backdrop-blur-md geo-shadow">
            <svg class="w-4 h-4 stroke-current stroke-2" fill="none" viewBox="0 0 24 24">
                <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Kembali ke Dashboard
        </a>

        <!-- MAIN FORM CARD -->
        <div class="rounded-3xl p-6 sm:p-8 border border-[#A4B494]/30 bg-gradient-to-b from-[#3B5249]/90 to-[#34252F]/95 backdrop-blur-xl geo-shadow animate-fly-slow">
            
            <!-- HEADER FORM -->
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-[#A4B494]/20">
                <div class="w-14 h-14 rounded-2xl bg-[#519872]/20 border border-[#519872]/40 text-[#BEC5AD] flex items-center justify-center flex-shrink-0">
                    <svg class="w-7 h-7 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path class="animate-rect-open-top" d="M 2 6 H 22 V 18" stroke-linecap="round" stroke-linejoin="round"/>
                        <path class="animate-rect-open-bottom" d="M 22 18 H 2 V 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-[#519872]/20 text-[#BEC5AD] text-[10px] font-bold tracking-wider uppercase border border-[#519872]/30 mb-1">
                        Bangun Datar (2D)
                    </span>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">Persegi Panjang</h1>
                </div>
            </div>

            <!-- INPUT FORM -->
            <form action="/Persegipanjang" method="post" class="space-y-5">
                @csrf
                
                <div>
                    <label for="panjang" class="block text-xs font-bold text-[#BEC5AD] uppercase tracking-wider mb-2">
                        Masukkan Panjang (p)
                    </label>
                    <div class="relative">
                        <input type="number" step="any" id="panjang" name="panjang" value="{{ $panjang ?? '' }}" required placeholder="Contoh: 10" 
                            class="w-full px-4 py-3 rounded-xl bg-[#34252F]/80 border border-[#A4B494]/30 text-white placeholder-[#BEC5AD]/40 focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/30 card-transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="lebar" class="block text-xs font-bold text-[#BEC5AD] uppercase tracking-wider mb-2">
                        Masukkan Lebar (l)
                    </label>
                    <div class="relative">
                        <input type="number" step="any" id="lebar" name="lebar" value="{{ $lebar ?? '' }}" required placeholder="Contoh: 5" 
                            class="w-full px-4 py-3 rounded-xl bg-[#34252F]/80 border border-[#A4B494]/30 text-white placeholder-[#BEC5AD]/40 focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/30 card-transition text-sm">
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-[#519872] to-[#3B5249] border border-[#519872]/50 text-white text-sm font-bold tracking-wide shadow-lg card-transition hover:brightness-110 hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path d="M9 7L14 12L9 17" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Hitung Sekarang
                </button>
            </form>

            <!-- HASIL PERHITUNGAN -->
            @isset($luas)
                <div class="mt-8 pt-6 border-t border-[#A4B494]/20 animate-fly-slow" style="animation-delay: 0.2s;">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-2 h-2 rounded-full bg-[#519872]"></span>
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Hasil Perhitungan</h3>
                    </div>

                    <!-- Grid Ringkasan Input -->
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="p-3 rounded-xl bg-[#34252F]/60 border border-[#A4B494]/20">
                            <span class="block text-[10px] text-[#BEC5AD]/70 uppercase font-semibold">Panjang</span>
                            <span class="text-base font-bold text-white">{{ $panjang ?? '-' }}</span>
                        </div>
                        <div class="p-3 rounded-xl bg-[#34252F]/60 border border-[#A4B494]/20">
                            <span class="block text-[10px] text-[#BEC5AD]/70 uppercase font-semibold">Lebar</span>
                            <span class="text-base font-bold text-white">{{ $lebar ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Highlight Hasil Utama -->
                    <div class="space-y-3">
                        <div class="p-4 rounded-2xl bg-[#519872]/20 border border-[#519872]/40 flex items-center justify-between">
                            <div>
                                <span class="block text-xs text-[#BEC5AD] font-semibold">Luas Persegi Panjang</span>
                                <span class="text-xs text-[#BEC5AD]/60 font-mono">(p × l)</span>
                            </div>
                            <span class="text-xl sm:text-2xl font-extrabold text-white">{{ $luas }}</span>
                        </div>

                        <div class="p-4 rounded-2xl bg-[#A4B494]/20 border border-[#A4B494]/30 flex items-center justify-between">
                            <div>
                                <span class="block text-xs text-[#BEC5AD] font-semibold">Keliling Persegi Panjang</span>
                                <span class="text-xs text-[#BEC5AD]/60 font-mono">2 × (p + l)</span>
                            </div>
                            <span class="text-xl sm:text-2xl font-extrabold text-white">{{ $keliling }}</span>
                        </div>
                    </div>
                </div>
            @endisset

        </div>

    </main>

</body>
</html>