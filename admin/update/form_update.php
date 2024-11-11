<?php
include("../header.php");
include("../navbar.php");
include("../model/conexion.php");

if (!isset($_GET['id'])) {
    header('Location: http://localhost/citas/admin/error.php');
}

include '../model/conexion.php';

$id = $_GET['id'];
$sentencia = $db->prepare("SELECT * FROM reservas WHERE id=?");
$resultado = $sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);

// Función para formatear el número de teléfono
function formatTelefono($telefono) {
    // Eliminar caracteres no numéricos
    $telefono = preg_replace('/\D/', '', $telefono);

    // Formato: 123-456-7890
    if (strlen($telefono) == 10) {
        return substr($telefono, 0, 3) . '-' . substr($telefono, 3, 3) . '-' . substr($telefono, 6);
    }
    return $telefono; // Si no tiene 10 dígitos, retorna el original
}

$telefono_formateado = formatTelefono($persona->telefono);
?>

<div class="container">
    <br><br>
    <div class="md-5">
        <form action="update.php" method="post" class="form-group">
            <h2>Actualiza el registro</h2>
            <p class="text-primary"><b>Ingresa los datos correspondientes:</b></p>

            <div class="form-row">
                <div class="col-md-4">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo ($persona->nombre); ?>">
                </div>
                <div class="col-md-4">
                    <label for="apellidos" class="col-form-label">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" value="<?php echo ($persona->apellidos); ?>">
                </div>
                <div class="col-md-4">
                    <label for="telefono" class="col-form-label">Telefono:</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono_formateado; ?>" oninput="formatTelefono(this)">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <label for="servicio" class="col-form-label">Servicio:</label>
                    <input type="text" name="servicio" class="form-control" value="<?php echo ($persona->servicio); ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label for="fecha" class="col-form-label">Fecha:</label>
                    <input type="date" name="fecha" class="form-control" value="<?php echo $persona->fecha; ?>">
                </div>
                <div class="col-md-4">
                    <label for="hora" class="col-form-label">Hora:</label>
                    <input type="time" name="hora" class="form-control" value="<?php echo ($persona->hora); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <label for="mensaje" class="col-form-label">Mensaje:</label>
                    <input type="text" name="mensaje" class="form-control" value="<?php echo ($persona->mensajeadicional); ?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="estado">Estado de la cita:</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="<?php echo ($persona->estado); ?>"><?php echo ($persona->estado); ?></option>
                    <option value="" disabled>Elige estado de la cita</option>
                    <option value="Confirmado">Confirmado</option>
                    <option value="Cancelado">Cancelado</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
                <kbd>
                    <small class="text-white">(Estado actual: <?php echo ($persona->estado); ?>)</small>
                </kbd>
            </div>

            <br>
            <input type="hidden" name="id2" value="<?php echo ($persona->id); ?>">
            <a href="../mod_reservas.php" class="btn btn-warning">Cancelar</a>
            <input type="submit" class="btn btn-success" value="Guardar">
        </form>
    </div>
</div>

<?php include("../footer.php"); ?>

<script>
// Función de JavaScript para formatear el teléfono mientras se ingresa
function formatTelefono(input) {
    let value = input.value.replace(/\D/g, '');
    if (value.length >= 4 && value.length <= 6) {
        input.value = value.replace(/(\d{3})(\d{1,3})/, '$1-$2');
    } else if (value.length > 6) {
        input.value = value.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1-$2-$3');
    } else {
        input.value = value.replace(/(\d{1,3})/, '$1');
    }
}
</script>
