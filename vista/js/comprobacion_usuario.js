window.onload = function() {
    let nombre = localStorage.getItem('nombre');
    let apellido = localStorage.getItem('apellido');
    let gmail = localStorage.getItem('gmail');
    let contra = localStorage.getItem('contra');
    let rol = localStorage.getItem('rol');
    let code = localStorage.getItem('code');

    document.getElementById("nombre").value = nombre;
    document.getElementById("apellido").value = apellido;
    document.getElementById("gmail").value = gmail;
    document.getElementById("contra").value = contra;
    document.getElementById("rol").value = rol;
    document.getElementById("code").value = code;
}
