<?php
if (isset($_POST["editar_sala"]) || isset($_POST["editar_sala_admin_editar"])) {
    $id_sala = $_POST["id_sala"];
    $butacas = new Butaca("", "", "", "", "");
    $sala = new Sala($id_sala, "", "", "", "", "");


    $descripcion = $sala->obtieneDeID($id_sala)->descripcion;
    $habilitada = $sala->obtieneDeID($id_sala)->habilitada;
    $luxury = $sala->obtieneDeID($id_sala)->luxury;


    $arraybutaca = $butacas->obtieneDeIDSala($id_sala);

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
    require_once 'vista/sala/editarsala_admin.php';
}



if (isset($_POST["enviar_sala_editar"])) {
    $id_sala = $_POST["id_sala"];
    $descripcion = $_POST["descripcion"];
    $capacidad = $sala->obtieneDeID($id_sala)->capacidad;
    $habilitada = $_POST["habilitada"];
    $luxury = $_POST["luxury"];
    $lleno = 0;

    if (isset($_POST["butaca"])) {
        $but = $_POST["butaca"];
        foreach ($but as $i => $a) {

            /* CAMBIAR COLOR BUTACA */
            $datos = explode(";", $i);
            $filas = $datos[0];
            $columnas = $datos[1];
            //Coger el color de la img gris de /vista/imagenes/butaca_gris.png
            $colorstr = $datos[2];
            $posicion = strrpos($colorstr, '_') + 1;
            $largo = strlen($colorstr) - $posicion - 4;
            $color = substr($colorstr, $posicion, $largo);
            $color = ucfirst($color);

            if ($color == 'Gris') {
                //Si no es funcional se baja la capacidad
                $capacidad = $capacidad - 1;
            } elseif ($color == 'Verde') {
                //Si es funcional se sube la capacidad
                $capacidad = $capacidad + 1;
            }

            $butacas = new Butaca("", $columnas, $filas, $color, $id_sala);
            $butacas->cambiarColor();
        }
    }

    /* ACTUALIZAR SALA */
    $sala = new Sala($id_sala, $descripcion, $capacidad, $habilitada, $luxury, $lleno);
    $sala->actualizar();

    require_once('vista/sala/sala_admin.php');
}
