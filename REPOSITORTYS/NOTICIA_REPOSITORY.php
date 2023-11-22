<?php
    AUTOLOAD::AutoLoad();

    class NOTICIA_REPOSITORY{
        public static function FindAll(){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->prepare("SELECT * from NOTICIAS");
            $resultado->execute();

            $idDificultad=null;

            $array=null;

            $i=0;

            $nombre="";


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $fechainicio=$tuplas->fechainicio;
                $fechafin=$tuplas->fechafin;
                $duracion=$tuplas->duracion;
                $prioridad=$tuplas->prioridad;
                $titulo=$tuplas->titulo;
                $id_perfil=$tuplas->id_perfil;
                $perfil=PERFIL_REPOSITORY::FindByID($id_perfil);
                $tipo=$tuplas->tipo;
                $contenido=$tuplas->contenido;
                $url=$tuplas->url;
                $formato=$tuplas->formato;
                $Noticia=new NOTICIA($id,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfil,$tipo,$contenido,$url,$formato);
                $array[$i] = $Noticia;
                $i++;
            }

            

            return $array;
        }

        public static function FindPerfil($perfil){
            $conexion=CONEXION::AbreConexion();
            $resultado=$conexion->prepare("SELECT N.* from NOTICIAS N inner join PERFIL p on p.id=N.id_perfil where p.nombre=:nombre or p.nombre='TODOS'");
            $resultado->bindParam(":nombre",$perfil,PDO::PARAM_STR);
            $resultado->execute();

            $idDificultad=null;

            $array=null;

            $i=0;

            $nombre="";


            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $fechainicio=$tuplas->fechainicio;
                $fechafin=$tuplas->fechafin;
                $duracion=$tuplas->duracion;
                $prioridad=$tuplas->prioridad;
                $titulo=$tuplas->titulo;
                $id_perfil=$tuplas->id_perfil;
                $perfil=PERFIL_REPOSITORY::FindByID2($id_perfil);
                $tipo=$tuplas->tipo;
                $contenido=$tuplas->contenido;
                $url=$tuplas->url;
                $formato=$tuplas->formato;
                $Noticia=new NOTICIA($id,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfil,$tipo,$contenido,$url,$formato);
                $array[$i] = $Noticia;
                $i++;
            }

            

            return $array;
        }
        public static function DeleteById($idNoticia){
            $conexion=CONEXION::AbreConexion();

            $resultado=$conexion->prepare("DELETE from NOTICIAS where id=:idNoticia");
            $resultado->bindParam(":idNoticia",$idNoticia,PDO::PARAM_INT);
            $resultado->execute();
            $filas=$resultado->rowCount();

            if ($filas==0){
                echo "Ninguna fue borrada";
            }else{
                echo $filas." "."filas borradas con éxito";
            }

            $success=$resultado->execute();

            
        }

        public static function UpdateById($idNoticia,$objeto){
            $conexion=CONEXION::AbreConexion();
            $fechainicio=$objeto->getFechainicio();
            $fechafin=$objeto->getFechaFin();
            $duracion=$objeto->getDuracion();
            $prioridad=$objeto->getPrioridad();
            $titulo=$objeto->getTitulo();
            $id_perfil=$objeto->getPerfil()->getId();
            $tipo=$objeto->getTipo();
            $contenido=$objeto->getcontenido();
            $url=$objeto->getUrl();
            $formato=$objeto->getFormato();


            $resultado=$conexion->prepare("UPDATE NOTICIAS SET fechainicio=:fechainicio, fechafin=:fechafin, duracion=:duracion, prioridad=:prioridad,titulo=:titulo,id_perfil=:id_perfil,tipo=:tipo,contenido=:contenido,url=:url,formato=:formato where id=:id");
            $resultado->bindParam(":fechainicio",$fechainicio,PDO::PARAM_STR);
            $resultado->bindParam(":fechafin",$fechafin,PDO::PARAM_STR);
            $resultado->bindParam(":duracion",$duracion,PDO::PARAM_INT);
            $resultado->bindParam(":prioridad",$prioridad,PDO::PARAM_STR);
            $resultado->bindParam(":titulo",$titulo,PDO::PARAM_STR);
            $resultado->bindParam(":id_perfil",$id_perfil,PDO::PARAM_INT);
            $resultado->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $resultado->bindParam(":contenido",$contenido,PDO::PARAM_STR);
            $resultado->bindParam(":url",$url,PDO::PARAM_STR);
            $resultado->bindParam(":formato",$formato,PDO::PARAM_STR);
            $resultado->bindParam(":id",$idNoticia,PDO::PARAM_INT);

            $resultado->execute();
            
        }

        public static function Insert($objeto){
            $conexion=CONEXION::AbreConexion();
            $fechainicio=$objeto->getFechainicio();
            $fechafin=$objeto->getFechaFin();
            $duracion=$objeto->getDuracion();
            $prioridad=$objeto->getPrioridad();
            $titulo=$objeto->getTitulo();
            $id_perfil=$objeto->getPerfil()->getId();
            $tipo=$objeto->getTipo();
            $contenido=$objeto->getcontenido();
            $url=$objeto->getUrl();
            $formato=$objeto->getFormato();


            $resultado=$conexion->prepare("INSERT INTO NOTICIAS (fechainicio,fechafin,duracion,prioridad,titulo,id_perfil,tipo,contenido,url,formato) VALUES (:fechainicio,:fechafin,:duracion,:prioridad,:titulo,:id_perfil,:tipo, :contenido,:url,:formato)");
            $resultado->bindParam(":fechainicio",$fechainicio,PDO::PARAM_STR);
            $resultado->bindParam(":fechafin",$fechafin,PDO::PARAM_STR);
            $resultado->bindParam(":duracion",$duracion,PDO::PARAM_INT);
            $resultado->bindParam(":prioridad",$prioridad,PDO::PARAM_STR);
            $resultado->bindParam(":titulo",$titulo,PDO::PARAM_STR);
            $resultado->bindParam(":id_perfil",$id_perfil,PDO::PARAM_INT);
            $resultado->bindParam(":tipo",$tipo,PDO::PARAM_STR);
            $resultado->bindParam(":contenido",$contenido,PDO::PARAM_STR);
            $resultado->bindParam(":url",$url,PDO::PARAM_STR);
            $resultado->bindParam(":formato",$formato,PDO::PARAM_STR);

            $resultado->execute();

            
        }

        public static function FindBy($idNoticia) {
            $conexion = CONEXION::AbreConexion();
            $resultado = $conexion->prepare("SELECT * FROM NOTICIAS WHERE id=:idNoticia");
            $resultado->bindParam(':idNoticia', $idNoticia, PDO::PARAM_INT);
            $resultado->execute();
        
            $Noticia = null;
        
            while ($tuplas=$resultado->fetch(PDO::FETCH_OBJ)) {
                $id=$tuplas->id;
                $fechainicio=$tuplas->fechainicio;
                $fechafin=$tuplas->fechafin;
                $duracion=$tuplas->duracion;
                $prioridad=$tuplas->prioridad;
                $titulo=$tuplas->titulo;
                $id_perfil=$tuplas->id_perfil;
                $perfil=PERFIL_REPOSITORY::FindByID2($id_perfil);
                $tipo=$tuplas->tipo;
                $contenido=$tuplas->contenido;
                $url=$tuplas->url;
                $formato=$tuplas->formato;
                $Noticia=new NOTICIA($id,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfil,$tipo,$contenido,$url,$formato);
            }
        
            return $Noticia;
        }
    }
?>