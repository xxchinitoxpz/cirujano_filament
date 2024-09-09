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
        Schema::create('patient_exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');       // Nombre del examen
            $table->string('file');       // Archivo del examen
            // Llave foránea
            $table->unsignedBigInteger('attention_id');  // Relación con la tabla attentions
            // Relación con la tabla attentions
            $table->foreign('attention_id')->references('id')->on('attentions')->onDelete('cascade');
            $table->timestamps();              // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_exams');
    }
};
