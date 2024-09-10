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
            $table->string('patient', 200);
            $table->string('hc_nr', 100);
            $table->string('dni', 9);
            $table->string('edad', 3);
            $table->string('sexo', 1);
            $table->string('modalidad_atencion', 100);
            $table->timestamp('fecha_hora_ingreso')->nullable();
            $table->timestamp('fecha_hora_egreso')->nullable();
            $table->string('resumen_hc');
            $table->string('diagnostico_1', 200);
            $table->string('cie10_1', 200);
            $table->string('diagnostico_2', 200)->nullable();
            $table->string('cie10_2', 200)->nullable();
            $table->string('diagnostico_3', 200)->nullable();
            $table->string('cie10_3', 200)->nullable();
            $table->string('diagnostico_4', 200)->nullable();
            $table->string('cie10_4', 200)->nullable();
            $table->string('tratamiento', 10);
            $table->string('tratamiento_desc');
            $table->string('evolucion', 100);
            $table->string('evolucion_desc');
            $table->timestamp('fecha_hora_alta')->nullable();
            $table->string('observaciones')->nullable();
            $table->unsignedBigInteger('doctor_id');

            // Foreign key constraint (assuming doctors is the referenced table)
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
