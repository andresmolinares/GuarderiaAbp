<h1>{{ $modo }} Cuota Mensual</h1>
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
<label for="fecha_ingreso">Valor de mensualidad:</label>
<input type="text" class="form-control" name="valor_mensualidad" value="{{ isset($cuota_mensual -> valor_mensualidad)?$cuota_mensual ->valor_mensualidad:old('valor_mensualidad') }}" id="valor_mensualidad">

</div>

<div class="form-group">
<label for="comidas_realizadas">Costo x Comida:</label>
<input type="text" class="form-control" name="costo_comida" value="{{ isset($cuota_mensual -> costo_comida)?$cuota_mensual -> costo_comida:old('costo_comida') }}" id="costo_comida">

</div>

<div class="form-group">
<label for="fecha_baja">Niño:</label>
<input type="text" class="form-control" name="niño_id" value="{{ isset($cuota_mensual -> niño_id)?$cuota_mensual -> niño_id:old('niño_id') }}" id="niño_id">

</div>

<div class="form-group">
<label for="menu_id">Pagador:</label>
<input type="text" class="form-control" name="pagador_id" value="{{ isset($cuota_mensual -> pagador)?$cuota_mensual -> pagador_id:old('pagador_id') }}" id="pagador_id">

</div>


<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('cuota_mensual.index') }}" class="btn btn-primary">Regresar</a>