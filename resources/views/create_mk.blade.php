@extends('layouts.app')
@section('content')

<style>
    body {
        background-color: #fffde7; /* krem lembut */
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
    }

    /* HEADER / NAVBAR */
    .navbar {
        background-color: #c4e8f6; /* biru muda */
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 40px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .navbar h2 {
        margin: 0;
        font-size: 1.4rem;
        color: #333;
        font-weight: 700;
    }

    .navbar div a {
        color: #333;
        text-decoration: none;
        font-weight: 500;
        margin-left: 20px;
        font-size: 15px;
        transition: color 0.3s ease;
    }

    .navbar div a:hover {
        color: #0077b6; /* biru lebih tua saat hover */
    }

    /* CARD FORM */
    .card-form {
        background-color: #c4e8f6;
        max-width: 600px;
        margin: 70px auto;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        padding: 30px 40px;
    }

    .card-header {
        text-align: center;
        font-size: 1.6rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 25px;
    }

    label {
        font-weight: 600;
        color: #333;
        display: block;
        margin-bottom: 6px;
        font-size: 15px;
    }

    input, select {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 20px;
        border: 2px solid #ffd1db;
        border-radius: 8px;
        font-size: 15px;
        background-color: #fff;
        transition: 0.3s;
    }

    input:focus, select:focus {
        border-color: #f48fb1;
        outline: none;
        box-shadow: 0 0 5px #ffd1db;
    }

    .btn-container {
        text-align: center;
        margin-top: 10px;
    }

    .btn {
        display: inline-block;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-save {
        background-color: #ffd1db;
        color: #333;
    }

    .btn-save:hover {
        background-color: #f8aabe;
    }

    .btn-back {
        background-color: #b3e5fc;
        color: #333;
        margin-left: 10px;
    }

    .btn-back:hover {
        background-color: #9edff7;
    }

    /* FOOTER */
    footer {
        background-color: #c4e8f6;
        text-align: center;
        padding: 10px 0;
        color: #333;
        font-size: 14px;
        position: fixed;
        width: 100%;
        bottom: 0;
        box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
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

<div class="card-form">
    <div class="card-header">
        Data Mata Kuliah
    </div>

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf

        <label for="nama_mk">Nama Mata Kuliah</label>
        <input type="text" id="nama_mk" name="nama_mk" placeholder="Masukkan nama mata kuliah..." required>

        <label for="sks">Jumlah SKS</label>
        <input type="number" id="sks" name="sks" placeholder="Masukkan jumlah SKS..." required>

        <div class="btn-container">
            <button type="submit" class="btn btn-save">Submit</button>
            <a href="{{ url('/matakuliah') }}" class="btn btn-back">Kembali</a>
        </div>
    </form>
</div>

<footer>
    © 2025. All rights reserved.
</footer>

@endsection
