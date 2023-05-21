<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <thead>
            <th data-titulo='Número'>NÚMERO</th>
            <th data-titulo='Nombre'>NOMBRE</th>
            <th data-titulo='Duración'>DURACIÓN</th>
            <th data-titulo='Clasificación'>CLASIFICACIÓN</th>
            <th data-titulo='Categoria'>CATEGORÍA</th>
            <th data-titulo='Fecha de estreno'>FECHA DE ESTRENO</th>
            <th data-titulo='acciones' colspan="4">ACCIONES</th>
        </thead>
        <tr>
            <td colspan="6">NUEVA PELICULA</td>
            <td colspan="4">
                <form method="post" action="index.php">
                    <button class="insert" name="nueva_pelicula" title="Añadir"><i class='fas fa-plus' style='font-size:24px'></i></button>
                </form>
            </td>
        </tr>
        <?php
        foreach ($arraypeliculaspaginado_pelicula as $row) {
        ?>
            <tr>
                <td data-titulo='Número'><?php echo 'Pelicula ' . $row['id_pelicula'] ?></td>
                <td data-titulo='Nombre'><?php echo $row['nombre'] ?></td>
                <td data-titulo='Duración'><?php echo $row['duracion'] . ' min' ?></td>
                <td data-titulo='Clasificación'><?php echo $row['clasificacion'] ?></td>
                <td data-titulo='Categoria'><?php echo $row['categoria'] ?></td>
                <td data-titulo='Fecha de estreno'><?php echo $row['fecha_estreno'] ?></td>
                <td>
                    <?php if ($row['imagen'] != null) { ?>
                        <a href="vista/fotos/<?php echo $row['imagen'] ?>" target="_blank" style="text-decoration: none">Imagen</a>
                    <?php } else { ?>

                    <?php } ?>
                </td>
                <td>
                    <?php if ($row['url'] != null) { ?>
                        <a href="<?php echo 'https://www.youtube.com/embed/' . $row['url'] ?>" target="_blank" style="text-decoration: none">Trailer</a>
                    <?php } else { ?>

                    <?php } ?>
                </td>

                <td>
                    <form method="post" action="index.php">
                        <button class="edit" name="editar_pelicula" title="Editar"><i class='fas fa-edit' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_pelicula" value="<?php echo $row['id_pelicula'] ?>" />
                        <input type="hidden" name="nombre" value="<?php echo $row['nombre'] ?>" />
                        <input type="hidden" name="imagen" value="<?php echo $row['imagen'] ?>" />
                        <input type="hidden" name="sinopsis" value="<?php echo $row['sinopsis'] ?>" />
                        <input type="hidden" name="duracion" value="<?php echo $row['duracion'] ?>" />
                        <input type="hidden" name="url" value="<?php echo $row['url'] ?>" />
                        <input type="hidden" name="clasificacion" value="<?php echo $row['clasificacion'] ?>" />
                        <input type="hidden" name="categoria" value="<?php echo $row['categoria'] ?>" />
                        <input type="hidden" name="fecha_estreno" value="<?php echo $row['fecha_estreno'] ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <input type="hidden" name="pelicula_admin" />
                        <button class="trash" name="borrar_peli" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_pelicula_a" value="<?php echo $row['id_pelicula'] ?>" />
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
            foreach ($num_pelicula as $a) {

                if (isset($_GET["pagina_pelicula"])) {
                    if ($_GET["pagina_pelicula"] == $a) {
            ?>
                        <a href='?pagina_pelicula=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_pelicula=<?= ($a) ?>'>
                            <div class='dentro'></div>
                        </a>
                    <?php
                    }
                } else {
                    if ($a == 1) {
                    ?>
                        <a href='?pagina_pelicula=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_pelicula=<?= ($a) ?>'>
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