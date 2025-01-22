<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama - Ruang Saji</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="{{ asset('css/homecss.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <img src="{{ asset('image/resto1.jpeg') }}" alt="Gambar Restoran" class="img-fluid">
    <div class="content text-center mt-4">
        <h1>Pesan Sekarang<br>Restoran Ruang Saji</h1>
        <p>Lebih Mudah, dan Cepat</p>
        <!-- Tombol yang mengarah ke halaman login -->
        <a href="{{ route('login') }}" class="btn btn-light">Reservasi</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
