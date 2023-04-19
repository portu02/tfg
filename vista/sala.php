<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <table id='butacas'>
        <?php
        $numbutaca = 0;
        for ($filas = $max_fila; $filas > 0; $filas--) {
        ?>
            <tr>
                <?php
                for ($columnas = $max_columna; $columnas > 0; $columnas--) {
                    
                    if ($arraybutaca[$numbutaca]["fila"] == $filas && $arraybutaca[$numbutaca]["columna"] == $columnas) {
                        //condicionales de color de butacas
                        if ($arraybutaca[$numbutaca]["color"] == "Verde") {
                ?>
                            <td><img src='butaca_verde.png' class='butaca'><input type='checkbox' class='checkbox'></td>
                        <?php
                        } elseif ($arraybutaca[$numbutaca]["color"] == "Rojo") {
                        ?>
                            <td><img src='butaca_roja.png'></td>
                        <?php
                        } elseif ($arraybutaca[$numbutaca]["color"] == "Gris") {
                        ?>
                            <td><img src='butaca_gris.png'></td>

                        <?php
                        }

                        $numbutaca++;
                    } else {
                        ?>
                        <td></td>
                <?php
                    }
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>