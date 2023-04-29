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
    <link rel="stylesheet" href="vista/css/sala.css">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script>
    window.onload = function() {
        let arraycheckbox = Array.from(document.getElementsByClassName('checkbox'));
        arraycheckbox.map(
            m => m.addEventListener('change', function() {
                let butaca = this.previousElementSibling;
                if (this.checked) {
                    butaca.src = 'vista/fotos/butacas/butaca_roja.png';
                } else {
                    butaca.src = 'vista/fotos/butacas/butaca_verde.png';
                }
            }));
    }
</script>
</head>

<body>
    <?php
    include 'menu.php';
   
    ?>
    <div id="imagengrande">
        Sala <?= $id ?? "" ?>
    </div>
    <div class="butacas-contenedor">
            <div class="butacascontenido">
    <form method='post' action=''>


                <table id='butacas'>
                    <?php
                    for ($filas = $max_fila; $filas > 0; $filas--) {

                    ?>
                        <tr>
                            <?php
                            for ($columnas = 1; $columnas <= $max_columna; $columnas++) {

                                if ($arraybutaca[$numbutaca]["fila"] == $filas && $arraybutaca[$numbutaca]["columna"] == $columnas) {
                                    //condicionales de color de butacas
                                    if ($arraybutaca[$numbutaca]["color"] == "Verde") {
                            ?>
                                <td><img src="vista/fotos/butacas/butaca_verde.png" class="butaca"><input type="checkbox" class="checkbox"><span class="numbutaca"><?= $columnas ?? "" ?></span></td>
                                        
                                    <?php
                                    } elseif ($arraybutaca[$numbutaca]["color"] == "Rojo") {
                                    ?>
                                        <td><img src="vista/fotos/butacas/butaca_roja.png" class="butaca"><input type="checkbox" class="checkbox"><span class="numbutaca"><?= $columnas ?? "" ?></span></td>
                                    <?php
                                    } elseif ($arraybutaca[$numbutaca]["color"] == "Gris") {
                                    ?>
                                        <td><img src="vista/fotos/butacas/butaca_gris.png" class="butaca"><input type="checkbox" class="checkbox"><span class="numbutaca"><?= $columnas ?? "" ?></span></td>

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
    </form>
            </div>
    </div>

</body>