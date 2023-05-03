<?php
if (isset($_POST['borrar_peli'])) {
    $id_pelicula = $_POST['id_pelicula_a'];
    $peliculas->borrar($id_pelicula);
    $result = 'Pelicula borrada correctamente';
    $arraypeliculas = $peliculas->obtieneTodos();
}
require_once("vista/pelicula/pelicula_admin.php");
