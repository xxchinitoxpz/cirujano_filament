<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportPdfController extends Controller
{
    public function generatePdfReport($id)
    {
        // Obtener el reporte por su ID
        $report = Report::findOrFail($id);

        // Cargar la vista y generar el PDF
        $pdf = Pdf::loadView('report_pdf', compact('report'))->setPaper('a4', 'portrait');

        // Retornar el PDF para ser descargado o mostrado en el navegador
        return $pdf->stream('informe_medico.pdf');
    }
}
