<!-- resources/views/auxiliary_exam_pdf.blade.php -->
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
            /* Altura total de la vista */
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

        .checkbox.checked {
            background-color: #000;
        }

        .footer {
            margin-top: 120px;
        }

        .signature {
            display: inline-block;
            margin-left: 300px;
        }

        .signature img {
            width: 60px; /* Ajusta el tamaño de la firma según sea necesario */
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tbody>
                <tr>
                    <td style="background-color: red">
                        <!-- Logo y datos del paciente -->
                        <div class="logo-container">
                            <img src="{{ public_path('images/logo.jpg') }}" class="logo" alt="Logo">
                        </div>
                        <h6 style="text-align: center; margin: 0;">Centro de Cirugía Bariátrica y Metabólica</h6>
                        <h6 style="text-align: center; margin: 0;">Cirugía Laparoscópica de Avanzada</h6>
                        <hr style="border-top: 1px solid black;">

                        <p><strong>Paciente:</strong> {{ $exam->attention->appointment->patient->name }} <span
                                style="float: right;"><strong>DNI N°:</strong>
                                {{ $exam->attention->appointment->patient->DNI }}</span></p>
                        <p><strong>Edad:</strong> {{ \Carbon\Carbon::parse($exam->attention->appointment->patient->birthdate)->age }}
                            años</p>
                        <p><strong>Día Diagnóstico:</strong></p>
                        <p>Rp/:</p>

                        <!-- Exámenes de Laboratorio -->
                        <h5 class="section-title">EXÁMENES DE LABORATORIO</h5>
                        <div>
                            <label>Hemograma completo</label>
                            <input type="checkbox" {{ $exam->EL_hemograma_completo ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>Perfil de coagulación completo</label>
                            <input type="checkbox" {{ $exam->EL_perfil_coagulacion_completo ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>TC</label>
                            <input type="checkbox" {{ $exam->EL_TC ? 'checked' : '' }}>
                            <label style="margin-left: 10px;">TS</label>
                            <input type="checkbox" {{ $exam->EL_TS ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>Tiempo de protrombina</label>
                            <input type="checkbox" {{ $exam->EL_tiempo_protrombina ? 'checked' : '' }}>
                            <label style="margin-left: 10px;">Tiempo de tromboplastina parcial</label>
                            <input type="checkbox" {{ $exam->EL_tiempo_tromboplastina_parcial ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>Plaquetas</label>
                            <input type="checkbox" {{ $exam->EL_plaquetas ? 'checked' : '' }}>
                        </div>
                        <!-- Agregar más exámenes de laboratorio según corresponda -->

                        <!-- Riesgo Preoperatorio -->
                        <h5 class="section-title">RIESGO PRE OPERATORIO</h5>
                        <div>
                            <label>Hemograma completo</label>
                            <input type="checkbox" {{ $exam->RPO_hemograma_completo ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>TC, TS</label>
                            <input type="checkbox" {{ $exam->RPO_TC_TS ? 'checked' : '' }}>
                        </div>
                    </td>

                    <td style="background-color: blue">
                        <!-- Imágenes y Radiológicos -->
                        <h5 class="section-title">IMÁGENES: RADIOLÓGICOS</h5>
                        <div>
                            <label>Radiografía de Tórax Antero-post Postero-ant</label>
                            <input type="checkbox" {{ $exam->R_radiografia_torax_antero_post_postero_ant ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>Radiografía Tórax Lateral Derecha Izquierda</label>
                            <input type="checkbox" {{ $exam->R_radiografia_torax_lateral_derecha_izquierda ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>Radiografía Simple de Abdomen de Pie Decúbito</label>
                            <input type="checkbox" {{ $exam->R_radiografia_simple_abdomen_pie_decubito ? 'checked' : '' }}>
                        </div>

                        <!-- Ultrasonidos -->
                        <h5 class="section-title">ULTRASONIDOS</h5>
                        <div>
                            <label>Ecografía Abdomen Superior</label>
                            <input type="checkbox" {{ $exam->U_ecografia_abdomen_superior ? 'checked' : '' }}>
                            <label style="margin-left: 10px;">Inferior</label>
                            <input type="checkbox" {{ $exam->U_ecografia_abdomen_inferior ? 'checked' : '' }}>
                        </div>
                        <div>
                            <label>Pared abdominal anterior</label>
                            <input type="checkbox" {{ $exam->U_ecografia_partes_blandas_pared_abdominal_anterior ? 'checked' : '' }}>
                        </div>

                        <!-- Tomografía Axial Computarizada -->
                        <h5 class="section-title">TOMOGRAFÍA AXIAL COMPUTARIZADA</h5>
                        <div>
                            <label>Tomografía de Abdomen Superior S/C</label>
                            <input type="checkbox" {{ $exam->TAC_abdomen_superior_SC ? 'checked' : '' }}>
                            <label style="margin-left: 10px;">C/C</label>
                            <input type="checkbox" {{ $exam->TAC_abdomen_superior_CC ? 'checked' : '' }}>
                        </div>

                        <!-- Resonancias Nucleares Magnéticas -->
                        <h5 class="section-title">RESONANCIAS NUCLEARES MAGNÉTICAS</h5>
                        <div>
                            <label>Colangioresonancia</label>
                            <input type="checkbox" {{ $exam->RNM_colangioresonancia ? 'checked' : '' }}>
                        </div>

                        <!-- Footer con Fecha y Firma del Médico -->
                        <div class="footer">
                            <span>Fecha: {{ date('d/m/Y') }}</span>
                            <div class="signature">
                                <img src="{{ public_path('storage/' . $exam->attention->doctor->stamp_image) }}" alt="Firma del Doctor">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
