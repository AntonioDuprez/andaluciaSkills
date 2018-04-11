<?php
    class Usuario{
        private $conexion;
        public $usuario;
        public $tabla = "";

        public function __construct(){
            require_once("connect.php");
            $this->conexion = DB::conectar("clinican");
            $this->usuario = array();
        }

        function comprobarCredencialesPorUsuario($usuario, $password){
            $passwordCifrada = md5($password);
            $encontrado = false;
            $consultaAdmin = $this->conexion->query("select * from administrador where 
                usuario='$usuario' and password='$passwordCifrada'");
            $consultaVet = $this->conexion->query("select * from veterinarios where 
                usuario='$usuario' and password='$passwordCifrada'");

            if(!empty($consultaAdmin) && ($this->usuario = $consultaAdmin->fetch(PDO::FETCH_ASSOC))){
                $this->tabla = "administrador";
                $encontrado = true;
            }else if (!empty($consultaVet) && ($this->usuario = $consultaVet->fetch(PDO::FETCH_ASSOC))){
                $this->tabla = "veterinario";
                $encontrado = true;
            }
            return $encontrado;
        }

        function comprobarCredencialesPorCliente($dni, $password){
            $passwordCifrada = md5($password);
            $encontrado = false;
            $consultaCli = $this->conexion->query("select * from clientes where dni='$dni' 
                and password='$passwordCifrada'");
            if(!empty($consultaCli) && ($this->usuario = $consultaCli->fetch(PDO::FETCH_ASSOC))){
                $this->tabla = "cliente";
                $encontrado = true;
            }
            return $encontrado;
        }

    }