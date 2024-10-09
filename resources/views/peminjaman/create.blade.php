@extends('layout')

@section('content')
    <h1>Tambah Peminjaman</h1>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <label for="id_pengguna">Pengguna:</label>
        <select name="id_pengguna" required>
            @foreach($penggunas as $pengguna)
                <option value="{{ $pengguna->id_pengguna }}">{{ $pengguna->nama }}</option>
            @endforeach
        </select><br>

        <label for="jumlah_pinjaman">Jumlah Pinjaman:</label>
        <input type="number" name="jumlah_pinjaman" step="0.01" required><br>

        <label for="batas_waktu_pinjaman">Batas Waktu Pinjaman:</label>
        <input type="date" name="batas_waktu_pinjaman" required><br>

        <button type="submit">Simpan</button>
    </form>
@endsection
