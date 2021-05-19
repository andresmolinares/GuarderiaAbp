@extends('layouts.app')

@section('content')

<div class="container">
    <h2><b>Niños alergicos a algún ingrediente</b></h2>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            
            <th>Nombre del niño</th>
            <th>Ingrediente</th>
           
        </tr>
    </thead>

    <tbody>
        @foreach($ingredientes as $ingrediente)
        <tr>
            <td>{{$ingrediente->ninos_nombre}}</td>
            <td>{{$ingrediente->nombre}}</td>
            
      </tr>
      @endforeach

    </tbody>
    
</table>
<a href="reporte_alergicos" class="btn btn-success">Descargar Reporte PDF</a>

</div>        
@endsection


