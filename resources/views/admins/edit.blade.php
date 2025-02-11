@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="card">
    <div class="card-header bg-warning">Edit Admin</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route('admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Depan</label>
                <input type="text" name="first_name" class="form-control" value="{{ $admin->first_name }}" required>
            </div>
            <div class="mb-3">
                <label>Nama Belakang</label>
                <input type="text" name="last_name" class="form-control" value="{{ $admin->last_name }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
            </div>
            <div class="mb-3">
                <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('admins.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection