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
            <h5 style="text-align:center"><strong><b>Niños Alergicos a algún Ingrediente</b></strong></h5>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nombre del niño</th>
                    <th scope="col">Ingrediente</th>
                    
                </tr>
            </thead>
        
            <tbody>
                @foreach($ingredientes as $ingrediente)
                <tr>
                    <td>{{$ingrediente->ninos_nombre}}</td>
                    <td>{{$ingrediente->nombre}}</td>
                    
              </tr>
              @endforeach
        </table>
    </main>


</body>
</html>