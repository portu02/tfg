<?php
if(isset($_POST["editar_sala"]) || isset($_POST["anadir_sala_admin"])){
    /* BORRAR SESIONES */
    unset($_SESSION["maxfilas"]);
    unset($_SESSION["maxcolumnas"]);
    unset($_SESSION["descripcion"]);
    unset($_SESSION["habilitada"]);
    unset($_SESSION["luxury"]);
    unset($_SESSION["filas"]);
    unset($_SESSION["columnas"]);
    unset($_SESSION["butacas"]);
}


/***********  EDITAR  ***********/
if(isset($_POST["id_sala"])){
    $id_sala = $_POST["id_sala"];
}else{
    $id_sala = 0;
}

if (isset($_POST["editar_sala"])) {
    $butacas = new Butaca("", "", "", "", "");
    $sala = new Sala($id_sala, "", "", "", "", "");


    $descripcion = $sala->obtieneDeID($id_sala)->descripcion;
    $habilitada = $sala->obtieneDeID($id_sala)->habilitada;
    $luxury = $sala->obtieneDeID($id_sala)->luxury;

    
    $arraybutaca = $butacas->obtieneDeIDSala($id_sala);

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

    $numbutaca = 0;

    for ($filas = $max_fila; $filas > 0; $filas--) {
        $array_filas[$filas] = "on";
        for ($columnas = 1; $columnas <= $max_columna; $columnas++) {
            if ($arraybutaca[$numbutaca]["fila"] == $filas && $arraybutaca[$numbutaca]["columna"] == $columnas) {
                $array_butacas[$filas . ";" . $columnas] = "on";
                $numbutaca++;
            }
        }
    }
}


