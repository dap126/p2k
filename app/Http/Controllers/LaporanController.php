<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    // Tampilkan semua laporan untuk admin
    public function index()
    {
        $laporans = Laporan::latest()->get();
        return view('dasbordAdmin', compact('laporans'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('laporan.create');
    }

    // Simpan laporan baru dari user
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggal_melapor' => 'required|date',
            'lokasi_kerusakan' => 'required|string',
            'deskripsi_kerusakan' => 'nullable|string',
        ]);

        Laporan::create([
            'nama' => $request->nama,
            'tanggal_melapor' => $request->tanggal_melapor,
            'lokasi_kerusakan' => $request->lokasi_kerusakan,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'status' => 'proses', // default status
            'user_id' => auth()->id(), // ambil ID user yang sedang login
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

    // Tampilkan laporan detail
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('dasbord', compact('laporan'));
    }

    // Update laporan
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_melapor' => 'required|date',
            'lokasi_kerusakan' => 'required|string|max:255',
            'deskripsi_kerusakan' => 'nullable|string',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update($validated);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
            public function updateStatus(Request $request, $id)
        {
            $request->validate([
                'status' => 'required|in:proses,diterima,ditolak',
            ]);

            $laporan = Laporan::findOrFail($id);
            $laporan->status = $request->status;
            $laporan->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        }
}