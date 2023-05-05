<?php
if (isset($_POST['borrar_sala_admin'])) {
    $id_sala = $_POST['id_sala'];
    $sala->borrar($id_sala);
    $result = 'Sala borrada correctamente';
    $arraysalas = $sala->obtieneTodos();
}
if (isset($_POST['anadir_sala_admin']) || isset($_POST["editar_sala"]) || isset($_POST["previsualizar"]) || isset($_POST["editar_sala_admin"]) || isset($_POST["enviar_sala"])) {
    require_once("controlador/crear_sala.php");
}
else {
    require_once('vista/sala/sala_admin.php');
}
