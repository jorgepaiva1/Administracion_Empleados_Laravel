

@extends('layouts.app')
@section('content')

<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}


            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

            <br>
            @if(!is_employeer())
                <a href="{{ url('empleado/create') }}" ><input type="button" value="Agregar nuevo empleado" class="btn btn-success"> </a>
            @endif
            <br>

            <table id="empleados" class="cell-border compact stripe">

                <thead class="thread-light-">
                    <tr>
                        <th>Id</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($empleados as $empleado)

                   <tr>
                        <td> {{$empleado->id}} </td>
                        <td>
                            <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="Foto de Perfil" width="85" height="85">
                        </td>
                        <td> {{$empleado->Nombre}}</td>
                        <td> {{$empleado->Apellido}}</td>
                        <td> {{$empleado->Telefono}}</td>
                        <td> {{$empleado->Correo}}</td>
                        <td>
                            <a href="{{url('/empleado/'.$empleado->id.'/edit')}}">
                                <input type="button" value="Editar" class="btn btn-warning" style="height: 30px; width:70px; margin-top: 8px">
                                <form action="{{url('/empleado/'.$empleado->id)}}" method="post">
                                @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres eliminarlo?')" value="Eliminar" style="height: 30px; width:70px; margin-top: 8px">
                                </form>
                            </a>
                        </td>
                   </tr>
                    @endforeach
                </tbody>

            </table>
    {{--!! $empleados->links() !!--}}
        </div>
    </div>
@endsection

@push('scripts')

    <script type="module" >
        new DataTable('#empleados',{
            rowReorder: true,
            responsive: true,
            pageLength: 2,
            autoWidth: false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    </script>

@endpush
