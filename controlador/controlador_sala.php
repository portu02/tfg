<?php
    if (isset($_POST['nueva'])){
        require_once("controlador/controlador_admin.php");
    }
    else {
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
?>