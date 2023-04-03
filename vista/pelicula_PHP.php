<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
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
            margin-left: 10%;
            margin-right: 10%;
            background-color: rgb(0, 0, 0);
            height: 500vh;
        }


        /* IMAGEN GRANDE */
        #imagengrande {
            background-color: #737373;
            margin-left: 0;
            margin-right: 0;
            height: 10vh;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;

            font-family: 'Bebas Neue', cursive;
            font-weight: normal;
            color: white;
            font-size: 4.5em;
            cursor: default;
        }

        #menudias {
            background-color: #404040;
            margin-left: 0;
            margin-right: 0;
        }

        #dias {
            background-color: #404040;
            margin-left: 10%;
            margin-right: 10%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px 40px;
            flex-wrap: wrap;
            border: 10px solid;
            border-image-slice: 1;
            border-width: 10px;
            /*border-image:linear-gradient(to right,red,rgba(0, 0, 0, 0)) 1 100%;*/
            border-image-source: linear-gradient(to right, red, rgba(0, 0, 0, 0));
            border-left: 0;
            border-right: 0;
        }

        .dia {
            background-color: #404040;
            height: 10vh;
            width: 10vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5em;
            font-weight: bold;
            border-radius: 5px;
            color: white;
        }

        .dia:hover {
            border: 2px solid white;
            transform: scale(1.2);
            cursor: pointer;
            transition: 0.2s;
            transform: 0.2s;
        }

        .dia:first-of-type {
            border: none;
            transform: scale(1);
            cursor: auto;
            transition: 0;
            transform: 0;
            cursor: default;
        }

        .botondia {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            font-size: 1em;
            font-weight: bold;
            color: white;
            font-family: 'Open Sans', sans-serif;
            cursor: pointer;
        }

        .diaactivo {
            border: 2px solid white;
            transform: scale(1.2);
            cursor: pointer;
            transition: 0.2s;
            transform: 0.2s;
        }

        #escenapelicula {
            background-color: black;
            top: 50px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px 20px;
            flex-wrap: wrap;
        }

        .pelicula {
            background-color: green;
            height: 400px;
            width: 250px;
            position: relative;
            background-image: url('https://res.cloudinary.com/odeoncloud/w_380%2Ch_543%2Cf_auto%2Cq_auto/v1678442440/wcloud/odeon/ps_10162.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 10px;
        }


        /* SINOPSIS */
        #info {
            margin-left: 20px;
            margin-right: 20px;
            background-color: black;
            width: 90vh;
            color: white;
        }

        #info h3 {
            font-size: 1.5em;
        }

        #info h4 {
            margin-top: 5px;
            font-size: 1.2em;
        }

        #info p {
            margin-left: 20px;
            text-align: justify;
            margin-right: 20px;
        }

        /*   */


        #horas {
            top: 50px;
            margin-top: 50px;
            position: relative;
            background-color: #404040;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px 40px;
            flex-wrap: wrap;
        }

        .hora {
            background-color: #404040;
            height: 10vh;
            width: 10vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5em;
            font-weight: bold;
            border-radius: 5px;
            color: white;
            border: 2px solid white;
        }

        .hora:hover {
            transform: scale(1.2);
            cursor: pointer;
            transition: 0.2s;
            transform: 0.2s;
        }

        .hora:first-of-type {
            border: none;
            transform: scale(1);
            cursor: auto;
            transition: 0;
            transform: 0;
            cursor: default;
        }

        .botonhora {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            font-size: 1em;
            font-weight: bold;
            color: white;
            font-family: 'Open Sans', sans-serif;
            cursor: pointer;
        }

        #trailer {
            background-color: black;
            top: 50px;
            margin-top: 50px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px 40px;
            flex-wrap: wrap;
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
        }

        #trailer iframe {
            width: 57.79vh;
            height: 32.5vh;
        }

        @media (min-width: 1200px) {
            #trailer iframe {
                width: 115.58vh;
                height: 65.01vh;
            }
        }
    </style>
</head>
<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$sql = "";


