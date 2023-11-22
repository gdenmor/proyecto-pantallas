<?php
    require_once "../HELPERS/AUTOLOAD.php";
    if (isset($_GET['pantalla'])){
        $perfil=$_GET['pantalla'];
        if ($perfil== ''){
            echo "Debe de introducir el perfil";
        }else{
            if ($perfil=="alumno"){
                $user=PERFIL_REPOSITORY::FindByID2($perfil);
                SESSION::iniciaSesion('USER',$user,"http://localhost/proyecto-pantallas/pantallas.php?pantalla=alumno");
            }else if ($perfil=="profesor"){
                $user=PERFIL_REPOSITORY::FindByID2($perfil);
                SESSION::iniciaSesion('USER',$user,"http://localhost/proyecto-pantallas/pantallas.php?pantalla=profesor");
            }else{
                echo "Error";
            }
        }
    }else{
        echo "Debe de introducir el perfil";
    }
?>