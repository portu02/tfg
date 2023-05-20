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


/*---- FECHA INTRODUCIDA EN EL INSERT DE LA NUEVA PELICULA O UNA SALA ----*/
if (isset($_POST['enviar_pelicula'])) {
    $fecha_insertada = $fecha_mysql;
} else {
    $fecha_insertada = date("Y-m-d");
}


/* SACAR ARRAY SALAS */
$objtsala = new Sala("", "", "", "", "", "");
$objthorario = new Horario("", "", "", "", "", "");

//AL CREAR UNA SALA LAS DEMAS NO CAMBIAN EL HORARIO
if (isset($_POST["enviar_sala"])) {
    //Si no existen horarios los crea
    if ($objthorario->comprobarSiExistenHorarios($fecha_insertada) == true) {
        $numsalas = array(0 => $id_sala);
    } else {
        $numsalas = $objtsala->sacarNumSalas();
    }
} else {
    $numsalas = $objtsala->sacarNumSalas();
}

/* SACAR ARRAY PELICULAS  */
$objtpelicula = new Pelicula("", "", "", "", "", "", "", "", "");
$registroarray = $objtpelicula->obtieneTodos();


/* ELIMINAR HORARIOS ANTIGUOS */
$objthorario->eliminarHorariosAntiguos();


/* COMPROBAR SI EXISTEN HORARIOS */
if (!isset($_POST["pelicula"]) && !isset($_POST["enviar_sala"])) {
    if ($objthorario->comprobarSiExistenHorarios($fecha_insertada) == true) {
        $objthorario->comprobarSiExistenHorariosEliminar($fecha_insertada);
        echo "<span style='color:white'>ELIMINA</span>";
    }
}

/* SACAR ARRAY DIAS */
$arraydia = $objthorario->sacarArrayDias();


/* SI EXISTEN ESOS DIAS SE TIENEN QUE VOLVER A REPLANTEAR PARA QUE COINCIDAN CON LAS NUEVAS PELICULAS */
/* INSERTA UNA SEMANA */

for ($iu = 0; $iu < 8; $iu++) {

    $fecha_actual = new DateTime();
    $fecha_actual->modify('+' . $iu . ' day');

    $fecha_ayer = new DateTime();
    $fecha_ayer = $fecha_ayer->modify('+' . $iu . ' day');
    $fecha_ayer->modify('-1 day');

    //SI PULSA UNA PELICULA y existe la fecha se salta
    if ((isset($_POST["pelicula"]) && $objthorario->comprobarSiExisteHorario($fecha_actual->format('Y-m-d'))) || (isset($_POST["enviar_pelicula"]) && $objthorario->comprobarSiExisteHorario($fecha_actual->format('Y-m-d')))) {
        echo "<span style='color:red'>Existe " . $fecha_actual->format('Y-m-d') . "</span>";
    } else {

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

        foreach ($numsalas as $numsalasi => $ns) {

            echo "<span style='color:green'>" . $fecha_actual->format('Y-m-d') . "</span>";
            //Cuando se creee una sala if(isset(crearsala)){ que solo se ejecute el codigo en esa id
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

                /* COMPROBAR SI EXISTE LA MISMA PELICULA EN LA MISMA HORA EN EL MISMO DIA EN DISTINTA SALA */
                $hora = horario($horatiempo);
                $fecha = $fecha_actual->format('Y-m-d');

                $resultValidacion = $objthorario->comprobarSiLaPeliculaSeRepite($hora, $fecha, $peliculaElegida);

                if (!$resultValidacion) {

                    //RESTA -1 A LA PROBABILIDAD
                    $peliculas[$peliculaElegida] = max($peliculas[$peliculaElegida] - 1, 1);

                    /* INSERTAR */
                    $objthorario->insertarHorario($hora, $ns, $fecha, $peliculaElegida);

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
                } else {
                    echo "SE REPITE";
                }
            }

            $horatiempo = 16;
            echo "<br>";
        }

        echo "<hr>";
    }
}
