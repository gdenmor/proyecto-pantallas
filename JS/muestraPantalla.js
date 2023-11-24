window.addEventListener("load", function(){
    const container = this.document.getElementById("container");
    var ancho = this.window.innerWidth;
    var alto = this.window.innerHeight;
    container.style.width = ancho+"px";
    container.style.height = alto+"px";
    container.style.display="flex";
    var params=new URLSearchParams(this.window.location.search);
    var perfil=params.get("pantalla").toUpperCase();
    var i=0;

    this.fetch("../APIS/NOTICIASAPIPERFIL.php?pantalla="+perfil, {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    }).then(x => x.json())
        .then(y => {

            //creamos un array que es donde guardaremos las noticias teniendo en cuenta ya la prioridad
            const array=[]; 

            //funcion que se encarga de guardar esos datos en un array
            function guardaArray(array) 
            {
                //comprueba que el contador sea menor a la longitud del array que devuelve el json
                if (i < y.length) 
                {
                    //obtenemos la prioridad de esa noticia
                    var prioridad=y[i].prioridad;
                    for (let k=0;k<prioridad;k++){
                        /*añadimos la noticia al array tantas veces como cantidad sea la prioridad,
                        es decir si es prioridad 1 una vez, si es 2 2 veces y si es 3 3 veces*/
                        array.push(y[i]);
                    }
                }

                //lo incrementamos el contador para que vaya a la siguiente noticia
                i++;

                
                if (i<y.length){
                    //llamamos de forma recursiva para que tenga en cuenta ahora el indice siguiente del array del json
                    guardaArray(array);
                }
            }

            //una vez hecho eso llamamos al metodo para que se nos guarden los datos en el array
            guardaArray(array);

            //barajamos el array
            array.sort(() => Math.random() - 0.5);


            
            //inicializamos un contador para controlar los indices de ese array que hemos barajado
            let j = 0;

            //cargamos el primero ya que, al ser intervalo primero se espera a la duración y saldría vacío
            container.innerHTML = "";
            if (array[j].tipo == "WEB") {
                var web = document.createElement("div");
                web.innerHTML = array[j].contenido;
                container.appendChild(web);
                container.style.backgroundColor = "gray";
                web.style.display = "flex";
            } else if (array[j].tipo == "IMAGEN") {
                var imagen = document.createElement("img");
                imagen.src = array[j].url;
                container.appendChild(imagen);
                imagen.style.width = "100%";
                imagen.style.display = "flex";
            } else if (array[j].tipo == "VIDEO") {
                var video = document.createElement("video");
                var ruta = array[j].url;
                video.src = ruta;
                video.setAttribute("type", array[j].formato);
                video.controls = true;
                video.muted = true;
                container.appendChild(video);
                video.autoplay = true;
                video.style.width = ancho + "px";
                video.style.display = "flex";
                video.addEventListener("ended", function () {
                    video.currentTime = 0;
                    video.play();
                });
            }
                //declaramos el intervalo
                const intervalId = setInterval(function() {
                    //comprobamos que sea el valor del primero para que solo incremente el contador
                    if (j==0){
                        j++;
                    }else

                    if (j < array.length&&j!==0) {
                        //En caso de que no, lo limpia y me mostrará la siguiente noticia
                        container.innerHTML = "";
                        // Comprobamos el tipo de recurso y lo añadimos al contenedor para que este se muestre
                        if (array[j].tipo == "WEB") {
                            var web = document.createElement("div");
                            web.innerHTML = array[j].contenido;
                            container.appendChild(web);
                            container.style.backgroundColor = "gray";
                            web.style.display = "flex";
                        } else if (array[j].tipo == "IMAGEN") {
                            var imagen = document.createElement("img");
                            imagen.src = array[j].url;
                            container.appendChild(imagen);
                            imagen.style.width = "100%";
                            imagen.style.height = "100%";
                            imagen.style.display = "flex";
                        } else if (array[j].tipo == "VIDEO") {
                            var video = document.createElement("video");
                            var ruta = array[j].url;
                            video.src = ruta;
                            video.setAttribute("type", array[j].formato);
                            video.controls = true;
                            video.muted = true;
                            container.appendChild(video);
                            video.autoplay = true;
                            video.style.width = ancho + "px";
                            video.style.display = "flex";
                            video.addEventListener("ended", function() {
                                video.currentTime = 0;
                                video.play();
                            });
                        }
                        //una vez hecho eso lo incrementamos
                        j++;
                    } else {
                        //cuando ya acaba el array detiene el intervalo
                        clearInterval(intervalId); 
                        //refresca la página
                        window.location.reload();
                    }
                }, array[j].duracion*1000);

            

        })
});