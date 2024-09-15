<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Exámenes Auxiliares</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        .container {
            padding: 6px;
            box-sizing: border-box;
            height: 100vh;
        }
        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            page-break-inside: avoid;
        }
        td {
            width: 50%;
            padding: 10px;
            vertical-align: top;
        }
        .logo-container {
            text-align: center;
        }
        .logo {
            width: 120px;
            height: auto;
            display: inline-block;
        }
        .section-title {
            font-weight: bold;
            margin: 10px 0 5px;
            font-size: 12px;
            text-align: center;
        }
        .checkbox {
            display: inline-block;
            width: 10px;
            height: 10px;
            border: 1px solid #000;
            vertical-align: middle;
            margin-right: 5px;
        }
        .footer {
            margin-top: 120px;
        }
        .signature {
            display: inline-block;
            margin-left: 300px;
        }
        .signature img {
            width: 60px;
            height: auto;
        }
        .input-container {
            display: flex;
            align-items: center;
            gap: 0px;
            margin-bottom: 2px;
        }
        .small-label {
            font-size: 8px;
            margin: 0;
        }
        .small-input {
            transform: scale(0.7);
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tbody>
                <tr>
                    <td>
                        <!-- Logo y datos del paciente -->
                        <div class="logo-container">
                            <img src="{{ public_path('images/logo.jpg') }}" class="logo" alt="Logo">
                        </div>
                        <h6 style="text-align: center; margin: 0;">Centro de Cirugía Bariátrica y Metabólica</h6>
                        <h6 style="text-align: center; margin: 0;">Cirugía Laparoscópica de Avanzada</h6>
                        <hr style="border-top: 1px solid black;">

                        <p>
                            <strong>Paciente:</strong> Juan Pérez<br>
                            <strong>DNI N°:</strong> 12345678<br>
                            <strong>Edad:</strong> 35 años
                        </p>

                        <!-- Exámenes de Laboratorio -->
                        <h5 class="section-title">EXÁMENES DE LABORATORIO</h5>
                        <div class="input-container">
                            <label class="small-label">Hemograma completo</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Perfil de coagulación completo</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">TC</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label" style="margin-left: 10px;">TS</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Tiempo de protrombina</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label" style="margin-left: 10px;">Tiempo de tromboplastina parcial</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Plaquetas</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Glucosa</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label">Urea</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label">Creatinina</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Perfil hepatico completo</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>

                        <!-- Riesgo Preoperatorio -->
                        <h5 class="section-title">RIESGO PRE OPERATORIO</h5>
                        <div class="input-container">
                            <label class="small-label">Hemograma completo</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label">TC, TS</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Glucosa</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label">Urea</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                    </td>

                    <td style="background-color: blue">
                        <!-- Imágenes y Radiológicos -->
                        <h5 class="section-title">IMÁGENES: RADIOLÓGICOS</h5>
                        <div class="input-container">
                            <label class="small-label">Radiografía de Tórax Antero-post Postero-ant</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Radiografía Tórax Lateral Derecha Izquierda</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>

                        <!-- Ultrasonidos -->
                        <h5 class="section-title">ULTRASONIDOS</h5>
                        <div class="input-container">
                            <label class="small-label">Ecografía Abdomen Superior</label>
                            <input type="checkbox" class="small-input" checked>
                            <label class="small-label" style="margin-left: 10px;">Inferior</label>
                            <input type="checkbox" class="small-input" checked>
                        </div>

                        <!-- Footer con Fecha y Firma del Médico -->
                        <div class="footer">
                            <span>Fecha: 14/09/2024</span>
                            <div class="signature">
                                <img src="{{ public_path('images/signature.png') }}" alt="Firma">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
