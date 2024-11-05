<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'DNI',
        'name',
        'phone',
        'birthdate',
        'direccion',
        'distrito',
        'provincia',
        'estado_civil',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
