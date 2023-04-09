<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vista/css/estilos.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <h2 class="logotipo">Richiliculas</h2>
            <nav>
                <a href="#" class="activo">Inicio</a>
                <a href="#">Programas</a>
                <a href="#">Películas</a>
                <a href="#">Más Recientes</a>
                <a href="#">Mi lista</a>
            </nav>
        </div>
    </header>
    <div id="imagengrande">
        <?= $arraypeliculas[$id_pelicula]["nombre"] ?>
    </div>
    <div id="menudias">
        <form action="" method="post">
            <?php
            echo "<input type='text' value='" . $id_pelicula . "' name='id_pelicula' hidden/>";
            echo "<input type='text' value='" . $id_dia . "' name='id_dia' hidden/>";
            ?>

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
            <div class="pelicula" style="background-image: url('../vista/fotos/<?= $arraypeliculas[$id_pelicula]["imagen"] ?> ');"></div>
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
        </div>

        <div id="videograndetrailer">
            <iframe src="https://www.youtube.com/embed/<?= $arraypeliculas[$id_pelicula]["url"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</body>

</html>