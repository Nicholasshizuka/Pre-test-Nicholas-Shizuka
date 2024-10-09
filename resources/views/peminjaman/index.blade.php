@extends('layout')

@section('content')
    <h1>Daftar Peminjaman</h1>
    <a href="{{ route('peminjaman.create') }}">Tambah Peminjaman</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengguna</th>
                <th>Jumlah Pinjaman</th>
                <th>Batas Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->id_peminjaman }}</td>
                    <td>{{ $peminjaman->pengguna->nama }}</td> <!-- Relasi ke nama pengguna -->
                    <td>{{ $peminjaman->jumlah_pinjaman }}</td>
                    <td>{{ $peminjaman->batas_waktu_pinjaman }}</td>
                    <td>
                        <a href="{{ route('peminjaman.edit', $peminjaman->id_peminjaman) }}">Edit</a>
                        <form action="{{ route('peminjaman.destroy', $peminjaman->id_peminjaman) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
