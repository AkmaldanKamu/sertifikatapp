<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\TemaSertifikat;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::with('temaSertifikat')->get();
        return view('admin.peserta.index', compact('pesertas'));
    }

    public function create()
    {
        $tema_sertifikats = TemaSertifikat::all();
        return view('admin.peserta.create', compact('tema_sertifikats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pesertas',
            'tema_sertifikat_id' => 'required|exists:tema_sertifikats,id',
            'tanggal_pelatihan' => 'required|date',
        ]);

        $noSertifikat = 'CERT-' . time() . '-' . rand(1000, 9999);

        Peserta::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_sertifikat' => $noSertifikat,
            'tema_sertifikat_id' => $request->tema_sertifikat_id,
            'tanggal_pelatihan' => $request->tanggal_pelatihan,
        ]);

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil ditambahkan');
    }

    public function edit(Peserta $peserta)
    {
        $tema_sertifikats = TemaSertifikat::all();
        return view('admin.peserta.edit', compact('peserta', 'tema_sertifikats'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pesertas,email,' . $peserta->id,
            'tema_sertifikat_id' => 'required|exists:tema_sertifikats,id',
            'tanggal_pelatihan' => 'required|date',
        ]);

        $peserta->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'tema_sertifikat_id' => $request->tema_sertifikat_id,
            'tanggal_pelatihan' => $request->tanggal_pelatihan,
        ]);

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil diperbarui');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil dihapus');
    }
}