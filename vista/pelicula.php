<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>
    <div id="imagengrande">
        <?= $arraypeliculas[$id_pelicula]["nombre"] ?>
    </div>
    <div id="menudias">
        <form action="" method="post">
            <input type='text' value='<?= $id_pelicula ?? "" ?>' name='id_pelicula' hidden />
            <input type='text' value='<?= $id_dia ?? "" ?>' name='id_dia' hidden />

            <div id="dias">
                <div class="dia">
                    Día
                </div>
                <?php
                foreach ($arrayhorarios as $a) {
                    //echo $a["id_pelicula"] . " " . $a["id_sala"] . " " . $a["fecha"] . " " . $a["hora"] . "<br>";
                    $diasimple = $a["fecha"];
                    $diaini = substr($diasimple, 8, 2);
                    $diafin = substr($diasimple, 5, 2);
                    $dia = $diaini . "/" . $diafin;
                    $array[] = $dia;
                }
                $b = array_unique($array);
                foreach ($b as $a) {
                    if ($a == $id_dia) {
                        echo '<div class="dia diaactivo"><input class="botondia" type="submit" value="' . $a . '" name="dia"></div>';
                    } else {
                        echo '<div class="dia"><input class="botondia" type="submit" value="' . $a . '" name="dia"></div>';
                    }
                }
                ?>
            </div>
        </form>
    </div>

    <div id="hoja">
        <div id="escenapelicula">
            <div class="pelicula" style="background-image: url('vista/fotos/<?= $arraypeliculas[$id_pelicula]["imagen"] ?> ');"></div>
            <div id="info">
                <h3><?= $arraypeliculas[$id_pelicula]["nombre"] ?></h3>
                <h4>Sinopsis</h4>
                <p><?= $arraypeliculas[$id_pelicula]["sinopsis"] ?></p>
                <h4>Categoría</h4>
                <p><?= $arraypeliculas[$id_pelicula]["categoria"] ?></p>
                <h4>Clasificación</h4>
                <p><?= $arraypeliculas[$id_pelicula]["clasificacion"] ?></p>
                <h4>Duración</h4>
                <p><?= $arraypeliculas[$id_pelicula]["duracion"] ?> min</p>
                <h4>Fecha de Estreno</h4>
                <p><?= $arraypeliculas[$id_pelicula]["fecha_estreno"] ?></p>
            </div>
        </div>
        <div id="horas">
            <div class="hora">Horario</div>
            <?php
            $diasimple = $id_dia;
            $diaini = substr($diasimple, 0, 2);
            $diafin = substr($diasimple, 3, 2);
            $dia = $diafin . "-" . $diaini;

            foreach ($arrayhorarios as $a) {
                if (strpos($a["fecha"], $dia)) {
                    $arrays[] = substr($a["hora"], 0, 5);
                }
            }

            //ORDENAR LAS HORAS, NO SE REPITAN LAS HORAS
            sort($arrays);
            $arrays = array_unique($arrays);

            foreach ($arrays as $a) {
            ?>
                <div class="hora">
                    <form method="post" action="">
                        <input type='text' value='<?= $id_pelicula ?? "" ?>' name='id_pelicula' hidden />
                        <input type='text' value='<?= $id_dia ?? "" ?>' name='id_dia' hidden />
                        <input class="botonhora" type="submit" value="<?= $a ?? ""?>" name="hora">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>

        <div id="videograndetrailer">
            <iframe src="https://www.youtube.com/embed/<?= $arraypeliculas[$id_pelicula]["url"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</body>

</html>