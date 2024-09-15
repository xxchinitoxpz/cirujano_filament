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
            width: 60px;
            /* Ajusta el tamaño de la firma según sea necesario */
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
                            <strong>Paciente:</strong> {{ $exam->attention->appointment->patient->name }}

                            <strong>DNI N°:</strong>
                            {{ $exam->attention->appointment->patient->DNI }}
                            <strong>Edad:</strong>
                            {{ \Carbon\Carbon::parse($exam->attention->appointment->patient->birthdate)->age }}
                            años

                        </p>
                        <!-- Exámenes de Laboratorio -->
                        <h5 class="section-title">EXÁMENES DE LABORATORIO</h5>
                        <div class="input-container">
                            <label class="small-label">Hemograma completo</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_hemograma_completo ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Perfil de coagulación completo</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_perfil_coagulacion_completo ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">TC</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_TC ? 'checked' : '' }}>
                            <label class="small-label" style="margin-left: 10px;">TS</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_TS ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Tiempo de protrombina</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_tiempo_protrombina ? 'checked' : '' }}>
                            <label class="small-label" style="margin-left: 10px;">Tiempo de tromboplastina
                                parcial</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_tiempo_tromboplastina_parcial ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Plaquetas</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_plaquetas ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Glucosa</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_glucosa ? 'checked' : '' }}>
                            <label class="small-label">Urea</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_urea ? 'checked' : '' }}>
                            <label class="small-label">Creatinina</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_creatinina ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Perfil hepatico completo</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_perfil_hepetico_completo ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">TGO</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_TGO ? 'checked' : '' }}>
                            <label class="small-label">TGP</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_TGP ? 'checked' : '' }}>
                            <label class="small-label">BT</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_BT ? 'checked' : '' }}>
                            <label class="small-label">BD</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_BD ? 'checked' : '' }}>
                            <label class="small-label">BI</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_BI ? 'checked' : '' }}>
                            <label class="small-label">Fosfata alcalina</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_fosfatasa_alcalina ? 'checked' : '' }}>
                            <label class="small-label">GGT</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_GGI ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Perfil luptico completo</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_perfil_updico_completo ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Colesterol total</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_coresterol_total ? 'checked' : '' }}>
                            <label class="small-label">Trigliceridos</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_trigliceridos ? 'checked' : '' }}>
                            <label class="small-label">HDL</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_HDL ? 'checked' : '' }}>
                            <label class="small-label">LDL</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_LDL ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Perfil tiroideo completo</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_perfil_tiroideo_completo ? 'checked' : '' }}>
                        </div>

                        <div class="input-container">
                            <label class="small-label">TSH</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_TSH ? 'checked' : '' }}>
                            <label class="small-label">T3</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_T3 ? 'checked' : '' }}>
                            <label class="small-label">T3 Total</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_T3_total ? 'checked' : '' }}>
                            <label class="small-label">T3 Libre</label>
                            <input type="checkbox" class="small-input" {{ $exam->EL_T3_libre ? 'checked' : '' }}>
                            <label class="small-label">Triyodotironina</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_triyodotironina ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Examen completo de orina</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->EL_examen_completo_orina ? 'checked' : '' }}>
                        </div>
                        <!--  -->

                        <!-- Riesgo Preoperatorio -->
                        <h5 class="section-title">RIESGO PRE OPERATORIO</h5>
                        <div class="input-container">
                            <label class="small-label">Hemograma completo</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->RPO_hemograma_completo ? 'checked' : '' }}>
                            <label class="small-label">TC, TS</label>
                            <input type="checkbox" class="small-input" {{ $exam->RPO_TC_TS ? 'checked' : '' }}>

                        </div>
                        <div class="input-container">
                            <label class="small-label">Glucosa</label>
                            <input type="checkbox" class="small-input" {{ $exam->RPO_glucosa ? 'checked' : '' }}>
                            <label class="small-label">Urea</label>
                            <input type="checkbox" class="small-input" {{ $exam->RPO_urea ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Creatinina</label>
                            <input type="checkbox" class="small-input" {{ $exam->RPO_creatinia ? 'checked' : '' }}>
                            <label class="small-label">Perfil hepatico</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->RPO_perfil_hepatico ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">HIV</label>
                            <input type="checkbox" class="small-input" {{ $exam->RPO_HIV ? 'checked' : '' }}>
                            <label class="small-label">VDRL</label>
                            <input type="checkbox" class="small-input" {{ $exam->RPO_VDRL ? 'checked' : '' }}>
                        </div>

                        <div class="input-container">
                            <label class="small-label">Marcadores hepatitis</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->RPO_marcadores_hepatitis ? 'checked' : '' }}>
                        </div>
                    </td>

                    <td style="background-color: blue">
                        <!-- Imágenes y Radiológicos -->
                        <h5 class="section-title">IMÁGENES: RADIOLÓGICOS</h5>
                        <div class="input-container">
                            <label class="small-label">Radiografía de Tórax Antero-post Postero-ant</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->R_radiografia_torax_antero_post_postero_ant ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Radiografía Tórax Lateral Derecha Izquierda</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->R_radiografia_torax_lateral_derecha_izquierda ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Radiografía Simple de Abdomen de Pie Decúbito</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->R_radiografia_simple_abdomen_pie_decubito ? 'checked' : '' }}>
                        </div>

                        <!-- Ultrasonidos -->
                        <h5 class="section-title">ULTRASONIDOS</h5>
                        <div class="input-container">
                            <label class="small-label">Ecografía Abdomen Superior</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->U_ecografia_abdomen_superior ? 'checked' : '' }}>
                            <label class="small-label" style="margin-left: 10px;">Inferior</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->U_ecografia_abdomen_inferior ? 'checked' : '' }}>
                        </div>
                        <div class="input-container">
                            <label class="small-label">Pared abdominal anterior</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->U_ecografia_partes_blandas_pared_abdominal_anterior ? 'checked' : '' }}>
                        </div>

                        <!-- Tomografía Axial Computarizada -->
                        <h5 class="section-title">TOMOGRAFÍA AXIAL COMPUTARIZADA</h5>
                        <div class="input-container">
                            <label class="small-label">Tomografía de Abdomen Superior S/C</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->TAC_abdomen_superior_SC ? 'checked' : '' }}>
                            <label class="small-label" style="margin-left: 10px;">C/C</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->TAC_abdomen_superior_CC ? 'checked' : '' }}>
                        </div>

                        <!-- Resonancias Nucleares Magnéticas -->
                        <h5 class="section-title">RESONANCIAS NUCLEARES MAGNÉTICAS</h5>
                        <div class="input-container">
                            <label class="small-label">Colangioresonancia</label>
                            <input type="checkbox" class="small-input"
                                {{ $exam->RNM_colangioresonancia ? 'checked' : '' }}>
                        </div>

                        <!-- Footer con Fecha y Firma del Médico -->
                        <div class="footer">
                            <span>Fecha: {{ date('d/m/Y') }}</span>
                            <div class="signature">
                                <img src="{{ public_path('storage/' . $exam->attention->doctor->stamp_image) }}">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
