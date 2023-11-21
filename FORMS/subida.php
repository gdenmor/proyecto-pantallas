<?php
    if ($_SERVER['REQUEST_METHOD']=="POST"){
            $nombre=$_FILES['archivo']['name'];
            $temporal=$_FILES['archivo']['tmp_name'];
            $tipo=$_FILES['archivo']['type'];

            if ($tipo=="video/mp4"||$tipo=="video/mp3"){
                $ruta="VIDEOS/".$nombre;

                if (move_uploaded_file($temporal,$ruta)){
                
                }
                header("Location: ?tipo=video");
            }else if ($tipo=="image/png"||$tipo=="image/jpg"){
                $ruta="IMAGES/".$nombre;

                if (move_uploaded_file($temporal,$ruta)){
                    echo $nombre;
                }
                header("Location: ?tipo=imagen");
            }else{
                echo "Error al subir el archivo";
            }

        }


?>

