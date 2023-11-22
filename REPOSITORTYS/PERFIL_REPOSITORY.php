<?php
    class PERFIL_REPOSITORY{
        public static function FindByID($Perfil){
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->prepare("SELECT * FROM PERFIL WHERE id=:id");
            $resultado->bindParam(':id', $Perfil, PDO::PARAM_STR);
            $resultado->execute();
        
            $perfil = null;
        
            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $nombre=$tuplas->nombre;
                $perfil=new PERFIL($id,$nombre);
            }
        
            return $perfil;
        }
        public static function FindByID2($Perfil){
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->prepare("SELECT * FROM PERFIL WHERE nombre=:nombreperfil");
            $resultado->bindParam(':nombreperfil', $Perfil, PDO::PARAM_INT);
            $resultado->execute();
        
            $perfil = null;
        
            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $nombre=$tuplas->nombre;
                $perfil=new PERFIL($id,$nombre);
            }
        
            return $perfil;
        }
    }


?>