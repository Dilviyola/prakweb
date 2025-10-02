@extends('layouts.app')
@section('content')

<style>
    body {
        background-color: #fdfee4; /* kuning soft */
        font-family: Arial, sans-serif;
    }

    .form-container {
        max-width: 450px;
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
        padding: 12px 14px; /* sama untuk semua */
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
</style>

<div class="form-container">
  <h1>Data Diri Mahasiswa</h1>

  <form action="{{ route('user.store') }}" method="POST">
    @csrf


<label for="nama">Nama</label>
<input type="text" id="nama" name="nama">

<label for="nim">NPM</label>
<input type="text" id="nim" name="nim">

<label for="kelas">Kelas</label>
<select name="kelas_id" id="kelas_id">
    @foreach ($kelas as $kelasItem)
        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
    @endforeach
</select>

<button type="submit">Submit</button>

  </form>
</div>

@endsection
