<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mbg_distributions', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel schools
            $table->foreignId('school_id')->constrained('schools')->onDelete('cascade');
            $table->date('distribution_date'); // Tanggal pembagian makanan
            $table->enum('meal_time', ['pagi', 'siang'])->default('siang'); // Waktu konsumsi
            $table->string('menu_description'); // Contoh: Nasi Ayam Teriyaki + Brokoli + Susu
            $table->string('provider_name')->nullable(); // Nama SPPG / Katering rekanan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mbg_distributions');
    }
};