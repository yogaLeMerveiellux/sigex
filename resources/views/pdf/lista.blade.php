<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css" media="screen">
        body{
        margin: 0px;
        padding: 0px;
        font-size: 12px;
        }
        h1{
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
        }
        .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
        }
        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
        }
        .table > thead > tr > th {
        vertical-align: bottom;
        border-bottom: 2px solid #ddd;
        }
        .table > caption + thead > tr:first-child > th,
        .table > colgroup + thead > tr:first-child > th,
        .table > thead:first-child > tr:first-child > th,
        .table > caption + thead > tr:first-child > td,
        .table > colgroup + thead > tr:first-child > td,
        .table > thead:first-child > tr:first-child > td {
        border-top: 0;
        }
        .table > tbody + tbody {
        border-top: 2px solid #ddd;
        }
        .table .table {
        background-color: #fff;
        }
        .table-condensed > thead > tr > th,
        .table-condensed > tbody > tr > th,
        .table-condensed > tfoot > tr > th,
        .table-condensed > thead > tr > td,
        .table-condensed > tbody > tr > td,
        .table-condensed > tfoot > tr > td {
        padding: 5px;
        }
        .table-bordered {
        border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
        border: 1px solid #ddd;
        }
        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
        border-bottom-width: 2px;
        }
        table col[class*="col-"] {
        position: static;
        float: none;
        display: table-column;
        }
        table td[class*="col-"],
        table th[class*="col-"] {
        position: static;
        float: none;
        display: table-cell;
        }
        small{
        font-size: 80%;
        font-weight:normal;
        color: #333;
        }
        </style>
    </head>
    <body>
        <?php
            setlocale(LC_TIME,"esp");
            $fecha = strftime("%A, %d de %B de %Y");
        ?>
        <h1>Lista de asistencia <small>{{$actividad->nombre}}</small>
        <small style="float: right;">
        {{$fecha}}
        </small></h1>
        <p style="float: right;">{{$alumnos->count()}} Alumnos</p>
    
        @foreach ($profesor as $record)     
        @if ($record->activo==1)
        <p>Profesor: {{$record->nombre}} {{$record->aPaterno}}</p>
        @else
        <p>Sin instructor Asignado</p>
        @endif               
        @endforeach           

        @foreach ($ciclo as $record)           
        <p>Ciclo escolar {{$record->fechaInicio}} {{$record->FechaFin}}</p>
        @endforeach
        <table class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>Nombre del alumno</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                    <th style="text-align: left; font-size: 7px">Fecha:</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->nombre}} {{$alumno->aPaterno}} {{$alumno->aMaterno}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>