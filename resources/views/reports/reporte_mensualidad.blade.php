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
            <h5 style="text-align:center"><strong><b>Mensualidades</b></strong></h5>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nombre del niño</th>
                    <th scope="col">Comidas Realizadas</th>
                    <th scope="col">Cargo Mensual</th>
                    <th scope="col">Costo x Comida</th>
                    <th scope="col">Total de las comidas</th>
                    <th scope="col">Total Mensualidad</th>
                    
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
        </table>
    </main>


</body>
</html>