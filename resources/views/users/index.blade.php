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
            <table id="nombres" class="cell-border compact stripe" id="usuarios">

                <thead class="thread-light-">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($datos as $user)
                           <tr>
                                <td > {{$user->id}} </td>
                                <td> {{$user->name}} </td>
                               <td> {{$user->email}}</td>
                           </tr>
                    @endforeach
                </tbody>

            </table>

        {{--!! $datos->links() !!--}}
        </div>
    </div>

@endsection

@push('scripts')
    <script type="module" >
        new DataTable('#nombres',{
            rowReorder: true,
            responsive: true,
            pageLength: 3,
            autoWidth: false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    </script>
@endpush


