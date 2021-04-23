<h1>{{ $modo }} Plato</h1>
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
<input type="text" class="form-control" name="nombre" value="{{ isset($plato -> nombre)?$plato ->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
<label for="comidas_realizadas">Cantidad:</label>
<input type="text" class="form-control" name="cantidad" value="{{ isset($plato -> cantidad)?$plato -> cantidad:old('cantidad') }}" id="cantidad">

</div>

<div class="form-group">
<label for="fecha_baja">Descripción:</label>
<input type="text" class="form-control" name="descripcion" value="{{ isset($plato -> descripcion)?$plato -> descripcion:old('descripcion') }}" id="descripcion">

</div>

<div class="form-group">
<label for="menu_id">Menú al que pertenece:</label>
<select class="form-control" name="menu_id" id="menu_id">
    @foreach ($menus as $menu)
    <option value="{{$menu -> id}}">{{$menu->nombre}}</option>
@endforeach
</select>
</div>


<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('plato.index') }}" class="btn btn-primary">Regresar</a>