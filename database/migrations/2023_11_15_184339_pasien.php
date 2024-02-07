<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nomorrekammedis');
            $table->string('iduser');
            $table->string('tempat');
            $table->date('tanggallahir');
            $table->string('jeniskelamin');
            $table->string('alamatlengkap');
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('status');
            $table->string('notelp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};