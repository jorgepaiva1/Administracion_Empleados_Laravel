
<h1> {{$modo}} Usuarios</h1>

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
<label for="Id" style='width:56px; height: 25px;'>Id </label>
<input type="text" name="Id" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" id="Nombre" style='width:235px;'>
<br>
<label for="Nombre" style='width:56px; height: 25px;'>Nombre</label>
<input type="text" name="Nombre" value="{{isset($empleado->Apellido)?$empleado->Apellido:old('Apellido')}}" id="Apellido" style='width:235px;'>
<br>
<label for="Correo" style='width:56px; height: 25px;'>Correo</label>
<input type="text" name="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo" style='width:235px;'>
<br>
<label for="Contraseña" style='width:56px; height: 25px;'>Contraseña</label>
<input type="text" name="Contraseña" value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}" id="Telefono" style='width:235px;'>
<br>

@if(isset($empleado->Foto))
<input type="file" name="Foto" value="{{$empleado->Foto}}" id="Foto">
<br>
@endif
@if(!isset($empleado->Foto))

    <input type="file" name="Foto" id="Foto">
    <br>
@endif
<input type="submit" value="Guardar Datos" style="background-color: dodgerblue">

<a href="{{url('empleado/')}}"> <input type="button" value="Regresar" style="margin-left: 10px; margin-top: 15px; background-color: lightgreen "></a>
<br>
