@extends('layouts.app')

@section('content')

<div class="container">
    <h2><b>Numero de platos que tiene cada menú</b></h2>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            
            <th>Nombre del menú</th>
            <th>Cantidad de platos</th>

           
        </tr>
    </thead>

    <tbody>
        @foreach($platos as $plato)
        <tr>
            <td>{{$plato->nombre_menu}}</td>
            <td>{{$plato->total_platos}}</td>        

      </tr>
      @endforeach

    </tbody>
    
</table>
</div>        
@endsection