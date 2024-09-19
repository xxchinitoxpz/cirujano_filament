<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'dieta',
        'attention_id',
    ];
    public function attention()
    {
        return $this->belongsTo(Attention::class);
    }
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_recipes', 'medicine_id', 'recipe_id')
            ->withPivot('cantidad', 'dosis', 'periodo')
            ->withTimestamps();
    }
    public function medicineRecipe()
    {
        return $this->hasMany(MedicineRecipe::class);
    }
}
