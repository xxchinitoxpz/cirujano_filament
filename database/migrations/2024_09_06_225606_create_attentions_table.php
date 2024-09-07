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
            $table->string('talla', 20);
            $table->string('fc', 20);  // Frecuencia cardíaca
            $table->longText('antecedent');    // Antecedentes
            $table->longText('symptoms');      // Síntomas
            $table->longText('inconvenience'); // Inconvenientes
            $table->longText('diagnosis');     // Diagnóstico
            $table->longText('treatment');     // Tratamiento
            $table->string('state', 50);       // Estado de la atención
            $table->string('route', 200)->nullable();  // Ruta, opcional
            $table->unsignedBigInteger('user_id');  // Relación con usuarios
            $table->unsignedBigInteger('appointment_id');       // Relación con citas
            $table->timestamps();
            // Llaves foráneas
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
