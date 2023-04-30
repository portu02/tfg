<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/tablasAdmin.css">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>
    <table>
        <tr>
            <th>NÚMERO</th>
            <th>NOMBRE</th>
            <th>SINOPSIS</th>
            <th>DURACIÓN</th>
            <th>CLASIFICACIÓN</th>
            <th>CATEGORÍA</th>
            <th>FECHA DE ESTRENO</th>
            <th>IMAGEN</th>
            <th>TRAILER</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <tr>
            <td colspan="5">NUEVA PELICULA</td>
            <td colspan="2">
                <form method="post" action="index.php">
                    <input type="hidden" name="pelicula" value="<?php echo $_POST['pelicula'] ?>" />
                    <button class="insert" name="nueva" title="Añadir"><i class='fas fa-plus' style='font-size:24px'></i></button>
                </form>
            </td>
        </tr>
        <?php
        foreach ($arraypeliculas as $row) {
        ?>
            <tr>
                <td><?php echo 'Pelicula ' . $row['id_pelicula'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['sinopsis'] ?></td>
                <td><?php echo $row['duracion'] ?></td>
                <td><?php echo $row['clasificacion'] ?></td>
                <td><?php echo $row['categoria'] ?></td>
                <td><?php echo $row['fecha_estreno'] ?></td>

                <td>
                    <form method="post" action="index.php">
                        <button class="edit" name="editar" title="Editar"><i class='fas fa-edit' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_sala" value="<?php echo $row['id_sala'] ?>" />
                        <input type="hidden" name="descripcion" value="<?php echo $row['descripcion'] ?>" />
                        <input type="hidden" name="capacidad" value="<?php echo $row['capacidad'] ?>" />
                        <input type="hidden" name="habilitada" value="<?php echo $row['habilitada'] ?>" />
                        <input type="hidden" name="luxury" value="<?php echo $row['luxury'] ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <button class="trash" name="borrar" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_sala" value="<?php echo $row['id_sala'] ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <?php
    //include('Paginacion.php');
    ?>
</body>

</html>