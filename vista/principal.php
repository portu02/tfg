<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="vista/js/script.js"></script>
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="margin: 0 auto;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="vista/fotos/indiana-jones.jpg" class="d-block w-100 object-fit-cover-top" alt="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" style="max-height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block gradiante">
                    <h5 class="textocarrusel">Indiana Jones: El dial del destino</h5>
                    <p class="textocarrusel">Fecha de estreno 30/06/2023</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="vista/fotos/panoramicaTransformers.webp" class="d-block w-100 object-fit-cover-top" alt="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/transformers-despertar-bestias-1669970401.png" style="max-height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block gradiante">
                    <h5 class="textocarrusel">Transformers: El despertar de las bestias</h5>
                    <p class="textocarrusel">Fecha de estreno 09/06/2023</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="vista/fotos/blueBeetle.jpg" class="d-block w-100 object-fit-cover-top" alt="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" style="max-height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block gradiante">
                    <h5 class="textocarrusel">Blue Beetle</h5>
                    <p class="textocarrusel">Fecha de estreno 18/08/2023</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div id="hoja">
        <div id="cartelera">
            <h2>Cartelera</h2>
        </div>
        <div class="linea1 linea"></div>
        <form action="" method="post">
            <div id="peliculas">
                <?php foreach ($arraypeliculaspaginado as $a) { ?>
                    <div class="pelicula" style="background-image: url('vista/fotos/<?= $a["imagen"] ?> ');"><input class="botonpelicula" type="submit" value="<?= $a["id_pelicula"] ?>" name="pelicula"></div>
                <?php } ?>
            </div>
        </form>

        <div id='contain'>
            <div id='dentro'>
                <?php
                foreach ($num as $a) {

                    if (isset($_GET["pagina"])) {
                        if ($_GET["pagina"] == $a) {
                ?>
                            <a href='?pagina=<?= ($a) ?>'>
                                <div id='colorea' class='dentro'></div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href='?pagina=<?= ($a) ?>'>
                                <div class='dentro'></div>
                            </a>
                        <?php
                        }
                    } else {
                        if ($a == 1) {
                        ?>
                            <a href='?pagina=<?= ($a) ?>'>
                                <div id='colorea' class='dentro'></div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <a href='?pagina=<?= ($a) ?>'>
                                <div class='dentro'></div>
                            </a>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>


        <div id="estrenos">
            <h2>Próximos Estrenos</h2>
        </div>
        <div class="linea2 linea"></div>
        <div id="peliculasestrenos">
            <div class="peliculaestreno" style="background-image:url('https://i.ytimg.com/vi/2dP-Lj5mYKY/maxresdefault.jpg');"><img alt="lLVmLJdRZJQ" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno" style="background-image:url('https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/indiana-jones-dial-destino-1676266852.jpg');"><img alt="9ShSKNr-PR0" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno" style="background-image:url('https://bolavip.com/__export/1680546890871/sites/bolavip/img/2023/04/03/blue-beetle-estrena-trailer-de-que-se-trata-la-pelicula-ok.jpeg_412320734.jpeg');"><img alt="I4nNE4jB5rc" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno" style="background-image:url('https://img.youtube.com/vi/hflCiNtY6MA/maxresdefault.jpg');"><img alt="yLYbOe914ZU" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno" style="background-image:url('https://media.revistagq.com/photos/63ea01f16c6ab595e1330cf0/16:9/w_2560%2Cc_limit/flash.png');"><img alt="Gzj1JzTCxm8" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
        </div>
        
        
        
    </div>
    <div id="video"></div>
    <div id="videofondo"></div>
    <div class="linea3"></div>
        <footer class="container-fluid text-center">
            <span class="fa fa-instagram" style="font-size: 30px; color:white"></span>&emsp;
            <span class="fa fa-twitter" style="font-size: 30px; color:white"></span>&emsp;
            <span class="fa fa-facebook" style="font-size: 30px; color:white"></span>&emsp;
            <span class="fa fa-snapchat" style="font-size: 30px; color:white"></span>
        </footer>

</body>

</html>