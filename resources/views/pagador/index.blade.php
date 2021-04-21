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




<a href="{{ route('pagador.create') }}" class="btn btn-success">Registrar nuevo pagador</a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>Cedula</th>
            <th>Numero de cuenta</th>
            <th>Banco</th>

            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pagadores as $pagador)
        <tr>
            <td>{{$pagador->id}}</td>
            <td>{{$pagador->numero_cuenta}}</td>
            <td>{{$pagador->banco}}</td>

            
        
            <td>
            <a href="{{ route('pagador.edit',$pagador) }}" class="btn btn-warning">Editar</a>
            | 
            <form method="post" action="{{ route('pagador.destroy', $pagador) }}" class="d-inline">
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
{!! $pagadores->links() !!}
</div>
@endsection