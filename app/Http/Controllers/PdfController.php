<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Asegúrate de importar la clase Pdf

use App\Models\Attention;

class PdfController extends Controller
{
    //
    public function generateAttentionPdf($id)
    {
        $attention = Attention::with('appointment.patient')->findOrFail($id);

        // Renderiza la vista 'attention_pdf' con los datos necesarios
        $pdf = Pdf::loadView('attention_pdf', compact('attention'))
            ->setPaper('a4', 'portrait'); // Opcional: configura el tamaño y la orientación del papel

        // Devuelve el PDF para descargar
        return $pdf->download('historia_clinica_' . $attention->id . '.pdf');
    }

    public function showPdf()
    {
        // Datos para el PDF, podrías modificar esto dinámicamente
        $data = ['title' => 'Mi PDF en tiempo real'];

        // Generar PDF usando DomPDF
        $pdf = PDF::loadView('pdf-view', $data);

        // Mostrar PDF en el navegador sin descargarlo
        return $pdf->stream('document.pdf');
    }
}
