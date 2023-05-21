window.onload = function() {
    const checkbox = document.getElementById('verPassword');
    const passwordInput = document.getElementById('contra');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });

    document.getElementById("registro").addEventListener('submit', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe por defecto
        // Genera 4 números aleatorios entre 1 y 10 y los almacena en un array
        var numeros = [];
        for (var i = 0; i < 4; i++) {
            numeros[i] = Math.floor(Math.random() * 10) + 1;
        }

        // Convierte el array de números en una cadena de texto
        var numerosAleatorios = numeros.join('');

        // Obtiene los valores del formulario
        let nombre = document.getElementById('nombre').value;
        let apellido = document.getElementById("apellido").value;
        let gmail = document.getElementById("gmail").value;
        let contra = document.getElementById("contra").value;
        let rol = document.getElementById("rol").value;

        //ENVIAR CORREO
        Email.send({
            Host: "smtp.elasticemail.com",
            Username: "richiliculas@gmail.com",
            Password: "33116F6401112EB1E4626A8D39D35715CB38",
            To: gmail,
            From: "richiliculas@gmail.com",
            Subject: "Código de confirmacion",
            Body: numerosAleatorios
        }).then(
            message => alert(message)
        );

        // Crea una nueva ventana
        let nuevaVentana = window.open('', '_blank', 'width=800,height=800,left=' + (screen.width - 800) / 2 + ',top=' + (screen.height - 800) / 2);

        // Pasa los datos a la nueva ventana utilizando localStorage
        localStorage.setItem('nombre', nombre);
        localStorage.setItem('apellido', apellido);
        localStorage.setItem('gmail', gmail);
        localStorage.setItem('contra', contra);
        localStorage.setItem('rol', rol);
        localStorage.setItem('code', numerosAleatorios);

        // Redirige la nueva ventana a la página que quieres mostrar
        nuevaVentana.location.href = 'vista/usuario/comprobacion_usuario_correo.php';
    });
}