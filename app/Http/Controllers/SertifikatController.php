<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Setting;
use App\Models\TemaSertifikat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    public function checkSertifikat(Request $request)
    {
        $request->validate([
            'no_sertifikat' => 'required',
        ]);

        $peserta = Peserta::where('no_sertifikat', $request->no_sertifikat)->first();

        if (!$peserta) {
            return redirect()->back()->with('error', 'Nomor sertifikat tidak ditemukan');
        }

        return redirect()->route('sertifikat.download', $peserta->no_sertifikat);
    }

    public function downloadSertifikat($noSertifikat)
    {
        $peserta = Peserta::where('no_sertifikat', $noSertifikat)->firstOrFail();
        $setting = Setting::first() ?? new Setting(); // Pastikan tidak null
        $temaSertifikat = $peserta->temaSertifikat;

        if (!$temaSertifikat) {
            $temaSertifikat = TemaSertifikat::where('is_active', true)->first();
        }

        if (!$temaSertifikat) {
            return redirect()->back()->with('error', 'Tema sertifikat belum diatur');
        }

        $templatePath = Storage::path('public/' . $temaSertifikat->template_path);
        $ttdCeoPath = $setting?->ttd_ceo_path ? Storage::path('public/' . $setting->ttd_ceo_path) : null;
        $ttdPengajarPath = $setting?->ttd_pengajar_path ? Storage::path('public/' . $setting->ttd_pengajar_path) : null;


        $tanggalSertifikat = Carbon::parse($peserta->tanggal_pelatihan)->format($setting->format_tanggal_sertifikat ?? 'd F Y');

        // PDF dengan template sesuai tema
        $pdf = PDF::loadView('sertifikat.template_' . $temaSertifikat->id, [
            'peserta' => $peserta,
            'setting' => $setting,
            'tanggal' => $tanggalSertifikat,
            'templatePath' => $templatePath,
            'ttdCeoPath' => $ttdCeoPath,
            'ttdPengajarPath' => $ttdPengajarPath,
        ]);

        return $pdf->download('sertifikat_' . $peserta->nama . '.pdf');
    }
}