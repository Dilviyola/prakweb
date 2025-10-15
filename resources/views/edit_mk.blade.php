@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <style>
        body {
            background-color: #fffde7; /* krem lembut */
            font-family: "Poppins", sans-serif;
        }

        /* --- Card Form --- */
        .card-edit {
            background-color: #c4e8f6; /* biru muda pastel */
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            border-top: 6px solid #ffd1db; /* pink lembut */
        }

        h1 {
            color: #333;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.8rem;
        }

        label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-top: 10px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #ffd1db;
            border-radius: 10px;
            outline: none;
            transition: 0.3s;
            font-size: 16px;
            margin-bottom: 15px;
            background-color: #fff;
        }

        input:focus {
            border-color: #f8aabe; /* pink cerah */
            box-shadow: 0 0 5px rgba(248, 170, 190, 0.5);
        }

        .btn-submit {
            background-color: #ffd1db; /* pink lembut */
            color: #333;
            padding: 10px 25px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            margin-top: 10px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #f8aabe; /* pink cerah */
            transform: translateY(-2px);
        }

        a.btn-back {
            display: inline-block;
            margin-top: 15px;
            color: #0077b6; /* biru lembut */
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        a.btn-back:hover {
            color: #333;
            text-decoration: underline;
        }

        /* --- Toast Notification --- */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1055;
        }

        .toast {
            background: #81c784; /* hijau lembut */
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            font-weight: 500;
            animation: fadeIn 0.3s ease, fadeOut 0.5s ease 3s forwards;
        }

        .toast.error {
            background: #ef5350; /* merah lembut */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeOut {
            to { opacity: 0; transform: translateY(-10px); }
        }

        @media (max-width: 768px) {
            .card-edit {
                padding: 25px;
                margin: 60px 15px;
            }
        }
    </style>

    {{-- ✅ Notifikasi popup di kanan atas --}}
    @if (session('success') || session('error'))
    <div class="toast-container">
        @if (session('success'))
            <div class="toast" id="toast-msg">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="toast error" id="toast-msg">{{ session('error') }}</div>
        @endif
    </div>
    @endif

    <div class="card-edit">
        <h1>✏️ Edit Mata Kuliah</h1>

        <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nama_mk">Nama Mata Kuliah:</label>
            <input type="text" id="nama_mk" name="nama_mk" value="{{ $mk->nama_mk }}" required>

            <label for="sks">SKS:</label>
            <input type="number" id="sks" name="sks" value="{{ $mk->sks }}" min="1" max="3" required>

            <button type="submit" class="btn-submit">💾 Simpan Perubahan</button>
        </form>

        <a href="{{ route('matakuliah.index') }}" class="btn-back">← Kembali ke Daftar</a>
    </div>
</div>

{{-- Script untuk auto-hilang setelah 3 detik --}}
<script>
    setTimeout(() => {
        const toast = document.querySelector('.toast');
        if (toast) toast.remove();
    }, 3500);
</script>
@endsection
