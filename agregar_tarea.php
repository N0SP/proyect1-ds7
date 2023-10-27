<?php 

require_once('class/navbar.php');

?>
<div class="container mt-5">
    <h1>Agregar Tarea</h1>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="titulo" placeholder="Título" required> <br>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="descripcion" placeholder="Descripción"></textarea required> <br>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="fecha_compromiso"required> <br>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="responsable" placeholder="Responsable" required> <br>
        </div>
        <div class="form-group">
            <select class="form-control" name="tipo_tarea">
                <option value="hogar">Hogar</option>
                <option value="trabajo">Trabajo</option>
                <option value="escuela">Escuela</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
$obj_funciones=new funciones();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_compromiso = $_POST['fecha_compromiso'];
    $responsable = $_POST['responsable'];
    $tipo_tarea = $_POST['tipo_tarea'];
    
    if ($obj_funciones->agregar_tarea($titulo, $descripcion, $fecha_compromiso, 'no', $responsable, $tipo_tarea, 'pendiente')) {
        echo '<div class="container mt-3"><div class="alert alert-success" role="alert">Tarea agregada con éxito.</div></div>';
    } else {
        echo '<div class="container mt-3"><div class="alert alert-danger" role="alert">Error al agregar la tarea.</div></div>';
    }
}
?>

</body>
</html>
