<?php
if (isset($_POST['enviar_pelicula'])) {
    if (isset($_POST["id_pelicula"])) {
        $id_pelicula = $_POST["id_pelicula"];
    } else {
        $id_pelicula = 0;
    }

    if ($id_pelicula == 0) {
        $id_pelicula = $peliculas->obtieneUltimoID();
        $id_pelicula = $id_pelicula + 1;
        $nombre = $_POST['nombre'];

        $imagen = $_FILES['imagen']['name'];
        $temp = $_FILES['imagen']['tmp_name'];

        if ($imagen != null) {
            move_uploaded_file($temp, 'vista/fotos/' . $imagen);
        }
        else {
            $imagen = null;
        }
        $sinopsis = $_POST['sinopsis'];
        $duracion = $_POST['duracion'];
        $url = $_POST['url_new'];
        $clasificacion = $_POST['clasificacion'];
        $categoria = $_POST['categoria'];
        $fecha_estreno = $_POST['fecha_estreno'];
        $fecha_mysql = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_estreno)));

        $pelicula_nueva = new Pelicula($id_pelicula, $nombre, $imagen, $sinopsis, $duracion, $url, $clasificacion, $categoria, $fecha_mysql);
        $pelicula_nueva->crear();
        $result = 'Pelicula creada correctamente';
        $arraypeliculas = $peliculas->obtieneTodos();
        require_once("vista/pelicula/pelicula_admin.php");
    } else {
        $id_pelicula_modificada = $pelicula_nueva->obtieneUltimoID();
        $id_pelicula_modificada = $id_pelicula_modificada + 1;
        $pelicula_nueva->__set('nombre', $_POST['nombre']);
        if (isset($_FILES['archivo'])) {
            $pelicula_nueva->__set('imagen', $_FILES['archivo']['name']);
        }
        $pelicula_nueva->__set('sinopsis', $_POST['sinopsis']);
        $pelicula_nueva->__set('duracion', $_POST['duracion']);
        $pelicula_nueva->__set('url', $_POST['url_new']);
        $pelicula_nueva->__set('clasificacion', $_POST['clasificacion']);
        $pelicula_nueva->__set('categoria', $_POST['categoria']);
        $pelicula_nueva->__set('fecha_estreno', $_POST['fecha_estreno']);
        echo $_POST['duracion'];
        $pelicula_nueva->crear();
    }
    
}
else {
    require_once("vista/pelicula/crear_pelicula.php");
}
