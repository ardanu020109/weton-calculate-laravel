<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Weton</title>
</head>
<body>
    <h1>Hasil Perhitungan Weton</h1>
    <h2>Tanggal Lahir 1: {{ $weton1['tanggal'] }}</h2>
    <p>Hari: {{ $weton1['hari'] }}</p>
    <p>Pasaran: {{ $weton1['pasaran'] }}</p>
    <p>Neptu: {{ $weton1['neptu'] }}</p>

    <h2>Tanggal Lahir 2: {{ $weton2['tanggal'] }}</h2>
    <p>Hari: {{ $weton2['hari'] }}</p>
    <p>Pasaran: {{ $weton2['pasaran'] }}</p>
    <p>Neptu: {{ $weton2['neptu'] }}</p>

    <h2>Jumlah weton bersama pasangan anda adalah {{ $jumlah_weton }}, maka kategori kalian berdua adalah {{ $result }}</h2>
    <a href="{{ route('weton.index') }}">Hitung Lagi</a>
</body>
</html>
