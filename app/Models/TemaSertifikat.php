<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaSertifikat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tema',
        'template_path',
        'is_active'
    ];

    public function pesertas()
    {
        return $this->hasMany(Peserta::class);
    }
}