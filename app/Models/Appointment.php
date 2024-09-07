<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'hour',
        'state',
        'patient_id',
        'type_attention_id',
    ];

    public function typeAttention()
    {
        return $this->belongsTo(TypeAttention::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
