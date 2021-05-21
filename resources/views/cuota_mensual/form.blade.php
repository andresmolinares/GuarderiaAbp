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
<label for="valor_mensualidad">Valor de mensualidad:</label>
<input type="text" class="form-control" name="valor_mensualidad" value="{{ isset($cuota_mensual -> valor_mensualidad)?$cuota_mensual ->valor_mensualidad:old('valor_mensualidad') }}" id="valor_mensualidad">

</div>

<div class="form-group">
<label for="costo_comida">Costo x Comida:</label>
<input type="text" class="form-control" name="costo_comida" value="{{ isset($cuota_mensual -> costo_comida)?$cuota_mensual -> costo_comida:old('costo_comida') }}" id="costo_comida">

</div>

<div class="form-group">

    <label for="niño">Niño:</label>
    <select class="form-control" name="niño_id" id="niño_id">
    @foreach ($ninos as $nino)
        <option value="{{ $nino->id }}">{{$nino->id}}-{{$nino->nombre}}</option>
    @endforeach
    </select>
    </div>


<div class="form-group">
<label for="menu_id">Pagador:</label>
<select class="form-control" name="pagador_id" id="pagador_id">
@foreach ($pagadores as $pagador)
    <option value="{{ $pagador->id }}"> {{$pagador->id}} </option>
@endforeach

</select>
</div>


<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a href="{{ route('cuota_mensual.index') }}" class="btn btn-primary">Regresar</a>