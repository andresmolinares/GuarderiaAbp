<h1>{{ $modo }} niño</h1>
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

<label for="nombre">Nombre:</label>
<input type="text" class="form-control" name="nombre" value="{{ isset($niño -> nombre)?$niño->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
<label for="fecha_ingreso">Fecha de ingreso:</label>
<input type="date" class="form-control" name="fecha_ingreso" value="{{ isset($niño-> fecha_ingreso)?$niño->fecha_ingreso:old('fecha_ingreso', date('Y-m-d')) }}" id="fecha_ingreso">

</div>

<div class="form-group">
<label for="comidas_realizadas">Comidas realizadas:</label>
<input type="text" class="form-control" name="comidas_realizadas" value="{{ isset($niño -> comidas_realizadas)?$niño -> comidas_realizadas:old('comidas_realizadas') }}" id="comidas_realizadas">

</div>

<div class="form-group">
<label for="fecha_baja">Fecha de baja:</label>
<input type="date" class="form-control" name="fecha_baja" value="{{ isset($niño-> fecha_baja)?$niño->fecha_baja:old('fecha_baja', date('Y-m-d'))  }}" id="fecha_baja">

</div>

<div class="form-group">
    <label for="acudientes">Acudiente:</label>
<select class="form-control" name="persona_id" id="persona_id">
    @foreach ($personas as $persona)
    <option value="{{$persona -> id}}">{{$persona->nombre}}</option>
@endforeach
</select>

</div>

<div class="form-group">
<label for="menu_id">Menú diario:</label>
<select class="form-control" name="menu_id" id="menu_id">
    @foreach ($menus as $menu)
        <option value="{{ $menu->id }}">{{$menu->nombre}} </option>
    @endforeach
</select>
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('nino.index') }}" class="btn btn-primary">Regresar</a>