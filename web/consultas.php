<?php
   session_start();
   if($_SESSION["usuario"]){
       require_once("../app/Usuario.php");
       $nombreUsuario = $_SESSION["usuario"];
       $usuario = new Usuario();
       $usuario->get_by_usuario("veterinarios", $nombreUsuario);

      
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
    <?php if(isset($nombreUsuario) && isset($_GET["chip"])){
            $chip = $_GET["chip"];
            require_once("../app/Perro.php");
            $perro = new Perro();
            $perro->get_by_chip($chip);
            $consulta_datos = $perro->consultarDatosPerro();
            $array_datos_perro = $consulta_datos->fetchAll();
    ?>
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
                                <a href="" class="menuBread">Veterinario</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Consulta
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <?php if(!empty($array_datos_perro)){ ?>
                <div class="row">
                <div class="col-12 col-md-10 col-xl-4 offset-1">
                                <form>
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" aria-describedby="nombre" value="<?= $array_datos_perro[0]["0"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="dni">Dni:</label>
                                        <input type="text" class="form-control" id="dni" aria-describedby="dni" value="<?= $array_datos_perro[0]["dni"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" class="form-control" id="telefono" aria-describedby="telefono" value="<?= $array_datos_perro[0]["telefono"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="chip">Chip</label>
                                        <input type="text" class="form-control" id="chip" aria-describedby="chip" value="<?= $array_datos_perro[0]["chip"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombrePerro">Nombre</label>
                                        <input type="text" class="form-control" id="nombrePerro" aria-describedby="nombrePerro" value="<?= $array_datos_perro[0]["nombre"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="raza">Raza</label>
                                        <input type="text" class="form-control" id="raza" aria-describedby="raza" value="<?= $array_datos_perro[0]["raza"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea class="form-control" id="observaciones" aria-describedby="observaciones"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="importe">Importe</label>
                                        <input type="text" class="form-control" id="importe" aria-describedby="importe" pattern="^[0-9]+(.[0-9]{2})?$" required>
                                    </div>

                                    <button type="submit" class="btn btn-outline-dark">Guardar</button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalLong">
                                        Ver historial
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Historial</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php 
                                                        $consulta_perro = $perro->mostrarConsultas($chip);
                                                        $array_datos_consulta_perro = $consulta_perro->fetchAll();
                                                        if(!empty($array_datos_consulta_perro)){
                                                            foreach ($array_datos_consulta_perro as $dato) {
                                                                echo "<h3>Registro</h3>";
                                                                echo "Chip: " . $dato["chip"] ."<br>";
                                                                echo "Nombre: " . $dato["veterinario"] ."<br>";
                                                                echo "Chip: " . $dato["importe"] ."<br><br>";
                                                            }
                                                        }else{
                                                    ?>
                                                        No existen datos de este historial
                                                    <?php    } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                </div>
                <?php }?>
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
</body>

</html>