if (isset($_POST["pelicula"])) {
    $id = $_POST["pelicula"];

    try {
        $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //PARA EL LIKE :nombre '%'
        $stmt = $conn->prepare("SELECT * FROM reserva WHERE id = :nombre");

        $nombre = $id;

        $stmt->bindParam(":nombre", $nombre);

        $stmt->execute();
        $registroarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registroarray) > 0) {

            foreach ($registroarray as $a) {
                // echo $a["id"] . " " . $a["sala"] . " " . $a["dia"] . " " . $a["hora"] . "<br>";
                $diasimple = $a["dia"];
                $diaini = substr($diasimple, 8, 2);
                $diafin = substr($diasimple, 5, 2);
                $dia = $diaini . "/" . $diafin;
                $array[] = $dia;
            }
            $b = array_unique($array);
            $id_dia = array_shift($b);
        }
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
    $conn = null;
} elseif (isset($_POST["id_pelicula"])) {
    $id = $_POST["id_pelicula"];
}
if (isset($_POST["dia"])) {
    $id = $_POST["id_pelicula"];
    $id_dia = $_POST["dia"];
}
?>

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
        Mario Bros
    </div>
    <div id="menudias">
        <form action="" method="post">
            <?php
            echo "<input type='text' value='" . $id . "' name='id_pelicula' hidden/>";
            echo "<input type='text' value='" . $id_dia . "' name='id_dia' hidden/>";
            ?>
            <div id="dias">
                <div class="dia">
                    Día
                </div>
                <?php
                $servidor = "localhost";
                $usuario = "root";
                $clave = "";
                $sql = "";

                try {
                    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    //PARA EL LIKE :nombre '%'
                    $stmt = $conn->prepare("SELECT * FROM reserva WHERE id = :nombre");

                    $nombre = $id;

                    $stmt->bindParam(":nombre", $nombre);

                    $stmt->execute();
                    $registroarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($registroarray) > 0) {

                        foreach ($registroarray as $a) {
                            // echo $a["id"] . " " . $a["sala"] . " " . $a["dia"] . " " . $a["hora"] . "<br>";
                            $diasimple = $a["dia"];
                            $diaini = substr($diasimple, 8, 2);
                            $diafin = substr($diasimple, 5, 2);
                            $dia = $diaini . "/" . $diafin;
                            $array[] = $dia;
                        }
                        $b = array_unique($array);
                        foreach ($b as $a) {
                            if($a == $id_dia){
                                echo '<div class="dia diaactivo"><input class="botondia" type="submit" value="' . $a . '" name="dia"></div>';
                            }else{
                                echo '<div class="dia"><input class="botondia" type="submit" value="' . $a . '" name="dia"></div>';
                            }
                        }
                    }
                } catch (PDOException $e) {
                    echo "Error" . $e->getMessage();
                }
                $conn = null;
                ?>
            </div>
        </form>
    </div>

    <div id="hoja">
        <div id="escenapelicula">
            <div class="pelicula">1</div>
            <div id="info">
                <h3>Mario Bros</h3>
                <h4>Sinopsis</h4>
                <p>Adaptación de la serie de videojuegos de Nintendo. La película cuenta la historia de Mario y Luigi,
                    dos hermanos que viajan a un mundo oculto para rescatar a la Princesa Peach, capturada por el
                    malvado Rey Bowser. Las cosas, sin embargo no serán sencillas. Mario y Luigi tendrán que enfrentarse
                    a un ejército de setas animadas antes de luchar contra su oponente. Rutas de ladrillos y castillos
                    con múltiples peligros serán algunos de los obstáculos que los hermanos tendrán que superar para
                    conseguir su objetivo.</p>
                <h4>Categoría</h4>
                <p>Animación</p>
                <h4>Clasificación</h4>
                <p>TP</p>
                <h4>Duración</h4>
                <p>98 min</p>
                <h4>Fecha de Estreno</h4>
                <p>05/04/2023</p>
            </div>
        </div>

        <form action="../indi_PHP.php" method="post">
            <div id="horas">
                <div class="hora">Horario</div>
                <?php
                try {
                    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $diasimple = $id_dia;
                    $diaini = substr($diasimple,0,2);
                    $diafin = substr($diasimple,3,2);
                    $dia = $diafin."-".$diaini;
                
                    //PARA EL LIKE :nombre '%'
                    $stmt = $conn->prepare("SELECT * FROM reserva WHERE dia LIKE '%' :dia AND id = :id;");
                
                    $nombre = $dia;
                
                    $stmt->bindParam(":dia", $nombre);
                    $stmt->bindParam(":id", $id);
                
                    $stmt->execute();
                    $registroarray = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                    if (count($registroarray) > 0) {
                
                        foreach ($registroarray as $a) {
                           // echo $a["id"] . " " . $a["sala"] . " " . $a["dia"] . " " . $a["hora"] . "<br>";
                           $arrays[] = substr($a["hora"],0,5);
                        }
                
                        foreach ($arrays as $a) {
                            echo '<div class="hora"><input class="botonhora" type="submit" value="'.$a.'" name="hora"></div>';
                        }
                    }
                
                } catch (PDOException $e) {
                    echo "Error" . $e->getMessage();
                }
                $conn = null;
                ?>
            </div>
        </form>

        <div id="trailer">
            <iframe src="https://www.youtube.com/embed/_1f2RLdxQfA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST["dia"])) {
}

?>