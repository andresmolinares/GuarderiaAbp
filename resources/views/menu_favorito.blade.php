@extends('layouts.app')

@section('content')

<div class="container">
    <h2><b>Menus favoritos</b></h2>
<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            
            <th>Menú</th>
            <th>Cantidad de niños</th>

           
        </tr>
    </thead>

    <tbody>
        @foreach($ninos as $nino)
        <tr>
            <td>{{$nino->nombre_menu}}</td>
            <td>{{$nino->cantidad_niños}}</td>        

      </tr>
      @endforeach

    </tbody>
    
</table>
</div>        
@endsection