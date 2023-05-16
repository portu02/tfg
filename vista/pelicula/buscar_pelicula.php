<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/sala_admin.css">
    <link rel="stylesheet" href="vista/css/buscador.css">
    <script src="vista/js/sala_admin.js"></script>
</head>

<body>
    <?php
    include 'vista/menu.php';
    ?>
    <div id="imagengrande">Películas</div>
    <section class="intro">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.43);">
            <div class="container">
                <div class="row">
                    <form action='' method="post">
                        <div class="col-md-12 col-lg-10 col-xl-12">
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <div class="input-group input-group-lg">
                                        <input type="text" name='buscador' class="form-control form-control-lg rounded" placeholder="Busqueda" aria-label="Busqueda" aria-describedby="basic-addon2" value='<?= $buscador ?? "" ?>' />
                                        <span class="input-group-text border-0" id="basic-addon2"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-black">
                                <div class="card-body p-3">
                                    <h6 class="text-white mt-3 mb-4">Filtros avanzados</h6>

                                    <div class="row">
                                        <select name="categoria" class="form-select w-20 mx-2" style='border:none' aria-label=".form-select example">
                                            <option value='' selected>Categoría</option>
                                            <option value="Acción" <?php if ($categoria == 'Acción') {
                                                                        echo 'selected';
                                                                    } ?>>Acción</option>
                                            <option value="Aventuras" <?php if ($categoria == 'Aventuras') {
                                                                            echo 'selected';
                                                                        } ?>>Aventuras</option>
                                            <option value="Ciencia Ficción" <?php if ($categoria == 'Ciencia Ficción') {
                                                                                echo 'selected';
                                                                            } ?>>Ciencia Ficción</option>
                                            <option value="Comedia" <?php if ($categoria == 'Comedia') {
                                                                        echo 'selected';
                                                                    } ?>>Comedia</option>
                                            <option value="No-Ficción" <?php if ($categoria == 'No-Ficción') {
                                                                            echo 'selected';
                                                                        } ?>>No-Ficción</option>
                                            <option value="Drama" <?php if ($categoria == 'Drama') {
                                                                        echo 'selected';
                                                                    } ?>>Drama</option>
                                            <option value="Documental" <?php if ($categoria == 'Documental') {
                                                                            echo 'selected';
                                                                        } ?>>Documental</option>
                                            <option value="Fantasía" <?php if ($categoria == 'Fantasía') {
                                                                            echo 'selected';
                                                                        } ?>>Fantasía</option>
                                            <option value="Musical" <?php if ($categoria == 'Musical') {
                                                                        echo 'selected';
                                                                    } ?>>Musical</option>
                                            <option value="Suspense" <?php if ($categoria == 'Suspense') {
                                                                            echo 'selected';
                                                                        } ?>>Suspense</option>
                                            <option value="Terror" <?php if ($categoria == 'Terror') {
                                                                        echo 'selected';
                                                                    } ?>>Terror</option>
                                            <option value="Thriller" <?php if ($categoria == 'Thriller') {
                                                                            echo 'selected';
                                                                        } ?>>Thriller</option>
                                            <option value="Animación" <?php if ($categoria == 'Animación') {
                                                                            echo 'selected';
                                                                        } ?>>Animación</option>
                                            <option value="Infantil" <?php if ($categoria == 'Infantil') {
                                                                            echo 'selected';
                                                                        } ?>>Infantil</option>
                                        </select>
                                        <select name="clasificacion" class="form-select2 w-20 mx-2" style='border:none' aria-label=".form-select example">
                                            <option value='' selected>Clasificación</option>
                                            <option value="TP" <?php if ($clasificacion == 'TP') {
                                                                    echo 'selected';
                                                                } ?>>TP</option>
                                            <option value="+7" <?php if ($clasificacion == '+7') {
                                                                    echo 'selected';
                                                                } ?>>+7</option>
                                            <option value="+12" <?php if ($clasificacion == '+12') {
                                                                    echo 'selected';
                                                                } ?>>+12</option>
                                            <option value="+16" <?php if ($clasificacion == '+16') {
                                                                    echo 'selected';
                                                                } ?>>+16</option>
                                            <option value="+18" <?php if ($clasificacion == '+18') {
                                                                    echo 'selected';
                                                                } ?>>+18</option>
                                        </select>
                                        <input type="date" name="fecha" class="date w-20 mx-2" value='<?= $fecha ?? "" ?>'>
                                        <select name="hora" class="form-select3 w-20 mx-2" style='border:none' aria-label=".form-select example">
                                            <option value='' selected>Hora</option>
                                            <option value="16:00:00" <?php if ($hora == '16:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>16:00:00</option>
                                            <option value="17:00:00" <?php if ($hora == '17:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>17:00:00</option>
                                            <option value="18:00:00" <?php if ($hora == '18:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>18:00:00</option>
                                            <option value="19:00:00" <?php if ($hora == '19:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>19:00:00</option>
                                            <option value="20:00:00" <?php if ($hora == '20:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>20:00:00</option>
                                            <option value="21:00:00" <?php if ($hora == '21:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>21:00:00</option>
                                            <option value="22:00:00" <?php if ($hora == '22:00:00') {
                                                                            echo 'selected';
                                                                        } ?>>22:00:00</option>
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <p class="text-white mb-0"><span class="text-danger"></span>results</p>
                                        <div>
                                            <button type="button" class="btn btn-link text-white" data-mdb-ripple-color="dark">
                                                Limpiar
                                            </button>
                                            <input type="submit" class="btn btn-danger" value="Buscar" name='buscar'></button>
                                            <input type="hidden" name='buscar_pelicula'></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php if (isset($arrayfiltrado)) {
                    if (empty($arrayfiltrado)) { ?>
                        <div id="peliculas" style="margin-top: 0px; padding: 20px">
                            <p class="text-white mb-0 text-center"><span class="text-danger">No se han encontrado resultados para los filtros seleccionados</span></p>
                        </div><?php
                            } else {
                                ?>
                        <form action="" method="post">
                            <div id="peliculas" style="margin-top: 0px; padding: 50px">
                                <?php
                                foreach ($arrayfiltrado as $a) { ?>
                                    <div class="pelicula" style="background-image: url('vista/fotos/<?= $a["imagen"] ?> ');"><input class="botonpelicula" type="submit" value="<?= $a["id_pelicula"] ?>" name="pelicula"></div>
                                <?php } ?>
                            </div>
                        </form>
                <?php }
                        } ?>
            </div>
        </div>
    </section>
    <script>
        const buscador = document.querySelector('.form-control');
        const categoriaSelect = document.querySelector('.form-select');
        const clasificacionSelect = document.querySelector('.form-select2');
        const fechaInput = document.querySelector('.date');
        const horaSelect = document.querySelector('.form-select3');
        const limpiarBtn = document.querySelector('.btn-link');

        limpiarBtn.addEventListener('click', () => {
            buscador.value = '';
            categoriaSelect.selectedIndex = 0;
            clasificacionSelect.selectedIndex = 0;
            fechaInput.value = '';
            horaSelect.selectedIndex = 0;
        });

        var numPelis = document.querySelectorAll('.pelicula').length;
        var resultsSpan = document.querySelector('.text-danger');
        resultsSpan.innerHTML = numPelis + ' ';
    </script>
</body>
<div class="linea3"></div>
<footer class="container-fluid text-center">
    <span class="fa fa-instagram" style="font-size: 30px; color:white"></span>&emsp;
    <span class="fa fa-twitter" style="font-size: 30px; color:white"></span>&emsp;
    <span class="fa fa-facebook" style="font-size: 30px; color:white"></span>&emsp;
    <span class="fa fa-snapchat" style="font-size: 30px; color:white"></span>
</footer>

</html>