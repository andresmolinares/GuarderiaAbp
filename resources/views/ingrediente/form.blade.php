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
<input type="date" class="form-control" name="fecha_caducidad" value="{{old('fecha_caducidad', date('Y-m-d'))}}" id="fecha_caducidad">

</div>

<div class="form-group">
<label for="fecha_baja">Niño alergico:</label>
<select class="form-control" name="niño_id" id="niño_id">
    @foreach ($ninos as $nino)
        <option value="{{ $nino->id }}">{{$nino->nombre}}</option>
    @endforeach
    </select>
</div>

<div class="form-group">
<label for="menu_id">Plato al que pertenece:</label>
<select class="form-control" name="plato_id" id="plato_id">
    @foreach ($platos as $plato)
        <option value="{{ $plato->id }}">{{$plato->nombre}}</option>
    @endforeach
    </select>
</div>


<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('ingrediente.index') }}" class="btn btn-primary">Regresar</a>