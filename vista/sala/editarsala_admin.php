<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="vista/fotos/R.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vista/css/sala.css">
    <script src="vista/js/editar_sala_admin.js"></script>
</head>
<body>
    <?php
    include 'vista/menu.php';
    ?>
    <div id="imagengrande">
        Editar Sala
    </div>

    <form method='post' action=''>
        <input type="hidden" name="id_sala" value="<?= $id_sala ?? "" ?>">
        <div class="filas-columnas">
            <label for='longcolumna'>Maxímo columnas:
                <input type='number' min='1' name='longcolumna' value='<?= $max_columna ?? "" ?>' readonly>
            </label>
            <label for='longfila'>Maxímo filas:
                <input type='number' min='1' name='longfila' value='<?= $max_fila ?? "" ?>' readonly>
            </label>
            <label for='descripcion'>Descripcion:
                <input type='tex' name='descripcion' value='<?= $descripcion ?? "" ?>'>
            </label>
            <label for='habilitada'>Habilitada:
                <select name="habilitada">
                    <option value="0"></option>
                    <option value="1" <?php if ($habilitada == 1) echo "selected"; ?>>No habilitada</option>
                </select>
            </label>
            <label for='luxury'>Luxury:
                <select name="luxury">
                    <option value="0"></option>
                    <option value="1" <?php if ($luxury == 1) echo "selected"; ?>>Luxury</option>
                </select>
            </label>
        </div>

        <div class="butacas-contenedor">
            <div class="butacascontenido">
                <table id='butacas'>
                    <?php
                    for ($filas = $max_fila; $filas >= 1; $filas--) {

                    ?>
                        <tr>
                            <?php
                            for ($columnas = 0; $columnas <= $max_columna; $columnas++) {
                                if ($columnas == 0) {
                            ?>
                                    <td><input type='checkbox' class='checkbox_filas' disabled><span><?= $filas ?? "" ?></span></td>
                                    <?php
                                } else {
                                    if (isset($arraybutaca[$numbutaca]["fila"]) && isset($arraybutaca[$numbutaca]["columna"])) {
                                        if ($arraybutaca[$numbutaca]["fila"] == $filas && $arraybutaca[$numbutaca]["columna"] == $columnas) {
                                            //condicionales de color de butacas
                                            if ($arraybutaca[$numbutaca]["color"] == "Verde") {
                                    ?>
                                                <td><img src="vista/fotos/butacas/butaca_verde.png" class="butaca"><input type="checkbox" class="checkbox" name='butaca[<?= $filas . ";" . $columnas . ";" ?>]'><span class="numbutaca"><?= $columnas ?? "" ?></span></td>

                                            <?php
                                            } elseif ($arraybutaca[$numbutaca]["color"] == "Rojo") {
                                            ?>
                                                <td><img src="vista/fotos/butacas/butaca_roja.png" class="butaca"><input type="checkbox" class="checkbox" name='butaca[<?= $filas . ";" . $columnas . ";" ?>]'><span class="numbutaca"><?= $columnas ?? "" ?></span></td>
                                            <?php
                                            } elseif ($arraybutaca[$numbutaca]["color"] == "Gris") {
                                            ?>
                                                <td><img src="vista/fotos/butacas/butaca_gris.png" class="butaca"><input type="checkbox" class="checkbox" name='butaca[<?= $filas . ";" . $columnas . ";" ?>]'><span class="numbutaca"><?= $columnas ?? "" ?></span></td>
                                            <?php
                                            } elseif ($arraybutaca[$numbutaca]["color"] == "Azul") {
                                            ?>
                                                <td><img src="vista/fotos/butacas/butaca_azul.png" class="butaca"><input type="checkbox" class="checkbox" name='butaca[<?= $filas . ";" . $columnas . ";" ?>]'><span class="numbutaca"><?= $columnas ?? "" ?></span></td>

                                            <?php
                                            }

                                            $numbutaca++;
                                        } else {
                                            ?>
                                            <td></td>
                            <?php
                                        }
                                    }
                                }
                            }

                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="filas-columnas">
            <input type='submit' id="modificar" class="boton-modificar pen" value="Cambiar Butaca" name='editar_sala_admin_editar'><img id="ejemplo" style="width: 45px;" src="vista/fotos/butacas/butaca_gris.png" class="butaca">
            <input type='submit' class="boton-modificar confirm" value='Correcto' name='enviar_sala_editar'>
        </div>
    </form>

</body>

</html>