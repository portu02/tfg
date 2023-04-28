<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./vista/css/estilos_admin.css">
        <script src="./vista/js/script.js"></script>
    </head>
    <body>
        <!-- menu principal -->
    <?php
        include "./vista/menu.php";
    ?>
    <div id="hoja_admin" >
        <form action="" method="post"  id="opciones">
            <div id="salas" >
                <input type="submit" value="SALAS">
            </div>
            <div id="peliculas">
                <input type="submit" value="PELICULAS">
            </div>
            <div id="usuarios">
                <input type="submit" value="USUARIOS">
            </div>
        </form>
        

    </div>
    
    </body>
</html>