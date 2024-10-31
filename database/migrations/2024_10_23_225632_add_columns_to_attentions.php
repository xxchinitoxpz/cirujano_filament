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
        Schema::table('attentions', function (Blueprint $table) {
            $table->string('imc', 20)->nullable();
            //antecedentes
            $table->Text('antecedent_medical')->nullable();
            $table->Text('antecedent_surgical')->nullable();
            $table->Text('antecedent_allergies')->nullable();
            $table->Text('antecedent_family')->nullable();
            //enfermedad actual
            $table->string('sick_time', 10)->nullable();
            $table->string('sick_time2', 5)->nullable();
            $table->boolean('start_form')->nullable();
            $table->Text('signs_symptoms')->nullable();
            $table->Text('chronological_account')->nullable();
            //examen clinico
            $table->Text('clinical_examination')->nullable();
            //plan de trabajo
            $table->Text('work_plan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attentions', function (Blueprint $table) {
            //
        });
    }
};
