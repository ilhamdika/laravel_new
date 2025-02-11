<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::with('pegawai')->get();
        return view('cuti.index', compact('cutis'));
    }

    public function create()
    {
        $pegawais = Pegawai::all();
        return view('cuti.create', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'alasan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $startDate = Carbon::parse($request->tanggal_mulai);
        $endDate = Carbon::parse($request->tanggal_selesai);
        $daysRequested = $startDate->diffInDays($endDate) + 1;

        $year = $startDate->year;
        $totalCuti = Cuti::where('pegawai_id', $request->pegawai_id)
            ->whereYear('tanggal_mulai', $year)
            ->sum(DB::raw("DATEDIFF(tanggal_selesai, tanggal_mulai) + 1"));

        if (($totalCuti + $daysRequested) > 5) {
            return redirect()->back()->withErrors(['error' => 'Maksimal cuti per tahun adalah 5 hari!']);
        }

        Cuti::create($request->all());

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil ditambahkan.');
    }

    public function edit(Cuti $cuti)
    {
        $pegawais = Pegawai::all();
        return view('cuti.edit', compact('cuti', 'pegawais'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'alasan' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $startDate = Carbon::parse($request->tanggal_mulai);
        $endDate = Carbon::parse($request->tanggal_selesai);
        $daysRequested = $startDate->diffInDays($endDate) + 1;

        $year = $startDate->year;
        $totalCuti = Cuti::where('pegawai_id', $request->pegawai_id)
            ->whereYear('tanggal_mulai', $year)
            ->sum(DB::raw("DATEDIFF(tanggal_selesai, tanggal_mulai) + 1"));

        if (($totalCuti + $daysRequested) > 5) {
            return redirect()->back()->withErrors(['error' => 'Maksimal cuti per tahun adalah 5 hari!']);
        }

        $cuti->update($request->all());

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diperbarui.');
    }

    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil dihapus.');
    }
}
