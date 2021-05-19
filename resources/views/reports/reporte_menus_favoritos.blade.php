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
            <h5 style="text-align:center"><strong><b>Menus favoritos</b></strong></h5>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Menú</th>
                    <th scope="col">Cantidad de niños</th>

                    
                </tr>
            </thead>
        
            <tbody>
                @foreach($ninos as $nino)
                <tr>
                    <td>{{$nino->nombre_menu}}</td>
                    <td>{{$nino->cantidad_niños}}</td>
              </tr>
              @endforeach
        </table>
    </main>


</body>
</html>