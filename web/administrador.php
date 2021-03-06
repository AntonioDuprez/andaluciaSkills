<?php 
    session_start();
    if($_SESSION["usuario"]){
        $nombreUsuario = $_SESSION["usuario"];
    }else{
        header('Location: login.html');
    }
?>
<html>

<head>
    <!-- metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS Styling Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <!-- Scripting link (Jquery, Angular, bootstrap script, etc) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
        crossorigin="anonymous">//This is a jquery script
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- Font Awesome Script-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>

</head>

<body>
    <?php if(isset($nombreUsuario)){ ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs">
                    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
                        <div class="container">
                            <a class="navbar-brand js-scroll-trigger menuLink" href="#page-top">Clinican</a>
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger menuLink" href="perros.html">Gestionar perros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger menuLink" href="nuevoPerro.html">Nuevo perro</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger menuLink" href="historial.html">Historial</a>
                                    </li>
                                    <li>
                                        <a class="nav-link menuLink" href="configuracion.html">Configuración</a>
                                        <i class="fas fa-cog"></i>
                                    </li>
                                    <li>
                                        <a class="nav-link menuLink"><?= $nombreUsuario ?></a>
                                    </li>
                                    <li>
                                        <a href="" class="nav-link menuLink">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="cuerpo">
                <div class="row">
                    <div class="col-10 offset-1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="" class="menuBread">Inicio</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Administración
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10 offset-1" id="tabs">
                        <ul>
                            <li>
                                <a href="#tabs-1">Veterinarios</a>
                            </li>
                            <li>
                                <a href="#tabs-2">Clientes</a>
                            </li>
                            <li>
                                <a href="#tabs-3">Configuración</a>
                            </li>
                        </ul>
                        <div id="tabs-1">
                            <div class="row">
                                <div class="col-10 offset-1">
                                    <form class="form-inline">
                                        <div class="form-group mb-2">
                                            <label for="usuario" class="sr-only">Usuario</label>
                                            <span class="mr-2">Usuario:</span>
                                            <input type="text" class="form-control" id="usuario">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="nombre" class="sr-only">Nombre</label>
                                            <span class="mr-2">Nombre:</span>
                                            <input type="password" class="form-control" id="nombre">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="apellidos" class="sr-only">Apellidos</label>
                                            <span class="mr-2">Apellidos:</span>
                                            <input type="password" class="form-control" id="apellidos">
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark mb-2 mr-2">Buscar</button>
                                        <a href="perros.html" class="btn btn-outline-dark mb-2">Todos</a>
                                    </form>
                                </div>
                                <div class="col-10 col-md-10">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">24 horas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>72378318</td>
                                                <td>Si</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="row">
                                <div class="col-10">
                                    <form class="form-inline" id="formularioCliente">
                                        <div class="form-group mb-2">
                                            <label for="dni" class="sr-only">DNI</label>
                                            <span class="mr-2">DNI:</span>
                                            <input type="text" class="form-control" id="dni" placeholder="XXXXXXXX-A" pattern="^[0-9]{8}[A-Za-z]{1}$" required>
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="nombreCliente" class="sr-only">Nombre</label>
                                            <span class="mr-2">Nombre:</span>
                                            <input type="text" class="form-control" id="nombreCliente" placeholder="Pepe" pattern="^[a-zA-Z]+$" required>
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="checkbox" class="form-control">
                                            <span class="ml-2">Deuda</span>
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark mb-2 mr-2" id="buscar">Buscar</button>
                                        <a href="perros.html" class="btn btn-outline-dark mb-2" id="todos">Todos</a>
                                    </form>
                                </div>
                                <div class="col-10 col-md-10 ">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">Deuda</th>
                                                <th scope="col">Nº Perros</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 col-md-10 mt-4">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="nuevoPerro.html" class="btn btn-outline-dark mb-2 mr-2">Añadir</a>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-dark mb-2">Modificar</button>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-dark mb-2 mr-2">Gestionar perros</button>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-outline-dark mb-2">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tabs-3">
                            <div class="row">
                                <div class="col-12 col-md-10 col-xl-4">
                                    <form>
                                        <div class="form-group">
                                            <label for="newPass">Nueva contraseña</label>
                                            <input type="password" class="form-control" id="newPass" aria-describedby="emailHelp" placeholder="******">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPass2">Repetir contraseña</label>
                                            <input type="password" class="form-control" id="newPass2" placeholder="******">
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark">Cambiar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col mt-5 pie">
                        <footer id="contact">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 ml-auto text-center">
                                        <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
                                        <p>622 64 01 46</p>
                                    </div>
                                    <div class="col-lg-4 mr-auto text-center">
                                        <a href="">
                                            <i class="fab fa-twitter fa-3x mb-3 sr-contact"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-youtube fa-3x mb-3 sr-contact"></i>
                                        </a>
                                        <a href="">
                                            <i class="fab fa-facebook fa-3x mb-3 sr-contact"></i>
                                        </a>
                                        <p>
                                            <a href="avisoLegal.php">Aviso legal</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    <?php }else{
        header('Location: login.html');
    } ?>
    <script src="js/dniController.js"></script>
</body>

</html>