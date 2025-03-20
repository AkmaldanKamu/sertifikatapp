<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'ceo_name',
        'nama_pengajar',
        'instansi_pengajar',
        'tempat',
        'format_tanggal_sertifikat',
        'ttd_ceo_path',
        'ttd_pengajar_path'
    ];
}