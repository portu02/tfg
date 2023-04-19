<?php

require('Conexion.php');
$filas = 10;
$columnas = 10;
$numero = 0;
$color = 'Verde';
$descripcion = 'LA SALA';
$habilitada = 1;
$lleno = 0;
$luxury = 0;
$conexion = new Conexion();
$id_sala = 1;

try {
    $stmt = $conexion->conex()->prepare("SELECT * FROM sala WHERE id_sala  = :id_sala");
    $stmt->bindParam(":id_sala", $habilitada);
    $stmt->execute();
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($registros) == 0) {
        try {
            $stmt = $conexion->conex()->prepare("INSERT INTO sala (descripcion, habilitada, luxury, lleno) VALUES (:descripcion, :habilitada, :luxury, :lleno)");
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->bindParam(":habilitada", $habilitada);
            $stmt->bindParam(":luxury", $luxury);
            $stmt->bindParam(":lleno", $lleno);
            $stmt->execute();

            $stmt2 = $conexion->conex()->prepare("SELECT id_sala FROM sala ORDER BY id_sala DESC LIMIT 1;");
            $stmt2->execute();
            $resultado = $stmt2->fetch(PDO::FETCH_ASSOC);
            $ultimoId = $resultado['id_sala'];
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
        for ($i = 1; $i <= $filas; $i++) {
            for ($j = 1; $j <= $columnas; $j++) {
                if ($i != 10) {
                    if ($j != 3 && $j != 4 && $j != 7 && $j != 8) {
                        try {
                            $stmt = $conexion->conex()->prepare("INSERT INTO butaca (columna, fila, color, id_sala) VALUES (:columna, :fila, :color, :id_sala)");
                            $numero++;
                            $stmt->bindParam(":columna", $j);
                            $stmt->bindParam(":fila", $i);
                            $stmt->bindParam(":color", $color);
                            $stmt->bindParam(":id_sala", $ultimoId);
                            $stmt->execute();
                        } catch (PDOException $e) {
                            echo "Error" . $e->getMessage();
                        }
                    }
                } else {
                    try {
                        $stmt = $conexion->conex()->prepare("INSERT INTO butaca (columna, fila, color, id_sala) VALUES (:columna, :fila, :color, :id_sala)");
                        $numero++;
                        $stmt->bindParam(":columna", $j);
                        $stmt->bindParam(":fila", $i);
                        $stmt->bindParam(":color", $color);
                        $stmt->bindParam(":id_sala", $ultimoId);
                        $stmt->execute();
                    } catch (PDOException $e) {
                        echo "Error" . $e->getMessage();
                    }
                }
            }
            $numero = 0;
        }
        try {
            $stmt = $conexion->conex()->prepare("UPDATE sala  SET capacidad = :capacidad WHERE id_sala = :id_sala");
            $stmt->bindParam(":capacidad", $numero);
            $stmt->bindParam(":id_sala", $ultimoId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    } else {
        //SACAR TODAS LAS BUTACAS
        try {

            $stmt = $conexion->conex()->prepare("SELECT * FROM sala INNER JOIN butaca ON sala.id_sala=butaca.id_sala ORDER BY fila DESC ,columna DESC");

            $stmt->execute();

            $arraybutaca = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }

        //sacar todas las columnas
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

        //css
        echo "<style>
        td{width:50px;height:50px;position:relative;}
        img{width:50px}
        table{background-color:#00001a;border-collapse: collapse;}
        .checkbox {position: absolute;top: 0;left: 0;width: 50px;opacity:0;height: 50px; cursor: pointer;}
        </style>";


        echo "<table>";
        $numbutaca = 0;

        for ($filas = $max_fila; $filas > 0; $filas--) {
            echo "<tr>";
            for ($columnas = $max_columna; $columnas > 0; $columnas--) {

                if ($arraybutaca[$numbutaca]["fila"] == $filas && $arraybutaca[$numbutaca]["columna"] == $columnas) {
                    //condicionales de color de butacas
                    if ($arraybutaca[$numbutaca]["color"] == "Verde") {
                        echo "<td><img src='butaca_verde.png' class='butaca'><input type='checkbox' class='checkbox'></td>";
                    } elseif ($arraybutaca[$numbutaca]["color"] == "Rojo") {
                        echo "<td><img src='butaca_roja.png'></td>";
                    } elseif ($arraybutaca[$numbutaca]["color"] == "Gris") {
                        echo "<td><img src='butaca_gris.png'></td>";
                    }

                    $numbutaca++;
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
?>
<script>
    window.onload = function() {
        let arraycheckbox = Array.from(document.getElementsByClassName('checkbox'));
        arraycheckbox.map(
            m => m.addEventListener('change', function() {
                let butaca = this.previousElementSibling;
                if (this.checked) {
                    butaca.src = 'butaca_roja.png';
                } else {
                    butaca.src = 'butaca_verde.png';
                }
            }));
    }
</script>