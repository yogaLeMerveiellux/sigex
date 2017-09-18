<html>
    <head>
        <style>
        .text-center{
        text-align:center;
        }
        .encabezado {
        padding:10px 0;
        border-top: 1px solid;
        border-bottom: 1px solid;
        width:100%;
        }
        .footer {
        border-top: 1px solid;
        text-align: justify;
        width:100%;
        }
        .img-circle{
        border: solid 1px #aaa;
        padding: 5px;
        border-radius: 78px;
        width: 150px;
        margin-top: 20px;
        margin-left: 20px;
        }
        .pull-right{
        float: right;
        }
        span{
        font-weight: normal;
        line-height: 1;
        color: #777777;
        }
        .fieldset{
        background-color: #eef;
        height: 200px;
        border: 1px solid #aaa;
        }
        .fieldset legend{
        border: 1px solid #aaa;
        }
        .info{
        width: 500px;
        height: 170px;
        float: right;
        }
        ul{
        list-style:none;
        letter-spacing: 2px;
        }
        li{
        margin: 4px;
        font-family: sans-serif;
        font-size: 14px;        
        text-transform: uppercase;
        }
        .tit{
        color: #2a3;
        }
        table {
        background-color: transparent;
        }
        caption {
        padding-top: 8px;
        padding-bottom: 8px;
        color: #777777;
        text-align: left;
        }
        th {
        text-align: left;
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
        </style>
    </head>
    <body>
        <div class="pull-right">
            <span>Referencia a la norma ISO 9001:2008 7.2.1</span>
        </div>        
        <img src="./storage/logoInstitucion" alt="" width="60">
        <h3 class="text-center encabezado" style="text-transform: uppercase;">
        {{$configuracion->nombreInstitucion}}<br> 
        <span style="font-size: 75%;">Departamento de actividades culturales, deportivas y recreativas</span>
        </h3>
        <br>
        @foreach($alumnos as $alumno)
        <fieldset class="fieldset">
            <legend>INFORMACIÓN DEL ALUMNO</legend>
            <img src="./img/avatar5.png" alt="foto-perfil" class="img-circle">
            <div class="info">
                <ul>
                    <li><span class="tit">Nombre de Alumno:</span><i><b>{{$alumno->aPaterno}} {{$alumno->aMaterno}} {{$alumno->nombre}}</b></i></li>
                    <li><span class="tit">Actividad:</span> {{$alumno->curricular}}</li>
                    <li><span class="tit">Carrera:</span> {{$alumno->carrera}}</li>
                    <li><span class="tit">Matricula:</span> <b><i>{{$alumno->matricula}}</i></b></li>
                    <li><span class="tit">Ciclo Escolar:</span> 
                    
                    <b>{{date_format(new dateTime($alumno->fechaInicio),'d/m/Y')}}</b> al 
                    <b>{{date_format(new dateTime($alumno->FechaFin),'d/m/Y')}}</b></li>

                    @if ($alumno->activo==1)
                    <li><span class="tit">Actualmente:</span> vigente</li>                    
                    @elseif($alumno->activo==0)
                    <li><span class="tit">Actualmente:</span> Inactivo</li>                    
                    @endif

                    <li ><span class="tit">Semestre:</span> 1 de 4</li>
                    <li ><span class="tit">Situación:</span>Acreditado</li>

                </ul>
            </div>
        </fieldset>
        @endforeach
        <br>
        <table class="table table-bordered">
            <tr>
                <th class="text-center">JEFE DEL DEPARTAMENTO DE VINCULACIÓN</th>
                <th class="text-center">SELLO DE LA INSTITUCIÓN</th>
            </tr>
            <tbody>
                <tr>
                    <td rowspan="10"></td>
                    <td rowspan="10"></td>
                </tr>
            </tbody>
        </table>
        <span>Conserve esta boleta, se le solicitará en la realización de otros trámites.</span>        
        <br>
        <br>
        <p style="margin-bottom: 90px;">C.c.p. Expediente del Alumno</p>        
        <footer class="footer">
            <p>SNEST/D-VI-PO-003-05<span class="pull-right">Fecha: <?= date('d / M / Y')?></span></p>
        </footer>
    </body>
    <html>