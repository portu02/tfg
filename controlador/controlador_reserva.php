<?php
/*
if (isset($_POST["enviar_sala_reservar"]) && isset($_SESSION['usuario_sesion'])) {
    $nombre_pelicula = $_POST["nombre_pelicula"];
    $id_sala = $_POST["id_sala"];
    $id_horario = $_POST["id_horario"];
    $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];

    //Si es luxury mas caro
    $luxury = $sala->obtieneDeID($id_sala)->luxury;
    //Si es miercoles la mitad de precio
    $miercoles = $horarios->obtieneDeID($id_horario)->fecha;
    if (date("N", strtotime($miercoles)) == 3) {
        if ($luxury == 1) {
            $precio = 7.5;
        } else {
            $precio = 5;
        }
    } else {
        if ($luxury == 1) {
            $precio = 15;
        } else {
            $precio = 10;
        }
    }



    $string_fila_columna = "";
    $contador_entrada = 0;
    $total = 0;
    if (isset($_POST["reserva"])) {
        $reservas = $_POST["reserva"];
        foreach ($reservas as $i => $a) {

            $datos = explode(";", $i);
            $fila = $datos[0];
            $columna = $datos[1];
            $string_fila_columna = $string_fila_columna . " <span>Entrada</span> Fila: " . $fila . " Columna: " . $columna . ".<br/>";

            $id_butaca = $butacas->obtenerIDButaca($fila, $columna, $id_sala);
            $id_butaca = $id_butaca[0]["id_butaca"];


            $reserva = new Reserva("", $id_horario, $id_usuario, $id_sala, $id_butaca, $precio);
            $reserva->crear();

            $contador_entrada++;
        }
        $dia = $horarios->obtieneDeID($id_horario)->fecha;
        $hora = $horarios->obtieneDeID($id_horario)->hora;

        //Dar formato a la fecha
        $dia = new DateTime($dia);
        $dia = $dia->format('d F Y');
        //Calcular el total de las entradas
        $total = $precio * $contador_entrada;

        $correo_reserva = $_SESSION['usuario_sesion']['correo'];
?>
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <script>
            //ENVIAR CORREO
            Email.send({
                Host: "smtp.elasticemail.com",
                Username: "richiliculas@gmail.com",
                Password: "33116F6401112EB1E4626A8D39D35715CB38",
                To: "<?= $correo_reserva ?? '' ?>",
                From: "richiliculas@gmail.com",
                Subject: "Compra de entradas:",
                Body: "<html><head><style>*{color: white;text-align:center;}span{color:red;} #richi {font-family: 'Times New Roman', serif;font-weight: bold;font-size: 40px;color: red;}div {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);background-color: black;}</style></head><body><div class='contenedor'><h1><span id='richi'>RICHILICULAS</span></h1><hr style='background-color: white;'><h1>Compra de entradas</h1><p style='font-size:18px' >Para el día <?= $dia ?? "" ?> a las <?= $hora ?? "" ?></p><h2><span>Pelicula:</span> <?= $nombre_pelicula ?? '' ?> <span>Sala:</span> <?= $id_sala ?? '' ?></h2><h2><?= $string_fila_columna ?? '' ?></h2><h2><span>Total:</span> <?= $total ?? '' ?> €</h2><hr style='background-color: white;'><p style='font-size:20px' >Gracias por confiar en Richiliculas para comprar tu entrada de cine, esperamos que disfrutes de la película</p></div></body></html>"
            }).then(
                message => alert(message)
            );
            alert("Se ha comprado correctamente las entradas revise spam");
        </script>
<?php

    } else {
        echo "<script>alert('No ha seleccionado ninguna butaca');</script>";
    }
    require_once('vista/principal.php');
} else {
    echo "<script>alert('No ha iniciado sesion');</script>";
    require_once('vista/login.php');
}
*/


