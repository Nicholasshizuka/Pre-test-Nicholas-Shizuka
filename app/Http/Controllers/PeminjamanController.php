<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('pengguna')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $penggunas = Pengguna::all(); // Diperlukan untuk relasi pengguna
        return view('peminjaman.create', compact('penggunas'));
    }

    public function store(Request $request)
    {
        Peminjaman::create($request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'jumlah_pinjaman' => 'required|numeric',
            'batas_waktu_pinjaman' => 'required|date'
        ]));

        return redirect()->route('peminjaman.index');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $penggunas = Pengguna::all(); // Diperlukan untuk relasi pengguna
        return view('peminjaman.edit', compact('peminjaman', 'penggunas'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update($request->validate([
            'id_pengguna' => 'required|exists:pengguna,id_pengguna',
            'jumlah_pinjaman' => 'required|numeric',
            'batas_waktu_pinjaman' => 'required|date'
        ]));

        return redirect()->route('peminjaman.index');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index');
    }
}
