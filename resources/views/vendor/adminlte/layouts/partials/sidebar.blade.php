<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{Storage::url($configuracion->logo)}}" class="img-circle" alt="" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        @endif
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Navegar</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="{{route('alumnos.index')}}"><i class='fa fa-user-o'></i> <span>Gestionar Alumnos</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>Catálogos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('curriculares.index')}}">Curriculares</a></li>
                    <li><a href="{{route('profesores.index')}}">Profesores</a></li>
                    <li><a href="{{route('carreras.index')}}">Carreras</a></li>
                    <li><a href="{{route('ciclos.index')}}">Ciclos Escolares</a></li>
                    <li><a href="{{route('municipios.index')}}">Municipios</a></li>
                    <li><a href="{{route('estados.index')}}">Estados</a></li>
                </ul>
                <li><a href="{{route('alumnos.index')}}"><i class='fa fa-file-pdf-o'></i> <span> Reportes</span></a></li>
                <li><a href="{{route('configuraciones.index')}}"><i class='fa fa-wrench'></i> <span> Configuracion</span></a></li>
            </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>