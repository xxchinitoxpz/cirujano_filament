<?php

namespace App\Http\Controllers;

use App\Models\AuxiliaryExam;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamPdfController extends Controller
{
    public function showPdf($id)
    {
        $exam = AuxiliaryExam::with('attention.appointment.patient', 'attention.doctor')->findOrFail($id);

        // Genera el PDF a partir de la vista
        $pdf = Pdf::loadView('pdf_view', compact('exam'))->setPaper('a4', 'landscape');

        // Muestra el PDF en el navegador sin descargarlo
        return $pdf->stream('examen_auxiliar.pdf');
    }
}
