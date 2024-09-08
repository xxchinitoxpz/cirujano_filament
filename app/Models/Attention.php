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
        'antecedent',
        'symptoms',
        'inconvenience',
        'diagnosis',
        'treatment',
        'state',
        'doctor_id',
        'appointment_id',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
