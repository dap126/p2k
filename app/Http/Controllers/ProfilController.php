<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Laporan;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('profil', compact('user')); // Kirim data ke view profil.blade.php
    }
        public function statusPengajuan()
    {
        $user = Auth::user();
        $laporans = Laporan::where('user_id', $user->id)->latest()->get();
        
        return view('status_pengajuan', compact('laporans'));
    }
}
