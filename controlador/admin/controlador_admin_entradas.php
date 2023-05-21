<?php
    //vista entrada
    $pagina_entradas = new Paginacion(4, "entradas");
    $arrayentradas = $pagina_entradas->mostrar();
    $num_entradas = $pagina_entradas->numeritos();
    require_once('vista/entradas/entradas_admin.php');
?>