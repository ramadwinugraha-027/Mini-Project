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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('school_id')->constrained('schools')->onDelete('restrict');
            $table->foreignId('mbg_distribution_id')->constrained('mbg_distributions')->onDelete('restrict');
            
            $table->date('incident_date');
            $table->text('symptoms_description');
            $table->unsignedInteger('affected_count')->default(1);
            $table->string('evidence_path')->nullable(); 
            
            $table->enum('status', ['diajukan', 'ditinjau', 'diteruskan', 'selesai'])->default('diajukan');
            $table->text('notes')->nullable();
            $table->string('forwarded_to')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }

};
