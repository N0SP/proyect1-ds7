
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    
    <h1>Lista de Tareas</h1>
    <script src="script.js"></script>
    <?php require_once('../class/navbar.php'); ?>
</nav>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Editada</th>
            <th>Responsable</th>
            <th>Clasificacion</th>
            <th>Estado</th>
            <th></th>
        </tr>

        <?php require_once('../class/functions.php');
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
        echo "<td>";
        echo "<button onclick='actualizarEstado({$tarea['id']}, \"pendiente\")' " . ($tarea['estado'] == 'pendiente' ? 'class="active"' : '') . ">Pendiente</button>";
        echo "<button onclick='actualizarEstado({$tarea['id']}, \"en_proceso\")' " . ($tarea['estado'] == 'en_proceso' ? 'class="active"' : '') . ">En Proceso</button>";
        echo "<button onclick='actualizarEstado({$tarea['id']}, \"completa\")' " . ($tarea['estado'] == 'completa' ? 'class="active"' : '') . ">Completa</button>";
        echo "<td>";
        echo "<input type='radio' name='tarea_id' value='{$tarea['id']}'>";
        echo "</td>";
        echo "</tr>";
    }
    
        ?>
    </table>
</form>
<form action="" method="post">
    <input type="submit" name="eliminar" value="Eliminar Tarea Seleccionada">
    <input type="submit" name="Editar" value="Editar Tarea Seleccionada">
    </form>

</body>
</html>
