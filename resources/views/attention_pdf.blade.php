<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Historial Clínico</title>
    <style>
        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: inline-block;
            vertical-align: top;
        }

        .span {
            border: 1px solid #000;
            border-radius: 5px;
            padding: 2px 5px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <img style="width: 25%; margin-bottom: 1%" src="{{ public_path('images/logo.jpg') }}" alt="Logo" class="logo">
    <h3 style="text-align: center; margin-top: 0%">HISTORIA CLINICA</h3>

    <table style="width: 100%">
        <tr>
            <td style="text-align: left;">
                Fecha de atención {{ $attention->appointment->date }}
            </td>
            <td style="text-align: right;">
                N° de historia {{ $attention->id }}
            </td>
        </tr>
    </table>
    <h4 style="margin-bottom: 1%"><strong>I. DATOS DE FILIACIÓN</strong></h4>
    <h4 style="margin-top: 0%"><strong>1. INFORMACION GENERAL</strong></h4>

    <div class="form-group">
        <label>APELLIDOS Y NOMBRES: <span style="width: 380px"
                class="span">{{ $attention->appointment->patient->name }}</span></label>
        <label>EDAD: <span
                class="span">{{ intval(\Carbon\Carbon::parse($attention->appointment->patient->birthdate)->diffInYears(\Carbon\Carbon::parse($attention->created_at))) }}</span>
            años</label>
    </div>

    <div class="form-group">
        <label style="margin-right: 99px">FECHA DE NACIMIENTO:
            <span
                class="span">{{ \Carbon\Carbon::parse($attention->appointment->patient->birthdate)->format('d/m/Y') }}</span></label>
        <label style="margin-right: 98px">E.C:
            <span class="span"
                style="background-color: {{ $attention->appointment->patient->estado_civil == 'Soltero' ? 'yellow' : 'transparent' }}">S</span>
            <span class="span"
                style="background-color: {{ $attention->appointment->patient->estado_civil == 'Casado' ? 'yellow' : 'transparent' }}">C</span>
            <span class="span"
                style="background-color: {{ $attention->appointment->patient->estado_civil == 'Divorciado' ? 'yellow' : 'transparent' }}">D</span>
        </label>

        <label>DNI: <span class="span">{{ $attention->appointment->patient->DNI }}</span></label>
    </div>

    <div class="form-group">
        <label>DIRECCION: <span style="width: 595px"
                class="span">{{ $attention->appointment->patient->direccion }}</span></label>
    </div>

    <div class="form-group">
        <label>DISTRITO: <span style="margin-right: 13px;width: 150px"
                class="span">{{ $attention->appointment->patient->distrito }}</span></label>
        <label>PROVINCIA: <span style="margin-right: 13px;;width: 150px"
                class="span">{{ $attention->appointment->patient->provincia }}</span></label>
        <label>CELULAR: <span class="span">{{ $attention->appointment->patient->phone }}</span></label>
    </div>

    <h4 style="margin-bottom: 1%"><strong>II. ANTECEDENTES</strong></h4>
    <h4 style="margin-top: 0%"><strong>PERSONALES</strong></h4>

    <div class="form-group">
        <label style="margin-bottom: 5px">MÉDICOS: <span style="width: 610px"
                class="span">{{ $attention->antecedent_medical }}</span></label>
        <label style="margin-bottom: 5px; margin-top: 5px">QUIRÚRGICOS: <span style="width: 573px"
                class="span">{{ $attention->antecedent_surgical }}</span></label>
        <label style="margin-bottom: 5px; margin-top: 5px">ALERGIAS: <span style="width: 603px"
                class="span">{{ $attention->antecedent_allergies }}</span></label>
        <label style="margin-top: 5px;">FAMILIARES: <span style="width: 586px"
                class="span">{{ $attention->antecedent_family }}</span></label>
    </div>

    <h4 style="margin-bottom: 3%"><strong>III. ENFERMEDAD ACTUAL</strong></h4>

    <div class="form-group">
        <label>TIEMPO DE ENFERMEDAD:
            <span class="span">{{ $attention->sick_time }}</span>
            <span class="span"
                style="background-color: {{ $attention->sick_time2 == 'Dia' ? 'yellow' : 'transparent' }}">D</span>
            <span class="span"
                style="background-color: {{ $attention->sick_time2 == 'Mes' ? 'yellow' : 'transparent' }}">M</span>
            <span class="span"
                style="background-color: {{ $attention->sick_time2 == 'Año' ? 'yellow' : 'transparent' }}">A</span>
        </label>
    </div>

    <div class="form-group">
        <label style="margin-right: 10px">FORMA DE INICIO:</label>

        <label style="margin-right: 10px">
            Inisidioso
            <span style="height: 20px;width: 13px" class="span">{{ $attention->start_form ? 'X' : ' ' }}</span>
        </label>

        <label>
            Progresivo
            <span style="height: 20px;width: 13px" class="span">{{ !$attention->start_form ? 'X' : ' ' }}</span>
        </label>
    </div>


    <div class="form-group">
        <label style="margin-bottom: 5px;margin-top: 5px">SIGNOS Y SINTOMAS: <span style="width: 523px"
                class="span">{{ $attention->signs_symptoms }}
            </span></label>
    </div>

    <div class="form-group">
        <label style="margin-bottom: 5px;margin-top: 5px; width: 100%">RELATO CRONOLÓGICO: <span style="width: 100%"
                class="span">{{ $attention->chronological_account }}
            </span></label>
    </div>

    <div class="form-group">
        <label style="margin-right: 10px">SIGNOS VITALES
        </label>
    </div>

    <div class="form-group">
        <label style="margin-right: 97px">PA: <span style="width: 40px" class="span">{{ $attention->pa }}</span>
            mmHg</label>
        <label style="margin-right: 96px">Fc: <span style="width: 40px" class="span">{{ $attention->fc }}</span>
            x'</label>
        <label style="margin-right: 96px">Fr: <span style="width: 40px" class="span">{{ $attention->fr }}</span>
            x'</label>
        <label>T: <span style="width: 40px" class="span">{{ $attention->temp }}</span> °C</label>
    </div>

    <div class="form-group">
        <label style="margin-right: 140px">So2: <span style="width: 40px"
                class="span">{{ $attention->so2 }}</span></label>
        <label style="margin-right: 60px">Talla: <span style="width: 40px"
                class="span">{{ $attention->talla }}</span> cmts</label>
        <label style="margin-right: 60px">Peso: <span style="width: 40px" class="span">{{ $attention->peso }}</span>
            kgrs</label>
        <label>IMC: <span style="width: 40px" class="span">{{ $attention->imc }}</span></label>
    </div>

    <h4 style="margin-bottom: 3%"><strong>IV. EXAMEN CLÍNICO</strong></h4>
    <div class="form-group">
        <span style="width: 100%" class="span">{{ $attention->clinical_examination }}
        </span>
    </div>
    @php
        // Convierte la cadena de diagnósticos en un arreglo usando el punto y coma como separador
        $diagnostics = explode(';', $attention->diagnosis);
    @endphp

    <h4 style="margin-bottom: 3%"><strong>V. DIAGNÓSTICO</strong></h4>

    @foreach ($diagnostics as $index => $diagnostic)
        @php
            // Separa cada diagnóstico y su código usando la coma
            [$diagnosis, $code] = explode(',', $diagnostic);
        @endphp

        <div class="form-group">
            <label style="margin-right: 30px">{{ $index + 1 }}.
                <span style="width: 539px" class="span">{{ $diagnosis }}</span>
            </label>
            <label>CIE 10 <span style="width: 40px" class="span">{{ strtoupper($code) }}</span></label>
        </div>
    @endforeach

    <h4 style="margin-bottom: 3%"><strong>VI. PLAN DE TRABAJO</strong></h4>
    <div class="form-group">
        <span style="width: 100%" class="span">{{ $attention->work_plan }}
        </span>
    </div>

    <div style="position: relative; height: 200px;"> <!-- Ajusta la altura según necesites -->
        <img src="{{ public_path('storage/' . $attention->doctor->stamp_image) }}"
            style="width: 220px; height: auto; position: absolute; bottom: 0; right: 0;">
    </div>



</body>

</html>
