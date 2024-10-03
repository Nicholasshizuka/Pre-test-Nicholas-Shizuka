<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::with('peminjaman')->get();
        return view('pengguna.index', compact('penggunas'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        Pengguna::create($request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'nama' => 'required'
        ]));

        return redirect()->route('pengguna.index');
    }

    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $pengguna->update($request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'nama' => 'required'
        ]));

        return redirect()->route('pengguna.index');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index');
    }
}

