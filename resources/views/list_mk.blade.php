@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <style>
        .card-mk {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-top: 6px solid #c084fc;
        }

        h1 {
            color: #7e22ce;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .btn-tambah {
            display: inline-block;
            background-color: #c084fc;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
            font-weight: 600;
        }

        .btn-tambah:hover {
            background-color: #e879f9;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        th {
            background-color: #c084fc;
            color: white;
            padding: 12px;
            text-transform: uppercase;
            border: none;
        }

        td {
            background-color: #f9f5ff;
            padding: 10px;
            border-bottom: 2px solid #f0abfc;
        }

        tr:hover td {
            background-color: #fdf2f8;
        }
    </style>

    <div class="card-mk">
        <h1>📚 Daftar Mata Kuliah</h1>
        <a href="{{ route('matakuliah.create') }}" class="btn-tambah">➕ Tambah Mata Kuliah Baru</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mks as $mk)
                <tr>
                    <td>{{ $mk->id }}</td>
                    <td>{{ $mk->nama_mk }}</td>
                    <td>{{ $mk->sks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection