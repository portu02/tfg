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
    </head>

    <body>
        <?php
            include 'vista/menu.php';
        ?>
        <div id="imagengrande">
            Crear Horarios
        </div>
        <div id="hoja">
            <h1>Una pelicula con horario manual</h1>
            <form method='post' action=''>
                <label for='peliculas'>Elige una pelicula</label>
                <select name="peliculas_horario">
                       <?php foreach($arraypeliculas as $a){ ?>
                            <option value="<?= $a["id_pelicula"]?>"><?=$a["nombre"] ?></option>
                        <?php } ?>
                </select>       
                <label for="horario">Elige una sala</label>  
                <select name="sala_horario">
                       <?php foreach($arraysalas as $a){ ?>
                            <option value="<?= $a["id_sala"]?>"><?=$a["id_sala"] ?></option>
                        <?php } ?>
                </select> 
            </form>
            <form method='post' action=''>
                <label for='peliculas'>Elige una pelicula</label>
                <select name="select">
                       <?php foreach($arraypeliculas as $a){ ?>
                            <option value="<?= $a["id_pelicula"]?>"><?=$a["nombre"] ?></option>
                        <?php } ?>
                </select>
                <label for=""></label>         
                <input type="submit" value="aleatorio" name="aleatorio">   
            </form>
        </div>
    </body>
</html>