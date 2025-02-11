@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Data Pegawai</h2>
    <a href="{{ route('cuti.index') }}" class="btn btn-success">List cuti</a>
</div>
<a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Pegawai</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pegawais as $pegawai)
            <tr>
                <td>{{ $pegawai->first_name }}</td>
                <td>{{ $pegawai->last_name }}</td>
                <td>{{ $pegawai->email }}</td>
                <td>{{ $pegawai->phone }}</td>
                <td>{{ $pegawai->address }}</td>
                <td>{{ $pegawai->gender }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection