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




<a href="{{ route('ingrediente.create') }}" class="btn btn-success">Registrar nuevo ingrediente</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Fecha de caducidad</th>
            <th>Niño alergico</th>
            <th>Plato</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($ingredientes as $ingrediente)
        <tr>
            <td>{{$ingrediente->id}}</td>
            <td>{{$ingrediente->nombre}}</td>
            <td>{{$ingrediente->fecha_caducidad}}</td>
            <td>{{$ingrediente->niño_id}}</td>
            <td>{{$ingrediente->plato_id}}</td>
            
        
            <td>
            <a href="{{ route('ingrediente.edit',$ingrediente) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('ingrediente.destroy', $ingrediente) }}" class="d-inline">
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
{!! $ingredientes->links() !!}
</div>
@endsection