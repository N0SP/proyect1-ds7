<?php
require_once('class/modelo.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
</head>
<body>
    
    <h1>Lista de Tareas</h1>
</nav>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Responsable</th>
            <th>Estado</th>
            <th></th>
        </tr>
        <?php 
        $tareas = obtener_tareas();
        foreach ($tareas as $tarea) {
            echo "<tr>";
            echo "<td>{$tarea['nombre']}</td>";
            echo "<td>{$tarea['fecha']}</td>";
            echo "<td>{$tarea['responsable']}</td>";
            echo "<td>";
            echo "<label class='switch'>";
            echo "<input type='checkbox' onchange='actualizarEstado({$tarea['id']}, this.checked)'". ($tarea['estado'] == 'completa' ? ' checked' : '') . ">";
            echo "<span class='slider'></span>";
            echo "</label>";
            echo "</td>";
            echo "<td>";
            echo "<input type='radio' name='tarea_id' value='{$tarea['id']}'>";
            echo "</td>";
            echo "</tr>";
        }
        
        ?>
    </table>
    <form action="" method="post">
    <input type="submit" name="eliminar" value="Eliminar Tarea Seleccionada">
</form>
    <script src="js/script.js"></script>
</body>
</html>

