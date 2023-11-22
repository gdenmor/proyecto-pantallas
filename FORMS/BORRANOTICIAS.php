<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../HELPERS/AUTOLOAD.php";
    $noticias = NOTICIA_REPOSITORY::FindAll();

    if (count($noticias) > 0) {
        for ($i = 0; $i < count($noticias); $i++) {
            if (isset($_POST['boton'.$i])) {
                // El botón con el índice $i fue pulsado
                $idNoticia = $noticias[$i]->getId();

                NOTICIA_REPOSITORY::DeleteById($idNoticia);
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
    <a href="http://localhost/proyecto-pantallas/FORMS/MUESTRANOTICIAS.php"><input type="button" value="MOSTRAR NOTICIAS"></a>
    <a href="http://localhost/proyecto-pantallas/FORMS/CREANOTICIA.php"><input type="button" value="CREAR NOTICIAS"></a>
    <a href="http://localhost/proyecto-pantallas/FORMS/ACTUALIZANOTICIAS.php"><input type="button" value="ACTUALIZA NOTICIAS"></a>
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
                                    <td>'.$noticias[$i]->getFechainicio().'</td>
                                    <td>'.$noticias[$i]->getFechaFin().'</td>
                                    <td>'.$noticias[$i]->getDuracion().'</td>
                                    <td>'.$noticias[$i]->getPrioridad().'</td>
                                    <td>'.$noticias[$i]->getTitulo().'</td>
                                    <td>'.$noticias[$i]->getPerfil()->getName().'</td>
                                    <td>'.$noticias[$i]->getTipo().'</td>
                                    <td>'.$noticias[$i]->getcontenido().'</td>
                                    <td>'.$noticias[$i]->getUrl().'</td>
                                    <td>'.$noticias[$i]->getFormato().'</td>
                                    <td><input type="submit" name="boton'.$i.'" value="BORRAR"></td>
                                </tr>';
                        }
                    }else{
                        echo "SIN NOTICIAS";
                    }
                ?>
        </tbody>
    </table>
    </form>
</body>
</html>