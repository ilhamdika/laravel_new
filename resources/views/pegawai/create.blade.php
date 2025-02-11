@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
<h2>Tambah Pegawai</h2>

<form action="{{ route('pegawai.store') }}" method="POST">
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
        <label>No HP</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="address" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="gender" class="form-control" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection