<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiliculas</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="contenedor" style="background-color:#141414;">
        <form action="index.php" method="post">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand logotipo" href="index.php">Richiliculas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <?php
                        if (isset($_SESSION["usuario_sesion"])) {
                            if ($_SESSION['usuario_sesion']['rol'] == 'Administrador') {
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Admin
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <input class="dropdown-item submit-btn w-100" type="submit" value="Salas" name="sala_admin">
                                        <input class="dropdown-item submit-btn w-100" type="submit" value="Peliculas" name="pelicula_admin">
                                        <input class="dropdown-item submit-btn w-100" type="submit" value="Usuarios" name="usuario_admin">
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                        <li class="nav-item">
                            <input type="submit" name="buscar_pelicula" id="botones" value="Peliculas" class="nav-link">
                        </li>
                        <?php
                        if (isset($_SESSION["usuario_sesion"])) {
                        ?>
                            <li class="nav-item">
                                <form method='post' action='index.php'>
                                    <button name="cerrar_sesion" title='Cerrar sesión' id="botones" class="fa fa-power-off" style='font-size:24px; color: #737373; padding:8px; margin-left:5px'></button>
                                </form>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <form method='post' action='index.php'>
                                    <button name="iniciar_sesion" title='Iniciar sesión' id="botones" class="fa fa-sign-in" style='font-size:24px; color: #737373; padding:8px; margin-left:5px'></button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                        <?php
                        if (isset($_SESSION["usuario_sesion"])) {
                        ?>
                            <li class="nav-item">
                                <form method='post' action='index.php'>
                                    <button name="carrito_sesion" title='Usuario: <?php echo $_SESSION['usuario_sesion']['nombre'] ?>' id="botones" class="fa fa-user-o" style='font-size:24px; color: #737373; padding:8px; margin-left:5px'></button>
                                </form>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </form>
    </div>
</body>

</html>