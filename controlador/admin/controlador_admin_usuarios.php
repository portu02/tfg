<?php
if (isset($_POST['borrar_usuario_admin'])) {
    $id_usuario = $_POST['id_usuario'];
    $usuario->borrar($id_usuario);
    $result = 'Usuario borrado correctamente';
    $arrayusuarios = $usuario->obtieneTodos();
}
elseif(isset($_POST['editar_usuario_admin']) || isset($_POST['cambiar_usuario_admin'])){
    if(isset($_POST['cambiar_usuario_admin'])){
        
    }
    require_once('vista/usuario/editar_usuario_admin.php');
}
else {
    require_once('vista/usuario/usuario_admin.php');
}
?>