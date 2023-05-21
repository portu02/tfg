<?php
if (isset($_POST['borrar_usuario_admin'])) {
    $id_usuario = $_POST['id_usuario'];
    $usuario->borrar($id_usuario);
    $result = 'Usuario borrado correctamente';

    //Usuario
    $pagina_usuario = new Paginacion(4, "usuario");
    $arrayusuariopaginado = $pagina_usuario->mostrar();
    $num_usuario = $pagina_usuario->numeritos();
    require_once('vista/usuario/usuario_admin.php');
} elseif (isset($_POST['editar_usuario_admin']) || isset($_POST['cambiar_usuario_admin'])) {
    if (isset($_POST['cambiar_usuario_admin'])) {
        $nuevo_usuario = new Usuario($_POST['id_usuario_admin_editar'], $_POST['nombre_usuario_admin_editar'], $_POST['apellido_usuario_admin_editar'], $_POST['correo_usuario_admin_editar'], "", $_POST['rol_usuario_admin_editar']);
        $nuevo_usuario->actualizar();
        $result = 'Usuario actualizado correctamente';

        //Usuario
        $pagina_usuario = new Paginacion(4, "usuario");
        $arrayusuariopaginado = $pagina_usuario->mostrar();
        $num_usuario = $pagina_usuario->numeritos();
        require_once('vista/usuario/usuario_admin.php');
    } else {
        require_once('vista/usuario/editar_usuario_admin.php');
    }
} else {
    //Usuario
    $pagina_usuario = new Paginacion(4, "usuario");
    $arrayusuariopaginado = $pagina_usuario->mostrar();
    $num_usuario = $pagina_usuario->numeritos();
    require_once('vista/usuario/usuario_admin.php');
}
