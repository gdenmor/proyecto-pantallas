<?php
    class AUTOLOAD{
        public static function AutoLoad() {
            spl_autoload_register('autocargador');
        }

    }

    function autocargador($Clase){
        if (file_exists($_SERVER["DOCUMENT_ROOT"]."/AUTOESCUELA/ENTITYS" . "/" . $Clase .".php")) {
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/ENTITYS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/APIS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/APIS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/CSS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/CSS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/FORMS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/FORMS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/HELPERS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/HELPERS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/HTML" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/HTML" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/IMAGES" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/IMAGES" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/JS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/JS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/REPOSITORYS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/Proyecto-pantallas/REPOSITORYS" . "/" . $Clase .".php";
        }
    }

    AUTOLOAD::AutoLoad();


    
?>