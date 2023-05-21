<?php
if (isset($_POST["hora"]) && isset($_POST["sala_seleccionada"])) {
    
    $arraybutaca = $horarios->obtieneDeIDPelicula($id_pelicula);
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
}
?>
