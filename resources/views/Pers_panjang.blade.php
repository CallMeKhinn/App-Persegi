<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persegi</title>
</head>
<body>
    <h1>Aplikasi Hitung Persegi panjang</h1>
    <form action="/Persegipanjang" method="post">
        @csrf
        Masukkan panjang: <input type="number" name="panjang" required>
        <br>
        Masukkan lebar: <input type="number" name="lebar" required>
        <br><button type="submit">Hitung</button>
    </form>
    @isset($luas)
        <h3>Hasil Perhitungan:</h3>
        <p>Panjang: {{ $panjang ?? '' }}</p>
        <p>Lebar: {{ $lebar ?? '' }}</p>
        <p><strong>Luas Persegi Panjang: {{ $luas }}</strong></p>
        <p><strong>Keliling Persegi Panjang: {{ $keliling }}</strong></p>
    @endisset
</body>
</html>