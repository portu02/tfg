<?php
    if(isset($_POST['crear_login']) || isset($_POST['registar_nuevo_login'])){
            $msg=""; 
            if(isset($_POST['registar_nuevo_login'])){
                //recogemos las variables
                $nombre=$_POST['nombre_nuevo_login'];
                $apellido=$_POST['apellido_nuevo_login'];
                $correo=$_POST['gmail_nuevo_login'];
                $contra=$_POST['contra_nuevo_login'];
                $rol=$_POST['rol_nuevo_login'];
                $nuevo_usuario=new Usuario("",$nombre,$apellido,$correo,$contra,$rol); 
                //comprobamos que no exista un email ya registrado
                $prueba=True;
                foreach($arrayusuarios as $usuario){
                    //cambiar
                    if($usuario['correo']==$nuevo_usuario->getcorreo()){
                        $prueba=False;
                    }
                }
                if($prueba==True){
                    $nuevo_usuario->setcontra(password_hash($nuevo_usuario->getcontra(),PASSWORD_DEFAULT));
                    $nuevo_usuario->crear();
                    $msg="Correo registrado";
                }else{
                    $msg="Correo ya existente";
                }
            }
            require_once('./vista/usuario/crear_usuario.php');
    }
    elseif(isset($_POST['acceder_login']) || isset($_POST["iniciar_sesion"]) || isset($_POST['volver_login'])){
        
        if(isset($_POST['acceder_login'])){
            //comprobamos que los campos esten rellenos
            if(isset($_POST['contra_login']) && isset($_POST['gmail_login'])){
                $correo=$_POST['gmail_login'];
                $contra=$_POST['contra_login'];
                $nuevo_usuario=new Usuario("","","",$correo,$contra,"");
                if($nuevo_usuario->comprueba($contra,$correo)){
                    $msg="iniciado sesion";
                }else{
                    $msg="algun error";
                }
            }else{
                $msg="debe rellenar los dos campos";
            }
        }else{
            $msg="";
        }
        require_once('vista/login.php');
    }
    
?>