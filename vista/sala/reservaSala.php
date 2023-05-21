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
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="vista/js/reserva_sala.js"></script>
</head>

<body>
    <?php
    include 'vista/menu.php';

    ?>
    <div id="imagengrande">
        Sala <?= $id_sala ?? "" ?><?= $luxury ?? "" ?>
    </div>
    <div class="butacas-contenedor">
        <div class="butacascontenido">
            <form method='post' action=''>
                <input type="hidden" name="id_sala" value="<?= $id_sala ?? "" ?>">
                <input type="hidden" name="id_horario" value="<?= $id_horario ?? "" ?>">
                <input type="hidden" name="nombre_pelicula" value="<?= $nombre_pelicula ?? "" ?>">
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
                                            foreach ($arrayreservadas as $areservada) {
                                                if ($areservada["fila"] == $arraybutaca[$numbutaca]["fila"] && $areservada["columna"] == $arraybutaca[$numbutaca]["columna"]) {
                                                    $existe = true;

                                    ?>
                                                    <td><img src="vista/fotos/butacas/butaca_reservada.png"><input type="checkbox" class="checkbox_filas" disabled><span class="numbutaca"><?= "" ?? "" ?></span></td>

                                                <?php
                                                }
                                            }

                                            //condicionales de color de butacas
                                            if ($existe == false) {
                                                if ($arraybutaca[$numbutaca]["color"] == "Verde") {
                                                ?>
                                                    <td><img src="vista/fotos/butacas/butaca_verde.png" class="butaca"><input type="checkbox" class="checkbox" name='reserva[<?= $filas . ";" . $columnas ?>]'><span class="numbutaca"><?= $columnas ?? "" ?></span></td>

                                                <?php
                                                } elseif ($arraybutaca[$numbutaca]["color"] == "Rojo") {
                                                ?>
                                                    <td><img src="vista/fotos/butacas/butaca_roja.png" class="butaca"><input type="checkbox" class="checkbox" disabled><span class="numbutaca"><?= $columnas ?? "" ?></span></td>
                                                <?php
                                                } elseif ($arraybutaca[$numbutaca]["color"] == "Gris") {
                                                ?>
                                                    <td><img src="vista/fotos/butacas/butaca_gris.png" class="butaca"><input type="checkbox" class="checkbox" disabled><span class="numbutaca"><?= $columnas ?? "" ?></span></td>
                                                <?php
                                                } elseif ($arraybutaca[$numbutaca]["color"] == "Azul") {
                                                ?>
                                                    <td><img src="vista/fotos/butacas/butaca_azul.png" class="butaca"><input type="checkbox" class="checkbox" name='reserva[<?= $filas . ";" . $columnas ?>]'><span class="numbutaca"><?= $columnas ?? "" ?></span></td>

                                            <?php
                                                }

                                                $numbutaca++;
                                            } else {
                                                $numbutaca++;
                                                $existe = false;
                                            }
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
        <input type='submit' class="boton-modificar carrito" value='Reservar' name='enviar_sala_reservar'>
    </div>

    <div id="ejemplos-butacas">
        <div>
            <img style="width: 60px;" src="vista/fotos/butacas/butaca_verde.png">
            <span>Butaca Libre</span>
        </div>
        <div>
            <img style="width: 60px;" src="vista/fotos/butacas/butaca_roja.png">
            <span>Butaca para Reservar</span>
        </div>
        <div>
            <img style="width: 60px;" src="vista/fotos/butacas/butaca_gris.png">
            <span>Butaca en Mantenimiento</span>
        </div>
        <div>
            <img style="width: 60px;" src="vista/fotos/butacas/butaca_azul.png">
            <span>Butaca para Minusválido</span>
        </div>
        <div>
            <img style="width: 60px;" src="vista/fotos/butacas/butaca_reservada.png">
            <span>Butaca Ocupada</span>
        </div>
    </div>


    </form>
</body>