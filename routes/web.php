<?php

use App\Http\Controllers\AuxiliaryExamController;
use App\Http\Controllers\ExamPdfController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RecipePdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attention/{id}/pdf', [PdfController::class, 'generateAttentionPdf'])->name('attention.pdf');

Route::get('/auxiliary-exams/{id}/pdf', [AuxiliaryExamController::class, 'generatePdf'])->name('auxiliary.exam.pdf');
Route::get('/receta/pdf', [RecipePdfController::class, 'generatePdf'])->name('receta.pdf');

Route::get('/exam/pdf/{id}', [ExamPdfController::class, 'showPdf'])->name('exam.pdf');
