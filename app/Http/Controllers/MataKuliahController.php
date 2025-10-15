<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MataKuliahController extends Controller
{
    // Menampilkan daftar mata kuliah
    public function index()
    {
        $data = [
            'title' => 'List Mata Kuliah',
            'mks' => Matakuliah::all(),
        ];
        return view('list_mk', $data);
    }

    // Menampilkan form untuk menambah data mata kuliah
    public function create()
    {
        return view('create_mk', ['title' => 'Create Mata Kuliah']);
    }

    // Menyimpan data mata kuliah baru
    public function store(Request $request)
    {
        try {
            Matakuliah::create([
                'nama_mk' => $request->input('nama_mk'),
                'sks' => $request->input('sks'),
            ]);

            return redirect()
                ->to('/matakuliah')
                ->with('success', 'Mata kuliah berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()
                ->to('/matakuliah')
                ->with('error', ' Gagal menambahkan mata kuliah: ' . $e->getMessage());
        }
    }

    // Menampilkan form edit data mata kuliah
    public function edit($id)
    {
        $mk = Matakuliah::findOrFail($id);
        return view('edit_mk', [
            'title' => 'Edit Mata Kuliah',
            'mk' => $mk
        ]);
    }

    // Mengupdate data mata kuliah
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:3',
        ]);

        try {
            $mk = Matakuliah::findOrFail($id);
            $mk->update([
                'nama_mk' => $request->input('nama_mk'),
                'sks' => $request->input('sks'),
            ]);

            return redirect()
                ->to('/matakuliah')
                ->with('success', ' Data mata kuliah berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()
                ->to('/matakuliah')
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Menghapus data mata kuliah
    public function destroy($id)
    {
        try {
            $mk = Matakuliah::findOrFail($id);
            $mk->delete();

            return redirect()
                ->to('/matakuliah')
                ->with('success', '🗑 Mata kuliah berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()
                ->to('/matakuliah')
                ->with('error', '❌ Gagal menghapus data: ' . $e->getMessage());
        }
    }
}