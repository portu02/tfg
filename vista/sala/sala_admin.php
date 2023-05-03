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
    <table>
        <tr>
            <th>NÚMERO</th>
            <th>DESCRIPCIÓN</th>
            <th>CAPACIDAD</th>
            <th>HABILITADA</th>
            <th>LUXURY</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <tr>
            <td colspan="5">NUEVA SALA</td>
            <td colspan="2">
                <form method="post" action="index.php">
                    <button class="insert" name="anadir_sala_admin" title="Añadir"><i class='fas fa-plus' style='font-size:24px'></i></button>
                </form>
            </td>
        </tr>
        <?php
        foreach ($arraysalas as $row) {
        ?>
            <tr>
                <td><?php echo 'Sala ' . $row['id_sala'] - 1 ?></td>
                <td><?php echo $row['descripcion'] ?></td>
                <td><?php echo $row['capacidad'] . ' personas'?></td>
                <td>
                    <?php if ($row['habilitada'] == 1) {
                        echo 'Sí';
                    } else {
                        echo 'No';
                    } ?>
                </td>
                <td>
                    <?php if ($row['luxury'] == 1) {
                        echo 'Sí';
                    } else {
                        echo 'No';
                    } ?>
                </td>
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
                        <button class="trash" name="borrar_sala_admin" title="Borrar"><i class='far fa-trash-alt' style='font-size:24px'></i></button>
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