@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    
    </div>
@endif




<a href="{{ route('cuota_mensual.create') }}" class="btn btn-success">Registrar nueva cuota mensual</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Valor de mensualidad</th>
            <th>Costo x comida</th>
            <th>Niño</th>
            <th>Pagador</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($cuota_mensuales as $cuota_mensual)
        <tr>
            <td>{{$cuota_mensual->id}}</td>
            <td>${{$cuota_mensual->valor_mensualidad}}</td>
            <td>${{$cuota_mensual->costo_comida}}</td>
            <td>{{$cuota_mensual->niño_id}}</td>
            <td>{{$cuota_mensual->pagador_id}}</td>
            
        
            <td>
            <a href="{{ route('cuota_mensual.edit',$cuota_mensual) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('cuota_mensual.destroy', $cuota_mensual) }}" class="d-inline">
            @csrf 
            @method('DELETE')
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')" value="Borrar">

            
            </form>

            
            <!--url('/niño/'.$niño->id)-->
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $cuota_mensuales->links() !!}
</div>
@endsection