<?php
    class AUTOLOAD{
        public static function AutoLoad() {
            spl_autoload_register('autocargador');
        }

    }

    function autocargador($Clase){
        if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/ENTITYS" . "/" . $Clase .".php")) {
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/ENTITYS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/APIS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/APIS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/CSS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/CSS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/FORMS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/FORMS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/HELPERS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/HELPERS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/HTML" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/HTML" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/IMAGES" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/IMAGES" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/JS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/JS" . "/" . $Clase .".php";
        } else if (file_exists($_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/REPOSITORTYS" . "/" . $Clase .".php")){
            require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto-pantallas/REPOSITORTYS" . "/" . $Clase .".php";
        }
    }

    AUTOLOAD::AutoLoad();


    
?>