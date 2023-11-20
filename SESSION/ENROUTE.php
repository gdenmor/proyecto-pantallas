<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once '../Autoescuela/FORMS/LOGIN.php';
    }else if ($_GET['menu'] == "olvida_contraseña") {
        require_once '../Autoescuela/FORMS/FORGOT_PASSWORD.php';
    }else if ($_GET['menu'] == "profesor") {
        require_once '../Autoescuela/FORMS/TEACHER_ROL.php';
     
    }else if ($_GET['menu'] == "alumno") {
        require_once '../Autoescuela/FORMS/ALUMN_ROL.php';
     
    }else if ($_GET['menu'] == "admin") {
        require_once '../Autoescuela/FORMS/ADMIN_ROL.php';
     
    }else if ($_GET['menu']=="crea"){
        require_once "../Autoescuela/FORMS/CREAUSUARIOS.php";
    }else if ($_GET['menu']=="borra"){
        require_once "../Autoescuela/FORMS/BORRAUSUARIOS.php";
    }else if ($_GET['menu']=="examen"){
        require_once "../Autoescuela/FORMS/EXAMEN.php";
    }else if ($_GET['menu']=="visualizacion"){
        require_once "../Autoescuela/FORMS/VISUALIZA_EXAMEN.php";
    }else if ($_GET['menu']=="practica"){
        require_once "../Autoescuela/FORMS/PRACTICAEXAMEN.php";
    }else if ($_GET['menu']=="preguntas"){
        require_once "../Autoescuela/FORMS/CREA_PREGUNTAS.php";
    }else if ($_GET['menu']=="creaexamen"){
        require_once "../Autoescuela/FORMS/CREAR_EXAMEN.php";
    }else if ($_GET['menu']=="pila"){
        require_once "../Autoescuela/FORMS/CREA_EXAMEN_CON_PILA.php";
    }else{
        SESSION::Cerrar_Sesion();
    }


}

    

    
