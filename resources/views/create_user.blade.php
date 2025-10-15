@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: #fdfee4; /* kuning lembut */
        font-family: Arial, sans-serif;
    }

    .card-custom {
        background-color: #c4e8f6; /* biru pastel */
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 600px;
        margin: 60px auto;
    }

    .card-header-custom {
        background: linear-gradient(90deg, #9ed3f2, #ffd1db); /* biru → pink */
        color: #333;
        text-align: center;
        padding: 20px;
        font-weight: bold;
        font-size: 1.5rem;
        letter-spacing: 1px;
    }

    .card-body-custom {
        padding: 30px 40px;
        background-color: #f8fdff;
    }

    label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 6px;
    }

    input, select {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 18px;
        border-radius: 8px;
        border: 2px solid #ffd1db;
        background-color: #fff;
        box-sizing: border-box;
        transition: 0.3s;
        font-size: 15px;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #ff91af;
        box-shadow: 0 0 6px #ffd1db;
    }

    .btn-custom {
        border: none;
        border-radius: 30px;
        font-weight: bold;
        padding: 10px 25px;
        transition: all 0.3s ease;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    .btn-save {
        background: linear-gradient(90deg, #9ed3f2, #ffb6c1);
        color: #333;
    }

    .btn-save:hover {
        filter: brightness(1.1);
    }

    .btn-back {
        background: linear-gradient(90deg, #c4e8f6, #ffd1db);
        color: #333;
    }

    .btn-back:hover {
        filter: brightness(1.1);
    }

    .btn-container {
        text-align: center;
        margin-top: 25px;
    }
</style>

<div class="container">
    <div class="card-custom">
        <div class="card-header-custom">
            ✨ Tambah Mata Kuliah Baru ✨
        </div>

        <div class="card-body-custom">
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf

                <label for="nama_mk">Nama Mata Kuliah</label>
                <input type="text" id="nama_mk" name="nama_mk" placeholder="Con
