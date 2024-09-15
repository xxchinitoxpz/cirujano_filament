<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamPdfController extends Controller
{
    public function showPdf()
    {
        // Genera el PDF a partir de la vista
        $pdf = Pdf::loadView('pdf_view');

        // Muestra el PDF en el navegador sin descargarlo
        return $pdf->stream('examen_auxiliar.pdf');
    }
}