if (isset($_POST["enviar_sala_reservar"]) && isset($_SESSION['usuario_sesion'])) {
    /*
    //ELIMINA COOKIE
    $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
    $nombrecookie = "Entradas".$id_usuario;

    unset($_COOKIE[$nombrecookie]);
    setcookie($nombrecookie, '', time() - 3600, '/');
    */

    $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
    $nombrecookie = "Entradas" . $id_usuario;

    if (isset($_COOKIE[$nombrecookie])) {
        $datos_serializados = $_COOKIE[$nombrecookie];
        $datos = unserialize($datos_serializados);
    }



    $nombre_pelicula = $_POST["nombre_pelicula"];
    $id_sala = $_POST["id_sala"];
    $id_horario = $_POST["id_horario"];
    $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];

    //Si es luxury mas caro
    $luxury = $sala->obtieneDeID($id_sala)->luxury;
    //Si es miercoles la mitad de precio
    $miercoles = $horarios->obtieneDeID($id_horario)->fecha;
    if (date("N", strtotime($miercoles)) == 3) {
        if ($luxury == 1) {
            $precio = 7.5;
        } else {
            $precio = 5;
        }
    } else {
        if ($luxury == 1) {
            $precio = 15;
        } else {
            $precio = 10;
        }
    }

    $reservas = $_POST["reserva"];

    foreach ($reservas as $i => $a) {

        $datosss = explode(";", $i);
        $fila = $datosss[0];
        $columna = $datosss[1];

        $id_butaca = $butacas->obtenerIDButaca($fila, $columna, $id_sala);
        $id_butaca = $id_butaca[0]["id_butaca"];


        if (isset($datos) && isset($_COOKIE[$nombrecookie])) {
            $datosExistentes = false;
            foreach ($datos as $dato => $d) {
                if ($datos[$dato]['id_horario'] == $id_horario && $datos[$dato]['id_butaca'] == $id_butaca && $datos[$dato]['precio'] == $precio) {
                    $datosExistentes = true;
                    break;
                }
            }
            if (!$datosExistentes) {
                $datos[] = array('id_horario' => $id_horario, 'id_butaca' => $id_butaca, 'precio' => $precio);
            }
        } else {
            $datos[] = array('id_horario' => $id_horario, 'id_butaca' => $id_butaca, 'precio' => $precio);
        }
    }

    print_r($datos);
    echo "<br>";


    // Guardar la cadena serializada en una cookie
    $datos_serializados = serialize($datos);
    setcookie($nombrecookie, $datos_serializados, time() + (86400 * 30), '/');

    $hora_objt = new Horario("", "", "", "", "", "");

    //RECORRER ARRAY DE COOKIE Y CREAR ARRAY ENTRADA
    $id_array = 0;
    foreach ($datos as $i => $j) {
        //horario
        $horaobtiene = $hora_objt->obtieneDeID($datos[$i]["id_horario"]);
        //fecha
        $fechacambiado = new DateTime($horaobtiene->fecha);
        $fechacambiado = $fechacambiado->format('d-m-Y');
        //nombrepelicula
        $nombre = $pelicula_objt->obtieneDeID($horaobtiene->id_pelicula)->nombre;
        //sala
        if ($sala->obtieneDeID($horaobtiene->id_sala)->luxury == 0) {
            $luxury = "No";
        } else {
            $luxury = "Si";
        }
        //butaca
        $butacasobtiene = $butacas->obtieneDeID($datos[$i]["id_butaca"]);
        //precio
        $precio = $datos[$i]["precio"];

        $arrayentrada[] = array("id_array" => $id_array, "id_sala" => $horaobtiene->id_sala, "luxury" => $luxury, "nombre" => $nombre, "fecha" => $fechacambiado, "hora" => $horaobtiene->hora, "fila" => $butacasobtiene->fila, "columna" => $butacasobtiene->columna, "precio" => $precio);
        $id_array++;
    }

    require_once("vista/carrito.php");
} elseif (isset($_POST["quitar_reserva"])) {

    $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
    $nombrecookie = "Entradas" . $id_usuario;

    $id_array = $_POST["id_array"];

    if (isset($_COOKIE[$nombrecookie])) {
        $datos_serializados = $_COOKIE[$nombrecookie];
        $datos_cookie = unserialize($datos_serializados);

        foreach ($datos as $i => $j) {
            if ($i != $id_array) {
                $datos[]  = array('id_horario' => $datos[$i]["id_horario"], 'id_butaca' => $datos[$i]["id_butaca"], 'precio' => $datos[$i]["precio"]);
            }
        }

        $datos_serializados = serialize($datos);

        // Guardar la cadena serializada en una cookie
        setcookie($nombrecookie, $datos_serializados, time() + (86400 * 30), '/');

        $hora_objt = new Horario("", "", "", "", "", "");
        //RECORRER ARRAY DE COOKIE Y CREAR ARRAY ENTRADA
        $id_array = 0;
        foreach ($datos as $i => $j) {
            //horario
            $horaobtiene = $hora_objt->obtieneDeID($datos[$i]["id_horario"]);
            //fecha
            $fechacambiado = new DateTime($horaobtiene->fecha);
            $fechacambiado = $fechacambiado->format('d-m-Y');
            //nombrepelicula
            $nombre = $pelicula_objt->obtieneDeID($horaobtiene->id_pelicula)->nombre;
            //sala
            if ($sala->obtieneDeID($horaobtiene->id_sala)->luxury == 0) {
                $luxury = "No";
            } else {
                $luxury = "Si";
            }
            //butaca
            $butacasobtiene = $butacas->obtieneDeID($datos[$i]["id_butaca"]);
            //precio
            $precio = $datos[$i]["precio"];

            $arrayentrada[] = array("id_array" => $id_array, "id_sala" => $horaobtiene->id_sala, "luxury" => $luxury, "nombre" => $nombre, "fecha" => $fechacambiado, "hora" => $horaobtiene->hora, "fila" => $butacasobtiene->fila, "columna" => $butacasobtiene->columna, "precio" => $precio);
            $id_array++;
        }
    }

    require_once("vista/carrito.php");
}
