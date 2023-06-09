<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="vista/fotos/R.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="vista/js/script.js"></script>
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>
    <div id="imagengrande">
        <?= $pelicula->nombre ?>
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
            <div class="pelicula" style="background-image: url('vista/fotos/<?= $pelicula->imagen ?> ');"></div>
            <div id="info">
                <h3><?= $pelicula->nombre ?></h3>
                <h4>Sinopsis</h4>
                <p><?= $pelicula->sinopsis ?></p>
                <h4>Categoría</h4>
                <p><?= $pelicula->categoria ?></p>
                <h4>Clasificación</h4>
                <p><?= $pelicula->clasificacion ?></p>
                <h4>Duración</h4>
                <p><?= $pelicula->duracion ?> min</p>
                <h4>Fecha de Estreno</h4>
                <p><?= $pelicula->fecha_estreno ?></p>
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
                        <input type='text' value='<?= $pelicula->nombre ?? "" ?>' name='nombre_pelicula' hidden />
                        <input class="botonhora" type="submit" value="<?= $a ?? "" ?>" name="hora">
                    </form>
                </div>
            <?php
            }
            ?>
        </div>

        <div id="videograndetrailer">
            <iframe src="https://www.youtube.com/embed/<?= $pelicula->url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <form action="" method="post">
            <div class="comment-filas-columnas">
                <input type='text' value='<?= $id_pelicula ?? "" ?>' name='id_pelicula' hidden />
                <input type='text' value='<?= $id_pelicula ?? "" ?>' name='pelicula' hidden />
                <input type="text" id="comment-input" name="texto_comentario" placeholder="Escribe tu comentario...">
                <button id="comment-btn" name="hacer_comentario">Enviar</button>
            </div>
        </form>

        <div id="cajacomentario">
        <?php    
        foreach($comentarios as $comment){
            if(isset($_SESSION['usuario_sesion'])){
                if($comment["id_usuario"] == $_SESSION['usuario_sesion']['id_usuario']){
                    ?>
                        <div class="comentario comentario2"><span class="comentariotunombre"><?= $comment["nombre"].$comment["id_usuario"] ?? "" ?>: </span><?= $comment["texto"] ?? "" ?></div>
                    <?php
                }else{
                    ?>
                    <div class="comentario"><span class="comentarionombre"><?= $comment["nombre"].$comment["id_usuario"] ?? "" ?>: </span><?= $comment["texto"] ?? "" ?></div>
                <?php   
                }
            }else{
                ?>
                <div class="comentario"><span class="comentarionombre"><?= $comment["nombre"].$comment["id_usuario"] ?? "" ?>: </span><?= $comment["texto"] ?? "" ?></div>
            <?php 
            }

        }
        ?>
        </div>

    </div>
    <div class="linea3"></div>
    <footer class="container-fluid text-center">
    <a href='https://www.instagram.com/richiliculas.s.l/' target="_blank"><span class="fa fa-instagram" style="font-size: 30px; color:white"></span></a>&emsp;
    <a href='https://twitter.com/richiliculas?t=aAMqgjzcuEZCDIpD1KBp3w&s=09' target="_blank"><span class="fa fa-twitter" style="font-size: 30px; color:white"></span></a>&emsp;
    <a href='https://twitter.com/richiliculas?t=aAMqgjzcuEZCDIpD1KBp3w&s=09' target="_blank"><span class="fa fa-facebook" style="font-size: 30px; color:white"></span></a>&emsp;
    <a href='https://twitter.com/richiliculas?t=aAMqgjzcuEZCDIpD1KBp3w&s=09' target="_blank"><span class="fa fa-snapchat" style="font-size: 30px; color:white"></span></a> 
    </footer>
</body>

</html>