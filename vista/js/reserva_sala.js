window.onload = function() {
    let arraycheckbox = Array.from(document.getElementsByClassName('checkbox'));
    let color = 'vista/fotos/butacas/butaca_roja.png';
    let ejemplo = document.getElementById("ejemplo");

    // Guardar las imágenes originales de las butacas
    let imagenesOriginales = [];
    Array.from(document.getElementsByClassName('butaca')).forEach((butaca) => {
        imagenesOriginales.push(butaca.src);
    });
    console.log(imagenesOriginales);
    arraycheckbox.map(
        m => m.addEventListener('change', function() {
            let butaca = this.previousElementSibling;
            if (this.checked) {
                butaca.src = color;
            } else {
                // Establecer la imagen original correspondiente cuando se desmarca el checkbox
                let index = arraycheckbox.indexOf(this);
                butaca.src = imagenesOriginales[index];
            }
        }));
}
