window.addEventListener("load", function(){
    const container = this.document.getElementById("container");
    container.style.width = window.innerWidth + "px";
    container.style.height = window.innerHeight + "px";

    this.fetch("../prueba.json", {
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    }).then(x => x.json())
        .then(y => {
            if (y.tipo == "WEB") {
                var web = this.document.createElement("div");
                web.innerHTML=y.contenido;
                container.appendChild(web);
            } else if (y.tipo == "IMAGEN") {
                var imagen = this.document.createElement("img");
                imagen.src = "../" + y.url;
                container.appendChild(imagen);
                imagen.style.width="100%";
                imagen.style.height="100%";
            } else if (y.tipo == "VIDEO") {
                var imagen = document.createElement("video");
                var ruta = "../" + y.url;
                imagen.src = ruta;
                imagen.setAttribute("type",y.formato);
                imagen.controls=true;
                imagen.muted=true;
                container.appendChild(imagen);
                imagen.autoplay=true;
                imagen.style.width="100%";
                imagen.style.height="100%";
            }
        });
});

