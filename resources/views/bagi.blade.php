<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Bagi Data</h1>
    <form action="{{ route('store_bagi') }}" method="post">
        @csrf
        <label for="">Angka </label>
        <input type="number" name="angka1">
        <br>
        <label for="">Angka </label>
        <input type="number" name="angka2">
        <br>
        <button type="submit">Proses</button>
    </form>

    <h3>Jumlah : {{ $jumlah ?? 0 }}</h3>
</body>

</html>
