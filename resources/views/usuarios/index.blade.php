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

            <table class="table table-light" id="usuarios">

                <thead class="thread-light-">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($usuarios as $user)
                        @if($user->is_employeer == 1)
                           <tr>
                                <td > {{$user->id}} </td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td>
                                    <form action="{{url('/impersonate/'.$user->id.'/start')}}" method="post">
                                    @csrf
                                        <input type="submit" onclick="return confirm('¿Quieres impersonarlo?')" value="Impersonate" style='height: 30px; width:90px; background-color: #718096; margin-top: 8px'>
                                        {{--method_field('DELETE')--}}
                                    </form>
                                </td>
                           </tr>
                       @endif
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

@endsection
