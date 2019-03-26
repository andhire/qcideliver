<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crear usuario</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="signup-form-container">
            <form method="POST" action="/user" id="register-form" role="form">
                <div class="form-header">
                    <h3 class="form-title"><i class="fa fa-user"></i> Registro</h3>

                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>
                    @csrf @method('POST')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <label>Nombre</label>
                                <input class="form-control" name="nombre">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label>Apellido Paterno</label>
                                <input class="form-control" name="apellidoP">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label>Apellido Materno</label>
                                <input class="form-control" name="apellidoM">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <label>Usuario</label>
                                <input class="form-control" name="usuario">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>



                        <div class="form-group">
                            <div class="input-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <div class="form-group">
                            <label>Tipo</label>
                            <select multiple class="form-control" id="Tipo" name="tipo">
                             <option value="1">Vendedor</option>
                            <option value="2">Comprador</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                        <input type="hidden" value="1" name="estado">


                        <div class="form-group">
                            <div class="input-group">
                                <label>Foto</label>
                                <input class="form-control" type="text" name="foto">
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-info">
                            <span class="glyphicon glyphicon-log-in"></span> Registrar !
                            </button> {{-- <input type="submit" name="enviar" value="Enviar"> --}}
                    </div>


            </form>
            </div>
        </div>
</body>

</html>