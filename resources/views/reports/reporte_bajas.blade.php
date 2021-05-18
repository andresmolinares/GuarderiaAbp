<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo_pdf.css') }}">
</head>
<body>
    <header>
        <br>
        <p><strong>Guarderia</strong></p>
    </header>
    <main>
        <div class="container">
            <h5 style="text-align:center"><strong><b>Niños que salieron de la guardería</b></strong></h5>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">Comidas realizadas</th>
                    <th scope="col">Fecha de baja</th>
                    <th scope="col">Cedula acudiente</th>
                    <th scope="col">Menu favorito</th>
                    
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
    </main>


</body>
</html>