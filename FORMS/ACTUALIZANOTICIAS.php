<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../HELPERS/AUTOLOAD.php";
    $noticias = NOTICIA_REPOSITORY::FindAll();

    if (count($noticias) > 0) {
        for ($i = 0; $i < count($noticias); $i++) {
            if (isset($_POST['boton'.$i])) {
                // El botón con el índice $i fue pulsado
                $idNoticia = $noticias[$i]->getId();
                $fechainicio=$_POST['fechainicio'.$i];
                $fechafin=$_POST['fechafin'.$i];
                $duracion=$noticias[$i]->getDuracion();
                $prioridad=$_POST['prioridad'.$i];
                $titulo=$_POST['titulo'.$i];
                $perfil=$_POST['perfil'.$i];
                $tipo=$_POST['tipo'.$i];
                $contenido=$_POST['contenido'.$i];
                $url=$_POST['url'.$i];
                $formato=$_POST['formato'.$i];
                if (isset($idNoticia)) {
                    if (isset($fechainicio)){
                        if (isset($fechafin)) {
                            if (isset($duracion)){
                                if (isset($prioridad)) {
                                    if (isset($titulo)) {
                                        if (isset($perfil)) {
                                            if (isset($tipo)) {
                                                if ($tipo=="WEB"){
                                                    if (isset($contenido)) {
                                                        $fechai=new DateTime($fechainicio);
                                                        $fechaf=new DateTime($fechafin);
                                                        $dias=$fechaf->diff($fechai);
                                                        $duracion=($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
                                                        $perfill=PERFIL_REPOSITORY::FindByID2($perfil);
                                                        $noticia=new NOTICIA($idNoticia,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfill,$tipo,$contenido,null,null);
                                                        NOTICIA_REPOSITORY::UpdateById($idNoticia,$noticia);
                                                    }
                                                }else if($tipo=="FOTO"){
                                                    if (isset($url)) {
                                                        $fechai=new DateTime($fechainicio);
                                                        $fechaf=new DateTime($fechafin);
                                                        $diff=$fechaf->diff($fechai);
                                                        $dias=$diff->days;
                                                        $duracion=($dias*24*60*60)+($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
                                                        $perfill=PERFIL_REPOSITORY::FindByID2($perfil);
                                                        $noticia=new NOTICIA($idNoticia,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfill,$tipo,null,$url,null);
                                                        NOTICIA_REPOSITORY::UpdateById($idNoticia,$noticia);
                                                    }
                                                }else if ($tipo=="VIDEO"){
                                                    if (isset($url)) {
                                                        if (isset($formato)){
                                                            $fechai=new DateTime($fechainicio);
                                                            $fechaf=new DateTime($fechafin);
                                                            $diff=$fechaf->diff($fechai);
                                                            $dias=$diff->days;
                                                            $duracion=($dias*24*60*60);($dias * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
                                                            $duracion=0;
                                                            $perfill=PERFIL_REPOSITORY::FindByID2($perfil);
                                                            $noticia=new NOTICIA($idNoticia,$fechainicio,$fechafin,$duracion,$prioridad,$titulo,$perfill,$tipo,null,$url,$formato);
                                                            NOTICIA_REPOSITORY::UpdateById($idNoticia,$noticia);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

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
</head>
<body>
<form method="post">
<table border="1">
        <thead>
            <th>ID</th>
            <th>Fecha de inicio</th>
            <th>Fecha fin</th>
            <th>Duración</th>
            <th>Prioridad</th>
            <th>Titulo</th>
            <th>Perfil</th>
            <th>Tipo</th>
            <th>Contenido</th>
            <th>URL</th>
            <th>Formato</th>
            <th>Borrar noticia</th>
        </thead>
        <tbody>
            <?php
                require_once "../HELPERS/AUTOLOAD.php";
                $noticias=NOTICIA_REPOSITORY::FindAll();
                if ($noticias!=null) {
                    for ($i= 0;$i<count($noticias);$i++) {
                        echo '<tr>
                                <td>'.$noticias[$i]->getId().'</td>
                                <td><input type="text" name="fechainicio'.$i.'" value="'.$noticias[$i]->getFechainicio().'"></td>
                                <td><input type="text" name="fechafin'.$i.'" value="'.$noticias[$i]->getFechaFin().'"></td>
                                <td>'.$noticias[$i]->getDuracion().'</td>
                                <td><input type="text" name="prioridad'.$i.'" value="'.$noticias[$i]->getPrioridad().'"></td>
                                <td><input type="text" name="titulo'.$i.'" value="'.$noticias[$i]->getTitulo().'"></td>
                                <td><input type="text" name="perfil'.$i.'" value="'.$noticias[$i]->getPerfil()->getName().'"></td>
                                <td><input type="text" name="tipo'.$i.'" value="'.$noticias[$i]->getTipo().'"></td>
                                <td><input type="text" name="contenido'.$i.'" value="'.$noticias[$i]->getcontenido().'"></td>
                                <td><input type="text" name="url'.$i.'" value="'.$noticias[$i]->getUrl().'"></td>
                                <td><input type="text" name="formato'.$i.'" value="'.$noticias[$i]->getFormato().'"></td>
                                <td><input type="submit" name="boton'.$i.'" value="ACTUALIZAR"></td>
                               </tr>';
                    }
                }else{
                    echo "No existen más noticias";
                }
            ?>
        </tbody>
    </table>
    </form>
</body>
</html>