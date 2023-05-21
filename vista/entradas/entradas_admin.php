<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="vista/fotos/R.png">
    <link rel="stylesheet" href="vista/css/tablasAdmin.css">
    <link rel="stylesheet" href="vista/css/estilos.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        <?php if ($result != "") {
        ?>alert("<?= $result ?>")
        <?php
        } ?>
    </script>
</head>

<body>
    <?php
    include "vista/menu.php";
    ?>
    <table id='table'>
        <tr id='titulo'>
            <th>USUARIO</th>
            <th>SALA</th>
            <th>DIA</th>
            <th>HORA</th>
            <th>PELICULA</th>
            <th>FILA</th>
            <th>COLUMNA</th>
            <th>PRECIO</th>
        </tr>
        <?php
        foreach ($arrayentradas as $row) {
        ?>
            <tr>
                <td data-titulo='usuario'><?php echo $row['usuario'] ?></td>
                <td data-titulo='sala'><?php echo $row['sala']?></td>
                <td data-titulo='fecha'><?php echo $row['dia'] ?></td>
                <td data-titulo='hora'><?php echo $row['hora'] ?></td>
                <td data-titulo='pelicula'><?php echo $row['pelicula']?></td>
                <td data-titulo='fila'><?php echo $row['fila'] ?></td>
                <td data-titulo='columna'><?php echo $row['columna'] ?></td>
                <td data-titulo='precio'><?php echo $row['precio'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div id='contain'>
        <div id='dentro' style="margin-top: 0px; margin-bottom:40px">
            <?php
            foreach ($num_entradas as $a) {

                if (isset($_GET["pagina_reserva"])) {
                    if ($_GET["pagina_reserva"] == $a) {
            ?>
                        <a href='?pagina_reserva=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_reserva=<?= ($a) ?>'>
                            <div class='dentro'></div>
                        </a>
                    <?php
                    }
                } else {
                    if ($a == 1) {
                    ?>
                        <a href='?pagina_reserva=<?= ($a) ?>'>
                            <div id='colorea' class='dentro'></div>
                        </a>
                    <?php
                    } else {
                    ?>
                        <a href='?pagina_reserva=<?= ($a) ?>'>
                            <div class='dentro'></div>
                        </a>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>