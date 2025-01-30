<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Pesanan Menu</title>
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
            width: 80%;
        }
        .header {
            font-weight: bold;
            font-style: italic;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .item {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            width: 200px;
        }
        .item img {
            width: 100%;
            border-radius: 5px;
        }
        .btn {
            display: block;
            background-color: #D2A4A4;
            color: black;
            font-style: italic;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            margin: 20px auto 0;
            width: 50%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Pilih Pesanan Menu</div>
        
        <form action="{{ route('menu.store') }}" method="POST">
            @csrf
            <div class="menu">
                <div class="item">
                    <img src="wagyu_steak.jpg" alt="Wagyu Steak">
                    <p><strong>Wagyu Steak</strong></p>
                    <p>Makanan</p>
                    <p>Rp.250.000</p>
                    <input type="number" name="menu[wagyu_steak]" value="1" min="1">
                </div>
                <div class="item">
                    <img src="special_tea.jpg" alt="Special Tea">
                    <p><strong>Special Tea</strong></p>
                    <p>Minuman</p>
                    <p>Rp.100.000</p>
                    <input type="number" name="menu[special_tea]" value="1" min="1">
                </div>
                <div class="item">
                    <img src="risol_mozzarella.jpg" alt="Risol Mozzarella">
                    <p><strong>Risol Mozzarella</strong></p>
                    <p>Cemilan</p>
                    <p>Rp.100.000</p>
                    <input type="number" name="menu[risol_mozzarella]" value="1" min="1">
                </div>
            </div>
            <button type="submit" class="btn">Kirim</button>
        </form>
    </div>
</body>
</html>
