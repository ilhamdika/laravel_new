@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">Tambah Admin</div>

    @if ($errors->any())
        <div class="alert alert-danger m-3">
            <h5><strong>Terjadi Kesalahan!</strong></h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Depan</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name') }}" required>
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Belakang</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name') }}" required>
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admins.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection