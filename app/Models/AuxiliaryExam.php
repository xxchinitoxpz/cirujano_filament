<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxiliaryExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'EL_hemograma_completo',
        'EL_perfil_coagulacion_completo',
        'EL_TC',
        'EL_TS',
        'EL_tiempo_protrombina',
        'EL_tiempo_tromboplastina_parcial',
        'EL_plaquetas',
        'EL_glucosa',
        'EL_urea',
        'EL_creatinina',
        'EL_perfil_hepetico_completo',
        'EL_TGO',
        'EL_TGP',
        'EL_BT',
        'EL_BD',
        'EL_BI',
        'EL_fosfatasa_alcalina',
        'EL_GGI',
        'EL_perfil_updico_completo',
        'EL_coresterol_total',
        'EL_trigliceridos',
        'EL_HDL',
        'EL_LDL',
        'EL_perfil_tiroideo_completo',
        'EL_TSH',
        'EL_T3',
        'EL_T3_total',
        'EL_T3_libre',
        'EL_triyodotironina',
        'EL_examen_completo_orina',

        'RPO_hemograma_completo',
        'RPO_TC_TS',
        'RPO_glucosa',
        'RPO_urea',
        'RPO_creatinia',
        'RPO_perfil_hepatico',
        'RPO_HIV',
        'RPO_VDRL',
        'RPO_marcadores_hepatitis',

        'R_radiografia_torax_antero_post_postero_ant',
        'R_radiografia_torax_lateral_derecha_izquierda',
        'R_radiografia_simple_abdomen_pie_decubito',
        'R_radiografia_contraste_abdomen',
        'R_radiografia_doble_contraste_abdomen',
        'R_otras',
        
        'U_ecografia_abdomen_superior',
        'U_ecografia_abdomen_inferior',
        'U_ecografia_partes_blandas_pared_abdominal_anterior',
        'U_ecografia_partes_blandas_especificar',
        'U_region_inguinal_derecha',
        'U_region_inguinal_izquierda',
        'U_otras',
        'U_ecofast',
        
        'TAC_abdomen_superior_SC',
        'TAC_abdomen_superior_CC',
        'TAC_toraco_abdominal_SC',
        'TAC_toraco_abdominal_CC',
        'TAC_otras',
        
        'RNM_colangioresonancia',
        'RNM_otras',
        'RNM_riesgo_cardiologico',
        'RNM_riesgo_neumologico',
        'attention_id',
    ];

    // Relación con la tabla Attention
    public function attention()
    {
        return $this->belongsTo(Attention::class);
    }
}
