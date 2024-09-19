<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Barryvdh\DomPDF\Facade\Pdf;

class RecipeController extends Controller
{
    public function generatePdf($id)
    {
        // Obtener la receta y los datos relacionados por su ID
        $recipe = Recipe::with('attention', 'medicineRecipe.medicine')->findOrFail($id);

        // Generar el PDF usando la vista y ajustarlo a vertical u horizontal si lo prefieres
        $pdf = Pdf::loadView('recipe_pdf', compact('recipe'))
                  ->setPaper('a4', 'landscape'); // Formato vertical

        // Descargar el PDF
        return $pdf->download('recipe_' . $recipe->id . '.pdf');
    }
}
