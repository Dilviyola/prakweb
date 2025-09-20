<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .profile {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .profile img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid #ccc;
            margin-bottom: 20px;
        }
        .info {
            background-color: #e0e0e0;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            font-size: 18px;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="profile">
        <!-- Gambar profil default -->
        <img src="{{ asset('yola.jpg') }}" alt="Profile Picture">
        <!-- Data -->
        <div class="info"><span class="label">Nama:</span> {{ $Nama }}</div>
        <div class="info"><span class="label">NPM:</span> {{ $NPM }}</div>
        <div class="info"><span class="label">Kelas:</span> {{ $Kelas }}</div>
    </div>
</body>
</html>