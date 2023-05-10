<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
                    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                        <div class="card mb-2">
                            <div class="card-body p-2">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control form-control-lg rounded" placeholder="Busqueda" aria-label="Busqueda" aria-describedby="basic-addon2" />
                                    <span class="input-group-text border-0" id="basic-addon2"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-black">
                            <div class="card-body p-3">
                                <h6 class="text-white mt-3 mb-4">Filtros avanzados</h6>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-lg btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">
                                                DURACIÓN
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-lg btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-mdb-toggle="dropdown" aria-expanded="false">
                                                Color
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-lg btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-mdb-toggle="dropdown" aria-expanded="false">
                                                Size
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-lg btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink3" data-mdb-toggle="dropdown" aria-expanded="false">
                                                Sale
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-lg btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-mdb-toggle="dropdown" aria-expanded="false">
                                                Time
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-lg btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink5" data-mdb-toggle="dropdown" aria-expanded="false">
                                                Type
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink5">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <p class="text-white mb-0"><span class="text-warning">108 </span>results</p>
                                    <div>
                                        <button type="button" class="btn btn-link text-white" data-mdb-ripple-color="dark">
                                            Reset
                                        </button>
                                        <button type="button" class="btn btn-warning">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>