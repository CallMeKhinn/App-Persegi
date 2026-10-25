<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Sekolah Dasar</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Google: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'neon-blue': '#00d2ff',
                        'neon-cyan': '#06b6d4',
                        'neon-green': '#00ff87',
                        'neon-purple': '#a855f7',
                        'neon-amber': '#fbbf24',
                        'neon-rose': '#f43f5e',
                        'neon-teal': '#14b8a6',
                        'card-blue': '#0d1b2a',
                        'card-cyan': '#081e26',
                        'card-green': '#0a251e',
                        'card-purple': '#1e112a',
                        'card-amber': '#2a1a08',
                        'card-rose': '#2a0a12',
                        'card-teal': '#062024',
                    },
                    transitionDuration: {
                        '40': '40ms',
                        '04s': '0.04s',
                    },
                    animation: {
                        'fly': 'flyEffect 6s ease-in-out infinite',
                        'spin-slow': 'spinIcon 8s linear infinite',
                        'rect-open-top': 'rectOpenTopMove 3s ease-in-out infinite',
                        'rect-open-bottom': 'rectOpenBottomMove 3s ease-in-out infinite',
                        'triangle-fly': 'triangleMove 4s ease-in-out infinite',
                        'cone-top': 'coneTopMove 4s ease-in-out infinite',
                        'cone-left': 'coneLeftMove 4s ease-in-out infinite',
                        'cone-right': 'coneRightMove 4s ease-in-out infinite',
                        'cylinder-top': 'cylinderTopMove 3s ease-in-out infinite',
                        'cylinder-bottom': 'cylinderBottomMove 3s ease-in-out infinite',
                        'prism-expand': 'prismExpandMove 4s ease-in-out infinite',
                    },
                    keyframes: {
                        flyEffect: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-12px)' },
                        },
                        spinIcon: {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' },
                        },
                        /* Animasi Persegi Panjang Terbelah 2 */
                        rectOpenTopMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(3px, -3px)' }, /* Geser ke atas & kanan */
                        },
                        rectOpenBottomMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(-3px, 3px)' }, /* Geser ke bawah & kiri */
                        },
                        triangleMove: {
                            '0%': { transform: 'translate(0, -6px)' },
                            '33%': { transform: 'translate(5px, 4px)' },
                            '66%': { transform: 'translate(-5px, 4px)' },
                            '100%': { transform: 'translate(0, -6px)' },
                        },
                        coneTopMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(0, -4px)' }
                        },
                        coneLeftMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(-3px, 3px)' }
                        },
                        coneRightMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(3px, 3px)' }
                        },
                        cylinderTopMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(0, -4px)' }
                        },
                        cylinderBottomMove: {
                            '0%, 100%': { transform: 'translate(0, 0)' },
                            '50%': { transform: 'translate(0, 4px)' }
                        },
                        prismExpandMove: {
                            '0%, 100%': { transform: 'scale(1) skew(0deg, 0deg)' },
                            '50%': { transform: 'scale(1.15) skew(-6deg, -3deg)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style type="text/tailwindcss">
        @layer utilities {
            /* Background Deep Blue Overlay */
            .bg-glow-pattern {
                background-color: #080c14;
                background-image: 
                    radial-gradient(circle at 15% 15%, rgba(0, 210, 255, 0.12) 0%, transparent 40%),
                    radial-gradient(circle at 85% 20%, rgba(0, 255, 137, 0.10) 0%, transparent 40%),
                    radial-gradient(circle at 50% 50%, rgba(168, 85, 247, 0.08) 0%, transparent 45%),
                    radial-gradient(circle at 20% 85%, rgba(251, 191, 36, 0.08) 0%, transparent 40%),
                    radial-gradient(circle at 80% 85%, rgba(244, 63, 94, 0.08) 0%, transparent 40%);
            }

            /* Custom Transisi & Hover Glow */
            .fly-transition {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .glow-blue:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(0, 210, 255, 0.5), inset 0 0 15px rgba(0, 210, 255, 0.3);
            }
            .glow-cyan:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(6, 182, 212, 0.5), inset 0 0 15px rgba(6, 182, 212, 0.3);
            }
            .glow-green:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(0, 255, 137, 0.5), inset 0 0 15px rgba(0, 255, 137, 0.3);
            }
            .glow-purple:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(168, 85, 247, 0.5), inset 0 0 15px rgba(168, 85, 247, 0.3);
            }
            .glow-amber:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(251, 191, 36, 0.5), inset 0 0 15px rgba(251, 191, 36, 0.3);
            }
            .glow-rose:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(244, 63, 94, 0.5), inset 0 0 15px rgba(244, 63, 94, 0.3);
            }
            .glow-teal:hover {
                box-shadow: 0 20px 35px rgba(0, 0, 0, 0.7), 0 0 30px rgba(20, 184, 166, 0.5), inset 0 0 15px rgba(20, 184, 166, 0.3);
            }
        }
    </style>
