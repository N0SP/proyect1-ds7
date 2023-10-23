<?php 

require_once('class/navbar.php');

?>
    <h1>Todas las Tareas</h1>

    <table>
        <tr>
        <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Editada</th>
            <th>Responsable</th>
            <th>Clasificacion</th>
            <th>Estado</th>
        </tr>
        <?php 
        $obj_funciones=new funciones();
        $tareas=$obj_funciones->obtener_tareas();
        foreach ($tareas as $tarea) {
            echo "<tr>";
            echo "<td>{$tarea['titulo']}</td>";
            echo "<td>{$tarea['descripcion']}</td>";
            echo "<td>{$tarea['fecha_compromiso']}</td>";
            echo "<td>{$tarea['editada']}</td>";
            echo "<td>{$tarea['responsable']}</td>";
            echo "<td>{$tarea['tipo_tarea']}</td>";
            echo "<td>{$tarea['estado']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
