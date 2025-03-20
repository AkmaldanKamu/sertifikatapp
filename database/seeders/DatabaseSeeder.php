<?php

namespace Database\Seeders;

use App\Models\TemaSertifikat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah admin sudah ada sebelum menambahkannya
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        // Cek apakah tema sertifikat sudah ada sebelum menambahkannya
        $temaSertifikats = [
            ['nama_tema' => 'Tema Profesional', 'template_path' => 'templates/tema1.jpg', 'is_active' => true],
            ['nama_tema' => 'Tema Elegant', 'template_path' => 'templates/tema2.jpg', 'is_active' => false],
        ];

        foreach ($temaSertifikats as $tema) {
            TemaSertifikat::firstOrCreate(
                ['nama_tema' => $tema['nama_tema']], 
                ['template_path' => $tema['template_path'], 'is_active' => $tema['is_active']]
            );
        }
    }
}
