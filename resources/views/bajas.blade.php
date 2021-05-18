@extends('layouts.app')

@section('content')

<div class="container">
    <h2><b>Niños que salieron de la guardería</b></h2>
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
        </tr>

    </tbody>
    @endforeach
</table>

<a href="reporte_bajas" class="btn btn-primary">Descargar Reporte PDF</a>
</div>        
@endsection
