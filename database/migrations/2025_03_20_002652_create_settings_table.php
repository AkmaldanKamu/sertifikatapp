<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('ceo_name');
            $table->string('nama_pengajar');
            $table->string('instansi_pengajar');
            $table->string('tempat');
            $table->string('format_tanggal_sertifikat');
            $table->string('ttd_ceo_path')->nullable();
            $table->string('ttd_pengajar_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};