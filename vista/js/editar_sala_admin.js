window.onload = function() {
    let arraycheckbox = Array.from(document.getElementsByClassName('checkbox'));
    let color = 'vista/fotos/butacas/butaca_gris.png';
    let ejemplo = document.getElementById("ejemplo");

    // Guardar las imágenes originales de las butacas
    let imagenesOriginales = [];
    Array.from(document.getElementsByClassName('butaca')).forEach((butaca) => {
        imagenesOriginales.push(butaca.src);
    });

    document.getElementById("modificar").addEventListener('click', function() {
        event.preventDefault();
        if (color.includes("butaca_gris.png")) {
            color = 'vista/fotos/butacas/butaca_azul.png';
            ejemplo.src = 'vista/fotos/butacas/butaca_azul.png';
        } else if (color.includes("butaca_azul.png")) {
            color = 'vista/fotos/butacas/butaca_verde.png';
            ejemplo.src = 'vista/fotos/butacas/butaca_verde.png';
        } else if (color.includes("butaca_verde.png")) {
            color = 'vista/fotos/butacas/butaca_gris.png';
            ejemplo.src = 'vista/fotos/butacas/butaca_gris.png';
        }
    });

    arraycheckbox.map(
        m => m.addEventListener('change', function() {
            let butaca = this.previousElementSibling;
            if (this.checked) {
                butaca.src = color;
                let nameParts = this.name.split(';');
                nameParts.pop();
                this.name = nameParts.join(';') + ';' + color + ']';
            } else {
                // Establecer la imagen original correspondiente cuando se desmarca el checkbox
                let index = arraycheckbox.indexOf(this);
                butaca.src = imagenesOriginales[index];
            }

        }));
}