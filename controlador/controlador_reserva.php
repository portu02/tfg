<?php
if(isset($_POST["enviar_sala_reservar"])){
    
    $id_sala = $_POST["id_sala"];
    $id_horario = $_POST["id_horario"];
    $id_usuario = 1;
    $precio = 10;
    
    echo "Sala".$id_sala;
    echo "Hora".$id_horario;
    echo "Usuario".$id_usuario."<br>";

    if (isset($_POST["reserva"])) {
        $reservas = $_POST["reserva"];
        foreach ($reservas as $i => $a) {

            $datos = explode(";", $i);
            $fila = $datos[0];
            $columna = $datos[1];
            //echo "Filas ".$filas." Columnas".$columnas."<br>";
            $id_butaca = $butacas->obtenerIDButaca($fila,$columna,$id_sala);
            $id_butaca = $id_butaca[0]["id_butaca"];
            echo $id_butaca."<br>";

            $reserva = new Reserva("",$id_horario,$id_usuario,$id_sala,$id_butaca,$precio);
            $reserva->crear();
        }
    }

    $ppp = $reserva->reservadas($id_horario,$id_sala);
    
    print_r($ppp);

}