<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Informe Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header-table,
        .info-table,
        .details-table,
        .cie-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .header-table td,
        .info-table td,
        .details-table td,
        .cie-table td {
            padding: 5px;
            vertical-align: top;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            font-size: 14px;
        }

        .logo {
            width: 120px;
        }

        .diagnosis-section {
            margin-top: 20px;
        }

        .signature {
            margin-top: 30px;
            text-align: center;
        }

        .signature img {
            max-width: 150px;
            height: auto;
        }

        p {
            word-wrap: break-word;
            white-space: pre-wrap;
        }
    </style>
</head>

<body>

    <!-- Logo y Fecha de Informe -->
    <table class="header-table">
        <tr>
            <td style="width: 50%;">
                <img src="{{ public_path('images/logo.jpg') }}" alt="Logo" class="logo">
            </td>
            <td style="width: 50%; text-align: right;">
                <strong>Fecha de informe:</strong> {{ \Carbon\Carbon::parse($report->created_at)->format('d/m/Y') }}
            </td>
        </tr>
    </table>

    <!-- Nombres y N° HC -->
    <table class="info-table">
        <tr>
            <td><strong>Nombres y Apellidos:</strong> {{ $report->patient }}</td>
            <td style="text-align: right;"><strong>HC. N°:</strong> {{ $report->hc_nr }}</td>
        </tr>
    </table>

    <!-- DNI, Edad y Sexo -->
    <table class="info-table">
        <tr>
            <td style="text-align: left;"><strong>Documento de identidad:</strong> {{ $report->dni }}</td>
            <td style="text-align: left;"><strong>Edad:</strong> {{ $report->edad }}</td>
            <td style="text-align: right;">
                <strong>Sexo:</strong>
                {{ $report->sexo === 'm' ? 'Masculino' : ($report->sexo === 'f' ? 'Femenino' : 'Otro') }}
            </td>
        </tr>
    </table>

    <!-- Modalidad de Atención -->
    <table class="info-table">
        <tr>
            <td><strong>Modalidad de atención:</strong> {{ $report->modalidad_atencion }}</td>
        </tr>
    </table>

    <!-- Fecha y Hora de Ingreso, Fecha y Hora de Egreso -->
    <table class="details-table">
        <tr>
            <td style="text-align: left;"><strong>Fecha y Hora de ingreso:</strong>
                {{ \Carbon\Carbon::parse($report->fecha_hora_ingreso)->format('d/m/Y H:i') }}</td>
            <td style="text-align: right;"><strong>Fecha y Hora de egreso:</strong>
                {{ \Carbon\Carbon::parse($report->fecha_hora_egreso)->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

    <!-- Resumen HC -->
    <div class="summary-section">
        <h2 class="section-title">Resumen HC:</h2>
        <p>{{ $report->resumen_hc }}</p>
    </div>

    <!-- Diagnóstico CIE 10 -->
    <div class="diagnosis-section">
        <h2 class="section-title">Diagnóstico CIE 10:</h2>
        <table class="cie-table" border="1">
            <tr>
                <td><strong>Diagnóstico</strong></td>
                <td><strong>CIE</strong></td>
            </tr>
            <tr>
                <td>{{ $report->diagnostico_1 }}</td>
                <td>{{ $report->cie10_1 }}</td>
            </tr>
            <tr>
                <td>{{ $report->diagnostico_2 }}</td>
                <td>{{ $report->cie10_2 }}</td>
            </tr>
            <tr>
                <td>{{ $report->diagnostico_3 }}</td>
                <td>{{ $report->cie10_3 }}</td>
            </tr>
            <tr>
                <td>{{ $report->diagnostico_4 }}</td>
                <td>{{ $report->cie10_4 }}</td>
            </tr>
            <!-- Repite para los otros diagnósticos -->
        </table>
    </div>

    <!-- Tratamiento -->
    <div class="treatment-section">
        <h2 class="section-title">Tratamiento: {{ $report->tratamiento }}</h2>
        <p>{{ $report->tratamiento_desc }}</p>
    </div>

    <!-- Evolución -->
    <div class="evolution-section">
        <h2 class="section-title">Evolución: {{ $report->evolucion }}</h2>
        <p>{{ $report->evolucion_desc }}</p>
    </div>

    <!-- Fecha de alta -->
    <div class="discharge-section">
        <h2 class="section-title">Fecha de alta:
            {{ \Carbon\Carbon::parse($report->fecha_hora_alta)->format('d/m/Y H:i') }}</h2>
    </div>

    <!-- Observaciones -->
    <div class="observations-section">
        <h2 class="section-title">Observaciones:</h2>
        <p>{{ $report->observaciones }}</p>
    </div>
    <!-- Firma del doctor -->
    <div class="signature">
        <table class="details-table">
            <tr>
                <td style="text-align: right;"><img src="{{ public_path('storage/' . $report->doctor->stamp_image) }}">
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
