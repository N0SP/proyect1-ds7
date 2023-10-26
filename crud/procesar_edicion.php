

<?php
require_once('../class/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $tarea_id = $_POST['tarea_id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_compromiso = $_POST['fecha_compromiso'];
    $responsable = $_POST['responsable'];
    $tipo_tarea = $_POST['tipo_tarea'];
    $estado_id = $_POST['estado_id'];

    

    $obj_funciones = new funciones(); 

    $resultado = $obj_funciones->editar_tarea($tarea_id, $titulo, $descripcion, $fecha_compromiso, 'si', $responsable, $tipo_tarea,$estado_id);

    if ($resultado) {
        header("Location: ../index.php");  // Redirecciona a tu página principal
        exit();

    } else {
        echo "Error al actualizar la tarea";
    }
} else {
    echo "Acceso no autorizado";
}
?>

