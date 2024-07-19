<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan dari Pengunjung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
        .footer {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pesan dari Pengunjung</h1>
        
        <p><strong>Nama:</strong> {{ $data['namaguest'] }}</p>
        <p><strong>Email:</strong> {{ $data['emailguest'] }}</p>
        
        <hr>
        
        <p><strong>Pesan:</strong></p>
        <p>{{ $data['pesanguest'] }}</p>
        
        <div class="footer">
            <p>Email ini dikirimkan melalui formulir kontak pada {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
