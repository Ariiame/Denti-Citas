<?php 
// Verificar el envío de datos
if (!isset($_POST["id2"])) {
    header("Location: http://localhost/citas/admin/error.php");
    exit();
}

include "../model/conexion.php";

// Datos actualizados
$id2 = $_POST["id2"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$servicio = $_POST["servicio"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$mensaje = $_POST["mensaje"];
$estado = $_POST["estado"];

// Obtener el estado anterior
$sentencia_prev = $db->prepare("SELECT estado FROM reservas WHERE id=?");
$sentencia_prev->execute([$id2]);
$estado_anterior = $sentencia_prev->fetchColumn();

$sentencia = $db->prepare("UPDATE reservas SET nombre=?, apellidos=?, telefono=?, servicio=?, fecha=?, hora=?, mensajeadicional=?, estado=? WHERE id=?");
$resultado = $sentencia->execute([$nombre, $apellidos, $telefono, $servicio, $fecha, $hora, $mensaje, $estado, $id2]);

if ($resultado === true) {
    // Enviar mensaje de WhatsApp solo si el estado ha cambiado
    if ($estado !== $estado_anterior) {
        // Eliminar cualquier carácter no numérico y asegurar formato internacional
        $telefono = preg_replace("/[^0-9]/", "", $telefono);
        // Formato internacional, para México es '52'
        $telefono = '52' . $telefono; 

        $mensaje_whatsapp = "Hola $nombre, tu cita para $servicio ha sido actualizada a: $estado. Fecha: $fecha a las $hora.";
        $mensaje_url = urlencode($mensaje_whatsapp);
        $whatsapp_link = "https://wa.me/$telefono?text=$mensaje_url"; // Ahora se usa $telefono en formato adecuado

        // Redirigir a WhatsApp después de actualizar
        header("Location: $whatsapp_link");
        exit();
    }
    
    header("Location: $url_base/admin/mod_reservas.php");
} else {
    echo "Error: No se pudieron actualizar los registros.";
}
?>
