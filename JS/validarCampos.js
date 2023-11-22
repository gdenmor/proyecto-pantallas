window.addEventListener("load", function () {
    var select = document.getElementById("tipo");
    select.addEventListener("change", function () {
        var opcionSeleccionada = document.getElementById("tipo").value;
        var campoContenido = document.getElementById("contenido");
        var campoUrl = document.getElementById("url");
        var campoFormato = document.getElementById("formato");


        if (opcionSeleccionada === "WEB") {
            campoContenido.disabled = false;
            campoUrl.disabled = true;
            campoFormato.disabled = true;
        }
        if (opcionSeleccionada === "FOTO") {
            campoContenido.disabled = true;
            campoUrl.disabled = false;
            campoFormato.disabled = true;

        }
        if (opcionSeleccionada === "VIDEO") {
            campoContenido.disabled = true;
            campoUrl.disabled = false;
            campoFormato.disabled = false;

        }
    });
})