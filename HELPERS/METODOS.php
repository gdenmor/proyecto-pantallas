<?php
    class METODOS{
        public static function esFormatoFechaValido($fechaString) {
            $formato = 'Y-m-d H:i:s';
            $fecha = DateTime::createFromFormat($formato, $fechaString);
            return $fecha && $fecha->format($formato) === $fechaString;
        }
    }

?>