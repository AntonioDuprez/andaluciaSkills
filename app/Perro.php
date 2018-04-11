<?php
    class Perro{
        private $conexion;
        public $perro;
        public $tabla = "";

        public function __construct(){
            require_once("connect.php");
            $this->conexion = DB::conectar("clinican");
            $this->usuario = array();
        }

        function mostrarConsultas($chip){
            /*$consulta = $this->conexion->query("SELECT p.chip, p.nombre, p.raza, c.nombre, c.dni, c.telefono
                FROM perros p, clientes c WHERE p.chip='$chip' and c.dni=p.dueno");*/
            $consulta = $this->conexion->query("SELECT co.chip, co.veterinario, co.importe
                FROM consultas co WHERE co.chip='$chip'");
            return $consulta;
        }

        function get_by_chip($chip){
            $consulta = $this->conexion->query("select * from perros where chip='$chip'");
            $this->perro = $consulta->fetch(PDO::FETCH_ASSOC);
            return $this->perro;
        }

        function consultarDatosPerro(){
            $consulta = $this->conexion->query("select c.nombre, c.dni, c.telefono, p.chip, p.nombre, p.raza from perros p, clientes c
                where p.dueno=c.dni and p.chip='".$this->perro["chip"]."'");
            return $consulta;
        }

    }