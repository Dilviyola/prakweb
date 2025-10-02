@extends('layouts.app')
@section('content')

<style>
    html, body {
        height: 100%; /* penting biar flex jalan */
        margin: 0;
        padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* full tinggi layar */
        background-color: #fdfee4; /* kuning soft */
        font-family: Arial, sans-serif;
    }

    /* Navbar */
    .navbar {
        background-color: #c4e8f6; /* biru soft */
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .navbar h2 {
        margin: 0;
        color: #333;
    }
    .navbar a {
        margin-left: 20px;
        text-decoration: none;
        color: #333;
        font-weight: bold;
        transition: 0.3s;
    }
    .navbar a:hover {
        color: #ff91af;
    }

    /* Konten utama (biar footer turun) */
    .content {
        flex: 1; /* isi fleksibel, dorong footer ke bawah */
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    /* Form Container */
    .form-container {
        max-width: 450px;
        width: 100%;
        margin: 60px auto;
        background-color: #c4e8f6; /* biru soft */
        padding: 30px 25px;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .form-container h1 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
        font-size: 1.6rem;
    }

    label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 6px;
    }

    input, select, button {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 18px;
        border-radius: 8px;
        font-size: 15px;
        box-sizing: border-box;
        transition: 0.3s;
    }

    input, select {
        border: 2px solid #ffd1db; /* pink border */
        background-color: #fff;
    }

    select option[disabled] {
        color: #888; /* warna abu buat placeholder */
    }

    input:focus, select:focus {
        outline: none;
        border-color: #ff91af;
        box-shadow: 0 0 6px #ffd1db;
    }

    button {
        border: none;
        background-color: #ffd1db;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background-color: #ff91af;
        color: white;
    }

    /* Footer */
    .footer {
        background-color: #c4e8f6; /* biru soft */
        text-align: center;
        padding: 15px 0;
        box-shadow: 0 -2px 6px rgba(0,0,0,0.1);
    }

    .footer p {
        margin: 0;
        color: #333;
        font-size: 14px;
    }
</style>

<!-- Navbar -->
<div class="navbar">
    <h2>Sistem Manajement Mahasiswa</h2>
    <div>
        <a href="/user">Home</a>
        <a href="/user/create">Tambah Data</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </div>
</div>

<!-- Konten utama -->
<div class="content">
    <div class="form-container">
      <h1>Data Diri Mahasiswa</h1>

      <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama">

        <label for="nim">NPM</label>
        <input type="text" id="nim" name="nim">

        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id" required>
            <option value="" disabled selected>-- Pilih Kelas --</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
      </form>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2025. All rights reserved.</p>
</footer>

@endsection
