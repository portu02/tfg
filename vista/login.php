<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>
    <section class="vh-1000" style="background-color: black;">
        <!--formulario para volver a login-->
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="./vista/fotos/morgan.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="index.php" method="post">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <span class="h1 fw-bold mb-0" style="font-family: 'Bebas Neue', cursive;font-weight: normal;color: Red;;">RICHILICULAS</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Bienvenido a Richiliculas ingresa con tu cuenta</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Gmail</label>
                                            <input type="email" id="form2Example17" class="form-control " name="gmail_login" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Contraseña</label>
                                            <input type="password" id="form2Example27" class="form-control" name="contra_login" />
                                            
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <input class="btn btn-dark btn-lg btn-block" type="submit" name="acceder_login" value="Acceder">
                                            <input class="btn btn-dark btn-lg btn-block" type="submit" name="crear_login" value="Crear cuenta">
                                        </div>
                                        <div>
                                            <?= $msg ?>
                                        </div>

                                        <a href="#!" class="small text-muted">Terms of RRR.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>