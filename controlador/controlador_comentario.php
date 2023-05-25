<?php
if(isset($_POST["hacer_comentario"])){
    
    if(isset($_SESSION['usuario_sesion'])){

        if(isset($_POST["texto_comentario"]) && !empty($_POST["texto_comentario"])){
            $id_usuario = $_SESSION['usuario_sesion']['id_usuario'];
            $id_pelicula = $_POST["id_pelicula"];
            $texto = $_POST["texto_comentario"];
            
            $comentario_crea = new Comentario("", $id_pelicula, $id_usuario, $texto);
            $comentario_crea->crear();
            
            require_once('controlador/controlador_peliculas.php');

        }else{
            $id_pelicula = $_POST["id_pelicula"];
            require_once('controlador/controlador_peliculas.php');
        }
    }else{
        echo "<script>alert('No ha iniciado sesion');</script>";
        require_once('vista/login.php');
    }

}