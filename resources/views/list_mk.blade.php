@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <style>
        body {
            background-color: #fffde7;
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        /* === NAVBAR === */
        .navbar {
            background-color: #c4e8f6;
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
            font-size: 1.5rem;
            color: #333;
            font-weight: 700;
        }

        .navbar nav {
            display: flex;
            gap: 25px;
        }

        .navbar nav a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar nav a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            background-color: #f48fb1;
            bottom: -5px;
            left: 0;
            transition: width 0.3s ease;
        }

        .navbar nav a:hover::after {
            width: 100%;
        }

        .navbar nav a:hover {
            color: #0077b6;
        }

        /* === CARD === */
        .card-mk {
            background-color: #c4e8f6;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 80px auto;
            max-width: 850px;
            border-top: 6px solid #ffd1db;
        }

        h1 {
            color: #333;
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        .btn-tambah {
            display: inline-block;
            background-color: #ffd1db;
            color: #333;
            padding: 10px 25px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #f8aabe;
            transform: translateY(-2px);
        }

        /* === TABEL === */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 16px;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #b3e5fc;
            color: #333;
            padding: 12px;
            text-transform: uppercase;
            border: none;
            font-weight: 600;
        }

        td {
            background-color: #fff;
            padding: 12px;
            border-bottom: 2px solid #ffd1db;
            color: #333;
            vertical-align: middle; /* biar teks dan tombol sejajar tengah */
        }

        tr:hover td {
            background-color: #fff0f5;
        }

        /* === AKSI BUTTONS === */
        .aksi-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-edit,
        .btn-hapus {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: none;
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            min-width: 80px;
        }

        .btn-edit {
            background-color: #81d4fa;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #4fc3f7;
            transform: scale(1.05);
        }

        .btn-hapus {
            background-color: #f48fb1;
            color: #fff;
        }

        .btn-hapus:hover {
            background-color: #ec407a;
            transform: scale(1.05);
        }

        /* === FOOTER === */
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

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
                padding: 10px 20px;
            }

            .navbar nav {
                flex-direction: column;
                gap: 10px;
                margin-top: 10px;
            }

            .card-mk {
                padding: 25px;
                margin: 60px 15px;
            }

            .aksi-btn {
                flex-direction: column;
                gap: 6px;
            }
        }
    </style>

    <!-- Navbar -->
    <div class="navbar">
        <h2>Sistem Manajement Mahasiswa</h2>
        <nav>
            <a href="/user">Home</a>
            <a href="/user/create">Tambah Data</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </nav>
    </div>

    <!-- Konten Daftar Mata Kuliah -->
    <div class="card-mk">
        <h1>📚 Daftar Mata Kuliah</h1>
        <a href="{{ route('matakuliah.create') }}" class="btn-tambah">➕ Tambah Mata Kuliah Baru</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mks as $mk)
                <tr>
                    <td>{{ $mk->id }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>
                        <div class="aksi-btn">
                            <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn-edit">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer>
        © 2025. All rights reserved.
    </footer>
</div>
@endsection
