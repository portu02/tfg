<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="vista/css/sala_admin.css">
        <script src="vista/js/sala_admin.js"></script>
    </head>

    <body>
        <?php
        include "vista/menu.php";
        ?>
        <div id="imagengrande">
            Editar Usuario
        </div>
        <form action="index.php" method="post">
            <label for='nombre_usuario_admin_editar'>Nombre:
                <input type='text' name='nombre_usuario_admin_editar' value='<?= $nombre_usuario_admin ?? "" ?>'>
            </label>
            <label for='apellido_usuario_admin_editar'>apellido:
                <input type='text' name='apellido_usuario_admin_editar' value='<?= $apellido_usuario_admin  ?? "" ?>'>
            </label>
            <label for='correo_usuario_admin_editar'>correo:
                <input type='text' name='correo_usuario_admin_editar' value='<?= $correo_usuario_admin  ?? "" ?>'>
            </label>
            <label for='rol_usuario_admin_editar'>rol:
                <input type='text' name='rol_usuario_admin_editar' value='<?= $rol_usuario_admin  ?? "" ?>'>
            </label>
            <input type='submit' class="boton-modificar pen" value='cambiar' name='cambiar_usuario_admin'><br><br>
        </form>
    </body>
</html>