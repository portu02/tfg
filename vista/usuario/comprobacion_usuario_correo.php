<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="vista/fotos/R.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/comprobacion_usuario.js"></script>
</head>

<body style="background-color: black;">
    <div class="container py-5 d-flex justify-content-center align-items-center">
        <section>
            <!--formulario para volver a login-->
            <div class="container py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="../fotos/morgan.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%; object-fit: cover;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                                        <!--formulario crear usuario-->
                                        <form action="../../index.php" method="post">
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <span class="h1 fw-bold mb-0" style="font-family: 'Bebas Neue', cursive;font-weight: normal;color: Red;;">RICHILICULAS</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Revisa tu correo <br>(Puede estar en spam)</h5>

                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="form2Example17">Codigo de verificacion</label>
                                                <input type="text" id="form2Example17" class="form-control form-control-lg" name="codeusuario_comprobacion_nuevo_login" required />
                                                <input type="hidden" id="nombre" value="" name="nombre_comprobacion_nuevo_login">
                                                <input type="hidden" id="apellido" value="" name="apellido_comprobacion_nuevo_login">
                                                <input type="hidden" id="gmail" value="" name="gmail_comprobacion_nuevo_login">
                                                <input type="hidden" id="contra" value="" name="contra_comprobacion_nuevo_login">
                                                <input type="hidden" id="rol" value="" name="rol_comprobacion_nuevo_login">
                                                <input type="hidden" id="code" value="" name="code_comprobacion_nuevo_login">
                                            </div>
                                            <div class="pt-1 mb-4" style="display: flex;justify-content: space-between;">
                                                <input class="btn btn-dark btn-lg btn-block t" style="text-align:right;margin-right:0" type="submit" name="comprobar_codigo" value="Registrar">
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