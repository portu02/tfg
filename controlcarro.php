<?php
if(isset($_POST["comprar_reservas"])){
    echo "COMPRA";
}elseif(isset($_POST["P1"])){
    echo "Paloma";
}
setcookie('Enntradas', '',time()-3600, '/');
require_once("carrito.php");

$datos_serializados = $_COOKIE['Enntradas'];
$datos = unserialize($datos_serializados);

foreach($datos as $datos_usuarios => $datos_a1){
    if($datos_usuarios == 11){
        foreach($datos_a1 as $datos_a1_indice => $datos_a2){
            foreach($datos_a2 as $datos_info => $datos_num){
                echo $datos_info."-".$datos_num."<br>";
            }
        }
    }
}
print_r($datos);

