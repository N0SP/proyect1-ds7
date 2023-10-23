<?php
    require_once('class/modelo.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tarea</title>
</head>
<body>
    
    <h1>Agregar Tarea</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="date" name="fecha">
        <input type="text" name="responsable" placeholder="Responsable">
        <input type="submit" value="Agregar">
    </form>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $responsable = $_POST['responsable'];
        $estado = 'incompleta'; // El estado por defecto es incompleta
        if (agregar_tarea($nombre, $fecha, $responsable, $estado)) {
            echo "Tarea agregada con éxito.";
        } else {
            echo "Error al agregar la tarea.";
        }
    }
    ?>
</body>
</html>
