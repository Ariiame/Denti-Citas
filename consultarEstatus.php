<?php
include("header.php");
include("navbar.php");
include("admin/model/conexion.php");

// Verificar si se ha enviado el formulario y el ID
$estado = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Consulta para obtener el estado de la cita
    $sentencia = $db->prepare("SELECT Estado FROM reservas WHERE ID = ?");
    $sentencia->execute([$id]);
    $estado = $sentencia->fetch(PDO::FETCH_OBJ);
}
?>

<div class="container-fluid bg-primary">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <br><br>
            <h2 class="text-center text-white mb-4">Consulta el Estatus de tu Cita</h2>

            <form action="consultarEstatus.php" method="POST" class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="id" class="text-white">Folio de la cita:</label>
                        <input type="text" name="id" id="id" class="form-control" placeholder="Ingresa tu folio de cita" required>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success btn-block"> Consultar Estatus</button>
                        <a href="consultarEstatus.php" class="btn btn-info btn-block">Nueva Consulta de Estatus</a>
                    </div>
                </div>
            </form>

            <!-- Mostrar el estado de la cita si se ha enviado un ID -->
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])): ?>
                <br><br>
                <?php if ($estado): ?>
                    <div class="alert alert-info text-center">
                        <h4><strong>Estado de la Cita con Folio: <?php echo $id; ?></strong></h4>
                        <p><strong>Estado:</strong> <?php echo $estado->Estado; ?></p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger text-center">
                        <h4><strong>No se encontró una cita con ese FOLIO.</strong></h4>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
