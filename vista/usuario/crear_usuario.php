<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="vista/fotos/R.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="vista/js/crear_usuario.js"></script>
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


                                    <a href="vista/fotos/archivos/Términos y Condiciones.pdf" class="small text-muted" download>Terms of RRR.</a>
                                    <a href="vista/fotos/archivos/Política y Privacidad.pdf" class="small text-muted" download>Privacy policy</a>


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