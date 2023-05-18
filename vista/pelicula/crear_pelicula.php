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
        window.onload = function() {
            /* ACTUALIZAR O CREAR LA IMAGEN */
            const agrega = document.getElementById("file");
            const imagePreview = document.getElementById("agregar_imagen");
            const nombre = document.getElementById("nombre");

            agrega.addEventListener("change", function(event) {
                const file = this.files[0];
                nombre.innerHTML = file.name;

                const selectedFiles = event.target.files;
                for (let i = 0; i < selectedFiles.length; i++) {
                    const reader = new FileReader();

                    reader.addEventListener("load", function() {
                        imagePreview.style.backgroundImage = `url(${reader.result})`;
                    });

                    reader.readAsDataURL(selectedFiles[i]);
                }
            });

            /* ACTUALIZAR URL */
            const trailer = document.getElementById("trailer");
            const url_nueva = document.getElementById("nueva_url");
            const boton = document.getElementById("boton");

            if (boton) {
                boton.addEventListener("click", function() {
                    trailer.src = "https://www.youtube.com/embed/" + url_nueva.value;
                });
            }

            /* AGREGAR TRAILER */
            const trailer2 = document.getElementById("trailer2");
            const url_nueva2 = document.getElementById("nueva_url2");
            const boton2 = document.getElementById("boton2");

            if (boton2) {
                boton2.addEventListener("click", function() {
                    const iframeExistente = document.querySelector('iframe');

                    if (iframeExistente) {
                        iframeExistente.remove();
                    }

                    var iframe = document.createElement("iframe");

                    iframe.setAttribute("src", "https://www.youtube.com/embed/" + url_nueva2.value);
                    iframe.setAttribute("width", "100%");
                    iframe.setAttribute("height", "400px");
                    iframe.setAttribute("name", "trailer");
                    iframe.setAttribute("allow", "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture");

                    var label = document.querySelector("label[for='url_new']");
                    label.parentNode.insertBefore(iframe, label);
                });
            }

            document.getElementById("FormulCreaPelicula").addEventListener("submit", function(event) {
                let boton = event.submitter;
                if (boton.id === "EnviaPelicula") {
                    document.getElementById("loadingImage").style.display = "block";
                }
            });
        }
    </script>
</head>

<body>
    <?php
    include 'vista/menu.php';
    ?>
    <div id="imagengrande">
        <?php
        if (isset($id_pelicula)) {
        ?>
            Editar Pelicula
        <?php
        } else {
        ?>
            Crear Película
        <?php
        }
        ?>
    </div>

    <form id="FormulCreaPelicula" method='post' action='' enctype="multipart/form-data">
        <?php if (isset($id_pelicula)) { ?>
            <input type="hidden" name="id_pelicula" value="<?= $id_pelicula ?>" />
        <?php } ?>
        <div class="filas-columnas">
            <br><br><br>
            <label for='nombre'>Nombre:
                <input type='text' name='nombre' value='<?= $nombre ?? "" ?>' required>
            </label>
            <label for='duracion'>Duracion:
                <input type='number' min='0' step='1' name='duracion' value='<?= $duracion ?? 0 ?>' pattern='[0-9]+' required>
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
                <input type='date' name='fecha_estreno' value='<?= $fecha_estreno ?? "" ?>' required>
            </label>
        </div>
        <div class="filas-columnas">
            <label for='sinopsis'>Sinopsis:
                <textarea type='text' name='sinopsis' style="resize: none; border: 1px solid #ccc; border-radius: 4px; padding: 10px; width: 100%; height: 250px;"><?= $sinopsis ?? "" ?></textarea>
            </label>
            <?php
            if (isset($id_pelicula)) {
            ?>
                <label for='imagen'>Imagen:
                    <div class="pelicula" style="background-image: url('vista/fotos/<?= $imagen ?> ');" id='agregar_imagen'></div>
                    <input type="file" name="imagen" accept="image/*" style="display: none;" id="file" />
                    <label for="file" class="boton-modificar pen" style="display: inline-block; padding-left: 22px; width: 30%; background-color: rgb(79, 79, 255); border-radius: 4px;cursor: pointer; margin-top:15px">Editar</label>
                    <label for="nombre" id='nombre'></label>

                </label>
                <label for='trailer'>Trailer:
                    <iframe src="https://www.youtube.com/embed/<?= $url ?>" id=trailer allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width:100%; height:400px" allowfullscreen></iframe>
                    <label for='url_nueva'>Url:
                        <input type='text' name='url_new' style='width:150%' id='nueva_url' value="<?= $url ?>">
                    </label>
                    <label for='text' class="boton-modificar pen" name='boton' id='boton' style="margin-left:25%; padding-left: 22px; width: 90px; background-color: rgb(79, 79, 255); border-radius: 4px;cursor: pointer; margin-top:15px">Editar</label>
                </label>
            <?php
            } else { ?>
                <label for='imagen'>Imagen:
                    <div class="pelicula" style="background-color:black" id='agregar_imagen'></div>
                    <input type="file" name="imagen" accept="image/*" id="file" style="display: none;" />
                    <br><label for="nombre2" id='nombre'></label>
                    <label for="file" class="boton-modificar pen" style="display: inline-block; padding-left: 22px; width: 100%; background-color: rgb(79, 79, 255); border-radius: 4px;cursor: pointer; margin-top:15px">Subir Imagen</label>
                </label>

                <label for='trailer'>Trailer:
                    <br><label for='url_new'>Url nueva:
                        <input type='text' name='url_new' style='width:100%' id='nueva_url2'>
                    </label>
                    <label for='text' class="boton-modificar pen" name='boton' id='boton2' style=" padding-left: 22px; width: 40%; background-color: rgb(79, 79, 255); border-radius: 4px;cursor: pointer; margin-top:15px">Subir trailer</label>
                </label>
            <?php }
            ?>
        </div>
        <div class="filas-columnas">
            <input id="EnviaPelicula" type='submit' class="boton-modificar confirm" value='Correcto' name='enviar_pelicula'>
        </div>
    </form>
    <div id="loadingImage"></div>
</body>

</html>