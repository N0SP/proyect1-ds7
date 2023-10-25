<?php
require_once('class/navbar.php');
?>
<h1 class="mt-5">Lista de Tareas</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Editada</th>
            <th>Responsable</th>
            <th>Clasificación</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $obj_funciones = new funciones();
        $tareas = $obj_funciones->obtener_tareas();
        foreach ($tareas as $tarea) {
            $estado = $tarea['estado'];
            $claseBoton = '';
            switch ($estado) {
                case 'pendiente':
                    $claseBoton = 'btn-warning';
                    break;
                case 'completa':
                    $claseBoton = 'btn-success';
                    break;
                case 'en_proceso':
                    $claseBoton = 'btn-danger';
                    break;
            }
        
            echo "<tr>";
            echo "<td>{$tarea['titulo']}</td>";
            echo "<td>{$tarea['descripcion']}</td>";
            echo "<td>{$tarea['fecha_compromiso']}</td>";
            echo "<td>{$tarea['editada']}</td>";
            echo "<td>{$tarea['responsable']}</td>";
            echo "<td>{$tarea['tipo_tarea']}</td>";
            echo "<td>";
            echo "<button class='btn btn-sm estado-btn $claseBoton' data-id='{$tarea['id']}' data-estado='{$tarea['estado']}' onclick='actualizarEstado(this)'>{$tarea['estado']}</button>";
            echo "</td>";
            echo "<td>";
            echo "<button class='btn btn-danger btn-sm' data-id='{$tarea['id']}' onclick='eliminarTarea(this)'>Eliminar</button>";
            echo "<button class='btn btn-primary btn-sm' onclick=\"editarTarea({$tarea['id']})\">Editar</button>";
            echo "</td>";
            echo "</tr>";
        }
        
        ?>
    </tbody>
</table>
</div>
</body>
</html>
