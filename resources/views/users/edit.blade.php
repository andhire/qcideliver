<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$user->nombre}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/user.create.css">
</head>

<body>

    <div class="content">
        <form method="POST" action="/user">
            @csrf @method('POST')
            <label>Nombre</label>
            <input name="nombre">
            <br>
            <label>Apellido Paterno</label>
            <input name="apellidoP">
            <br>
            <label>Apellido Materno</label>
            <input name="apellidoM">
            <br>
            <label>Usuario</label>
            <input name="usuario">
            <br>
            <label>Password</label>
            <input name="password" type="password">
            <br>
            <label>Tipo</label>
            <select id="Tipo" name="tipo">
                         <option value="1">Vendedor</option>
                         <option value="2">Comprador</option>
                     </select>
            <br>
            <input type="hidden" value="1" name="estado">
            <label>Foto</label>
            <input type="text" name="foto">
            <br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>
</body>

</html>