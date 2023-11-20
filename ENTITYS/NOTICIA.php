<?php
    class NOTICIA{
        //PROPIEDADES
        private $id;
        private $tipo;
        private $url;
        private $formato;
        private $contenido;
        private $duracion;
        private $perfil;
        private $prioridad;

        //GETTERS Y SETTERS
        public function getId(){return $this->id;}
        public function getTipo(){return $this->tipo;}
        public function getUrl(){return $this->url;}
        public function getFormato(){return $this->formato;}
        public function getcontenido(){return $this->contenido;}
        public function getPrioridad(){return $this->prioridad;}
        public function getDuracion(){return $this->duracion;}
        public function getPerfil(){return $this->perfil;}
        public function setId($id){$this->id=$id;}
        public function setTipo($tipo){$this->tipo=$tipo;}
        public function setUrl($url){$this->url=$url;}
        public function setFormato($formato){$this->formato=$formato;}
        public function setContenido($contenido){$this->contenido=$contenido;}
        public function setPrioridad($prioridad){$this->prioridad=$prioridad;}
        public function setDuracion($duracion){return $this->duracion=$duracion;}
        public function setPerfil($perfil){$this->perfil=$perfil;}
    }



?>