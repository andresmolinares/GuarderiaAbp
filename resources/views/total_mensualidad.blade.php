@extends('layouts.app')

@section('content')

<div class="container">
    <h2><b>CALCULO MENSUALIDAD TOTAL</b></h2>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            
            <th>Nombre del niño</th>
            <th>Comidas Realizadas</th>
            <th>Cargo Mensual</th>
            <th>Costo x Comida</th>
            <th>Total de las comidas</th>
            <th>Total Mensualidad</th>
           
        </tr>
    </thead>

    <tbody>
        @foreach($ninos as $nino)
        <tr>
            <td>{{$nino->ninos_nombre}}</td>
            <td>{{$nino->comidas_realizadas}}</td>        
            <td>${{$nino->cargo_mensual}}</td>
            <td>${{$nino->costo_comida}}</td>
            <td>${{$nino->total_comidas}}</td>
            <td>${{$nino->total_mensualidad}}</td>
      </tr>
      @endforeach

    </tbody>
    
</table>
<a href="reporte_mensualidad" class="btn btn-success">Descargar Reporte PDF</a>

</div>        
@endsection

