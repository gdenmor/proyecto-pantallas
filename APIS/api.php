<?php
    require_once "../HELPERS/AUTOLOAD.php";
    if ($_SERVER['REQUEST_METHOD']=="GET"&&SESSION::estaLogueado('USER')){
        $id=$_GET['id'];
        if ($id!= ''){
            $Noticia=NOTICIA_REPOSITORY::FindBy($id);
            if ($Noticia!==null){
                $Not=$Noticia->toJSON();
                http_response_code(200);
                echo $Not;
            }else{
                http_response_code(400);
            }
        }else{
            http_response_code(500);
        }
    }else

    if ($_SERVER['REQUEST_METHOD'] == "PUT"&&SESSION::estaLogueado('USER')) {
        $id = $_GET['id'];
        if ($id!== ''){
            $cuerpo = file_get_contents("php://input");
            $Noticia=json_decode($cuerpo);
            $perfil=$Noticia->perfil;
            $perfill=PERFIL_REPOSITORY::FindByID2($perfil);
            $fechai=new DateTime($Noticia->fechainicio);
            $fechaf=new DateTime($Noticia->fechafin);
            $diff=$fechai->diff($fechaf);
            $dias=$diff->days;
            $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;

            $noticia = new Noticia(
                null,
                $Noticia->fechainicio,
                $Noticia->fechafin,
                $duracion,
                $Noticia->prioridad,
                $Noticia->titulo,
                $perfill,
                $Noticia->tipo,
                $Noticia->contenido,
                $Noticia->url,
                $Noticia->formato
            );
            NOTICIA_REPOSITORY::UpdateById($id,$noticia);
            http_response_code(200);
        }else{
            http_response_code(400);
        }
    }else
    

    if ($_SERVER['REQUEST_METHOD']=="DELETE"){
        $id=$_GET['id'];
        if ($id!=""){
            try{
                NOTICIA_REPOSITORY::DeleteById($id);
                http_response_code(200);
            }catch (PDOException $e){
                http_response_code(400);
                echo "El id no existe";
            }
        }else{
            http_response_code(500);
        }
    }else

    if ($_SERVER['REQUEST_METHOD']=="POST"&&SESSION::estaLogueado('USER')){
            $cuerpo = file_get_contents("php://input");
            $Noticia=json_decode($cuerpo);
            $perfil=$Noticia->perfil;
            $perfill=PERFIL_REPOSITORY::FindByID2($perfil);
            $fechai=new DateTime($Noticia->fechainicio);
            $fechaf=new DateTime($Noticia->fechafin);
            $diff=$fechai->diff($fechaf);
            $dias=$diff->days;
            $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;

            $noticia = new Noticia(
                null,
                $Noticia->fechainicio,
                $Noticia->fechafin,
                $duracion,
                $Noticia->prioridad,
                $Noticia->titulo,
                $perfill,
                $Noticia->tipo,
                $Noticia->contenido,
                $Noticia->url,
                $Noticia->formato
            );
            try{
                NOTICIA_REPOSITORY::Insert($noticia);
                http_response_code(200);
            }catch (Exception $e){
                $e."".$e->getMessage();
                http_response_code(500);
            }

    }else{
        echo "No está logueado";
    }



?>