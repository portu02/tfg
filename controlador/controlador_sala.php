<?php
if (isset($_POST['hora'])) {

    $id_pelicula = $_POST["id_pelicula"] + 1;
    $nombre_pelicula = $_POST["nombre_pelicula"];

    $dia_simple = $_POST["id_dia"];
    $dia_inicial = substr($dia_simple, 0, 2);
    $dia_fin = substr($dia_simple, 3, 2);
    $dia = $dia_fin . "-" . $dia_inicial;

    $hora = $_POST["hora"];

    $array_id_salas = $horarios->obtenerIDSala($id_pelicula, $dia, $hora);

    $id_sala = $array_id_salas[0]["id_sala"];

    $esta_habilitada = $sala->obtieneDeID($id_sala)->habilitada;
    //SI LA SALA ESTA DESHABILITADA NO DEJA ENTRAR
    if ($esta_habilitada == 0) {

        //SACAR si es Luxury
        $es_luxury = $sala->obtieneDeID($id_sala)->luxury;
        if($es_luxury == 1){
            $luxury = " Luxury";
        }

        $butacas = new Butaca("", "", "", "", "");
        $arraybutaca = $butacas->obtieneDeIDSala($id_sala);

        //SACAR id_horario
        $id_horario = $horarios->obtenerIDHorario($id_pelicula, $id_sala, $dia, $hora);
        $id_horario = $id_horario[0]["id_horario"];

        //SACAR MAXIMO DE COLUMNAS
        $max_columna = 0;
        foreach ($arraybutaca as $butaca) {
            if ($butaca['columna'] > $max_columna) {
                $max_columna = $butaca['columna'];
            }
        }
        //SACAR MAXIMO DE FILAS
        $max_fila = 0;
        foreach ($arraybutaca as $butaca) {
            if ($butaca['fila'] > $max_fila) {
                $max_fila = $butaca['fila'];
            }
        }

        $numbutaca = 0;
        $numbutaca2 = 0;

        $arrayreservadas = $reserva->reservadas($id_horario, $id_sala);

        $existe = false;
        require_once('vista/sala/reservaSala.php');
    } else {
        echo '<script>alert("Por el momento la sala ' . $id_sala . ' esta deshabilitada");</script>';
        require_once('vista/principal.php');
    }
}
