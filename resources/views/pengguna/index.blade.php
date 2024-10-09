@extends('layout')

@section('content')
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('pengguna.create') }}">Tambah Pengguna</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penggunas as $pengguna)
                <tr>
                    <td>{{ $pengguna->id_pengguna }}</td>
                    <td>{{ $pengguna->nama }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $pengguna->id_pengguna) }}">Edit</a>
                        <form action="{{ route('pengguna.destroy', $pengguna->id_pengguna) }}" method="POST" style="display:inline-block;">
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

