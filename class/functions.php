<?php
require_once('modelo.php');

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
    
    public function buscar_tareas($termino) {
        $termino = $this->_db->real_escape_string($termino);
        $query = "CALL sp_buscar_tareas('$termino')";
    
        $resultado = $this->_db->query($query);
    
        if (!$resultado) {
            return false;
        }
    
        $tareas = $resultado->fetch_all(MYSQLI_ASSOC);
        $resultado->close();
    
        return $tareas;
    }
    
    public function editar_tarea($id, $titulo, $descripcion, $fecha_compromiso, $editada, $responsable, $tipo_tarea, $estado) {
        $query = "UPDATE tareas SET titulo=?, descripcion=?, fecha_compromiso=?, editada=?, responsable=?, tipo_tarea=?, estado=? WHERE id=?";
        
        $stmt = $this->_db->prepare($query);
    
        if ($stmt) {
            $stmt->bind_param('sssssssi', $titulo, $descripcion, $fecha_compromiso, $editada, $responsable, $tipo_tarea, $estado, $id);
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                return "Error al ejecutar la consulta: " . $stmt->error;
            }
        } else {
            return "Error en la preparación de la consulta: " . $this->_db->error;
        }
    }

}


?>