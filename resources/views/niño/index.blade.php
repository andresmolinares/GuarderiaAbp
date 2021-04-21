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




<a href="{{ route('nino.create') }}" class="btn btn-success">Registrar nuevo Niño</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha de ingreso</th>
            <th>Comidas realizadas</th>
            <th>Fecha de baja</th>
            <th>Cedula acudiente</th>
            <th>Menu favorito</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($ninos as $niño)
        <tr>
            <td>{{$niño->id}}</td>
            <td>{{$niño->nombre}}</td>
            <td>{{$niño->fecha_ingreso}}</td>
            <td>{{$niño->comidas_realizadas}}</td>
            <td>{{$niño->fecha_baja}}</td>
            <td>{{$niño->persona_id}}</td>
            <td>{{$niño->menu_id}}</td>
            <td>
            <a href="{{ route('nino.edit',$niño) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('nino.destroy', $niño) }}" class="d-inline">
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
{!! $ninos->links() !!}
</div>
@endsection