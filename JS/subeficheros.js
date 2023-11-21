window.addEventListener("load",function(){
    const fichero=this.document.getElementById("fichero");
    const enviar=this.document.getElementById("enviar");

    enviar.addEventListener("click",function(ev){
        ev.preventDefault();
        console.log(fichero.files[0]);
        if (fichero.files.length>0){
            var form=new FormData(document.getElementById("form"));
            form.append("submit","hola");
            fetch("subida.php",{
                method: "POST",
                body: form,
            })
            .then(x=>x.text())
            .then(texto=>{
                alert(texto);
            });
        }else{
            alert("Debe de introducir un fichero");
        }
    })
})