
<h1> {{$modo}} Empleado</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
             <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<label for="Nombre" style='width:56px; height: 25px;'>Nombre </label>
<input type="text" name="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" id="Nombre" style='width:235px;margin-left: 7px'>
<br>
<label for="Apellido" style='width:56px; height: 25px;'>Apellido</label>
<input type="text" name="Apellido" value="{{isset($empleado->Apellido)?$empleado->Apellido:old('Apellido')}}" id="Apellido" style='width:235px; margin-left:7px'>
<br>
<label for="Correo" style='width:56px; height: 25px;'>Correo</label>
<input type="text" name="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo" style='width:235px; margin-left: 7px'>
<br>
<label for="Telefono" style='width:56px; height: 25px;'>Telefono</label>
<input type="text" name="Telefono" value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}" id="Telefono" style='width:235px; margin-left: 7px'>
<br>
@if(isset($empleado->Foto))
<label for="Foto">Foto</label>
<br>
<img src="{{asset('storage').'/'.$empleado->Foto}}" alt="Foto de Perfil" width="85" height="85"> </td>
<br>
@endif
<label>Subir foto</label>
<br>
@if(isset($empleado->Foto))
<input type="file" name="Foto" value="{{$empleado->Foto}}" id="Foto">
<br>
@endif
@if(!isset($empleado->Foto))

    <input type="file" name="Foto" id="Foto" >
    <br>
@endif
<input type="submit" value="Guardar Datos" class="btn btn-primary" style="margin-top: 10px">

<a href="{{url('/home')}}"> <input type="button" value="Regresar" class="btn btn-success" style="margin-left: 10px;margin-top: 10px"></a>

<br>
