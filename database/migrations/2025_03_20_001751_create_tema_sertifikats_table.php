<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tema_sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tema');
            $table->string('template_path');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('tema_sertifikats');
    }
};
