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
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="vista/js/script.js"></script>
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

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="margin: 0 auto;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" class="d-block w-100 object-fit-cover-top" alt="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" style="max-height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block gradiante">
                    <h5 class="textocarrusel">Indiana Jones</h5>
                    <p class="textocarrusel">Descripción de la imagen 1</p>
                </div>
            </div>
            <div class="carousel-item">

                <img src="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" class="d-block w-100 object-fit-cover-top" alt="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" style="max-height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block gradiante">
                    <h5 class="textocarrusel">Título de la imagen 2</h5>
                    <p class="textocarrusel">Descripción de la imagen 2</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" class="d-block w-100 object-fit-cover-top" alt="https://www.joblo.com/wp-content/uploads/2022/11/indiana-jones-5-empire-cover.jpg" style="max-height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block gradiante">
                    <h5 class="textocarrusel">Título de la imagen 3</h5>
                    <p class="textocarrusel">Descripción de la imagen 3</p>
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
            <?php foreach ($arraypeliculas as $a) { ?>
                <div class="pelicula" style="background-image: url('vista/fotos/<?= $a["imagen"] ?> ');"><input class="botonpelicula" type="submit" value="<?= $a["id_pelicula"] ?>" name="pelicula"></div>
            <?php } ?> 
        </div>
        </form>


        <div id="estrenos">
            <h2>Próximos Estrenos</h2>
        </div>
        <div class="linea2 linea"></div>
        <div id="peliculasestrenos">
            <div class="peliculaestreno"><img alt="YfopzNHLp4o" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno"><img alt="9ShSKNr-PR0" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno"><img alt="9ShSKNr-PR0" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno"><img alt="9ShSKNr-PR0" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
            <div class="peliculaestreno"><img alt="9ShSKNr-PR0" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
        </div>


    </div>


    <div id="video"></div>
    <div id="videofondo"></div>
</body>

</html>