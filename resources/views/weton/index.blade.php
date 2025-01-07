<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weton Calculator</title>
</head>
<body>
    <h1>Hitung Weton</h1>
    <form action="{{ route('weton.calculate') }}" method="POST">
        @csrf
        <label for="tanggal_lahir_1">Tanggal Lahir 1:</label>
        <input type="date" id="tanggal_lahir_1" name="tanggal_lahir_1" required>
        <br>
        <label for="tanggal_lahir_2">Tanggal Lahir 2:</label>
        <input type="date" id="tanggal_lahir_2" name="tanggal_lahir_2" required>
        <br>
        <button type="submit">Hitung</button>
    </form>
</body>
</html>
