<?php
if(isset($_POST['borrar'])) {
    $id_sala = $_POST['id_sala'];
    $sala->borrar($id_sala);
    $result = 'Sala borrada correctamente';
    $arraysalas = $sala->obtieneTodos();
} 
if (isset($_POST['nueva'])) {
    require_once("controlador/controlador_admin.php");
} 
else if (isset($_POST['hora'])) {
    $id_pelicula = $_POST["id_pelicula"] + 1;

    $dia_simple = $_POST["id_dia"];
    $dia_inicial = substr($dia_simple, 0, 2);
    $dia_fin = substr($dia_simple, 3, 2);
    $dia = $dia_fin . "-" . $dia_inicial;

    $hora = $_POST["hora"];

    $array_id_salas = $horarios->obtenerIDSala($id_pelicula, $dia, $hora);

    $id = $array_id_salas[0]["id_sala"];

    $butacas = new Butaca("", "", "", "", "");
    $arraybutaca = $butacas->obtieneDeIDSala($id);

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

    require_once('vista/reservaSala.php');
}  else {
    require_once('vista/sala.php');
}
    /*
    $id_pelicula=$_POST["id_pelicula"]+1;

    $dia_simple = $_POST["id_dia"];
    $dia_inicial = substr($dia_simple, 0, 2);
    $dia_fin = substr($dia_simple, 3, 2);
    $dia = $dia_fin . "-" . $dia_inicial;
    
    $hora=$_POST["hora"];

    $array_id_salas=$horarios->obtenerIDSala($id_pelicula,$dia,$hora);

    if(count($array_id_salas)>=2){
        
    }else{
        
    }
*/
