<?php
require_once('modelo.php');

<<<<<<< Updated upstream
function obtener_tareas() {
    global $conn;
    $query = "SELECT * FROM tareas";
    $result = $conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
=======
class funciones extends modeloCredencialesBD{
    public function __construct() {
        parent::__construct();
    }

    public function obtener_tareas() {
        $query = "CALL sp_todos";
        $consulta = $this->_db->query($query);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function agregar_tarea($titulo, $descripcion, $fecha_compromiso,$editada,$responsable, $tipo_tarea, $estado) {
        $query ="CALL sp_agregar_tarea('$titulo', '$descripcion', '$fecha_compromiso', '$editada', '$responsable', '$tipo_tarea', '$estado')";
        $consulta = $this->_db->query($query);
    
        if ($consulta) {
            return true; 
        } else {
            return false; 
        }
    }

    public function borrar_tarea($id) {
     $query = "CALL sp_eliminar_tarea('$id')";
        $consulta = $this->_db->query($query);
        
            if ($consulta) {
                return true; 
            } else {
                return false; 
            }   
    }

    public function obtenerClaseEstado($estado) {
        switch ($estado) {
            case 'pendiente':
                return 'btn-warning';
            case 'completa':
                return 'btn-success';
            case 'en_proceso':
                return 'btn-danger';
            default:
                return '';
        }
    }
    
    public function actualizar_estado($id, $estado) {
        $stmt = $this->_db->prepare("CALL sp_actualizar_estado(?, ?)");
        $stmt->bind_param("is", $id, $estado);
    
        try {
            $stmt->execute();
            $stmt->close();
            return true;
        } catch (Exception $e) {
            error_log("Error SQL: " . $e->getMessage());
            return false;
        }
    }
    
    
    


    public function editar_tarea($titulo, $descripcion, $fecha_compromiso,$responsable, $tipo_tarea, $estado)
     {
        $query ="CALL sp_editar_tarea('$titulo', '$descripcion', '$fecha_compromiso', '$responsable', '$tipo_tarea')";
        $consulta = $this->_db->query($query);
    
        if ($consulta) {
            return true; 
        } else {
            return false; 
        }
    }
    
    
>>>>>>> Stashed changes
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
