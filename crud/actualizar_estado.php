<?php
require_once('../class/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $obj_funciones = new funciones(); // Crea una instancia de la clase funciones

        $id = $_POST['id'];
        $nuevoEstado = $_POST['estado'];

        $resultado = $obj_funciones->actualizar_estado($id, $nuevoEstado);
        
    } catch (Exception $e) {
        http_response_code(500);
        echo "Error en el servidor: " . $e->getMessage();
    }
} else {
    http_response_code(405);
    echo "Método no permitido para esta solicitud.";
}

?>
