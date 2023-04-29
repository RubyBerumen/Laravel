<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="{{route('usuarios.create')}}"> Agregar usuarios </a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Contraseña</th>
                <th>Correo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $u)
                <tr>
                    <td>{{$u->nombre_usuario}}</td>
                    <td>{{$u->password}}</td>
                    <td>{{$u->email}}</td>

                    <td> Editar | Eliminar</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>