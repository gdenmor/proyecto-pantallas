<?php
    require_once "HELPERS/AUTOLOAD.php";
    if ($_SERVER["REQUEST_METHOD"]=="GET"){
        if (isset($_GET['pantalla'])){
            $perfil=$_GET['pantalla'];
            if ($perfil== ''){
                echo "Debe de introducir el perfil";
            }else{
                if ($perfil=="alumno"){
                    $user=PERFIL_REPOSITORY::FindByID2(strtoupper($perfil));
                    SESSION::iniciaSesion('PANTALLA',$user,"http://localhost/proyecto-pantallas/FORMS/muestrapantalla.php?pantalla=alumno");
                }else if ($perfil=="profesor"){
                    $user=PERFIL_REPOSITORY::FindByID2($perfil);
                    SESSION::iniciaSesion('PANTALLA',$user,"http://localhost/proyecto-pantallas/FORMS/muestrapantalla.php?pantalla=profesor");
                }else{
                    echo "Error";
                }
            }
        }else{
            echo "Error";
        }
    }
?>