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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->integer('nisn')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('vote_status')->default('belum');
            $table->integer('vote_number')->nullable();
            $table->string('role')->default('peserta');
            $table->string('device_token')->nullable();
            $table->timestamp('vote_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_logout_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
