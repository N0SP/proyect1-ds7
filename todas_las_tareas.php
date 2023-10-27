<?php 

require_once('class/navbar.php');

?> 
<?php 
$obj_funciones = new funciones();
if (isset($_POST['buscar'])) {
    $termino = $_POST['termino'];
    $tareas = $obj_funciones->buscar_tareas($termino);
} else {
    $tareas = $obj_funciones->obtener_tareas();
}
?>

<h1>Todas las Tareas</h1>
<form action="" method="post">
    <input type="text" name="termino" placeholder="Buscar...">
    <input type="submit" name="buscar" value="Buscar">
</form>
<?php
$nfilas = count($tareas);

if ($nfilas > 0) {
    echo "<table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Editada</th>
            <th>Responsable</th>
            <th>Clasificacion</th>
            <th>Estado</th>
        </tr>";

    foreach ($tareas as $tarea) {
        echo "<tr>
            <td>{$tarea['titulo']}</td>
            <td>{$tarea['descripcion']}</td>
            <td>{$tarea['fecha_compromiso']}</td>
            <td>{$tarea['editada']}</td>
            <td>{$tarea['responsable']}</td>
            <td>{$tarea['tipo_tarea']}</td>
            <td>{$tarea['estado']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No hay tareas disponibles";
}
?>

</body>
</html> 
