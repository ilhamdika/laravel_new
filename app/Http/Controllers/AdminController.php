<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6'
        ], [
            'first_name.required' => 'Nama depan harus diisi.',
            'first_name.string' => 'Nama depan harus berupa teks.',
            'first_name.max' => 'Nama depan maksimal 255 karakter.',
            'last_name.required' => 'Nama belakang harus diisi.',
            'last_name.string' => 'Nama belakang harus berupa teks.',
            'last_name.max' => 'Nama belakang maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 6 karakter.'
        ]);

        try {
            Admin::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);

        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'nullable|min:6'
        ], [
            'first_name.required' => 'Nama depan harus diisi.',
            'first_name.string' => 'Nama depan harus berupa teks.',
            'first_name.max' => 'Nama depan maksimal 255 karakter.',
            'last_name.required' => 'Nama belakang harus diisi.',
            'last_name.string' => 'Nama belakang harus berupa teks.',
            'last_name.max' => 'Nama belakang maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan oleh admin lain.',
            'password.min' => 'Kata sandi minimal 6 karakter jika diisi.'
        ]);

        try {
            $data = $request->only(['first_name', 'last_name', 'email']);
            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            $admin->update($data);
            return redirect()->route('admins.index')->with('success', 'Admin berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui data admin. Silakan coba lagi.']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin berhasil dihapus');
    }
}
