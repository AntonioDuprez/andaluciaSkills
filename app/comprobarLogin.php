<?php
    session_start();
    if(isset($_POST) && !empty($_POST) && isset($_POST["usuario"]) && isset($_POST["password"])){
        $usuarioIntroducido = $_POST["usuario"];
        $claveIntroducida = $_POST["password"];

        require_once('Usuario.php');
        $usuario = new Usuario();
        if($usuario->comprobarCredencialesPorUsuario($usuarioIntroducido, $claveIntroducida)){
            // Creo la sesión del usuario y redirijo
            $_SESSION["usuario"] = $usuario->usuario["usuario"];
            if($usuario->tabla == "administrador")
                header('Location: ../web/administrador.php');
            else 
                header('Location: ../web/veterinario.php');

        }else if($usuario->comprobarCredencialesPorCliente($usuarioIntroducido, $claveIntroducida)){
            // Creo la sesión del usuario y redirijo
            $_SESSION["usuario"] = $usuario->usuario["dni"];
            header('Location: ../web/cliente.php');
        }else{
            echo "no existe";
        }
    }