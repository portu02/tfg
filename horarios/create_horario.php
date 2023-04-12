<?php
function horario($hora)
{
    switch ($hora) {
        case 22:
            $hora = "22:00:00";
            break;
        case 21:
            $hora = "21:00:00";
            break;
        case 20:
            $hora = "20:00:00";
            break;
        case 19:
            $hora = "19:00:00";
            break;
        case 18:
            $hora = "18:00:00";
            break;
        case 16:
            $hora = "16:00:00";
            break;
        default:
            $hora = "17:00:00";
            break;
    }

    return $hora;
}


$servidor = "localhost";
$usuario = "root";
$clave = "";
$sql = "";
$dbname = "cine";

/* SACAR ARRAY SALAS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$dbname;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT COUNT(id_sala) AS num_salas FROM sala");

    $stmt->execute();
    $salasarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($salasarray) > 0) {
        $numsalas = $salasarray[0]["num_salas"];
    } else {
        $numsalas = 1;
    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
$conn = null;

/* SACAR ARRAY PELICULAS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$dbname;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM pelicula");

    $stmt->execute();
    $registroarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($registroarray) > 0) {
    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
$conn = null;

/* SACAR ARRAY DIAS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$dbname;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT fecha FROM horario GROUP BY fecha");

    $stmt->execute();
    $horarioarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $arraydia = array();
    if (count($horarioarray) > 0) {
        foreach ($horarioarray as $a) {
            $arraydia[] = $a["fecha"];
        }
    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
$conn = null;

/* ELIMINAR HORARIOS ANTIGUOS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$dbname;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fecha_anteayer = new DateTime();
    $fecha_anteayer->modify('-2 day');
    $fecha_antigua = $fecha_anteayer->format('Y-m-d');

    $stmt = $conn->prepare("DELETE FROM horario WHERE fecha <= :fecha;");

    $stmt->bindParam(":fecha", $fecha_antigua);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
$conn = null;



/* INSERTA UNA SEMANA */
for ($iu = 0; $iu < 8; $iu++) {

    $fecha_actual = new DateTime();
    $fecha_actual->modify('+' . $iu . ' day');

    $fecha_ayer = new DateTime();
    $fecha_ayer = $fecha_ayer->modify('+' . $iu . ' day');
    $fecha_ayer->modify('-1 day');

    /* SI EXISTE LA FECHA NO LA VUELVE A INSERTAR */
    if (!in_array($fecha_actual->format('Y-m-d'), $arraydia)) {

        //SOLO COGE LAS PELICULAS QUE TODAVIA NO SE HAN ESTRENADO strtotime($fecha_actual->format('Y-m-d')) > strtotime($a["fecha_estreno"])
        $peliculas = array();
        $peliculasduracion = array();
        foreach ($registroarray as $a) {
            //SI ES EL MISMO DIA O ANTERIOR PROBABILIDAD 5
            if (($a["fecha_estreno"] == $fecha_actual->format('Y-m-d') || ($a["fecha_estreno"] == $fecha_ayer->format('Y-m-d'))) && strtotime($fecha_actual->format('Y-m-d')) >= strtotime($a["fecha_estreno"])) {
                $peliculas[$a["id_pelicula"]] = 5;
                //SI ESTAN EN LA MISMA SEMANA PROBABILIDAD 2
            } elseif (date('W', strtotime($a["fecha_estreno"])) == date('W', strtotime($fecha_actual->format('Y-m-d'))) && strtotime($fecha_actual->format('Y-m-d')) >= strtotime($a["fecha_estreno"])) {
                $peliculas[$a["id_pelicula"]] = 2;
                //SINO PROBABILIDAD 1
            } elseif (strtotime($fecha_actual->format('Y-m-d')) > strtotime($a["fecha_estreno"])) {
                $peliculas[$a["id_pelicula"]] = 1;
            }

            //ARRAY DURACION PELICULAS
            if (strtotime($fecha_actual->format('Y-m-d')) >= strtotime($a["fecha_estreno"])) {
                $peliculasduracion[$a["id_pelicula"]] = $a["duracion"];
            }
        }

        //EL HORARIO EMPIEZA A LAS 16:00
        $horatiempo = 16;

        for ($ns = 1; $ns <= $numsalas; $ns++) {

            echo $fecha_actual->format('Y-m-d');

            //EL HORARIO NO PUEDE SER MAYOR DE LAS 22:00
            while ($horatiempo <= 22) {

                /* COGER PELICULA RANDOM CON LAS PROBABILIDADES */
                $keys = array();
                foreach ($peliculas as $key => $value) {
                    for ($i = 0; $i < $value; $i++) {
                        $keys[] = $key;
                    }
                }
                $peliculaElegida = $keys[array_rand($keys)];

                //RESTA -1 A LA PROBABILIDAD
                $peliculas[$peliculaElegida] = max($peliculas[$peliculaElegida] - 1, 1);

                /* INSERTAR */
                try {
                    $conn = new PDO("mysql:host=$servidor;dbname=$dbname;charset=utf8", $usuario, $clave);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("INSERT INTO horario (fecha, hora, precio, id_pelicula, id_sala) VALUES (:dia,:hora,8,:pelicula,:sala)");

                    $hora = horario($horatiempo);
                    $sala = $ns;
                    $dia = $fecha_actual->format('Y-m-d');
                    $stmt->bindParam(":dia", $dia);
                    $stmt->bindParam(":hora", $hora);
                    $stmt->bindParam(":sala", $sala);
                    $stmt->bindParam(":pelicula", $peliculaElegida);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "Error" . $e->getMessage();
                }
                $conn = null;

                //MOSTRAR LO QUE INSERTA
                echo " => SALA [" . $ns;
                echo "] <b>" . $peliculas[$peliculaElegida] . "</b>";
                echo " PELICULA (" . $peliculaElegida . ") ";
                echo " HORA -" . horario($horatiempo);
                //

                if ($peliculasduracion[$peliculaElegida] >= 138) {
                    $horatiempo += 3;
                } else {
                    $horatiempo += 2;
                }
                echo " || ";
            }

            $horatiempo = 16;
            echo "<br>";
        }

        echo "<hr>";
    }
}