<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    use HasFactory;

    protected $fillable = [
        'fr',
        'peso',
        'so2',
        'temp',
        'pa',
        'talla',
        'fc',
        'diagnosis',
        'state',
        'imc',
        'antecedent_medical',
        'antecedent_surgical',
        'antecedent_allergies',
        'antecedent_family',
        'sick_time',
        'sick_time2',
        'start_form',
        'signs_symptoms',
        'chronological_account',
        'clinical_examination',
        'work_plan',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patientExams()
    {
        return $this->hasMany(PatientExam::class, 'attention_id');
    }

    public function auxiliaryExams()
    {
        return $this->hasMany(AuxiliaryExam::class, 'attention_id');
    }

    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
}
