<?php
    require_once "../HELPERS/AUTOLOAD.php";
    if ($_SERVER['REQUEST_METHOD']=="GET"){
        $id=$_GET['id'];
        if ($id!= ''){
            $Noticia=NOTICIA_REPOSITORY::FindBy($id);
            $Not=$Noticia->toJSON();
            http_response_code(200);
            echo $Not;
        }else{
            http_response_code(400);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "PUT") {
        $id = $_GET['id'];
        parse_str(file_get_contents("php://input"), $put_data);

        // Verificar los datos del formulario sin usar htmlspecialchars
        $tipo = isset($put_data['tipo']) ? $put_data['tipo'] : null;
        $url = isset($put_data['url']) ? $put_data['url'] : null;
        $formato = isset($put_data['formato']) ? $put_data['formato'] : null;
        $contenido = isset($put_data['contenido']) ? $put_data['contenido'] : null;
        $fechainicio = isset($put_data['fechainicio']) ? $put_data['fechainicio'] : null;
        $fechafin = isset($put_data['fechafin']) ? $put_data['fechafin'] : null;
        $perfil = isset($put_data['perfil']) ? $put_data['perfil'] : null;
        $prioridad = isset($put_data['prioridad']) ? $put_data['prioridad'] : null;
        $titulo = isset($put_data['titulo']) ? $put_data['titulo'] : null;

        // Validar fechas
        if (!$fechainicio || !$fechafin) {
            http_response_code(400);
            echo "Error: Las fechas son obligatorias.";
            exit;   
        }

        $fechaInicio = new DateTime($fechainicio);
        $fechaFin = new DateTime($fechafin);
        $duracion = $fechaFin->getTimestamp() - $fechaInicio->getTimestamp();

        // Crear un objeto para trabajar con los datos
        $objeto = new stdClass();
        $objeto->tipo = $tipo;
        $objeto->url = $url;
        $objeto->formato = $formato;
        $objeto->contenido = $contenido;
        $objeto->fechainicio = $fechainicio;
        $objeto->fechafin = $fechafin;
        $objeto->perfil = $perfil;
        $objeto->prioridad = $prioridad;
        $objeto->duracion = $duracion;
        $objeto->titulo = $titulo;

        // Actualizar en la base de datos
        try {
            // Asumiendo que hay un método de actualización en tu repositorio
            //NOTICIA_REPOSITORY::UpdateByIdAPI($id,$objeto);
            http_response_code(200);
            echo "Actualizado correctamente";
        } catch (Exception $e) {
            http_response_code(500);
            echo "Error en la actualización: " . $e->getMessage();
        }
    }
    

    if ($_SERVER['REQUEST_METHOD']=="DELETE"){
        $id=$_GET['id'];
        if ($id!=""){
            NOTICIA_REPOSITORY::DeleteById($id);
            http_response_code(200);
        }else{
            http_response_code(400);
        }
    }

    if ($_SERVER['REQUEST_METHOD']=="POST"){
        

    }



?>