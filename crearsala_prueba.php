<style>
    #butacas td {
        width: 50px;
        height: 53px;
        position: relative;
        color: white;
        font-size: 1.5em;
        text-align: center;
    }

    #butacas td:first-child {
        background-color: red;
    }

    #butacas tr:last-child {
        background-color: red;
    }

    #butacas img {
        width: 50px;
    }

    #butacas {
        background-color: #00001a;
        border-collapse: collapse;
    }

    .checkbox {
        position: absolute;
        top: 0;
        left: 0;
        width: 50px;
        opacity: 0;
        height: 50px;
        cursor: pointer;
    }

    .oculto {
        color: yellow;
        font-weight: bold;
    }

    .numero {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        line-height: 100%;
        width: 100%;
    }

    .marcado {
        color: green;
        font-weight: bold;
    }
</style>
<script>
    window.onload = function() {
        let arraycheckbox = Array.from(document.getElementsByClassName('checkbox'));
        arraycheckbox.map(
            m => m.addEventListener('change', function() {
                var numeroSpan = this.nextElementSibling;
                if (numeroSpan.classList.contains("marcado")) {
                    numeroSpan.classList.remove('marcado');
                }
                if (this.checked) {
                    numeroSpan.classList.add('oculto');
                } else {
                    numeroSpan.classList.remove('oculto');
                }
            }));
    }
</script>
<?php
session_start();

if (isset($_POST["editar"])) {
    /* COLUMNAS */
    if (isset($_POST["columnas"]) || isset($_POST["filas"]) || isset($_POST["butacas"])) {

        if (isset($_POST["columnas"]) && isset($_POST["filas"])) {
            /* COLUMNAS */
            $array_columnas = $_POST["columnas"];

            /* GUARDAR COLUMNAS BUTACA EN SESSION */
            if (isset($_SESSION["columnas"])) {
                $miArray = $_SESSION['columnas'];
                foreach ($array_columnas as $i => $a) {
                    if (!array_key_exists($i, $miArray)) {
                        /* ELIMINAR BUTACAS */
                        /* LAS AGREGAR DEL ARRAY */
                        $miArray[$i] = $a;
                    } else {
                        /* AGREGAR BUTACAS */
                        /* LAS ELIMINA DEL ARRAY */
                        unset($miArray[$i]);
                    }
                }
                $_SESSION['columnas'] = $miArray;
                $array_columnas = $miArray;
            } else {
                $_SESSION["columnas"] = $_POST["columnas"];
            }

            /* FILAS */
            $array_filas = $_POST["filas"];

            /* GUARDAR filas BUTACA EN SESSION */
            if (isset($_SESSION["filas"])) {
                $miArray = $_SESSION['filas'];
                foreach ($array_filas as $i => $a) {
                    if (!array_key_exists($i, $miArray)) {
                        /* ELIMINAR BUTACAS */
                        /* LAS AGREGAR DEL ARRAY */
                        $miArray[$i] = $a;
                    } else {
                        /* AGREGAR BUTACAS */
                        /* LAS ELIMINA DEL ARRAY */
                        unset($miArray[$i]);
                    }
                }
                $_SESSION['filas'] = $miArray;
                $array_filas = $miArray;
            } else {
                $_SESSION["filas"] = $_POST["filas"];
            }


            /***** ARRAY BUTACAS ******/
        } elseif (isset($_POST["butacas"])) {

            $array_butacas = $_POST["butacas"];

            /* GUARDAR COLUMNAS BUTACA EN SESSION */
            if (isset($_SESSION["butacas"])) {
                $miArray = $_SESSION['butacas'];
                foreach ($array_butacas as $i => $a) {
                    if (!array_key_exists($i, $miArray)) {
                        /* ELIMINAR BUTACAS */
                        /* LAS AGREGAR DEL ARRAY */
                        $miArray[$i] = $a;
                    } else {
                        /* AGREGAR BUTACAS */
                        /* LAS ELIMINA DEL ARRAY */
                        unset($miArray[$i]);
                    }
                }
                $_SESSION['butacas'] = $miArray;
                $array_butacas = $miArray;
            } else {
                //si no se ha creado sesion arraybutacas la inicia
                $_SESSION["butacas"] = $_POST["butacas"];
            }


            /***** ARRAY COLUMNAS ******/
        } elseif (isset($_POST["columnas"])) {
            //si esta la sesion arraybutacas se comprueba mas tarde si han surgido cambios
            if (isset($_SESSION["butacas"])) {
                $array_butacas = $_SESSION["butacas"];
            }

            $array_columnas = $_POST["columnas"];

            /* GUARDAR COLUMNAS BUTACA EN SESSION */
            if (isset($_SESSION["columnas"])) {
                $miArray = $_SESSION['columnas'];
                foreach ($array_columnas as $i => $a) {
                    if (!array_key_exists($i, $miArray)) {
                        /* ELIMINAR BUTACAS */
                        /* LAS AGREGAR DEL ARRAY */
                        $miArray[$i] = $a;
                        //si existe en la sesion arraybutacas y se realiza un cambio en la fila este elimina el elemento que coincida
                        if (isset($_SESSION["butacas"])) {
                            foreach ($array_butacas as $j => $b) {
                                $valor = explode(";", $j);
                                if ($i == $valor[1]) {
                                    unset($array_butacas[$valor[0] . ";" . $valor[1]]);
                                }
                            }
                        }
                    } else {
                        /* AGREGAR BUTACAS */
                        /* LAS ELIMINA DEL ARRAY */
                        unset($miArray[$i]);
                    }
                }
                $_SESSION['columnas'] = $miArray;
                $array_columnas = $miArray;
            } else {
                //si no se ha creado sesion arraycolumnas la inicia
                $_SESSION["columnas"] = $_POST["columnas"];
            }


            /***** ARRAY FILAS ******/
        } elseif (isset($_POST["filas"])) {

            $array_filas = $_POST["filas"];

            /* GUARDAR filas BUTACA EN SESSION */
            if (isset($_SESSION["filas"])) {
                //si esta la sesion arraybutacas se comprueba mas tarde si han surgido cambios
                if (isset($_SESSION["butacas"])) {
                    $array_butacas = $_SESSION["butacas"];
                }

                $miArray = $_SESSION['filas'];

                foreach ($array_filas as $i => $a) {
                    if (!array_key_exists($i, $miArray)) {
                        /* ELIMINAR BUTACAS */
                        /* LAS AGREGAR DEL ARRAY */
                        $miArray[$i] = $a;
                        //si existe en la sesion arraybutacas y se realiza un cambio en la fila este elimina el elemento que coincida
                        if (isset($_SESSION["butacas"])) {
                            foreach ($array_butacas as $j => $b) {
                                $valor = explode(";", $j);
                                if ($i == $valor[0]) {
                                    unset($array_butacas[$valor[0] . ";" . $valor[1]]);
                                }
                            }
                        }
                    } else {
                        /* AGREGAR BUTACAS */
                        /* LAS ELIMINA DEL ARRAY */
                        unset($miArray[$i]);
                    }
                }
                $_SESSION['filas'] = $miArray;
                $array_filas = $miArray;
            } else {
                //si no se ha creado sesion arrayfilas la inicia
                $_SESSION["filas"] = $_POST["filas"];
            }
        }
    }
}

