<?php
   session_start();
   if($_SESSION["usuario"]){
       require_once("Usuario.php");
       $nombreUsuario = $_SESSION["usuario"];
       $usuario = new Usuario();
       $usuario->get_by_usuario("veterinarios", $nombreUsuario);
   }else{
       header('Location: login.html');
   }