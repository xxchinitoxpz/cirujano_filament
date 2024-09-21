<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'hc_nr',
        'dni',
        'edad',
        'sexo',
        'modalidad_atencion',
        'fecha_hora_ingreso',
        'fecha_hora_egreso',
        'resumen_hc',
        'diagnostico_1',
        'cie10_1',
        'diagnostico_2',
        'cie10_2',
        'diagnostico_3',
        'cie10_3',
        'diagnostico_4',
        'cie10_4',
        'tratamiento',
        'tratamiento_desc',
        'evolucion',
        'evolucion_desc',
        'fecha_hora_alta',
        'observaciones',
        'doctor_id'
    ];

    // Define the relationship with Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
