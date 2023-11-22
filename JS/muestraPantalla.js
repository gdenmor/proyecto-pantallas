window.addEventListener("load", function(){
    const container = this.document.getElementById("container");
    var ancho = document.documentElement.clientWidth;
    var alto = document.documentElement.clientHeight;
    container.style.width = "100%";
    container.style.height = "100%";
    container.style.display="flex";
    var params=new URLSearchParams(this.window.location.search);
    var perfil=params.get("perfil");
    var i=0;

    this.fetch("../prueba.json", {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    }).then(x => x.json())
        .then(y => {
            function mostrarElemento() 
            {
                if (i < y.length) 
                {
                    if (y[i].tipo == "WEB") 
                    {
                        var web = document.createElement("div");
                        web.innerHTML = y[i].contenido;
                        container.appendChild(web);
                        container.style.backgroundColor = "gray";
                    } else if (y[i].tipo == "IMAGEN") 
                    {
                        var imagen = document.createElement("img");
                        imagen.src = "../" + y[i].url;
                        container.appendChild(imagen);
                        imagen.style.width = "100%";
                        imagen.style.height = "100%";
                        imagen.style.display = "flex";
                    } else if (y[i].tipo == "VIDEO") 
                    {
                        var video = document.createElement("video");
                        var ruta = "../" + y[i].url;
                        video.src = ruta;
                        video.setAttribute("type", y[i].formato);
                        video.controls = true;
                        video.muted = true;
                        container.appendChild(video);
                        video.autoplay = true;
                        video.style.width = ancho + "px";
                        video.style.display = "flex";
                        video.addEventListener("ended", function(){
                            video.currentTime = 0;
                            video.play();
                        });
                    }
                }

                i++;

                if (i<y.length){
                    setTimeout(function() {
                        // Limpiar el contenedor para el próximo elemento
                        container.innerHTML = "";
                        // Llamar a la función para mostrar el siguiente elemento
                        mostrarElemento();
                    }, y[i].duracion*1000);
                }else if (i==y.length){
                    setTimeout(function() {
                        window.location.reload();
                    }, y[i-1].duracion*1000); 
                }
            }

            mostrarElemento(0);

        })
});
