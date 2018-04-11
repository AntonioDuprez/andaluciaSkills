<?php

    class DB{
        public static function conectar($nameBD){
            try{
                $conexion = new PDO("mysql:host=localhost;dbname=$nameBD", 'root', '', array(PDO::ATTR_PERSISTENT => true));
            }catch(Exception $e){
                echo "Error ".  $e->getCode() . ": No se ha podido establecer la conexión";
            }
            return $conexion;
        }
    }