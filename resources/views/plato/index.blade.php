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




<a href="{{ route('plato.create') }}" class="btn btn-success">Registrar nuevo plato</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Menu</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($platos as $plato)
        <tr>
            <td>{{$plato->id}}</td>
            <td>{{$plato->nombre}}</td>
            <td>{{$plato->cantidad}}</td>
            <td>{{$plato->descripcion}}</td>
            <td>{{$plato->menu_id}}</td>
            
        
            <td>
            <a href="{{ route('plato.edit',$plato) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('plato.destroy', $plato) }}" class="d-inline">
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
{!! $platos->links() !!}
</div>
@endsection