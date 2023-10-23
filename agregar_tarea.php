<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tarea</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Agregar Tarea</h1>
    <?php require_once('../class/navbar.php'); ?>
    <form action="" method="post">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input type="date" name="fecha_compromiso">
        <input type="text" name="responsable" placeholder="Responsable">
        <select name="tipo_tarea">
            <option value="hogar">Hogar</option>
            <option value="trabajo">Trabajo</option>
            <option value="escuela">Escuela</option>
        </select>
        <input type="submit" value="Agregar">
    </form>

    <?php
    require_once('../class/functions.php');
    $obj_funciones=new funciones();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_compromiso = $_POST['fecha_compromiso'];
        $responsable = $_POST['responsable'];
        $tipo_tarea = $_POST['tipo_tarea'];
        
        if ($obj_funciones->agregar_tarea($titulo, $descripcion, $fecha_compromiso, 'no', $responsable, $tipo_tarea, 'pendiente')) {
            echo "Tarea agregada con éxito.";
        } else {
            echo "Error al agregar la tarea.";
        }
    }
    ?>
</body>
</html>
