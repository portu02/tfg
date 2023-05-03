<?php
if (isset($_POST['borrar_usuario_admin'])) {
    $id_usuario = $_POST['id_usuario'];
    $usuario->borrar($id_usuario);
    $result = 'Usuario borrado correctamente';
    $arrayusuarios = $usuario->obtieneTodos();
}
if (isset($_POST['anadir_sala_admin']) || isset($_POST["previsualizar"]) || isset($_POST["editar_sala_admin"]) || isset($_POST["enviar_sala"])) {
    require_once("controlador/crear_sala.php");
}
else {
    require_once('vista/usuario/usuario_admin.php');
}
?>