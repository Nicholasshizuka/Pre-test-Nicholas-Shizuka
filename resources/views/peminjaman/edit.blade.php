@extends('layout')

@section('content')
    <h1>Edit Peminjaman</h1>
    <form action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_pengguna">Pengguna:</label>
        <select name="id_pengguna" required>
            @foreach($penggunas as $pengguna)
                <option value="{{ $pengguna->id_pengguna }}" {{ $pengguna->id_pengguna == $peminjaman->id_pengguna ? 'selected' : '' }}>
                    {{ $pengguna->nama }}
                </option>
            @endforeach
        </select><br>

        <label for="jumlah_pinjaman">Jumlah Pinjaman:</label>
        <input type="number" name="jumlah_pinjaman" value="{{ $peminjaman->jumlah_pinjaman }}" step="0.01" required><br>

        <label for="batas_waktu_pinjaman">Batas Waktu Pinjaman:</label>
        <input type="date" name="batas_waktu_pinjaman" value="{{ $peminjaman->batas_waktu_pinjaman }}" required><br>

        <button type="submit">Update</button>
    </form>
@endsection
