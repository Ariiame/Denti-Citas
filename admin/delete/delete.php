<?php
if (isset($_GET['id'])) {
    $EliminarRegistro = $_GET['id'];

    include '../model/conexion.php';

    $sentencia = $db->prepare('DELETE FROM reservas WHERE id = ?;');
    $resultado = $sentencia->execute([$EliminarRegistro]);

    if ($resultado) {
        echo "<script>alert('Cita eliminada con éxito'); window.location.href = '../mod_reservas.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar la cita'); window.location.href = '../mod_reservas.php';</script>";
    }
} else {
    echo "<script>alert('ID no válido'); window.location.href = '../mod_reservas.php';</script>";
}
?>
