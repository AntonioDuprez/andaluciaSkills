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
                $this->tabla = "veterinarios";
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
                $this->tabla = "clientes";
                $encontrado = true;
            }
            return $encontrado;
        }

        function get_by_usuario($tabla, $nombreUsuario){
            $consulta = $this->conexion->query("select * from $tabla where usuario='$nombreUsuario'");
            $this->usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            return $this->usuario;
        }
        function get_by_usuario2($tabla, $nombreUsuario){
            $consulta = $this->conexion->query("select * from $tabla where dni='$nombreUsuario'");
            $this->usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            return $this->usuario;
        }
        function comprobarVisitas(){
            // select c.nombre, p.raza  from visitas v, clientes c, perros p
            // where c.dni=v.cliente and c.dni=p.dueño and v.atendida='0' limit 1
            $consulta = $this->conexion->query("select c.nombre, c.dni, c.telefono, v.direccion  from visitas v, clientes c
                where c.dni=v.cliente and v.atendida='0' order by fecha DESC, hora DESC limit 1");
            return $consulta;    
        }

        function mostrarSusPerros($dniCliente){
            // select p.chip, p.nombre, p.raza from perros p
            // where p.dueño='11111111A'
            $consulta = $this->conexion->query("select p.chip, p.nombre, p.raza from perros p
                where p.dueno='$dniCliente'");
            return $consulta;
        }

        function cambiarContrasena($pass1, $pass2){
            $ok = false;
            if($pass1 == $pass2){
                $this->conexion->exec("UPDATE veterinarios
                    SET password = '".md5($pass1)."' WHERE usuario='".$this->usuario["usuario"]."'");
                $ok = true;
            }
            return $ok;
        }

        function cambiarContrasena2($pass1, $pass2){
            $ok = false;
            if($pass1 == $pass2){
                $this->conexion->exec("UPDATE clientes
                    SET password = '".md5($pass1)."' WHERE dni='".$this->usuario["dni"]."'");
                $ok = true;
            }
            return $ok;
        }
    }