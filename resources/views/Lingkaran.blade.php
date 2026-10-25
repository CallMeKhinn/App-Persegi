<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persegi</title>
</head>
<body>
    <h1>Aplikasi Hitung Lingkaran</h1>
    <form action="/Lingkaran" method="post">
        @csrf
        Masukkan jari-jari: <input type="number" name="jari_jari" required>
        <br><button type="submit">Hitung</button>
    </form>
    @isset($luas)
        <h3>Hasil Perhitungan:</h3>
        <p>Jari-jari: {{ $jari_jari ?? '' }}</p>
        <p><strong>Luas Lingkaran: {{ $luas }}</strong></p>
        <p><strong>Keliling Lingkaran: {{ $keliling }}</strong></p>
    @endisset
</body>
</html>