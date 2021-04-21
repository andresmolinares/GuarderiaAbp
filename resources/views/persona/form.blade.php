<h1>{{ $modo }} Persona</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>


@endif
<div class="form-group">

<label for="nombre">Cédula:</label>
<input type="text" class="form-control" name="id" value="{{ isset($persona -> id)?$persona->id:old('id') }}" id="id">

</div>

<div class="form-group">
<label for="fecha_ingreso">Nombre:</label>
<input type="text" class="form-control" name="nombre" value="{{ isset($persona -> nombre)?$persona ->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
<label for="comidas_realizadas">Dirección:</label>
<input type="text" class="form-control" name="direccion" value="{{ isset($persona -> direccion)?$persona -> direccion:old('direccion') }}" id="direccion">

</div>

<div class="form-group">
<label for="fecha_baja">Telefono:</label>
<input type="text" class="form-control" name="telefono" value="{{ isset($persona -> telefono)?$persona -> telefono:old('telefono') }}" id="telefono">

</div>

<div class="form-group">
<label for="persona_id">Parentezco:</label>
<input type="text" class="form-control" name="parentezco" value="{{ isset($persona -> parentezco)?$persona -> parentezco:old('parentezco') }}" id="parentezco">

</div>


<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('persona.index') }}" class="btn btn-primary">Regresar</a>