</head>
<body class="bg-glow-pattern min-h-screen flex items-center justify-center text-slate-100 p-6 font-sans">

    <div class="w-full max-w-6xl text-center py-8">
        <!-- HEADER -->
        <header class="mb-12 animate-fly">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-3 bg-gradient-to-r from-neon-blue via-neon-green to-neon-purple bg-clip-text text-transparent drop-shadow-[0_0_25px_rgba(0,210,255,0.3)]">
                Aplikasi Perhitungan SD
            </h1>
            <p class="text-slate-400 text-lg">
                Silakan pilih menu perhitungan geometri 2D & 3D yang ingin dilakukan
            </p>
        </header>

        <!-- GRID MENU CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-2">
            
            <!-- Card 1: Persegi (Deep Blue) -->
            <a href="/Persegi" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-blue to-[#0b172a] border border-white/10 backdrop-blur-md shadow-2xl animate-fly fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-blue glow-blue">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-blue/10 text-neon-blue border border-neon-blue/20 fly-transition group-hover:animate-spin-slow group-hover:bg-neon-blue group-hover:text-black group-hover:shadow-[0_0_15px_#00d2ff]">
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Persegi</h2>
                <span class="text-sm text-slate-400">Keliling & Luas Persegi</span>
            </a>

            <!-- Card 2: Persegi Panjang (Deep Cyan) -->
            <a href="/Persegipanjang" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-cyan to-[#03141a] border border-white/10 backdrop-blur-md shadow-2xl animate-fly [animation-delay:0.3s] fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-cyan glow-cyan">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-cyan/10 text-neon-cyan border border-neon-cyan/20 fly-transition group-hover:bg-neon-cyan group-hover:text-black group-hover:shadow-[0_0_15px_#06b6d4]">
                    <!-- SVG Terbagi 2 Bagian (Sisi Panjang + Lebar Atas vs Sisi Panjang + Lebar Bawah) -->
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <!-- Bagian Atas & Kanan (Terbuka Ke Atas-Kanan) -->
                        <path class="group-hover:animate-rect-open-top" d="M 2 6 H 22 V 18" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Bagian Bawah & Kiri (Terbuka Ke Bawah-Kiri) -->
                        <path class="group-hover:animate-rect-open-bottom" d="M 22 18 H 2 V 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Persegi Panjang</h2>
                <span class="text-sm text-slate-400">Keliling & Luas Persegi Panjang</span>
            </a>

            <!-- Card 3: Lingkaran (Deep Green) -->
            <a href="/Lingkaran" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-green to-[#061e18] border border-white/10 backdrop-blur-md shadow-2xl animate-fly [animation-delay:0.6s] fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-green glow-green">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-green/10 text-neon-green border border-neon-green/20 fly-transition group-hover:animate-spin-slow group-hover:bg-neon-green group-hover:text-black group-hover:shadow-[0_0_15px_#00ff87]">
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2" stroke-dasharray="4 2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Lingkaran</h2>
                <span class="text-sm text-slate-400">Keliling & Luas Lingkaran</span>
            </a>

            <!-- Card 4: Segitiga (Deep Purple) -->
            <a href="/Segitiga" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-purple to-[#140b1e] border border-white/10 backdrop-blur-md shadow-2xl animate-fly [animation-delay:0.9s] fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-purple glow-purple">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-purple/10 text-neon-purple border border-neon-purple/20 fly-transition group-hover:animate-triangle-fly group-hover:bg-neon-purple group-hover:text-black group-hover:shadow-[0_0_15px_#a855f7]">
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <polygon points="12,3 2,21 22,21"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Segitiga</h2>
                <span class="text-sm text-slate-400">Keliling & Luas Segitiga</span>
            </a>

            <!-- Card 5: Kerucut (Deep Amber) -->
            <a href="/Kerucut" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-amber to-[#1a1005] border border-white/10 backdrop-blur-md shadow-2xl animate-fly [animation-delay:1.2s] fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-amber glow-amber">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-amber/10 text-neon-amber border border-neon-amber/20 fly-transition group-hover:bg-neon-amber group-hover:text-black group-hover:shadow-[0_0_15px_#fbbf24]">
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <path class="group-hover:animate-cone-top" d="M12 3L6 15h12L12 3z"/>
                        <path class="group-hover:animate-cone-left" d="M6 15l-3 4c1.5 2 4.5 2 9 2s7.5 0 9-2l-3-4H6z"/>
                        <ellipse class="group-hover:animate-cone-right" cx="12" cy="19" rx="9" ry="2"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Kerucut</h2>
                <span class="text-sm text-slate-400">Luas Permukaan & Volume</span>
            </a>

            <!-- Card 6: Tabung (Deep Rose) -->
            <a href="/Tabung" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-rose to-[#1c060c] border border-white/10 backdrop-blur-md shadow-2xl animate-fly [animation-delay:1.5s] fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-rose glow-rose">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-rose/10 text-neon-rose border border-neon-rose/20 fly-transition group-hover:bg-neon-rose group-hover:text-black group-hover:shadow-[0_0_15px_#f43f5e]">
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2" viewBox="0 0 24 24">
                        <g class="group-hover:animate-cylinder-top">
                            <ellipse cx="12" cy="6" rx="8" ry="3"/>
                            <path d="M4 6v5c0 1.66 3.58 3 8 3s8-1.34 8-3V6"/>
                        </g>
                        <g class="group-hover:animate-cylinder-bottom">
                            <path d="M4 11v7c0 1.66 3.58 3 8 3s8-1.34 8-3v-7"/>
                        </g>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Tabung</h2>
                <span class="text-sm text-slate-400">Luas Permukaan & Volume</span>
            </a>

            <!-- Card 7: Prisma (Deep Teal) -->
            <a href="/Prisma" class="group relative p-8 rounded-2xl flex flex-col items-center justify-center bg-gradient-to-br from-card-teal to-[#031518] border border-white/10 backdrop-blur-md shadow-2xl animate-fly [animation-delay:1.8s] fly-transition hover:-translate-y-4 hover:scale-[1.03] hover:border-neon-teal glow-teal">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-5 bg-neon-teal/10 text-neon-teal border border-neon-teal/20 fly-transition group-hover:bg-neon-teal group-hover:text-black group-hover:shadow-[0_0_15px_#14b8a6]">
                    <svg class="w-8 h-8 fill-none stroke-current stroke-2 group-hover:animate-prism-expand" viewBox="0 0 24 24">
                        <path d="M6 4L1 18h10L6 4z"/>
                        <path d="M18 4l-5 14h10l5-14H18z"/>
                        <path d="M6 4l12 0M1 18l12 0M11 18l10 0"/>
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">Hitung Prisma</h2>
                <span class="text-sm text-slate-400">Luas Permukaan & Volume</span>
            </a>

        </div>
    </div>

</body>
</html>