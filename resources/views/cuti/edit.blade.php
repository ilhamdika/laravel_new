@extends('layouts.app')

@section('title', 'Edit Cuti')

@section('content')
<div class="container mt-4">
    <h2>Edit Cuti</h2>
    <a href="{{ route('cuti.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Pegawai</label>
            <select name="pegawai_id" class="form-control" required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach ($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}" {{ $cuti->pegawai_id == $pegawai->id ? 'selected' : '' }}>
                        {{ $pegawai->first_name }} {{ $pegawai->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Alasan Cuti</label>
            <input type="text" name="alasan" class="form-control" value="{{ $cuti->alasan }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $cuti->tanggal_mulai }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $cuti->tanggal_selesai }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection