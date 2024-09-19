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
            font-size: 8px; /* Reducir el tamaño de la fuente para la info del paciente */
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
            font-size: 10px; /* Aumentar el tamaño de la fuente en las tablas */
        }
        .medicines-table th:nth-child(3), .medicines-table td:nth-child(3) {
            border: none; /* Eliminar bordes de la columna vacía */
            text-align: center;
            width: 5%; /* Ajustar el ancho de la columna vacía */
        }
        .medicines-table th {
            border: 1px solid #000;
        }
        .medicines-table th:nth-child(3) {
            border: none; /* Eliminar borde superior de la cabecera de la columna vacía */
        }
        .medicines-table td {
            border: 1px solid #000;
        }
        .left-table {
            text-align: left;
        }
        .right-table {
            text-align: right;
        }
        .medicines-table th:nth-child(1), .medicines-table td:nth-child(1) {
            width: 25%; /* Aumentar el ancho de la columna de Medicamento */
        }
        .medicines-table th:nth-child(2), .medicines-table td:nth-child(2) {
            width: 10%; /* Ajustar el ancho de la columna de Cantidad */
        }
        .medicines-table th:nth-child(4), .medicines-table td:nth-child(4) {
            width: 25%; /* Reducir el ancho de la columna de Dosis */
        }
        .medicines-table th:nth-child(5), .medicines-table td:nth-child(5) {
            width: 10%; /* Ajustar el ancho de la columna de Periodo */
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .footer div {
            display: flex;
            align-items: center;
        }
        .footer img {
            width: 60px;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Tabla principal de 2x2 -->
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
                <div class="info">
                    <p><strong>Paciente:</strong> MANRIQUE CORREA, MARLENE LIDia, <strong>Edad:</strong> 50 años, <strong>DNI:</strong> 09942432</p>
                </div>
            </td>
            <td>
                <h4 class="section-title">INDICACIONES</h4>
                <p><strong>Dieta:</strong> Blanda hipograsa + líquidos a voluntad</p>
            </td>
        </tr>
    </table>

    <!-- Tabla de medicamentos 4x4 -->
    <table class="medicines-table">
        <thead>
            <tr>
                <th class="left-table">MEDICAMENTO</th>
                <th class="left-table">CANTIDAD</th>
                <th class="empty-row"></th> <!-- Cabecera vacía sin borde -->
                <th class="right-table">DOSIS</th>
                <th class="right-table">PERIODO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="left-table">BISMUTO SUBSALICILATO 87.33 - 87.50 mg / 5mL. Suspensión Oral x 240 a 340 mL</td>
                <td class="left-table">02 frascos</td>
                <td class="empty-row"></td>
                <td class="right-table">1 CHDA V.O CADA 6 HORAS</td>
                <td class="right-table">07 días</td>
            </tr>
            <tr>
                <td class="left-table">OMEPRAZOL 20 mg (Liberación retardada)</td>
                <td class="left-table">07 Tab</td>
                <td class="empty-row"></td>
                <td class="right-table">1 TAB C/12 HORAS</td>
                <td class="right-table">05 días</td>
            </tr>
            <!-- Agregar más filas según sea necesario -->
        </tbody>
    </table>

    <!-- Pie de página -->
    <footer class="footer">
        <div>
            <strong>Fecha: </strong>03/09/2024
        </div>
        <div>
            <img src="{{ public_path('stamps/doctor_signature.jpg') }}" alt="Firma del Doctor">
        </div>
    </footer>
</body>
</html>
