@extends('layouts.app')

@section('content')
<button class="btn btn-primary" onclick="window.location.href = '{{ route('pegawai.index') }}'">Kembali</button>
<h2>Daftar Cuti</h2>
<a href="{{ route('cuti.create') }}" class="btn btn-primary">Tambah Cuti</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Pegawai</th>
            <th>Alasan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cutis as $cuti)
            <tr>
                <td>{{ $cuti->pegawai->first_name }} {{ $cuti->pegawai->last_name }}</td>
                <td>{{ $cuti->alasan }}</td>
                <td>{{ $cuti->tanggal_mulai }}</td>
                <td>{{ $cuti->tanggal_selesai }}</td>
                <td>
                    <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus cuti ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection