<?php
// Verificar si se ha enviado el formulario
if (!isset($_POST['oculto'])) {
    exit(); // Si no se ha enviado, salir del script.
}

// Incluir el archivo de conexión a la base de datos
include '../admin/model/conexion.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$servicio = $_POST['servicio'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$mensaje = $_POST['mensaje'];
$estado = $_POST['estado'];

// Verificar si ya existe una cita con el mismo servicio, fecha y hora
$consulta = $db->prepare("SELECT COUNT(*) FROM reservas WHERE servicio = ? AND fecha = ? AND hora = ?");
$consulta->execute([$servicio, $fecha, $hora]);
$existeCita = $consulta->fetchColumn();

if ($existeCita > 0) {
    // Redirigir a la página de error si ya existe una cita con el mismo servicio, fecha y hora
    header('Location: ../error.php');
    exit();
} else {
    // Insertar el nuevo registro si no hay conflicto
    $sentencia = $db->prepare("INSERT INTO reservas(nombre, apellidos, telefono, servicio, fecha, hora, mensajeadicional, estado)
    VALUES(?,?,?,?,?,?,?,?)");
    
    if ($sentencia->execute([$nombre, $apellidos, $telefono, $servicio, $fecha, $hora, $mensaje, $estado])) {
        // Obtener el ID del registro insertado
        $idInsertado = $db->lastInsertId();
        
        // Redirigir con el ID del registro insertado en la URL
        header("Location: ../exito.php?id=$idInsertado"); // Redirigir y pasar el ID como parámetro.
        exit();
    } else {
        echo 'Error al insertar datos.';
    }
}
?>
