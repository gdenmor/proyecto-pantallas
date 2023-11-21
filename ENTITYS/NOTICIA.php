<?php
    class NOTICIA implements \JsonSerializable{
        //PROPIEDADES
        private $id;
        private $fechainicio;
        private $fechafin;
        private $duracion;
        private $prioridad;
        private $titulo;
        private $perfil;
        private $tipo;
        private $contenido;
        private $url;
        private $formato;

        public function __construct($id, $fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfil,$tipo, $contenido,$url, $formato) {
            $this->id = $id;
            $this->tipo = $tipo;
            $this->url = $url;
            $this->formato = $formato;
            $this->contenido = $contenido;
            $this->duracion = $duracion;
            $this->perfil = $perfil;
            $this->prioridad = $prioridad;
            $this->titulo = $titulo;
        }

        //GETTERS Y SETTERS
        public function getId(){return $this->id;}
        public function getFechainicio(){return $this->fechainicio;}
        public function getFechaFin(){return $this->fechafin;}
        public function getTipo(){return $this->tipo;}
        public function getUrl(){return $this->url;}
        public function getFormato(){return $this->formato;}
        public function getcontenido(){return $this->contenido;}
        public function getPrioridad(){return $this->prioridad;}
        public function getDuracion(){return $this->duracion;}
        public function getPerfil(){return $this->perfil;}
        public function getTitulo(){return $this->titulo;}
        public function setId($id){$this->id=$id;}
        public function setTipo($tipo){$this->tipo=$tipo;}
        public function setUrl($url){$this->url=$url;}
        public function setFormato($formato){$this->formato=$formato;}
        public function setContenido($contenido){$this->contenido=$contenido;}
        public function setPrioridad($prioridad){$this->prioridad=$prioridad;}
        public function setDuracion($duracion){return $this->duracion=$duracion;}
        public function setPerfil($perfil){$this->perfil=$perfil;}

        public function toJSON(){
            return json_encode(get_object_vars($this));
        }

        public function jsonSerialize(){
            $var=get_object_vars($this);
            return $var;
        }
    }



?>