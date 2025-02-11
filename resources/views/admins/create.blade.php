@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Tambah Admin</div>
    <div class="card-body">
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Depan</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama Belakang</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admins.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection