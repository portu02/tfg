<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="vista/fotos/R.png">
    <link rel="stylesheet" href="vista/css/tablasAdmin.css">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        <?php if ($result != "") {
        ?>alert("<?= $result ?>")
        <?php
        } ?>
    </script>
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>
    <table id='table'>
        <tr id='titulo'>
            <th>NÚMERO</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CORREO</th>
            <th>ROL</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <?php
        foreach ($arrayusuariopaginado as $row) {
        ?>
            <tr>
                <td data-titulo='Número'><?php echo 'Usuario ' . $row['id_usuario'] - 1 ?></td>
                <td data-titulo='Nombre'><?php echo $row['nombre'] ?></td>
                <td data-titulo='Apellido'><?php echo $row['apellido'] ?></td>
                <td data-titulo='Correo'><?php echo $row['correo'] ?></td>
                <td data-titulo='Rol'><?php echo $row['rol'] ?></td>
                <td>
                    <form method="post" action="index.php">
                        <button class="edit" name="editar_usuario_admin" title="Editar"><i class='fas fa-edit' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_usuario_admin" value="<?php echo $row['id_usuario'] ?>" />
                        <input type="hidden" name="nombre_usuario_admin" value="<?php echo $row['nombre'] ?>" />
                        <input type="hidden" name="apellido_usuario_admin" value="<?php echo $row['apellido'] ?>" />
                        <input type="hidden" name="correo_usuario_admin" value="<?php echo $row['correo'] ?>" />
                        <input type="hidden" name="rol_usuario_admin" value="<?php echo $row['rol'] ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <button class="trash" name="borrar_usuario_admin" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario'] ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div id='contain'>
        <div id='dentro' style="margin-top: 0px; margin-bottom:40px">
            <?php
            foreach ($num_usuario as $a) {

                if (isset($_GET["pagina_usuario"])) {
                    if ($_GET["pagina_usuario"] == $a) {
            ?>
                        <a href='?pagina_usuario=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_usuario=<?= ($a) ?>'>
                            <div class='dentro'></div>
                        </a>
                    <?php
                    }
                } else {
                    if ($a == 1) {
                    ?>
                        <a href='?pagina_usuario=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_usuario=<?= ($a) ?>'>
                            <div class='dentro'></div>
                        </a>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>