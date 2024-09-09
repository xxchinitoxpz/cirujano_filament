<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'attention_id',
    ];

    // Relación con el modelo Attention
    public function attention()
    {
        return $this->belongsTo(Attention::class, 'attention_id');
    }
    
}
