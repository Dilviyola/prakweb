<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function create(){
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request){   
        $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:50',
        'kelas_id' => 'required|exists:kelas,id',
        ]);
 
        $this->userModel->create([
            'nama'     => $request->input('nama'),
            'nim'      => $request->input('nim'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
    return redirect()->to('/user');
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }
}