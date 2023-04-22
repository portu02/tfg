<?php
session_start();
/***** COMPROBAR QUE EXISTEN LAS SESIONES *****/
if (isset($_SESSION["maxfilas"])) {
    $max_fila = $_SESSION["maxfilas"];
}else{
    $max_fila = 5;
}  

if (isset($_SESSION["maxcolumnas"])) {
    $max_columna = $_SESSION["maxcolumnas"];
}else{
    $max_columna = 5;
}  

if (isset($_SESSION["filas"])) {
    $array_filas = $_SESSION["filas"];
}else{
    $array_filas = array("vacio" => "vacio");
}   

if (isset($_SESSION["columnas"])) {
    $array_columnas = $_SESSION["columnas"];
}else{
    $array_columnas = array("vacio" => "vacio");
}

if (isset($_SESSION["butacas"])) {
    $array_butacas = $_SESSION["butacas"];
}else{
    $array_butacas = array("vacio" => "vacio");
}


for ($filas = $max_fila; $filas >= 0; $filas--) {
    for ($columnas = 1; $columnas <= $max_columna; $columnas++) {
        if (array_key_exists($filas, $array_filas) && $filas != 0) {
            if (array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                //INSERTAR
                echo " Fila ".$filas." Columa ".$columnas;
            }
        } elseif($filas != 0) {
            if (!array_key_exists($columnas, $array_columnas) || array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                //INSERTAR
                echo " Fila ".$filas." Columa ".$columnas;
            }
        }
    }
    echo "<br>";
}

session_destroy();