<?php
function horario($hora)
{
    switch ($hora) {
        case 4:
            $hora = "16:00:00";
            break;
        case 3:
            $hora = "18:00:00";
            break;
        case 2:
            $hora = "20:00:00";
            break;
        case 1:
            $hora = "22:00:00";
            break;
        default:
            $hora = "22:00:00";
            break;
    }

    return $hora;
}


$servidor = "localhost";
$usuario = "root";
$clave = "";
$sql = "";

/* SACAR ARRAY SALAS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT COUNT(id_sala) AS num_salas FROM sala");

    $stmt->execute();
    $salasarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($salasarray) > 0) {
        $numsalas = $salasarray[0]["num_salas"];
    }else{
        $numsalas = 0;
    }

    $elementosHorarios = array(1, 2, 3, 4);
    $arraySalas = array();

    for ($i = 0; $i < $numsalas; $i++) {
        $arraySalas[] = $elementosHorarios;
    }

} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
$conn = null;

/* SACAR ARRAY PELICULAS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
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
    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT dia FROM horario GROUP BY dia");

    $stmt->execute();
    $horarioarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $arraydia = array();
    if (count($horarioarray) > 0) {
        foreach ($horarioarray as $a) {
            $arraydia[] = $a["dia"];
        }
    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
$conn = null;

/* ELIMINAR HORARIOS ANTIGUOS */
try {
    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fecha_anteayer = new DateTime();
    $fecha_anteayer->modify('-2 day');
    $fecha_antigua = $fecha_anteayer->format('Y-m-d');

    $stmt = $conn->prepare("DELETE FROM horario WHERE dia <= :fecha;");

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

        $peliculas = array();
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
        }

        
        foreach ($arraySalas as $indice => $indiarray) {

            foreach ($indiarray as $valor) {

                $keys = array();
                foreach ($peliculas as $key => $value) {
                    for ($i = 0; $i < $value; $i++) {
                        $keys[] = $key;
                    }
                }

                $peliculaElegida = $keys[array_rand($keys)];

                //RESTA -1 A LA PROBABILIDAD
                $peliculas[$peliculaElegida] = max($peliculas[$peliculaElegida] - 1, 1);


                /* INSERTAR HORARIO */
                try {
                    $conn = new PDO("mysql:host=$servidor;dbname=pruebacine;charset=utf8", $usuario, $clave);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("INSERT INTO horario (dia, hora, id_sala, id_pelicula) VALUES (:dia,:hora,:sala,:pelicula)");

                    $hora = horario($valor);
                    $sala = $indice + 1;
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
                
                /* MOSTRAR LO QUE SE INSERTA */
                echo $fecha_actual->format('Y-m-d');
                echo "<b>" . $peliculas[$peliculaElegida] . "</b>";
                echo " PELICULA (" . $peliculaElegida . ") ";
                echo " HORA -" . horario($valor);
            }
            echo "<br>";
        }
        echo "<hr>";
    }
}