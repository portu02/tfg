<?php
if (isset($_SESSION['usuario_sesion'])) {
    if (isset($_POST["enviar_sala_reservar"]) && isset($_SESSION['usuario_sesion'])) {

        $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
        $nombrecookie = "Entradas" . $id_usuario;

        if (isset($_COOKIE[$nombrecookie])) {
            $datos_serializados = $_COOKIE[$nombrecookie];
            $datos_cookie = unserialize($datos_serializados);

            $hora_objt = new Horario("", "", "", "", "", "");
            $butaca_objt = new Butaca("", "", "", "", "");

            foreach ($datos_cookie as $i => $j) {
                if ($hora_objt->ComprobarID($datos_cookie[$i]["id_horario"]) !== null && $butaca_objt->ComprobarID($datos_cookie[$i]["id_butaca"]) !== null) {
                    $datos[]  = array('id_horario' => $datos_cookie[$i]["id_horario"], 'id_butaca' => $datos_cookie[$i]["id_butaca"], 'precio' => $datos_cookie[$i]["precio"]);
                }
            }
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
        if (isset($_POST["reserva"])) {

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

            // Guardar la cadena serializada en una cookie
            $datos_serializados = serialize($datos);
            setcookie($nombrecookie, $datos_serializados, time() + (86400 * 30), '/');

            $hora_objt = new Horario("", "", "", "", "", "");

            //RECORRER ARRAY DE COOKIE Y CREAR ARRAY ENTRADA
            $id_array = 0;
            foreach ($datos as $i => $j) {
                //horario
                $horaobtiene = $hora_objt->obtieneDeID($datos[$i]["id_horario"]);
                if ($horaobtiene != null) {
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
        } else {

            echo "<script>alert('No ha seleccionado ninguna butaca');</script>";
            require_once("vista/principal.php");
        }
    } elseif (isset($_POST["quitar_reserva"]) || isset($_POST["carrito_sesion"])) {

        $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
        $nombrecookie = "Entradas" . $id_usuario;

        if (isset($_POST["id_array"])) {
            $id_array = $_POST["id_array"];
        }


        if (isset($_COOKIE[$nombrecookie])) {
            $datos_serializados = $_COOKIE[$nombrecookie];
            $datos_cookie = unserialize($datos_serializados);

            $hora_objt = new Horario("", "", "", "", "", "");
            $butaca_objt = new Butaca("", "", "", "", "");

            foreach ($datos_cookie as $i => $j) {
                if (isset($id_array)) {
                    if ($i != $id_array && $hora_objt->ComprobarID($datos_cookie[$i]["id_horario"]) !== null && $butaca_objt->ComprobarID($datos_cookie[$i]["id_butaca"]) !== null) {
                        $datos[]  = array('id_horario' => $datos_cookie[$i]["id_horario"], 'id_butaca' => $datos_cookie[$i]["id_butaca"], 'precio' => $datos_cookie[$i]["precio"]);
                    }
                } else {
                    if ($hora_objt->ComprobarID($datos_cookie[$i]["id_horario"]) !== null && $butaca_objt->ComprobarID($datos_cookie[$i]["id_butaca"]) !== null) {
                        $datos[]  = array('id_horario' => $datos_cookie[$i]["id_horario"], 'id_butaca' => $datos_cookie[$i]["id_butaca"], 'precio' => $datos_cookie[$i]["precio"]);
                    }
                }
            }
            //Si no hay datos borra la cookie 
            if (isset($datos)) {

                //Si da a quitar cambia la cookie, else no cambia
                $datos_serializados = serialize($datos);
                // Guardar la cadena serializada en una cookie
                setcookie($nombrecookie, $datos_serializados, time() + (86400 * 30), '/');

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

                //Si el array entrada esta vacio no se mete en el carro
                if (isset($arrayentrada)) {
                    require_once("vista/carrito.php");
                } else {
                    require_once("vista/principal.php");
                }
            } else {

                setcookie($nombrecookie, '', time() - 3600, '/');
                require_once("vista/principal.php");
            }
        } else {
            require_once("vista/principal.php");
        }
    } elseif (isset($_POST["comprar_reservas"])) {

        $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
        $nombrecookie = "Entradas" . $id_usuario;

        if (isset($_COOKIE[$nombrecookie])) {

            $datos_serializados = $_COOKIE[$nombrecookie];
            $datos_cookie = unserialize($datos_serializados);

            $hora_objt = new Horario("", "", "", "", "", "");
            $butaca_objt = new Butaca("", "", "", "", "");
            $reserva_objt = new Reserva("", "", "", "", "", "");
            $pelicula_objt = new Pelicula("", "", "", "", "", "", "", "", "");

            foreach ($datos_cookie as $i => $j) {
                if ($hora_objt->ComprobarID($datos_cookie[$i]["id_horario"]) !== null && $butaca_objt->ComprobarID($datos_cookie[$i]["id_butaca"]) !== null && $reserva_objt->ComprobarReserva($datos_cookie[$i]["id_horario"], $datos_cookie[$i]["id_butaca"]) === null) {
                    $datos[]  = array('id_horario' => $datos_cookie[$i]["id_horario"], 'id_butaca' => $datos_cookie[$i]["id_butaca"], 'precio' => $datos_cookie[$i]["precio"]);
                }
            }

            if (isset($datos)) {
                /********************/
                /** COMPRA SUPREMA **/

                $string_total = "";
                $total = 0;

                foreach ($datos as $i => $j) {

                    $dia_sintocar = $hora_objt->obtieneDeID($datos[$i]["id_horario"])->fecha;
                    $dia = new DateTime($dia_sintocar);
                    $dia = $dia->format('d F Y');

                    $hora = $hora_objt->obtieneDeID($datos[$i]["id_horario"])->hora;

                    $fila = $butaca_objt->obtieneDeID($datos[$i]["id_butaca"])->fila;
                    $columna = $butaca_objt->obtieneDeID($datos[$i]["id_butaca"])->columna;

                    $id_pelicula = $hora_objt->obtieneDeID($datos[$i]["id_horario"])->id_pelicula;
                    $nombre = $pelicula_objt->obtieneDeID($id_pelicula)->nombre;

                    $id_sala = $hora_objt->obtieneDeID($datos[$i]["id_horario"])->id_sala;

                    $precio = $datos[$i]["precio"];

                    $total = $total + $precio;

                    $string_total = $string_total . "<p style='font-size:18px' >Para el día " . $dia . " a las " . $hora . "</p>";
                    $string_total = $string_total . "<h2><span>Pelicula:</span> " . $nombre . " <span>Sala:</span> " . $id_sala . "</h2>";
                    $string_total = $string_total . "<h2><span>Entrada:</span> Fila: " . $fila . " Columna: " . $columna . ".</h2>";
                    $string_total = $string_total . "<h2>" . $precio . " €</h2><hr style='background-color: white;margin-left: 40%;margin-right:40%;'>";


                    $reserva = new Reserva("", $datos[$i]["id_horario"], $id_usuario, $id_sala, $datos[$i]["id_butaca"], $datos[$i]["precio"]);
                    $reserva->crear();
                }

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
                        Body: "<html><head><style>*{color: white;text-align:center;}span{color:red;} #richi {font-family: 'Times New Roman', serif;font-weight: bold;font-size: 40px;color: red;}div {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);background-color: black;}</style></head><body><div class='contenedor'><h1><span id='richi'>RICHILICULAS</span></h1><hr style='background-color: white;'><h1>Compra de entradas</h1><hr style='background-color: white;margin-left: 40%;margin-right:40%;'><?= $string_total ?? "" ?><h2><span>Total:</span> <?= $total ?? '' ?> €</h2><hr style='background-color: white;'><p style='font-size:20px' >Gracias por confiar en Richiliculas para comprar tu entrada de cine, esperamos que disfrutes de la película</p></div></body></html>"
                    }).then(
                        message => alert(message)
                    );
                    alert("Se ha comprado correctamente las entradas revise spam");
                </script>
<?php
                setcookie($nombrecookie, '', time() - 3600, '/');
                require_once("vista/principal.php");
            } else {
                echo "<script>alert('Se te han adelantado, haber andado listo');</script>";
                require_once('vista/principal.php');
            }
        } else {
            require_once('vista/principal.php');
        }
    }
} else {
    echo "<script>alert('No ha iniciado sesion');</script>";
    require_once('vista/login.php');
}
