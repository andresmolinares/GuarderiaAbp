<h1>{{ $modo }} pagador</h1>
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
    <label for="fecha_baja">Persona:</label>
<select class="form-control" name="id" id="id">
    @foreach ($personas as $persona)
    <option value="{{ $persona->id }}">{{$persona->nombre}}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="comidas_realizadas">Numero de cuenta:</label>
<input type="text" class="form-control" name="numero_cuenta" value="{{ isset($pagador -> numero_cuenta)?$pagador -> numero_cuenta:old('numero_cuenta') }}" id="numero_cuenta">

</div>

<div class="form-group">
<label for="fecha_baja">Banco:</label>
<input type="text" class="form-control" name="banco" value="{{ isset($pagador -> banco)?$pagador -> banco:old('banco') }}" id="banco">

</div>



<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('pagador.index') }}" class="btn btn-primary">Regresar</a>