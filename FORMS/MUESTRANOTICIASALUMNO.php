<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            require_once "../HELPERS/AUTOLOAD.php";
            $noticiasAlumno=NOTICIA_REPOSITORY::FindPerfil("ALUMNO");
            if ($noticiasAlumno!=null){
                for ($i=0; $i < count($noticiasAlumno); $i++) {
                    if ($noticiasAlumno[$i]->getTipo()=="WEB"){
                        echo '<div>
                            <h1>'.$noticiasAlumno[$i]->getTitulo().'</h1>
                            <div>'.$noticiasAlumno[$i]->getcontenido().'</div>
                            </div>';
                        echo "<br>";
                    }else if ($noticiasAlumno[$i]->getTipo()== "FOTO"){
                        echo '<div>
                            <h1>'.$noticiasAlumno[$i]->getTitulo().'</h1>
                            <div><img src="'.$noticiasAlumno[$i]->getUrl().'"></div>
                            </div>';
                        echo "<br>";
                    }else if ($noticiasAlumno[$i]->getTipo()=="VIDEO"){
                        echo '<div>
                            <h1>'.$noticiasAlumno[$i]->getTitulo().'</h1>
                            <div><video src="'.$noticiasAlumno[$i]->getUrl().'" type="video/'.$noticiasAlumno[$i]->getFormato().'"muted controls></video></div>
                            </div>';
                        echo "<br>";
                    }
                }
            }else{
                echo "LOS ALUMNOS NO TIENEN NINGUNA NOTICIA";
            }

        ?>
    </div>
</body>
</html>