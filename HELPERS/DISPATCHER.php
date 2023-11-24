<?php
    class DISPATCHER{
        private static $puntero=0;
        public static function next(){
            //ir sacando la noticia siguiente
            NOTICIA_REPOSITORY::FindBy(self::$puntero);
            self::$puntero++;
        }

        public static function generate(){
            //saca las ids de la tabla y dependiendo la prioridad las replica y genero otro array recorriendo el de la bd
            $array=NOTICIA_REPOSITORY::GeneraID();
            $arrayGenerado=[];
            for ($i= 0;$i<count($array);$i++){
                $elemento=$array[$i];
                for ($j= 0;$j<count($elemento);$j++){
                    if ($elemento[$j]==1){
                        $prioridad=$elemento[$j];
                        if ($prioridad==1){
                            $arrayGenerado[]=$elemento[0];
                        }else if ($prioridad==2){
                            for ($i=0;$i<$prioridad;$i++){
                                $arrayGenerado[]=$elemento[0];
                            }
                        }else if ($prioridad==3){
                            for ($i=0;$i<$prioridad;$i++){
                                $arrayGenerado[]=$elemento[0];
                            }
                        }
                    }
                }
            }

            return $arrayGenerado;
        }

        public static function barajar($array){
            shuffle($array);
            return $array;
        }
    }



?>