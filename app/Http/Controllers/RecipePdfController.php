<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RecipePdfController extends Controller
{
    public function generatePdf()
    {
        // Cargar la vista y generar el PDF en formato horizontal
        $pdf = Pdf::loadView('recipe_pdf')->setPaper('a4', 'landscape');

        // Mostrar el PDF en el navegador
        return $pdf->stream('receta_medica.pdf');
    }
}
