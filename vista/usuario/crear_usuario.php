<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
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
    </script>
</head>

<body style="background-color: black;">
    <?php
    include "vista/menu.php";
    ?>
    <div class="container d-flex justify-content-center align-items-center">
        <section>
            <!--formulario para volver a login-->
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="./vista/fotos/morgan.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <!--formulario crear usuario-->
                                        <form id="registro" action="index.php" method="post">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <span class="h1 fw-bold mb-0" style="font-family: 'Bebas Neue', cursive;font-weight: normal;color: Red;;">RICHILICULAS</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Bienvenido a Richiliculas</h5>

                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="form2Example17">Nombre</label>
                                                <input type="text" id="nombre" class="form-control" name="nombre_nuevo_login" required /><br>
                                                <label class="form-label" for="form2Example17">Apellido</label>
                                                <input type="text" id="apellido" class="form-control" name="apellido_nuevo_login" required /><br>
                                                <label class="form-label" for="form2Example17">Gmail</label>
                                                <input type="email" id="gmail" class="form-control" name="gmail_nuevo_login" required /><br>
                                                <label class="form-label" for="form2Example27"></label>Contraseña</label>
                                                <input type="password" id="contra" class="form-control" name="contra_nuevo_login" required /><br>

                                                <label>
                                                    <input type="hidden" id="rol" value="Cliente" name="rol_nuevo_login">
                                                    <input type="checkbox" id="verPassword" /> Mostrar contraseña
                                                </label>

                                            </div>
                                            <div class="pt-1 mb-4" style="display: flex;justify-content: space-between;">
                                                <input class="btn btn-dark t d-inline-block" type="submit" name="registar_nuevo_login" value="Registrar">
                                        </form>
                                        <form action="index.php" method="post">
                                            <input class="btn btn-dark t d-inline-block" type="submit" name="volver_login" value="Ir al login">
                                        </form>
                                    </div>


                                    <a href="#!" class="small text-muted">Terms of RRR.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>