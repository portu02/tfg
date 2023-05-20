<?php
if (isset($_POST['borrar_peli'])) {
    $id_pelicula = $_POST['id_pelicula_a'];
    $peliculas->borrar($id_pelicula);
    $result = 'Pelicula borrada correctamente';
    //Pelicula
    $pagina_pelicula = new Paginacion(5, "pelicula_admin");
    $arraypeliculaspaginado_pelicula = $pagina_pelicula->mostrar();
    $num_pelicula = $pagina_pelicula->numeritos();
}
if (isset($_POST['nueva_pelicula']) || isset($_POST['editar_pelicula']) || (isset($_POST['enviar_pelicula']))) {
    if (isset($_POST["id_pelicula"])) {
        $id_pelicula = $_POST["id_pelicula"];
    }
    if (isset($_POST['enviar_pelicula'])) {

        if (!isset($_POST['id_pelicula'])) {
            $id_pelicula = $peliculas->obtieneUltimoID();
            $id_pelicula = $id_pelicula + 1;
            $nombre = $_POST['nombre'];

            $imagen = $_FILES['imagen']['name'];
            $temp = $_FILES['imagen']['tmp_name'];

            if ($imagen != null) {
                move_uploaded_file($temp, 'vista/fotos/' . $imagen);
            } else {
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
            //Pelicula
            $pagina_pelicula = new Paginacion(5, "pelicula_admin");
            $arraypeliculaspaginado_pelicula = $pagina_pelicula->mostrar();
            $num_pelicula = $pagina_pelicula->numeritos();

            //CREAR HORARIO
            require_once('./controlador/crear_horario.php');

            require_once("vista/pelicula/pelicula_admin.php");
        } else {
            $id_pelicula = $_POST["id_pelicula"];
            $nombre = $_POST['nombre'];
            $imagen = $_FILES['imagen']['name'];
            $temp = $_FILES['imagen']['tmp_name'];
            if ($imagen != null) {
                move_uploaded_file($temp, 'vista/fotos/' . $imagen);
            } else {
                $peli = new Pelicula('', '', '', '', '', '', '', '', '');
                $imagen = $peli->obtieneDeID($id_pelicula)->imagen;
            }
            $sinopsis = $_POST['sinopsis'];
            $duracion = $_POST['duracion'];
            $url = $_POST['url_new'];
            $clasificacion = $_POST['clasificacion'];
            $categoria = $_POST['categoria'];
            $fecha_estreno = $_POST['fecha_estreno'];
            $fecha_mysql = date('Y-m-d', strtotime(str_replace('/', '-', $fecha_estreno)));

            $pelicula_nueva = new Pelicula($id_pelicula, $nombre, $imagen, $sinopsis, $duracion, $url, $clasificacion, $categoria, $fecha_mysql);
            $pelicula_nueva->actualizar();
            $result = 'Pelicula actualizada correctamente';

            //Pelicula
            $pagina_pelicula = new Paginacion(5, "pelicula_admin");
            $arraypeliculaspaginado_pelicula = $pagina_pelicula->mostrar();
            $num_pelicula = $pagina_pelicula->numeritos();

            require_once("vista/pelicula/pelicula_admin.php");
        }
    } else {
        if (isset($_POST['id_pelicula'])) {
            $nombre = $_POST['nombre'];
            $imagen = $_POST['imagen'];
            $sinopsis = $_POST['sinopsis'];
            $duracion = $_POST['duracion'];
            $url = $_POST['url'];
            $clasificacion = $_POST['clasificacion'];
            $categoria = $_POST['categoria'];
            $fecha_estreno = $_POST['fecha_estreno'];
        }
        require_once("vista/pelicula/crear_pelicula.php");
    }
} else {
    //Pelicula
    $pagina_pelicula = new Paginacion(5, "pelicula_admin");
    $arraypeliculaspaginado_pelicula = $pagina_pelicula->mostrar();
    $num_pelicula = $pagina_pelicula->numeritos();
    require_once("vista/pelicula/pelicula_admin.php");
}
