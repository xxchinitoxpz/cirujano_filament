<?php

namespace App\Http\Controllers;

use App\Models\AuxiliaryExam;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AuxiliaryExamController extends Controller
{
    public function generatePdf($id)
    {
        // Obtener el examen auxiliar por su ID
        $exam = AuxiliaryExam::with('attention.appointment.patient', 'attention.doctor')->findOrFail($id);

        // Generar el PDF usando la vista y ajustarlo a horizontal
        $pdf = Pdf::loadView('auxiliary_exam_pdf', compact('exam'))
                  ->setPaper('a4', 'landscape'); // Formato horizontal

        // Descargar el PDF
        return $pdf->download('auxiliary_exam_' . $exam->id . '.pdf');
    }
}
