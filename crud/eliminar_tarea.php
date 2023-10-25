<?php
require_once('../class/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try{ 
        $obj_funciones = new funciones();

        $id = $_POST['id'];

        $resultado = $obj_funciones->borrar_tarea($id);

    } catch (Exception $e) {
        http_response_code(500);
        echo "Error en el servidor: " . $e->getMessage();
    }
}
?>