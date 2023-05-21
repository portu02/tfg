window.onload = function () {
    /* ACTUALIZAR O CREAR LA IMAGEN */
    const agrega = document.getElementById("file");
    const imagePreview = document.getElementById("agregar_imagen");
    const nombre = document.getElementById("nombre");

    agrega.addEventListener("change", function (event) {
        const file = this.files[0];
        nombre.innerHTML = file.name;

        const selectedFiles = event.target.files;
        for (let i = 0; i < selectedFiles.length; i++) {
            const reader = new FileReader();

            reader.addEventListener("load", function () {
                imagePreview.style.backgroundImage = `url(${reader.result})`;
            });

            reader.readAsDataURL(selectedFiles[i]);
        }
    });

    /* ACTUALIZAR URL */
    const trailer = document.getElementById("trailer");
    const url_nueva = document.getElementById("nueva_url");
    const boton = document.getElementById("boton");

    if (boton) {
        boton.addEventListener("click", function () {
            trailer.src = "https://www.youtube.com/embed/" + url_nueva.value;
        });
    }

    /* AGREGAR TRAILER */
    const trailer2 = document.getElementById("trailer2");
    const url_nueva2 = document.getElementById("nueva_url2");
    const boton2 = document.getElementById("boton2");

    if (boton2) {
        boton2.addEventListener("click", function () {
            const iframeExistente = document.querySelector('iframe');

            if (iframeExistente) {
                iframeExistente.remove();
            }

            var iframe = document.createElement("iframe");

            iframe.setAttribute("src", "https://www.youtube.com/embed/" + url_nueva2.value);
            iframe.setAttribute("width", "100%");
            iframe.setAttribute("height", "400px");
            iframe.setAttribute("name", "trailer");
            iframe.setAttribute("allow", "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture");

            var label = document.querySelector("label[for='url_new']");
            label.parentNode.insertBefore(iframe, label);
        });
    }


    document.getElementById("FormulCreaPelicula").addEventListener("submit", function (event) {
        let boton = event.submitter;
        if (boton.id === "EnviaPelicula") {
            document.getElementById("loadingImage").style.display = "block";
        }
    });
}
