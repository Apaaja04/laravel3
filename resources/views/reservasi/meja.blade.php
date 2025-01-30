<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Meja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A0522D;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        .header {
            font-weight: bold;
            font-style: italic;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .meja {
            display: inline-block;
            width: 200px;
            background-color: #A0522D;
            color: white;
            padding: 15px;
            margin: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .meja p {
            font-style: italic;
            font-weight: bold;
            margin: 5px 0;
        }
        .btn {
            display: block;
            background-color: white;
            color: black;
            font-style: italic;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px auto 0;
            width: 80%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Reservasi Meja</div>
        
        <form action="{{ route('meja.store') }}" method="POST">
            @csrf
            <div class="meja">
                <p>Nomor Meja: 1</p>
                <p>Max Person: 4</p>
                <button type="submit" name="meja" value="1" class="btn">Reservasi</button>
            </div>
            
            <div class="meja">
                <p>Nomor Meja: 2</p>
                <p>Max Person: 6</p>
                <span class="btn">Meja 2 telah direservasi</span>
            </div>
            
            <div class="meja">
                <p>Nomor Meja: 3</p>
                <p>Max Person: 6</p>
                <span class="btn">Meja 3 telah direservasi</span>
            </div>
            
            <div class="meja">
                <p>Nomor Meja: 4</p>
                <p>Max Person: 4</p>
                <span class="btn">Meja 4 telah direservasi</span>
            </div>
            
            <div class="meja">
                <p>Nomor Meja: 5</p>
                <p>Max Person: 6</p>
                <button type="submit" name="meja" value="5" class="btn">Reservasi</button>
            </div>
            
            <div class="meja">
                <p>Nomor Meja: 6</p>
                <p>Max Person: 6</p>
                <button type="submit" name="meja" value="6" class="btn">Reservasi</button>
            </div>
        </form>
    </div>
</body>
</html>
