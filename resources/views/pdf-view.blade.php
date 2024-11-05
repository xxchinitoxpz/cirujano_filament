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
            min-width: 150px;
            vertical-align: top;
        }

        .input-box {
            border: 1px solid #000;
            padding: 2px 5px;
            display: inline-block;
            min-width: 100px;
        }

        .input-small {
            width: 30px;
        }

        .inline-label {
            display: inline-block;
            margin-left: 10px;
        }

        .inline-label span {
            border: 1px solid #000;
            padding: 2px 5px;
            margin-right: 5px;
            display: inline-block;
        }

        .form-group-inline {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <img style="width: 25%; margin-bottom: 1%" src="{{ public_path('images/logo.jpg') }}" alt="Logo" class="logo">
    <h3 style="text-align: center; margin-top: 0%">HISTORIA CLINICA</h3>

    <table style="width: 100%">
        <tr>
            <td style="text-align: left;">
                Fecha de atención 5/11/2024
            </td>
            <td style="text-align: right;">
                N° de historia 20
            </td>
        </tr>
    </table>
    <h4 style="margin-bottom: 1%"><strong>I.DATOS DE FILIACIÓN</strong></h4>
    <h4 style="margin-top: 0%"><strong>1. INFORMACION GENERAL</strong></h4>

    <div class="form-group">
        <label for="apellidos-nombres">APELLIDOS Y NOMBRES:</label>
        <span class="input-box" id="apellidos-nombres">Horna Martinez, Brayan Alexis</span>
        <label class="inline-label">EDAD: <span class="input-small">22</span> años</label>
    </div>

    <div class="form-group">
        <label for="fecha-nacimiento">FECHA DE NACIMIENTO:</label>
        <span class="input-box input-small">06/08/2002</span>
        <label class="inline-label">E.C:
            <span>S</span>
            <span>C</span>
            <span>D</span>
        </label>
        <label class="inline-label">DNI: <span class="input-box">74444399</span></label>
    </div>

    <div class="form-group">
        <label for="direccion">DIRECCION:</label>
        <span class="input-box" id="direccion">Calle 2 #128</span>
    </div>

    <div class="form-group">
        {{-- <label for="distrito">DISTRITO:</label><span class="input-box" id="distrito">Chiclayo</span> --}}
        <label class="form-group-inline">DISTRITO:</label><span class="input-box">Chiclayo</span>
        <label class="form-group-inline">PROVINCIA: <span class="input-box">Chiclayo</span></label>
        <label class="form-group-inline">CELULAR: <span class="input-box">949797535</span></label>
    </div>
    <!-- Firma del doctor -->
    <div class="signature">
        {{-- <img src="{{ public_path('storage/' . $attention->doctor->stamp_image) }}"> --}}
    </div>
</body>

</html>
