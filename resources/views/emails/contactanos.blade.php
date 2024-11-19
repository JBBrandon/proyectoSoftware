<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>CORREO ELECTRONICO</h1>
    <P>Este es el primer correo que mandamos por laravel</P>

    <p><strong>Nombre:</strong>{{$data['nombre']}}</p>
    <p><strong>Correo:</strong>{{$data['correo']}}</p>
    <p><strong>Mensaje:</strong>{{$data['mensaje']}}</p>

</body>

    <style>
        h1{
            color: blue;
        }
    </style>
</html>