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
            $noticiasProfesor=NOTICIA_REPOSITORY::FindPerfil("PROFESOR");
            if ($noticiasProfesor!=null){
                for ($i=0; $i < count($noticiasAlumno); $i++) {
                    if ($noticiasProfesor[$i]->getTipo()=="WEB"){
                        echo '<div>
                            <h1>'.$noticiasProfesor[$i]->getTitulo().'</h1>
                            <div>'.$noticiasProfesor[$i]->getcontenido().'</div>
                            </div>';
                        echo "<br>";
                    }else if ($noticiasProfesor[$i]->getTipo()== "FOTO"){
                        echo '<div>
                            <h1>'.$noticiasProfesor[$i]->getTitulo().'</h1>
                            <div><img src="'.$noticiasProfesor[$i]->getUrl().'"></div>
                            </div>';
                        echo "<br>";
                    }else if ($noticiasProfesor[$i]->getTipo()=="VIDEO"){
                        echo '<div>
                                <h1>'.$noticiasProfesor[$i]->getTitulo().'</h1>
                                <div>
                                    <video src="'.$noticiasProfesor[$i]->getUrl().'" type="video/'.$noticiasProfesor[$i]->getFormato().'"muted controls></video>
                                </div>
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