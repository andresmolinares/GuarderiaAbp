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




<a href="{{ route('menu.create') }}" class="btn btn-success">Registrar nuevo menú</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>

            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($menus as $menu)
        <tr>
            <td>{{$menu->id}}</td>
            <td>{{$menu->nombre}}</td>

            
        
            <td>
            <a href="{{ route('menu.edit',$menu) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('menu.destroy', $menu) }}" class="d-inline">
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
{!! $menus->links() !!}
</div>
@endsection