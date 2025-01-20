<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Meja</title>
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

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 600px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: black;
        }

        .reservasi-info {
            margin-bottom: 20px;
            font-style: italic;
            font-weight: bold;
        }

        label, select, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            background-color: #A0522D;
            color: white;
            font-size: 16px;
        }

        button {
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background-color: #8B4513;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pilih Meja</h1>

        <div class="reservasi-info">
            <p>Reservasi oleh: {{ $reservasi->nama_lengkap }}</p>
            <p>Tanggal Reservasi: {{ $reservasi->tanggal_reservasi }}</p>
            <p>Jumlah Orang: {{ $reservasi->jumlah_orang }}</p>
        </div>

        <form action="{{ route('meja.store') }}" method="POST">
            @csrf
            <label for="meja">Pilih Meja</label>
            <select name="meja" id="meja" required>
                @foreach ($mejas as $meja)
                    <option value="{{ $meja->id }}">{{ $meja->kode_meja }}</option>
                @endforeach
            </select>

            <button type="submit">Lanjutkan Pemesanan</button>
        </form>
    </div>
</body>
</html>
