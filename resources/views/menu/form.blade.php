<h1>{{ $modo }} Menú</h1>
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

<label for="nombre">Id:</label>
<input type="text" class="form-control" name="id" value="{{ isset($menu -> id)?$menu->id:old('id') }}" id="id">

</div>

<div class="form-group">
<label for="fecha_ingreso">Nombre:</label>
<input type="text" class="form-control" name="nombre" value="{{ isset($menu -> nombre)?$menu ->nombre:old('nombre') }}" id="nombre">

</div>



<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('menu.index') }}" class="btn btn-primary">Regresar</a>