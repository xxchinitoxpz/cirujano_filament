<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Historial Clínico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .logo {
            width: 120px;
            /* Ajusta el tamaño del logo según lo necesites */
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            font-size: 14px;
            /* Tamaño más pequeño */
        }

        .patient-info,
        .vital-signs,
        .treatment-info {
            margin-bottom: 10px;
        }

        .vitals-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .vitals-table td {
            text-align: center;
            padding: 5px;
        }

        .details-table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        .details-table td {
            padding: 5px;
            vertical-align: top;
        }

        .signature {
            margin-top: 30px;
            text-align: center;
        }

        .signature img {
            max-width: 150px;
            /* Ajusta el tamaño de la firma */
            height: auto;
        }

        .signature p {
            margin: 5px 0 0;
        }

        /* Nuevo estilo para el manejo de textos largos */
        p {
            word-wrap: break-word;
            /* Rompe las palabras largas */
            white-space: pre-wrap;
            /* Mantiene los saltos de línea y espacios */
        }
    </style>
</head>

<body>
    <!-- Cabecera con tabla -->
    <table class="header-table">
        <tr>
            <td style="width: 20%;">
                <img src="{{ public_path('images/logo.jpg') }}" alt="Logo" class="logo">
            </td>
            <td style="width: 60%;">
                <h1 class="title">Historia Clínica</h1>
            </td>
            <td style="width: 20%;">
                <!-- Celda vacía para espaciar -->
            </td>
        </tr>
    </table>

    <!-- Detalles de la fecha de atención y número de historia -->
    <table class="details-table">
        <tr>
            <td style="text-align: left;">
                <strong>Fecha de atención:</strong> {{ $attention->appointment->date }}
            </td>
            <td style="text-align: right;">
                <strong>N° de historia:</strong> {{ $attention->id }}
            </td>
        </tr>
    </table>

    <div class="vital-signs">
        <h2 class="section-title">1. Información general del paciente</h2>
        <h2 class="section-title">Signos vitales</h2>
        <table class="vitals-table">
            <tr>
                <td><strong>Fr:</strong> {{ $attention->fr }}</td>
                <td><strong>Peso:</strong> {{ $attention->peso }} Kg</td>
                <td><strong>So2:</strong> {{ $attention->so2 }}</td>
                <td><strong>Temperatura:</strong> {{ $attention->temp }}°</td>
                <td><strong>Pa:</strong> {{ $attention->pa }}</td>
                <td><strong>Fc:</strong> {{ $attention->fc }}</td>
                <td><strong>Talla:</strong> {{ $attention->talla }} m</td>
            </tr>
        </table>
    </div>

    <div class="patient-info">
        <p><strong>Apellidos y Nombres:</strong> {{ $attention->appointment->patient->name }}</p>
        <p><strong>DNI:</strong> {{ $attention->appointment->patient->DNI }}</p>
        <p><strong>Fecha de nacimiento:</strong>{{ \Carbon\Carbon::parse($attention->appointment->patient->birthdate)->format('d/m/Y') }}</p>
        <p><strong>Edad: </strong>{{ intval(\Carbon\Carbon::parse($attention->appointment->patient->birthdate)->diffInYears(\Carbon\Carbon::parse($attention->created_at))) }} años</p>
        <p><strong>Teléfono móvil:</strong> {{ $attention->appointment->patient->phone }}</p>
    </div>

    <div class="treatment-info">
        <h2 class="section-title">2. Antecedentes</h2>
        <p>{{ $attention->antecedent }}</p>

        <h2 class="section-title">3. Signos y Síntomas</h2>
        <p>{{ $attention->symptoms }}</p>

        <h2 class="section-title">4. Diagnóstico</h2>
        <p>{{ $attention->diagnosis }}</p>

        <h2 class="section-title">5. Tratamiento</h2>
        <p>{{ $attention->treatment }}</p>
    </div>

    <!-- Firma del doctor -->
    <div class="signature">
        <img src="{{ public_path('storage/' . $attention->doctor->stamp_image) }}">
    </div>
</body>

</html>



