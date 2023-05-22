<?php
if (isset($_POST['comprobar_codigo'])) {

    $nombre = $_POST['nombre_comprobacion_nuevo_login'];
    $apellido = $_POST['apellido_comprobacion_nuevo_login'];
    $correo = $_POST['gmail_comprobacion_nuevo_login'];
    $contra = $_POST['contra_comprobacion_nuevo_login'];
    $rol = $_POST['rol_comprobacion_nuevo_login'];
    $codigo = $_POST['code_comprobacion_nuevo_login'];
    $codigousuario = $_POST['codeusuario_comprobacion_nuevo_login'];

    $nuevo_usuario = new Usuario("", $nombre, $apellido, $correo, $contra, $rol);
    //comprobamos que no exista un email ya registrado
    $prueba = True;
    foreach ($arrayusuarios as $usuario) {
        if ($usuario['correo'] == $nuevo_usuario->getcorreo()) {
            $prueba = False;
        }
    }
    if ($prueba == True) {
        if ($codigo == $codigousuario) {
            $nuevo_usuario->setcontra(password_hash($nuevo_usuario->getcontra(), PASSWORD_DEFAULT));
            $nuevo_usuario->crear();
            echo '<script>alert("Usuario Creado");window.close();</script>';
        }
        echo '<script>alert("Codigo incorrecto");window.close();</script>';
    } else {
        echo '<script>alert("Correo existente");window.close();</script>';
    }
}
if (isset($_POST['crear_login']) || isset($_POST['registar_nuevo_login'])) {

    require_once('./vista/usuario/crear_usuario.php');

} elseif (isset($_POST['acceder_login']) || isset($_POST["iniciar_sesion"]) || isset($_POST['volver_login'])) {

    if (isset($_POST['acceder_login'])) {
        //comprobamos que los campos esten rellenos
        if (isset($_POST['contra_login']) && isset($_POST['gmail_login'])) {
            $correo = $_POST['gmail_login'];
            $contra = $_POST['contra_login'];
            $nuevo_usuario = new Usuario("", "", "", $correo, $contra, "");
            if ($nuevo_usuario->comprueba($contra, $correo)) {
                $array_usuario_sesion= array(
                    'id_usuario' => $nuevo_usuario->getid(),
                    'nombre' => $nuevo_usuario->getnombre(),
                    'apellido' => $nuevo_usuario->getapellido(),
                    'correo' => $nuevo_usuario->getcorreo(),
                    'rol' => $nuevo_usuario->getrol()
                );
                $_SESSION['usuario_sesion']=$array_usuario_sesion;
                echo '<script>alert("El usuario '.$nuevo_usuario->getcorreo().' inicio sesion");</script>';
                require_once('vista/principal.php');
            } else {
                echo '<script>alert("Algo salio mal");</script>';
            }
        } else {
            echo '<script>alert("Faltan Datos");</script>';
        }
    } else {
        $msg = "";
    }


    require_once('vista/login.php');
}
