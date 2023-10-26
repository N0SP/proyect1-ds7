<?php 

require_once('class/navbar.php');

?>
    <h1>Editar Tarea</h1>
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
    $obj_funciones=new funciones();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_compromiso = $_POST['fecha_compromiso'];
        $responsable = $_POST['responsable'];
        $tipo_tarea = $_POST['tipo_tarea'];
        
        if ($obj_funciones->editar_tarea($titulo, $descripcion, $fecha_compromiso, $responsable, $tipo_tarea)) {
            echo "Tarea editada con éxito.";
        } else {
            echo "Error al agregar la tarea.";
        }
    }
    ?>
</body>
</html>
