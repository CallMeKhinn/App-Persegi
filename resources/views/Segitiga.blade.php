<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persegi</title>
</head>
<body>
    <h1>Aplikasi Hitung Segitiga</h1>
    <form action="/Segitiga" method="post">
        @csrf
        Masukkan alas: <input type="number" name="alas" required>
        <br>
        Masukkan tinggi: <input type="number" name="tinggi" required>
        <br><button type="submit">Hitung</button>
    </form>
    @isset($luas)
        <h3>Hasil Perhitungan:</h3>
        <p>Alas: {{ $alas ?? '' }}</p>
        <p>Tinggi: {{ $tinggi ?? '' }}</p>
        <p><strong>Luas Segitiga: {{ $luas }}</strong></p>
    @endisset
</body>
</html>