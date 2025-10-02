@extends('layouts.app')
@section('content')

<style>
    body {
        background-color: #fdfee4; /* kuning soft */
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
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

    h1 {
        text-align: center;
        margin: 30px 0;
        color: #333;
    }

    table {
        width: 80%;
        margin: 0 auto 40px auto;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    thead {
        background-color: #c4e8f6; /* biru soft */
    }

    thead th {
        padding: 12px;
        font-weight: bold;
        color: #333;
        border: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: #ffd1db; /* pink soft */
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    tbody td {
        padding: 12px;
        border: 1px solid #ddd;
    }

    tbody tr:hover {
        background-color: #ffecf2; /* pink lebih terang saat hover */
        transition: 0.3s;
    }

    /* kolom ID kecil dan center */
    td:first-child, th:first-child {
        width: 60px;
        text-align: center;
    }

    /* kolom Kelas kecil dan center */
    td:last-child, th:last-child {
        width: 80px;
        text-align: center;
    }

    /* Footer */
    .footer {
        background-color: #c4e8f6; /* biru soft */
        text-align: center;
        padding: 15px 0;
        margin-top: auto;
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

<h1>Daftar Pengguna</h1>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>NPM</th>
      <th>Kelas</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user )
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->nama }}</td>
      <td>{{ $user->nim }}</td>
      <td>{{ $user->nama_kelas }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2025. All rights reserved.</p>
</footer>

@endsection
