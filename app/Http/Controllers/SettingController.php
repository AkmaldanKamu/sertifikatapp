<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\TemaSertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $tema_sertifikats = TemaSertifikat::all();
        $tema_aktif = TemaSertifikat::where('is_active', true)->first();
        
        return view('admin.settings.index', compact('setting', 'tema_sertifikats', 'tema_aktif'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'ceo_name' => 'required',
            'nama_pengajar' => 'required',
            'instansi_pengajar' => 'required',
            'tempat' => 'required',
            'format_tanggal_sertifikat' => 'required',
            'ttd_ceo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ttd_pengajar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $setting->ceo_name = $request->ceo_name;
        $setting->nama_pengajar = $request->nama_pengajar;
        $setting->instansi_pengajar = $request->instansi_pengajar;
        $setting->tempat = $request->tempat;
        $setting->format_tanggal_sertifikat = $request->format_tanggal_sertifikat;

        if ($request->hasFile('ttd_ceo')) {
            if ($setting->ttd_ceo_path) {
                Storage::delete($setting->ttd_ceo_path);
            }
            $ttdCeoPath = $request->file('ttd_ceo')->store('ttd', 'public');
            $setting->ttd_ceo_path = $ttdCeoPath;
        }

        if ($request->hasFile('ttd_pengajar')) {
            if ($setting->ttd_pengajar_path) {
                Storage::delete($setting->ttd_pengajar_path);
            }
            $ttdPengajarPath = $request->file('ttd_pengajar')->store('ttd', 'public');
            $setting->ttd_pengajar_path = $ttdPengajarPath;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }

    public function updateTemaSertifikat(Request $request)
    {
        $request->validate([
            'tema_aktif' => 'required|exists:tema_sertifikats,id',
        ]);

        // Nonaktifkan semua tema
        TemaSertifikat::query()->update(['is_active' => false]);
        
        // Aktifkan tema yang dipilih
        $tema = TemaSertifikat::find($request->tema_aktif);
        $tema->is_active = true;
        $tema->save();

        return redirect()->back()->with('success', 'Tema sertifikat berhasil diperbarui');
    }

    public function createTema()
    {
        return view('admin.settings.create_tema');
    }

    public function storeTema(Request $request)
    {
        $request->validate([
            'nama_tema' => 'required',
            'template_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $templatePath = $request->file('template_file')->store('templates', 'public');

        TemaSertifikat::create([
            'nama_tema' => $request->nama_tema,
            'template_path' => $templatePath,
            'is_active' => false,
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Tema sertifikat berhasil ditambahkan');
    }
}