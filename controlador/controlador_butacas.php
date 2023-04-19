<?php
try {
    $stmt = $conexion->conex()->prepare("SELECT * FROM sala INNER JOIN butaca ON sala.id_sala=butaca.id_sala ORDER BY fila DESC ,columna DESC");
    $stmt->execute();
    $arraybutaca = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}

//SACAR MAXIMO DE COLUMNAS
$max_columna = 0;
foreach ($arraybutaca as $butaca) {
    if ($butaca['columna'] > $max_columna) {
        $max_columna = $butaca['columna'];
    }
}
//SACAR MAXIMO DE FILAS
$max_fila = 0;
foreach ($arraybutaca as $butaca) {
    if ($butaca['fila'] > $max_fila) {
        $max_fila = $butaca['fila'];
    }
}