/***********  CREAR  ***********/
if (isset($_POST["editar_sala_admin"])) {

    if (isset($_POST["columnas"]) || isset($_POST["filas"]) || isset($_POST["butacas"])) {

        /***** ARRAY BUTACAS ******/
        if (isset($_POST["butacas"])) {

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
        }
        /***** ARRAY COLUMNAS ******/
        if (isset($_POST["columnas"])) {

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
        }
        /***** ARRAY FILAS ******/
        if (isset($_POST["filas"])) {

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
    if (isset($array_columnas)) {
        $_SESSION['columnas'] = $array_columnas;
    } else {
        $array_columnas = $_SESSION['columnas'];
    }
} else {
    if (isset($array_columnas)) {
        $_SESSION['columnas'] = $array_columnas;
    } else {
        $array_columnas = array("vacio" => "vacio");
    }
}
//si no existe la sesion arrayfilas mete uno vacio
if (isset($_SESSION["filas"])) {
    if (isset($array_filas)) {
        $_SESSION['filas'] = $array_filas;
    } else {
        $array_filas = $_SESSION['filas'];
    }
} else {
    if (isset($array_filas)) {
        $_SESSION['filas'] = $array_filas;
    } else {
        $array_filas = array("vacio" => "vacio");
    }
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
    if (isset($array_butacas)) {
        $_SESSION['butacas'] = $array_butacas;
    } else {
        $array_butacas = array("vacio" => "vacio");
    }
}

/****** MAXIMO FILAS ******/
if (isset($_POST["previsualizar"]) && isset($_POST["longfila"])) {
    $max_fila = $_POST["longfila"];
}
if (isset($_SESSION["maxfilas"])) {

    if (isset($max_fila)) {
        $_SESSION["maxfilas"] = $max_fila;
    } else {
        $max_fila = $_SESSION["maxfilas"];
    }
} else {
    if (isset($max_fila)) {
        $_SESSION["maxfilas"] = $max_fila;
    } else {
        $max_fila = 5;
    }
}
/****** MAXIMO COLUMNAS ******/
if (isset($_POST["previsualizar"]) && isset($_POST["longcolumna"])) {
    $max_columna = $_POST["longcolumna"];
}
if (isset($_SESSION["maxcolumnas"])) {

    if (isset($max_columna)) {
        $_SESSION["maxcolumnas"] = $max_columna;
    } else {
        $max_columna = $_SESSION["maxcolumnas"];
    }
} else {
    if (isset($max_columna)) {
        $_SESSION["maxcolumnas"] = $max_columna;
    } else {
        $max_columna = 5;
    }
}

/****** DESCRIPCION ******/
if (isset($_POST["previsualizar"]) && isset($_POST["descripcion"])) {
    $descripcion = $_POST["descripcion"];
}
if (isset($_SESSION["descripcion"])) {

    if (isset($descripcion)) {
        $_SESSION["descripcion"] = $descripcion;
    } else {
        $descripcion = $_SESSION["descripcion"];
    }
} else {
    if (isset($descripcion)) {
        $_SESSION["descripcion"] = $descripcion;
    } else {
        $descripcion = "";
    }
}

/****** HABILITADA ******/
if (isset($_POST["previsualizar"]) && isset($_POST["habilitada"])) {
    $habilitada = $_POST["habilitada"];
}
if (isset($_SESSION["habilitada"])) {

    if (isset($habilitada)) {
        $_SESSION["habilitada"] = $habilitada;
    } else {
        $habilitada = $_SESSION["habilitada"];
    }
} else {
    if (isset($habilitada)) {
        $_SESSION["habilitada"] = $habilitada;
    } else {
        $habilitada = "";
    }
}

/****** LUXURY ******/
if (isset($_POST["previsualizar"]) && isset($_POST["luxury"])) {
    $luxury = $_POST["luxury"];
}
if (isset($_SESSION["luxury"])) {

    if (isset($luxury)) {
        $_SESSION["luxury"] = $luxury;
    } else {
        $luxury = $_SESSION["luxury"];
    }
} else {
    if (isset($luxury)) {
        $_SESSION["luxury"] = $luxury;
    } else {
        $luxury = "";
    }
}

/****** ELIMINA TODAS LAS SESIONES ******/
if (isset($_POST["previsualizar"])) {
    unset($_SESSION["filas"]);
    unset($_SESSION["columnas"]);
    unset($_SESSION["butacas"]);

    $array_filas = array("vacio" => "vacio");
    $array_columnas = array("vacio" => "vacio");
    $array_butacas = array("vacio" => "vacio");
}


/****** CREAR SALA ******/
if (isset($_POST["enviar_sala"])) {
    /***** COMPROBAR QUE EXISTEN LAS SESIONES *****/
    if (isset($_SESSION["maxfilas"])) {
        $max_fila = $_SESSION["maxfilas"];
    } else {
        $max_fila = 5;
    }

    if (isset($_SESSION["maxcolumnas"])) {
        $max_columna = $_SESSION["maxcolumnas"];
    } else {
        $max_columna = 5;
    }

    if (isset($_SESSION["descripcion"])) {
        $descripcion = $_SESSION["descripcion"];
    } else {
        $descripcion = "";
    }

    if (isset($_SESSION["habilitada"])) {
        $habilitada = $_SESSION["habilitada"];
    } else {
        $habilitada = 0;
    }

    if (isset($_SESSION["luxury"])) {
        $luxury = $_SESSION["luxury"];
    } else {
        $luxury = 0;
    }

    if (isset($_SESSION["filas"])) {
        $array_filas = $_SESSION["filas"];
    } else {
        $array_filas = array("vacio" => "vacio");
    }

    if (isset($_SESSION["columnas"])) {
        $array_columnas = $_SESSION["columnas"];
    } else {
        $array_columnas = array("vacio" => "vacio");
    }

    if (isset($_SESSION["butacas"])) {
        $array_butacas = $_SESSION["butacas"];
    } else {
        $array_butacas = array("vacio" => "vacio");
    }

    /* CAPACIDAD */
    $capacidad = 0;
    for ($filas = $max_fila; $filas >= 0; $filas--) {
        for ($columnas = 1; $columnas <= $max_columna; $columnas++) {
            if (array_key_exists($filas, $array_filas) && $filas != 0) {
                if (array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                    $capacidad++;
                }
            } elseif ($filas != 0) {
                if (!array_key_exists($columnas, $array_columnas) || array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                    $capacidad++;
                }
            }
        }
    }

    /* SI HAY QUE EDITAR, id_sala != 0 BORRO Y CREO OTRA SALA */
    $salas = new Sala("", "", "", "", "", "");
    if($id_sala == 0){

        $id_sala = $salas->obtieneUltimoID();
        $id_sala = $id_sala + 1;

    }else{
        $salas->borrar($id_sala);
    }

    $sala = new Sala($id_sala, $descripcion, $capacidad, $habilitada, $luxury, 0);
    $sala->crear();

    /* INSERTAR BUTACAS */
    for ($filas = $max_fila; $filas >= 0; $filas--) {
        for ($columnas = 1; $columnas <= $max_columna; $columnas++) {
            if (array_key_exists($filas, $array_filas) && $filas != 0) {
                if (array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                    //INSERTAR
                    $butaca = new Butaca("", $columnas, $filas, "Verde", $id_sala);
                    $butaca->crear();
                }
            } elseif ($filas != 0) {
                if (!array_key_exists($columnas, $array_columnas) || array_key_exists($filas . ";" . $columnas, $array_butacas)) {
                    //INSERTAR
                    $butaca = new Butaca("", $columnas, $filas, "Verde", $id_sala);
                    $butaca->crear();
                }
            }
        }
    }

    /* BORRAR SESIONES */
    unset($_SESSION["maxfilas"]);
    unset($_SESSION["maxcolumnas"]);
    unset($_SESSION["descripcion"]);
    unset($_SESSION["habilitada"]);
    unset($_SESSION["luxury"]);
    unset($_SESSION["filas"]);
    unset($_SESSION["columnas"]);
    unset($_SESSION["butacas"]);

    $result = 'Sala creada correctamente';
    $arraysalas = $sala->obtieneTodos();
    /* EJECUTAR SCRIPT CREAR HORARIO */
    require_once('./controlador/crear_horario.php');

    require_once('vista/sala/sala_admin.php');
} else {
    require_once 'vista/sala/crearsala_admin.php';
}
