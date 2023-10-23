<?php
require_once('modelo.php');

function obtener_tareas() {
    global $conn;
    $query = "SELECT * FROM tareas";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function agregar_tarea($nombre, $fecha, $responsable, $estado) {
    global $conn;
    $query = "INSERT INTO tareas (nombre, fecha, responsable, estado) VALUES ('$nombre', '$fecha', '$responsable', '$estado')";
    return $conn->query($query);
}

function actualizar_estado($id, $estado) {
    global $conn;
    // Escapamos el estado para prevenir inyección de SQL
    $estado = $conn->real_escape_string($estado);

    $query = "UPDATE tareas SET estado='$estado' WHERE id=$id";
    return $conn->query($query);
}


function obtener_todas_las_tareas() {
    global $conn;
    $query = "SELECT * FROM tareas";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function eliminar_tarea($id) {
    global $conn;
    $query = "DELETE FROM tareas WHERE id=$id";
    return $conn->query($query);
}
