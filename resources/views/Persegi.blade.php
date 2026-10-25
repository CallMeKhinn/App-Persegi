<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Persegi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        'neon-blue': '#00d2ff',
                        'neon-green': '#00ff87',
                        'card-blue': '#0d1b2a',
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-[#080c14] min-h-screen flex items-center justify-center text-slate-100 p-6 font-sans">

    <div class="w-full max-w-2xl my-8">
        
        <a href="/" class="inline-flex items-center gap-2 text-slate-400 hover:text-neon-blue transition-colors mb-6 text-sm font-medium">
            ← Kembali ke Menu Utama
        </a>

        <!-- Main Input Card -->
        <div class="bg-gradient-to-br from-card-blue to-[#0b172a] border border-white/10 p-8 rounded-3xl shadow-2xl mb-8">
            
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-neon-blue/10 text-neon-blue border border-neon-blue/20">
                    <svg class="w-6 h-6 stroke-current stroke-2 fill-none" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-white">Hitung Persegi</h1>
                    <p class="text-slate-400 text-sm">Masukkan panjang sisi untuk menghitung luas & keliling</p>
                </div>
            </div>

            <!-- ACTION DIBUAT TETAP /Persegi -->
            <form action="/Persegi" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="sisi" class="block text-sm font-medium text-slate-300 mb-2">
                        Masukkan Panjang Sisi Persegi (s):
                    </label>
                    <input 
                        type="number" 
                        step="any" 
                        name="sisi" 
                        id="sisi" 
                        value="{{ $sisi ?? '' }}"
                        placeholder="Contoh: 10" 
                        required 
                        class="w-full px-4 py-3 bg-slate-900/80 border border-white/10 rounded-xl text-white focus:outline-none focus:border-neon-blue transition-all"
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3.5 bg-neon-blue text-slate-950 font-bold rounded-xl shadow-[0_0_20px_rgba(0,210,255,0.4)] hover:bg-cyan-300 transition-all"
                >
                    Hitung Sekarang
                </button>
            </form>
        </div>

        <!-- HASIL PERHITUNGAN TERPISAH -->
        @isset($luas)
            <div class="space-y-6">
                
                <h3 class="text-xl font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-neon-blue animate-pulse"></span>
                    Hasil Perhitungan Terpisah:
                </h3>

                <!-- TABEL 1: LUAS -->
                <div class="bg-gradient-to-br from-card-blue to-[#0b172a] border border-neon-blue/30 p-6 rounded-2xl shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-semibold text-neon-blue">📐 1. Perhitungan Luas Persegi</h4>
                        <span class="text-xs bg-neon-blue/10 text-neon-blue border border-neon-blue/20 px-3 py-1 rounded-full font-mono">
                            Rumus: sisi x sisi
                        </span>
                    </div>

                    <div class="overflow-hidden rounded-xl border border-white/10 bg-slate-900/60">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-white/5 text-slate-300 border-b border-white/10">
                                <tr>
                                    <th class="py-3 px-4 font-semibold">Langkah / Komponen</th>
                                    <th class="py-3 px-4 font-semibold text-right">Nilai / Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300">
                                <tr>
                                    <td class="py-3 px-4 text-slate-400">Panjang Sisi (s)</td>
                                    <td class="py-3 px-4 text-right font-medium text-white">{{ $sisi }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 text-slate-400">Rumus Luas Persegi</td>
                                    <td class="py-3 px-4 text-right font-mono text-neon-blue">sisi x sisi</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 text-slate-400">Proses Perhitungan</td>
                                    <td class="py-3 px-4 text-right font-mono text-slate-300">{{ $sisi }} x {{ $sisi }}</td>
                                </tr>
                                <tr class="bg-neon-blue/10">
                                    <td class="py-3.5 px-4 font-bold text-neon-blue">Hasil Luas Persegi</td>
                                    <td class="py-3.5 px-4 text-right font-extrabold text-neon-blue text-lg">{{ $luas }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TABEL 2: KELILING -->
                @isset($keliling)
                    <div class="bg-gradient-to-br from-[#0a251e] to-[#061e18] border border-neon-green/30 p-6 rounded-2xl shadow-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-semibold text-neon-green">🔄 2. Perhitungan Keliling Persegi</h4>
                            <span class="text-xs bg-neon-green/10 text-neon-green border border-neon-green/20 px-3 py-1 rounded-full font-mono">
                                Rumus: 4 x sisi
                            </span>
                        </div>

                        <div class="overflow-hidden rounded-xl border border-white/10 bg-slate-900/60">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-white/5 text-slate-300 border-b border-white/10">
                                    <tr>
                                        <th class="py-3 px-4 font-semibold">Langkah / Komponen</th>
                                        <th class="py-3 px-4 font-semibold text-right">Nilai / Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5 text-slate-300">
                                    <tr>
                                        <td class="py-3 px-4 text-slate-400">Panjang Sisi (s)</td>
                                        <td class="py-3 px-4 text-right font-medium text-white">{{ $sisi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 text-slate-400">Rumus Keliling Persegi</td>
                                        <td class="py-3 px-4 text-right font-mono text-neon-green">4 x sisi</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 text-slate-400">Proses Perhitungan</td>
                                        <td class="py-3 px-4 text-right font-mono text-slate-300">4 x {{ $sisi }}</td>
                                    </tr>
                                    <tr class="bg-neon-green/10">
                                        <td class="py-3.5 px-4 font-bold text-neon-green">Hasil Keliling Persegi</td>
                                        <td class="py-3.5 px-4 text-right font-extrabold text-neon-green text-lg">{{ $keliling }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endisset

            </div>
        @endisset

    </div>

</body>
</html>