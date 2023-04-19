<?php
    include_once("Crud.php");
    Class Butaca extends Crud
    {
        private $data = array();
        private $conexion;
        const TABLA = "butaca";
        



        function sacar_max()
        {
            try {
                $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " INNER JOIN butaca ON sala.id_sala=butaca.id_sala ORDER BY fila DESC ,columna DESC");
                $stmt->execute();
                $arraybutaca = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error" . $e->getMessage();
            }
        }
    }
?>