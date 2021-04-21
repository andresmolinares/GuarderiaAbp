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




<a href="{{ route('persona.create') }}" class="btn btn-success">Registrar nueva persona</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Parentezco</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($personas as $persona)
        <tr>
            <td>{{$persona->id}}</td>
            <td>{{$persona->nombre}}</td>
            <td>{{$persona->direccion}}</td>
            <td>{{$persona->telefono}}</td>
            <td>{{$persona->parentezco}}</td>
            
        
            <td>
            <a href="{{ route('persona.edit',$persona) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('persona.destroy', $persona) }}" class="d-inline">
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
{!! $personas->links() !!}
</div>
@endsection