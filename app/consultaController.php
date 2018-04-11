<?php
   session_start();
   if($_SESSION["usuario"]){
       require_once("Perro.php");
       $nombreUsuario = $_SESSION["usuario"];
       if(isset($_POST) && isset($_POST["chip"])){
        $perro = new Perro();
        $chip = $_POST["chip"];
        $perro->mostrarConsultas($chip);
       }else{
           header('Location: ../web/veterinario.php');
       }
       
       
   }else{
       header('Location: ../web/login.html');
   }