<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine',
        'description',
        'presentation',
    ];
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'medicine_recipes', 'medicine_id', 'recipe_id')
                    ->withPivot('cantidad', 'dosis', 'periodo')
                    ->withTimestamps();
    } 

    public function medicineRecipe()
    {
        return $this->hasMany(MedicineRecipe::class);
    }
}
