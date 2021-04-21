<h1>{{ $modo }} Ingrediente</h1>
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
<label for="fecha_ingreso">Nombre:</label>
<input type="text" class="form-control" name="nombre" value="{{ isset($ingrediente -> nombre)?$ingrediente ->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
<label for="comidas_realizadas">Fecha de caducidad:</label>
<input type="date" class="form-control" name="fecha_caducidad" value="{{ isset($ingrediente -> fecha_caducidad)?$ingrediente -> fecha_caducidad:old('fecha_caducidad') }}" id="fecha_caducidad">

</div>

<div class="form-group">
<label for="fecha_baja">Niño alergico:</label>
<input type="text" class="form-control" name="niño_id" value="{{ isset($ingrediente -> niño_id)?$ingrediente -> niño_id:old('niño_id') }}" id="niño_id">

</div>

<div class="form-group">
<label for="menu_id">Plato al que pertenece:</label>
<input type="text" class="form-control" name="plato_id" value="{{ isset($ingrediente -> plato_id)?$ingrediente -> plato_id:old('plato_id') }}" id="plato_id">

</div>


<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('ingrediente.index') }}" class="btn btn-primary">Regresar</a>