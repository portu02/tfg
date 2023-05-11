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

    $butacas = new Butaca("", "", "", "", "");
    $arraybutaca = $butacas->obtieneDeIDSala($id_sala);

    //SACAR id_horario
    $id_horario = $horarios->obtenerIDHorario($id_pelicula,$id_sala, $dia, $hora);
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
    //echo $arraybutaca[0]["fila"];


    $arrayreservadas = $reserva->reservadas($id_horario,$id_sala);
    //echo $arrayreservadas[0]["fila"];
/*
    foreach($arrayreservadas as $areservada){
        if($areservada["fila"] == && $areservada["columna"] == ){

        }
    }

    foreach ($array1 as $valor1) {
        foreach ($array2 as $valor2) {
          if ($valor1["nombre"] == $nombre_a_buscar && $valor2["nombre"] == $nombre_a_buscar) {
            echo "El valor existe en ambos arrays multidimensionales";
          }
        }
      }
*/
    $existe = false;
    require_once('vista/sala/reservaSala.php');
}
