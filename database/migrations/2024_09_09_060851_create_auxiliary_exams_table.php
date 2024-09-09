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
        Schema::create('auxiliary_exams', function (Blueprint $table) {
            $table->id();
            // Exámenes de laboratorio (EL)
            $table->boolean('EL_hemograma_completo');
            $table->boolean('EL_perfil_coagulacion_completo');
            $table->boolean('EL_TC');
            $table->boolean('EL_TS');
            $table->boolean('EL_tiempo_protrombina');
            $table->boolean('EL_tiempo_tromboplastina_parcial');
            $table->boolean('EL_plaquetas');
            $table->boolean('EL_glucosa');
            $table->boolean('EL_urea');
            $table->boolean('EL_creatinina');
            $table->boolean('EL_perfil_hepetico_completo');
            $table->boolean('EL_TGO');
            $table->boolean('EL_TGP');
            $table->boolean('EL_BT');
            $table->boolean('EL_BD');
            $table->boolean('EL_BI');
            $table->boolean('EL_fosfatasa_alcalina');
            $table->boolean('EL_GGI');
            $table->boolean('EL_perfil_updico_completo');
            $table->boolean('EL_coresterol_total');
            $table->boolean('EL_trigliceridos');
            $table->boolean('EL_HDL');
            $table->boolean('EL_LDL');

            // Exámenes radiológicos (RPO, R)
            $table->boolean('RPO_hemograma_completo');
            $table->boolean('RPO_TC_TS');
            $table->boolean('RPO_glucosa');
            $table->boolean('RPO_urea');
            $table->boolean('RPO_creatinia');
            $table->boolean('RPO_perfil_hepatico');
            $table->boolean('RPO_HIV');
            $table->boolean('RPO_VDRL');
            $table->boolean('RPO_marcadores_hepatitis');

            $table->boolean('R_radiografia_torax_antero_post_postero_ant');
            $table->boolean('R_radiografia_torax_lateral_derecha_izquierda');
            $table->boolean('R_radiografia_simple_abdomen_pie_decubito');
            $table->boolean('R_radiografia_contraste_abdomen');
            $table->boolean('R_radiografia_doble_contraste_abdomen');
            $table->string('R_otras', 255);

            // Exámenes de ultrasonido (U)
            $table->boolean('U_ecografia_abdomen_superior');
            $table->boolean('U_ecografia_abdomen_inferior');
            $table->boolean('U_ecografia_partes_blandas_pared_abdominal_anterior');
            $table->boolean('U_ecografia_partes_blandas_especificar');
            $table->boolean('U_region_inguinal_derecha');
            $table->boolean('U_region_inguinal_izquierda');
            $table->boolean('U_otras');
            $table->boolean('U_ecofast');

            // Tomografías (TAC)
            $table->boolean('TAC_abdomen_superior_SC');
            $table->boolean('TAC_abdomen_superior_CC');
            $table->boolean('TAC_toraco_abdominal_SC');
            $table->boolean('TAC_toraco_abdominal_CC');
            $table->boolean('TAC_otras');

            // Resonancia magnética (RNM)
            $table->boolean('RNM_colangioresonancia');
            $table->boolean('RNM_otras');
            $table->boolean('RNM_riesgo_cardiologico');
            $table->boolean('RNM_riesgo_neumologico');

            // Relación con la tabla attentions
            $table->unsignedBigInteger('attention_id');
            $table->foreign('attention_id')->references('id')->on('attentions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auxiliary_exams');
    }
};