/* CAMBIOS EN COLUMNAS, FILAS Y BUTACAS */
//si no existe la sesion arraycolumnas mete uno vacio
if (isset($_SESSION["columnas"])) {
    $array_columnas = $_SESSION['columnas'];
} else {
    $array_columnas = array("vacio" => "vacio");
}
//si no existe la sesion arrayfilas mete uno vacio
if (isset($_SESSION["filas"])) {
    $array_filas = $_SESSION['filas'];
} else {
    $array_filas = array("vacio" => "vacio");
}
//si existe la sesion arraybutacas y se ha hecho cambios en $arraybutacas se cambia la sesion arraybutacas
//si no se deja como esta en la sesion
if (isset($_SESSION["butacas"])) {
    if (isset($array_butacas)) {
        $_SESSION['butacas'] = $array_butacas;
    } else {
        $array_butacas = $_SESSION['butacas'];
    }
} else {
    $array_butacas = array("vacio" => "vacio");
}

/* ELIMINA TODAS LAS SESIONES */
if (isset($_POST["limpiar"])) {
    session_destroy();
    $array_filas = array("vacio" => "vacio");
    $array_columnas = array("vacio" => "vacio");
    $array_butacas = array("vacio" => "vacio");
}



$max_fila = 10;
$max_columna = 15;

echo "<form method='post' action=''>";
echo "<table border='1' id='butacas'>";
for ($filas = $max_fila; $filas >= 0; $filas--) {

    echo "<tr>";

    /* MENU SELECCIONAR LAS FILAS */
    //el if es para dar color
    if (!array_key_exists($filas, $array_filas)) {
        echo "<td><input type='checkbox' name='filas[" . $filas . "]' class='checkbox'><span>" . $filas . "</span></td>";
    } else {
        echo "<td><input type='checkbox' name='filas[" . $filas . "]' class='checkbox'><span class='marcado'>" . $filas . "</span></td>";
    }
    /* */

    for ($columnas = 1; $columnas <= $max_columna; $columnas++) {
        if ($filas == 0) {
            /* MENU SELECCIONAR LAS COLUMNAS */
            //el if es para dar color
            if (!array_key_exists($columnas, $array_columnas)) {
                echo "<td><input type='checkbox' name='columnas[" . $columnas . "]' class='checkbox'><span>" . $columnas . "</span></td>";
            } else {
                echo "<td><input type='checkbox' name='columnas[" . $columnas . "]' class='checkbox'><span class='marcado'>" . $columnas . "</span></td>";
            }
            /* */
        } elseif (array_key_exists($filas, $array_filas)) {
            if (!array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                echo '<td><input type="checkbox" name="butacas[' . $filas . ';' . $columnas . ']" class="checkbox"><span>' . $columnas . '</span></td>';
            } else {
                /*  IMPRIMIR BUTACAS */
                echo '<td>
                        <span style="position: relative; display: block;">  
                        <img src="butaca_verde.png" class="butaca">
                        <span class="numero">' . $columnas . '</span>
                    </span>
                </td>';
            }
        } else {
            if (!array_key_exists($columnas, $array_columnas) || array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                /*  IMPRIMIR BUTACAS */
                echo '<td>
                        <span style="position: relative; display: block;">  
                        <img src="butaca_verde.png" class="butaca">
                        <span class="numero">' . $columnas . '</span>
                        </span>
                    </td>';
            } else {
                echo '<td><input type="checkbox" name="butacas[' . $filas . ';' . $columnas . ']" class="checkbox"><span>' . $columnas . '</span></td>';
            }
        }
    }
    echo "</tr>";
}
echo "</table>";
echo "<input type='submit' value='Modificar' name='editar'>";
echo "<input type='submit' value='Limpiar' name='limpiar'>";
echo "</form>";
