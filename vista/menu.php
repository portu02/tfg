<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="contenedor" style="background-color:#141414;">
        <form action="" method="post">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand logotipo" href="">Richiliculas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <?php
                            if(isset($_SESSION["usuario_sesion"])){
                                if($_SESSION['usuario_sesion']['rol'] == 'Administrador'){
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
                            if(isset($_SESSION["usuario_sesion"])){
                        ?>
                        <li class="nav-item">
                            <input type="submit" name="cerrar_sesion" id="botones" value="Cerrar sesion" class="nav-link">
                        </li>
                        <?php
                            }else{
                        ?>
                        <li class="nav-item">
                            <input type="submit" name="iniciar_sesion" id="botones" value="Iniciar sesion" class="nav-link">
                        </li>
                        <?php
                            }  
                        ?>
                        <?php
                            if(isset($_SESSION["usuario_sesion"])){
                        ?>
                        <li class="nav-item">
                            <input type="submit" id="botones" value="<?=$_SESSION['usuario_sesion']['nombre']."(".$_SESSION['usuario_sesion']['rol'].")" ?? ""?>" class="nav-link">
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