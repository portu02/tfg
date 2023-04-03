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
    <style>
        /* CARRUSEL */
        .object-fit-cover-top {
            object-fit: cover;
            object-position: top;
            width: 100%;
            height: 70vh;
            /* Altura del carrusel */
        }

        .gradiante {
            background: linear-gradient(to top, black, rgba(255, 122, 89, 0));
            left: 0px;
            right: 0px;
            bottom: 0px;
            text-align: left;
        }

        .textocarrusel {
            left: 200px;
            position: relative;
        }


        /* CABECERA */
        :root {
            --rojo: #E50914;
            --fondo: #141414;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--fondo);
            font-family: 'Open Sans', sans-serif;
        }

        .contenedor {
            width: 90%;
            margin: auto;
        }

        header {
            padding: 30px 0;
        }

        header .contenedor {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logotipo {
            font-family: 'Bebas Neue', cursive;
            font-weight: normal;
            color: var(--rojo);
            font-size: 40px;
        }

        header nav a {
            color: #AAA;
            text-decoration: none;
            margin-right: 20px;
        }

        header nav a:hover,
        header nav a.activo {
            color: #FFF;
        }


        /* HOJA */
        #hoja {
            margin-left: 5%;
            margin-right: 5%;
            background-color: rgb(0, 0, 0);
            height: 500vh;
        }

        #cartelera {
            top: 25px;
            position: relative;
            left: 20px;
        }

        #estrenos {
            top: 25px;
            position: relative;
            left: 20px;
        }

        h2 {
            color: white;
        }

        .linea {
            height: 5px;
            background-color: white;
            width: auto;

            position: relative;
            margin-left: 20px;
            margin-right: 20px;
        }

        .linea1 {
            margin-top: 25px;
        }

        .linea2 {
            margin-top: 25px;
        }

        #peliculas {
            background-color: black;
            margin-top: 40px;
            position: relative;
            gap: 0 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            /*gap: 20px 0;*/
            align-items: flex-start;
        }

        @media (min-width: 768px) {
            #hoja {
                margin-left: 10%;
                margin-right: 10%;
            }

            .pelicula {
                height: 200px;
                width: 50px;
            }
        }

        @media (min-width: 992px) {
            #hoja {
                margin-left: 15%;
                margin-right: 15%;
            }

            .pelicula {
                height: 20px;
                width: 50px;
            }
        }

        @media (min-width: 1200px) {
            #hoja {
                margin-left: 10%;
                margin-right: 10%;
            }
        }


        .pelicula {
            background-color: green;
            height: 400px;
            width: 250px;
            position: relative;
            background-image: url('https://res.cloudinary.com/odeoncloud/w_380%2Ch_543%2Cf_auto%2Cq_auto/v1678442440/wcloud/odeon/ps_10162.jpg');
            background-size: cover;
            background-position: center;
            margin-top: 15px;
            border-radius: 10px;
        }

        .pelicula:hover {
            border: 2px solid white;
            /* margin-top: 0px;*/
            transition: 0.2s;
            transform: 0.2s;
            cursor: pointer;
            transform: scale(1.08);
            z-index: 2;
        }

        .botonpelicula {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            text-indent: -9999px;
        }

        #peliculasestrenos {
            background-color: black;
            margin-top: 40px;
            position: relative;
            gap: 0 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            /*gap: 20px 0;*/
            align-items: flex-start;
        }

        .peliculaestreno {
            background-color: green;
            height: 250px;
            width: 400px;
            position: relative;
            background-image: url('https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/indiana-jones-dial-destino-1676266852.jpg');
            background-size: cover;
            background-position: center;
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
            align-items: center;
            justify-content: center;
            display: flex;
        }

        .peliculaestreno:hover {
            border: 2px solid white;
            /* margin-top: 0px;*/
            transition: 0.2s;
            transform: 0.2s;
            cursor: pointer;
            transform: scale(1.09);
            z-index: 2;
        }

        .play {
            width: 50%;
            height: auto;
        }

        /* Video de Trailer */
        #video {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }

        #trailer {
            width: 57.79vh;
            height: 32.5vh;
        }

        @media (min-width: 1200px) {
            #trailer {
                width: 115.58vh;
                height: 65.01vh;
            }
        }

        .videofondo {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: black;
            opacity: 0.8;
            z-index: 9998;
        }
    </style>
    <script>
        window.onload = function() {
            Array.from(document.getElementsByClassName("peliculaestreno")).map(
                m => m.addEventListener("click",
                    function() {
                        let expandirVideo = document.getElementById("video");
                        //
                        //SACO EL CODIGO DEL TRAILER DEL ALT DE LA IMAGEN
                        //
                        let nombreTrailer = this.querySelector("img").getAttribute("alt");

                        expandirVideo.innerHTML = '<iframe id="trailer" src="https://www.youtube.com/embed/' + nombreTrailer + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

                        let elemento = document.getElementById("videofondo");
                        elemento.setAttribute("class", "videofondo");

                        expandirVideo.style.display = "block";
                    }
                ));

            document.getElementById("videofondo").addEventListener("click",
                function() {
                    let expandirVideo = document.getElementById("video");

                    expandirVideo.style.display = "none";
                    document.getElementById("videofondo").setAttribute("class", "");

                    //PARAR VIDEO
                    let videoFrame = expandirVideo.querySelector("iframe");
                    videoFrame.src = videoFrame.src;
                }
            );
        }
    </script>
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
        <form action="./pelicula_Prueba/pelicula_PHP.php" method="post">
            <div id="peliculas">
                <?php
                $servidor = "localhost";
                $usuario = "root";
                $clave = "";
                $sql = "";

                try {
                    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("SELECT * FROM reserva");

                    $stmt->execute();
                    $registroarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($registroarray) > 0) {

                        foreach ($registroarray as $a) {
                            // echo $a["id"] . " " . $a["sala"] . " " . $a["dia"] . " " . $a["hora"] . "<br>";
                            $array[] = $a["id"];
                        }
                        $b = array_unique($array);
                        foreach ($b as $a) {
                            echo '<div class="pelicula"><input class="botonpelicula" type="submit" value="' . $a . '" name="pelicula"></div>';
                        }
                    }
                } catch (PDOException $e) {
                    echo "Error" . $e->getMessage();
                }
                $conn = null;

                ?>
            </div>
        </form>


        <div id="estrenos">
            <h2>Próximos Estrenos</h2>
        </div>
        <div class="linea2 linea"></div>
        <div id="peliculasestrenos">
            <div class="peliculaestreno"><img alt="9ShSKNr-PR0" class="play" src="https://odeonmulticines.com/wp-content/themes/odeon/assets/icons/video-play-icon.png"></div>
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