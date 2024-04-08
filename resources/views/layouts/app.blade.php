@vite(['resources/css/app.css'])
@vite(['resources/js/app.js'])

<x-laravel-ui-adminlte::adminlte-layout>
    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">

    <!--Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <body class="hold-transition sidebar-collapse sidebar-mini sidebar-mini-xs sidebar-wrapper">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto" style="height: 38px">
                @if( !session('is_impersonated') and !is_employeer() )
                    <div>
                        <form action=" {{ route('start') }}" id="selectUser" method="POST" >
                            @csrf
                            <div class="input-group">
                                <select class="js-example-basic-single" name="user">
                                    <option value=""> Empleados </option>

                                    @foreach(\App\Models\User::all() as $usuario)
                                        @if($usuario->is_employeer == 1)
                                            <option @if(current_user()->id == $usuario->id) selected @endif value="{{$usuario->id}}"> {{$usuario->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                        <button type="submit" form="selectUser" class="btn btn-outline-info" style="height: 38px; margin-left: 7px">
                            Elegir
                            <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
                        </button>
                    @endif

                    @if(session('is_impersonated'))
                        <a href="{{route('salir_usuario')}}" class="btn btn-outline-info">
                            Volver al original
                        </a>
                    @endif
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                class="user-image img-circle elevation-2" alt="User Image">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                    class="img-circle elevation-2" alt="User Image">

                                <p>
                                    {{ current_user()->name }}
                                    @if(is_employeer())
                                        <small>Empleado </small>
                                    @else
                                        <small> <b>Administrador</b> </small>
                                    @endif

                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Salir
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">

            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
        <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.3.1/luxon.min.js"></script>

        @stack('scripts')
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
<script>
    $(function () {
        $('.js-example-basic-single').select2({
            theme: 'bootstrap-5',
            responsive: true,
            width: 'auto',
            height: '38px'
        });
    });
</script>
<script>
    $('ul.navbar-nav.ml-auto').on('click', function(event){
        var events = $._data(document, 'events') || {};
        events = events.click || [];
        for(var i = 0; i < events.length; i++) {
            if(events[i].selector) {

                //Check if the clicked element matches the event selector
                if($(event.target).is(events[i].selector)) {
                    events[i].handler.call(event.target, event);
                }

                // Check if any of the clicked element parents matches the
                // delegated event selector (Emulating propagation)
                $(event.target).parents(events[i].selector).each(function(){
                    events[i].handler.call(this, event);
                });
            }
        }
        event.stopPropagation(); //Always stop propagation
    });
</script>
