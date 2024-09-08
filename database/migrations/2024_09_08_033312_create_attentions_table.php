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
        Schema::create('attentions', function (Blueprint $table) {
            $table->id();
            $table->string('fr', 20);          // Frecuencia respiratoria
            $table->string('peso', 20);        // Peso
            $table->string('so2', 20);         // Saturación de oxígeno
            $table->string('temp', 20);        // Temperatura
            $table->string('pa', 20);          // Presión arterial
            $table->string('talla', 20);  // Talla, opcional
            $table->string('fc', 20);     // Frecuencia cardíaca, opcional
            $table->longText('antecedent');    // Antecedentes
            $table->longText('symptoms');      // Síntomas
            $table->longText('inconvenience'); // Inconvenientes
            $table->longText('diagnosis');     // Diagnóstico
            $table->longText('treatment');     // Tratamiento
            $table->string('state', 50);       // Estado de la atención
            // Llaves foráneas
            $table->unsignedBigInteger('doctor_id');   // Relación con la tabla doctors
            $table->unsignedBigInteger('appointment_id'); // Relación con la tabla appointments

            // Relación con la tabla appointments
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');

            // Relación con la tabla doctors
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->timestamps();              // created_at y updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attentions');
    }
};
