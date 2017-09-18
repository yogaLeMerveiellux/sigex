@extends('adminlte::layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="panel panel-form">
	<!-- Default box -->
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Administrador</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>				
			</div>
		</div>

		<div class="box-body">

			<div class="mdl-layout mdl-color--grey-100">
				<main class="mdl-layou-content">
					<div class="mdl-grid">

						<div class="mdl-card mdl-cell mdl-cell--8-col mdl-shadow--8dp">
							<figure class="mdl-card__media">
								<img src="./img/alumnos.jpg" alt="" />
							</figure>
							<div class="mdl-card__title">
								<h1 class="mdl-card__title-text">Alumnos</h1>
							</div>
							<div class="mdl-card__supporting-text">
								<p><small>Listado de alumnos</small></p>
								<p>Apartado para la gestión de los alumnos vigentes, no vigentes e inscritos dentro de las actividades extraescolares ofertada por el instituto</p>
							</div>
							<div class="mdl-card__actions mdl-card--border">
								<a href="{{route('alumnos.index')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Ver lista</a>
								<div class="mdl-layout-spacer"></div>
							</div>
						</div>
						
						<div class="mdl-card mdl-cell mdl-cell--4-col mdl-shadow--8dp">
							<figure class="mdl-card__media">
								<img src="./img/instructores.jpg" alt="" />
							</figure>
							<div class="mdl-card__title">
								<h1 class="mdl-card__title-text">Profesores</h1>
							</div>
							<div class="mdl-card__supporting-text">
								<p>Listado de profesores</p>
							</div>
							<div class="mdl-card__actions mdl-card--border">
								<a href="{{route('profesores.index')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Ver lista</a>
								<div class="mdl-layout-spacer"></div>
							</div>
						</div>

						<div class="mdl-card mdl-cell mdl-cell--4-col mdl-shadow--8dp">
							<figure class="mdl-card__media">
								<img src="./img/extracurriculares.jpg" alt="" />
							</figure>
							<div class="mdl-card__title">
								<h1 class="mdl-card__title-text">Clases Extraescolares</h1>
							</div>
							<div class="mdl-card__supporting-text">
								<p>Listado de curriculares</p>
							</div>
							<div class="mdl-card__actions mdl-card--border">
								<a href="{{route('curriculares.index')}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Ver lista</a>
								<div class="mdl-layout-spacer"></div>
							</div>
						</div>

					</div>
				</main>
			</div>
			
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
	<div class="panel panel-form">
	<div class="box">
	<div class="box-header">
			<h3 class="box-title">Configuración del sistema</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>				
			</div>
		</div>
		<div class="box-body">
			
		</div>
	</div>
	</div>
@endsection