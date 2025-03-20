<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_sertifikat',
        'tema_sertifikat_id',
        'tanggal_pelatihan'
    ];

    public function temaSertifikat()
    {
        return $this->belongsTo(TemaSertifikat::class);
    }
}