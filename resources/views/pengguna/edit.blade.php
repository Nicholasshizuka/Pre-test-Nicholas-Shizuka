@extends('layout')

@section('content')
    <h1>Edit Pengguna</h1>
    <form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $pengguna->nama }}" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $pengguna->email }}" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password"><br> <!-- Kosongkan jika tidak ingin diubah -->

        <button type="submit">Update</button>
    </form>
@endsection
