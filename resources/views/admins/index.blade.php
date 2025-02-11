@extends('layouts.app')

@section('title', 'Daftar Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Admin</h2>
    <a href="{{ route('admins.create') }}" class="btn btn-primary">Tambah Admin</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->first_name }}</td>
                <td>{{ $admin->last_name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
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