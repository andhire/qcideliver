<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crear usuario</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/create.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/create.js')}}"></script>
</head>

<body>
    <div class="container content">
        <div class="signup-form-container">
            <form method="POST" action="/user" id="register-form" role="form">
                <div class="form-header">
                    <h3 class="form-title"><i class="fa fa-user"></i> Registro</h3>

                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>
                    @csrf @method('POST')
                    <div class="form-body">


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                        <label for="inputname">Nombre</label>
                                        <input class="form-control" name="nombre" id="inputname" required>

                                    </div>

                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Apellido Paterno</label>
                                        <input class="form-control" name="apellidoP" required>
                                    </div>
                                    <span class="help-block" id="error"></span>
                                </div>
                            </div>



                            <div class="form-group col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Apellido Materno</label>
                                        <input class="form-control" name="apellidoM" required>
                                    </div>
                                    <span class="help-block" id="error"></span>
                                </div>
                            </div>

                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Usuario</label>
                                        <input class="form-control" name="usuario" required>
                                    </div>
                                    <span class="help-block" id="error"></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Password</label>
                                        <input class="form-control" name="password" type="password" required>
                                    </div>
                                    <span class="help-block" id="error"></span>
                                </div>
                            </div>

                        </div>



                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control" id="Tipo" name="tipo" required>
                             <option value="1">Vendedor</option>
                            <option value="2">Comprador</option>
                            </select>
                        </div>


                        <input value="1" type="hidden" name="estado">

                        <div class="form-group">
                            <div class="input-group">
                                <label>Foto</label>
                                <input class="form-control" type="text" name="foto" required>
                            </div>
                            <span class="help-block" id="error"></span>
                        </div>

                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-info" id="botonEnviar">
                            <span class="glyphicon glyphicon-log-in"></span> Registrar !
                            </button> {{-- <input type="submit" name="enviar" value="Enviar"> --}}
                    </div>


            </form>
            </div>
        </div>
</body>

</html>