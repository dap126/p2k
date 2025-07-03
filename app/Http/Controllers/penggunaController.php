<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class PenggunaController extends Controller
{
    public function index()
{
    // Dummy data soalnya belum pakai database
    $users = collect([
        (object)[
            'name' => 'Malika',
            'email' => 'malika26@email.com',
            'nim' => '211001',
            'role' => 'mahasiswa',
            'is_active' => true,
        ],
        (object)[
            'name' => 'Raditya',
            'email' => 'radit_09@email.com',
            'nim' => 'TKS001',
            'role' => 'teknisi',
            'is_active' => false,
        ],
    ]);

    return view('pengguna.index', compact('users'));
}

}
