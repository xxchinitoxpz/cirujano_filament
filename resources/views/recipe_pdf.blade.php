<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Receta Médica</title>
    <style>
        .logo {
            width: 180px;
            margin-bottom: 5px;
        }

        .header {
            text-align: center;
        }

        .info {
            padding: 4px;
            font-size: 8px;
        }

        .section-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 3px;
            text-decoration: underline;
        }

        .main-table, .medicines-table {
            width: 100%;
            border-collapse: collapse;
        }

        .medicines-table th, .medicines-table td {
            padding: 5px;
            font-size: 10px;
        }

        .medicines-table th:nth-child(3), .medicines-table td:nth-child(3) {
            border: none;
            text-align: center;
            width: 5%;
        }

        .medicines-table th, .medicines-table td {
            border: 1px solid #000;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .footer img {
            width: 60px;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Tabla principal de información del paciente y dieta -->
    <table class="main-table">
        <tr>
            <td class="header">
                <img src="{{ public_path('images/logo.jpg') }}" alt="Logo" class="logo">
                <p>Centro de Cirugía Bariátrica y Metabólica<br>Cirugía Laparoscópica de Avanzada</p>
            </td>
            <td class="header">
                <img src="{{ public_path('images/logo.jpg') }}" alt="Logo" class="logo">
                <p>Centro de Cirugía Bariátrica y Metabólica<br>Cirugía Laparoscópica de Avanzada</p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>Paciente:</strong> {{ $recipe->attention->appointment->patient->name }} <strong>DNI:</strong> {{ $recipe->attention->appointment->patient->DNI }}</p>
                <p><strong>Edad:</strong>  {{ floor(\Carbon\Carbon::parse($recipe->attention->appointment->patient->birthdate)->diffInYears(\Carbon\Carbon::parse($recipe->created_at))) }} años</p>

               

            </td>
            <td>
                <h4 class="section-title">INDICACIONES</h4>
                <p style="margin-left: 70px"><strong>Dieta:</strong> {{ $recipe->dieta ?? 'No especificada' }}</p>
            </td>
        </tr>
    </table>

    <!-- Tabla de medicamentos -->
    <table class="medicines-table">
        <thead>
            <tr>
                <th>MEDICAMENTO</th>
                <th>CANTIDAD</th>
                <th></th>
                <th>DOSIS</th>
                <th>PERIODO</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recipe->medicineRecipe as $medicine)
                <tr>
                    <td>{{ $medicine->medicine->medicine }}</td>
                    <td>{{ $medicine->cantidad }}</td>
                    <td></td>
                    <td>{{ $medicine->dosis }}</td>
                    <td>{{ $medicine->periodo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pie de página con la fecha y firma del médico -->
    <div style="margin-top: 25px">
        <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($recipe->created_at)->format('d/m/Y') }}
        <img style="margin-left: 200px; width: 15%" src="{{ public_path('storage/' . $recipe->attention->doctor->stamp_image) }}">
    </div>
</body>
</html>
