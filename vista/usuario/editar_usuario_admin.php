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
        <link rel="stylesheet" href="vista/css/usuario_admin.css">
        <script src="vista/js/sala_admin.js"></script>
    </head>

    <body>
        <?php
        include "vista/menu.php";
        ?>
        <div id="imagengrande">
            Editar Usuario
        </div>
        <div class="container py-5 h-75">
                <div class="row d-flex justify-content-center h-75">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <div class="form-outline form-white mb-4">
                                        <form action="" method="post">
                                        <label class="form-label">Nombre:</label>
                                        <input type="text" name="nombre_usuario_admin_editar"  value='<?= $_POST['nombre_usuario_admin'] ?? "" ?>' class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Apellido:</label>
                                        <input type="text" name="apellido_usuario_admin_editar"  value='<?= $_POST['apellido_usuario_admin'] ?? "" ?>' class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Correo:</label>
                                        <input type="text" name="correo_usuario_admin_editar"  value='<?= $_POST['correo_usuario_admin'] ?? "" ?>' class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Rol:</label>
                                        <select class="form-select" name="rol_usuario_admin_editar">
                                            <option value="Cliente">Cliente</option>
                                            <option value="Empleado" <?php if ($_POST['rol_usuario_admin'] == "Empleado") echo "selected"; ?>>Empleado</option>
                                            <option value="Administrador" <?php if ($_POST['rol_usuario_admin'] == "Administrador") echo "selected"; ?>>Administrador</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_usuario_admin_editar" value='<?= $_POST['id_usuario_admin']?>'>
                                    <button class="btn btn-outline-light btn-lg px-5" name="cambiar_usuario_admin" type="submit">Cambiar</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>