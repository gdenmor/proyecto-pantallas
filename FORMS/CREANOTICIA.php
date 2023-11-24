<?php
    require_once "../HELPERS/AUTOLOAD.php";
    function validarFecha($fecha) {
        return strtotime($fecha) !== false;
    }
    $mensajeError="";
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $fechainicio=$_POST['fechainicio'];
        $fechafin=$_POST['fechafin'];
        $prioridad=isset($_POST['prioridad']) ? $_POST['prioridad'] : null;
        $titulo=$_POST['titulo'];
        $perfil=$_POST['perfil'];
        $tipo=$_POST['tipo'];
        if (!validarFecha($fechainicio)){
            $mensajeError="Fecha de inicio no válida";
        }else{
            if (!validarFecha($fechafin)){
                $mensajeError="Fecha de fin no válida";
            }else{
                if ($prioridad){
                    if (!empty($titulo)&&strlen($titulo)>0){
                        if (!empty($perfil)){
                            if (!empty($tipo)){
                                if ($tipo=="WEB"){
                                    $contenido=$_POST['contenido'];
                                    if (!empty($contenido)&&strlen($contenido)> 0){
                                        $fechaini=new DateTime($fechainicio);
                                        $fechaf=new DateTime($fechafin);
                                        $diff=$fechaf->diff($fechaini);
                                        $dias=$diff->days;
                                        //para calcularlo deberemos de tener en cuenta desde los dias e irlo pasando a segundos hasta
                                        //llegar a los segundos
                                        $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
                                        $perfilbd=PERFIL_REPOSITORY::FindByID($perfil);
                                        $noticia=new NOTICIA(null,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfilbd,$tipo,null,$ruta,null);
                                        NOTICIA_REPOSITORY::Insert($noticia);
                                    }else{
                                        $mensajeError="El contenido no puede estar vacío";
                                    }
                                }else if ($tipo=="FOTO"){
                                    $archivo=$_FILES['imagen']['name'];
                                    $ruta="../IMAGES/".$archivo;
                                    $temporal=$_FILES['imagen']['tmp_name'];
                                    if (!empty($archivo)){
                                        if (move_uploaded_file($temporal, $ruta)){
                                            $fechaini=new DateTime($fechainicio);
                                            $fechaf=new DateTime($fechafin);
                                            $diff=$fechaf->diff($fechaini);
                                            $dias=$diff->days;
                                            //para calcularlo deberemos de tener en cuenta desde los dias e irlo pasando a segundos hasta
                                            //llegar a los segundos
                                            $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
                                            $perfilbd=PERFIL_REPOSITORY::FindByID($perfil);
                                            $noticia=new NOTICIA(null,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfilbd,$tipo,null,$ruta,null);
                                            NOTICIA_REPOSITORY::Insert($noticia);
                                            echo "Insertado";
                                        }else{
                                            echo "Error";
                                        }
                                    }else{
                                        $mensajeError="Debe de seleccionar un archivo";
                                    }
                                }else if ($tipo=="VIDEO"){
                                    $archivo=$_FILES['imagen']['name'];
                                    $ruta="../VIDEOS/".$archivo;
                                    $temporal=$_FILES['imagen']['tmp_name'];
                                    if (strlen($archivo)> 0){
                                        $formato=$_POST['formato'];
                                        if (!empty($formato)&&strlen($formato)>0){
                                            if (move_uploaded_file($formato, $ruta)){
                                                $fechaini=new DateTime($fechainicio);
                                                $fechaf=new DateTime($fechafin);
                                                $diff=$fechaf->diff($fechaini);
                                                $dias=$diff->days;
                                                //para calcularlo deberemos de tener en cuenta desde los dias e irlo pasando a segundos hasta
                                                //llegar a los segundos
                                                $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
                                                $perfilbd=PERFIL_REPOSITORY::FindByID($perfil);
                                                $noticia=new NOTICIA(null,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfilbd,$tipo,null,$ruta,$formato);
                                                NOTICIA_REPOSITORY::Insert($noticia);
                                                echo "Insertado";
                                            }
                                        }else{
                                            $mensajeError="Debes de señalar un formato para el vídeo";
                                        }

                                    }else{
                                        $mensajeError="Debe de seleccionar un archivo";
                                    }

                                }else{
                                    $mensajeError="Debe de seleccionar un tipo";
                                }
                            }else{
                                $mensajeError="Debe de seleccionar un tipo de recurso";
                            }
                        }else{
                            $mensajeError= "Debe de seleccionar un perfil";
                        }
                    }else{
                        $mensajeError="El título no debe de estar vacío";
                    }
                }else{
                    $mensajeError="Debe de seleccionar un prioridad";
                }
            }
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../JS/validarCampos.js"></script>
</head>
<body>
<body>
    <form method="post" id="form" enctype="multipart/form-data">
        <h1>CREAR NOTICIA</h1>
        <label>FECHA DE INICIO:</label>
        <input name="fechainicio" type="datetime" placeholder="YYYY-MM-DD HH:MM:SS"><br><br>
        <label>FECHA FIN:</label>
        <input name="fechafin" type="datetime"><br><br>
        <label>PRIORIDAD:</label>
        <select name="prioridad">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br><br>
        <label>TÍTULO:</label>
        <input name="titulo" type="text"><br><br>
        <label>PERFIL:</label>
        <select name="perfil">
            <option value="ALUMNO">ALUMNO</option>
            <option value="TODOS">TODOS</option>
            <option value="PROFESOR">PROFESOR</option>
        </select><br><br>
        <label>TIPO:</label>
        <select id="tipo" name="tipo">
            <option value="-" selected hidden></option>
            <option value="FOTO">FOTO</option>
            <option value="VIDEO">VIDEO</option>
            <option value="WEB">WEB</option>
        </select><br><br>
        <label>Contenido de la noticia:</label>
        <textarea name="contenido" id="contenido" disabled></textarea><br><br>
        <label>URL:</label>
        <a href="http://localhost/proyecto-pantallas/FORMS/CREANOTICIA.php"><input name="imagen" type="button" id="url" value="SUBIR ARCHIVO" disabled></a><br><br>
        <label>Formato:</label>
        <input type="text" id="formato" disabled><br><br>

        <input type="submit" value="CREAR">
    </form>
    <a href="http://localhost/proyecto-pantallas/FORMS/MUESTRANOTICIAS.php"><input type="button" value="MOSTRAR NOTICIAS"></a>
    <a href="http://localhost/proyecto-pantallas/FORMS/BORRANOTICIAS.php"><input type="button" value="BORRAR NOTICIAS"></a>
    <a href="http://localhost/proyecto-pantallas/FORMS/ACTUALIZANOTICIAS.php"><input type="button" value="ACTUALIZA NOTICIAS"></a>
</body>
</html>