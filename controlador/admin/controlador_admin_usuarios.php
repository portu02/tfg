<?php
if (isset($_POST['borrar_usuario_admin'])) {
    $id_usuario = $_POST['id_usuario'];
    $usuario->borrar($id_usuario);
    $result = 'Usuario borrado correctamente';
    $arrayusuarios = $usuario->obtieneTodos();
}
elseif(isset($_POST['editar_sala_admin'])){
    require_once()
}
else {
    require_once('vista/usuario/usuario_admin.php');
}
?>