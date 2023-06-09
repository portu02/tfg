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
    <?php
    if (!isset($_SESSION['usuario_sesion'])) {
        header('location: ../../index.php');
    }
    ?>
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
            <th>NÚMERO</th>
            <th>DESCRIPCIÓN</th>
            <th>CAPACIDAD</th>
            <th>DESHABILITADA</th>
            <th>LUXURY</th>
            <th colspan="2">ACCIONES</th>
        </thead>
        <tr>
            <td colspan="5">NUEVA SALA</td>
            <td colspan="2">
                <form method="post" action="index.php">
                    <button class="insert" name="anadir_sala_admin" title="Añadir"><i class='fas' style='font-size:24px'></i></button>
                </form>
            </td>
        </tr>
        <?php
        foreach ($arraysalaspaginado as $row) {
        ?>
            <tr>
                <td data-titulo='Número'><?php echo 'Sala ' . $row['id_sala'] - 1 ?></td>
                <td data-titulo='Descripción'><?php echo $row['descripcion'] ?></td>
                <td data-titulo='Capacidad'><?php echo $row['capacidad'] . ' personas' ?></td>
                <td data-titulo='Habilitada'>
                    <?php if ($row['habilitada'] == 1) {
                        echo 'Sí';
                    } else {
                        echo 'No';
                    } ?>
                </td>
                <td data-titulo='Luxury'>
                    <?php if ($row['luxury'] == 1) {
                        echo 'Sí';
                    } else {
                        echo 'No';
                    } ?>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <button class="edit" name="editar_sala" title="Editar"><i class='fas' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_sala" value="<?php echo $row['id_sala'] ?>" />
                        <input type="hidden" name="descripcion" value="<?php echo $row['descripcion'] ?>" />
                        <input type="hidden" name="capacidad" value="<?php echo $row['capacidad'] ?>" />
                        <input type="hidden" name="habilitada" value="<?php echo $row['habilitada'] ?>" />
                        <input type="hidden" name="luxury" value="<?php echo $row['luxury'] ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="index.php">
                        <button class="trash" name="borrar_sala_admin" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
                        <input type="hidden" name="id_sala" value="<?php echo $row['id_sala'] ?>" />
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
            foreach ($num_sala as $a) {

                if (isset($_GET["pagina_sala"])) {
                    if ($_GET["pagina_sala"] == $a) {
            ?>
                        <a href='?pagina_sala=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_sala=<?= ($a) ?>'>
                            <div class='dentro'></div>
                        </a>
                    <?php
                    }
                } else {
                    if ($a == 1) {
                    ?>
                        <a href='?pagina_sala=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_sala=<?= ($a) ?>'>
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