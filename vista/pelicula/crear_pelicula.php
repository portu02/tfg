<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vista/css/sala_admin.css">
    <script src="vista/js/sala_admin.js"></script>
    <script>
        function handleKeyDown(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                const input = event.target;
                const inputValue = input.value;
                const cursorPosition = input.selectionStart; 
                input.value = inputValue.slice(0, cursorPosition) + "\n" + inputValue.slice(cursorPosition);
                input.selectionStart = input.selectionEnd = cursorPosition + 1; 
            }
        }
    </script>
</head>

<body>
    <?php
    include 'vista/menu.php';
    ?>
    <div id="imagengrande">
        Crear Pelicula
    </div>

    <form method='post' action=''>
        <input type="hidden" name="id_pelicula" value="<?= $id_pelicula ?? 0 ?>" />
        <div class="filas-columnas">
            <br><br><br>
            <label for='nombre'>Nombre:
                <input type='text' name='nombre' value='<?= $nombre ?? "" ?>'>
            </label>
            <label for='duracion'>Duracion:
                <input type='number' min='1' name='duracion' value='<?= $duracion ?? "" ?>'>
            </label>
            <label for='clasificacion'>Clasificación:
                <select name="clasificacion">
                    <?php if (isset($clasificacion)) { ?>
                        <option value="TP" <?php if ($clasificacion == 'TP') {
                                                echo "selected";
                                            } ?>>TP</option>
                        <option value="+7" <?php if ($clasificacion == '+7') {
                                                echo "selected";
                                            } ?>>+7</option>
                        <option value="+12" <?php if ($clasificacion == '+12') {
                                                echo "selected";
                                            } ?>>+12</option>
                        <option value="+16" <?php if ($clasificacion == '+16') {
                                                echo "selected";
                                            } ?>>+16</option>
                        <option value="+18" <?php if ($clasificacion == '+18') {
                                                echo "selected";
                                            } ?>>+18</option>
                    <?php
                    } else { ?>
                        <option value="TP">TP</option>
                        <option value="+7">+7</option>
                        <option value="+12">+12</option>
                        <option value="+16">+16</option>
                        <option value="+18">+18</option>
                    <?php
                    }
                    ?>
                </select>
            </label>
            <label for='categoria'>Categoría:
                <select name="categoria">
                    <?php if (isset($categoria)) { ?>
                        <option value="Acción" <?php if ($categoria == 'Acción') echo "selected"; ?>>Acción</option>
                        <option value="Aventuras" <?php if ($categoria == 'Aventuras') echo "selected"; ?>>Aventuras</option>
                        <option value="Ciencia Ficción" <?php if ($categoria == 'Ciencia Ficción') echo "selected"; ?>>Ciencia Ficción</option>
                        <option value="Comedia" <?php if ($categoria == 'Comedia') echo "selected"; ?>>Comedia</option>
                        <option value="No-Ficción" <?php if ($categoria == 'No-Ficción') echo "selected"; ?>>No-Ficción</option>
                        <option value="Drama" <?php if ($categoria == 'Drama') echo "selected"; ?>>Drama</option>
                        <option value="Documental" <?php if ($categoria == 'Documental') echo "selected"; ?>>Documental</option>
                        <option value="Fantasía" <?php if ($categoria == 'Fantasía') echo "selected"; ?>>Fantasía</option>
                        <option value="Musical" <?php if ($categoria == 'Musical') echo "selected"; ?>>Musical</option>
                        <option value="Suspense" <?php if ($categoria == 'Suspense') echo "selected"; ?>>Suspense</option>
                        <option value="Terror" <?php if ($categoria == 'Terror') echo "selected"; ?>>Terror</option>
                        <option value="Thriller" <?php if ($categoria == 'Thriller') echo "selected"; ?>>Thriller</option>
                        <option value="Animación" <?php if ($categoria == 'Animación') echo "selected"; ?>>Animación</option>
                        <option value="Infantil" <?php if ($categoria == 'Infantil') echo "selected"; ?>>Infantil</option>
                    <?php
                    } else { ?>
                        <option value="Acción">Acción</option>
                        <option value="Aventuras">Aventuras</option>
                        <option value="Ciencia Ficción">Ciencia Ficción</option>
                        <option value="Comedia">Comedia</option>
                        <option value="No-Ficción">No-Ficción</option>
                        <option value="Drama">Drama</option>
                        <option value="Documental">Documental</option>
                        <option value="Fantasía">Fantasía</option>
                        <option value="Musical">Musical</option>
                        <option value="Suspense">Suspense</option>
                        <option value="Terror">Terror</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Animación">Animación</option>
                        <option value="Infantil">Infantil</option>
                    <?php
                    }
                    ?>
                </select>
            </label>
            <label for='fecha_estreno'>Fecha de Estreno:
                <input type='date' name='fecha_estreno' value='<?= $fecha_estreno ?? "" ?>'>
            </label>
            <label for='sinopsis'>Sinopsis:
                <input type='text' name='sinopsis' value='<?= $sinopsis ?? "" ?>' style='width: 100%; height: 100%; padding: 5px; margin: 0; white-space:pre-wrap !important; line-height: 1.5'>
            </label>
            <?php
            if (isset($id_pelicula)) {
            ?>
                <label for='iamgen'>Imagen:
                    <div class="pelicula" style="background-image: url('vista/fotos/<?= $imagen ?> ');"></div>
                </label>
            <?php
            } ?>
        </div>
        <div class="filas-columnas">
            <input type='submit' class="boton-modificar pen" value='Modificar' name='editar_sala_admin'>
            <input type='submit' class="boton-modificar confirm" value='Correcto' name='enviar_sala'>
        </div>
    </form>

</body>

</html>