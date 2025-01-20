<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Reservasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A0522D;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Kontainer utama */
        .container {
            display: flex;
            align-items: center;
            width: 900px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        /* Kontainer untuk gambar */
        .image-container {
            width: 50%;
            background-color: #F4F4F4;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0px;
        }

        /* Kontainer untuk form */
        .form-container {
            padding: 30px;
            flex: 1;
        }

        .form-container h1 {
            font-style: italic;
            font-weight: bold;
            text-align: center;
            color: black;
        }

        .form-container label {
            font-weight: bold;
            font-style: italic;
            display: block;
            margin: 12px 0 5px;
        }

        .form-container input, 
        .form-container textarea, 
        .form-container button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            background-color: #A0522D;
            color: white;
            font-size: 16px;
        }

        .form-container input::placeholder, 
        .form-container textarea::placeholder {
            color: white;
            opacity: 0.7;
        }

        .form-container textarea {
            resize: none;
            height: 80px;
        }

        .form-container button {
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
        }

        .form-container button:hover {
            background-color: #8B4513;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Kontainer gambar -->
    <div class="image-container">
        <img src="{{ asset('image/reserved.jpg') }}" alt="Reserved">
    </div>

    <!-- Kontainer form -->
    <div class="form-container">
        <h1>Reservasi Form</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <form action="{{ route('form.submit') }}" method="POST">
    @csrf
    <label for="nama_lengkap">Nama Lengkap:</label>
    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
    <br>

    <label for="tanggal_reservasi">Tanggal Reservasi:</label>
    <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" required>
    <br>

    <label for="waktu_reservasi">Waktu Reservasi:</label>
    <input type="time" id="waktu_reservasi" name="waktu_reservasi" required>
    <br>

    <label for="jumlah_orang">Jumlah Orang:</label>
    <input type="number" id="jumlah_orang" name="jumlah_orang" required>
    <br>

    <label for="catatan_tambahan">Catatan Tambahan:</label>
    <textarea id="catatan_tambahan" name="catatan_tambahan"></textarea>
    <br>

    <button type="submit">Simpan Reservasi</button>
</form>


        <!-- Tombol 'Lanjut' hanya muncul setelah form disubmit -->
        @if (session('success') && session('reservasi_id'))
            <a href="{{ route('reservasi.meja', ['id' => session('reservasi_id')]) }}">
                <button type="button">Lanjutkan ke Halaman Berikutnya</button>
            </a>
        @endif
    </div>
</div>
</body>
</html>
