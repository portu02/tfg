window.onload = function () {
    let arraycheckbox = Array.from(document.getElementsByClassName('checkbox'));
    arraycheckbox.map(
        m => m.addEventListener('change', function () {
            var numeroSpan = this.nextElementSibling;
            if (numeroSpan.classList.contains("marcado")) {
                numeroSpan.classList.remove('marcado');
            }
            if (this.checked) {
                numeroSpan.classList.add('oculto');
            } else {
                numeroSpan.classList.remove('oculto');
            }
        }));

    document.getElementById("FormulCreaSala").addEventListener("submit", function (event) {
        let boton = event.submitter;
        if (boton.id === "EnviaSala") {
            document.getElementById("loadingImage").style.display = "block";
        }
    });
}