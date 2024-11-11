<?php
require_once 'model/conexion.php';

$alert_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre, username, password) VALUES (:nombre, :username, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashed_password); 

    if ($stmt->execute()) {
        // Registro exitoso
        $alert_message = '<div class="alert alert-success text-center" role="alert">Registro exitoso. ¡Bienvenido, ' . htmlspecialchars($nombre) . '!</div>';
        // Redirigir después de 2 segundos para evitar que el formulario se vuelva a enviar al recargar
        echo '<meta http-equiv="refresh" content="2;url=./inicio.php">';
    } else {
        // Error en el registro
        $alert_message = '<div class="alert alert-danger text-center" role="alert">Error en el registro. Por favor, inténtalo de nuevo.</div>';
    }
}
?>

<?php 
    include "header.php"; 
    include "navbar.php"; 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Registrar Usuario</div>
                <div class="card-body">
                    <?php
                        // Mostrar mensaje de alerta si hay uno
                        if ($alert_message != '') {
                            echo $alert_message;
                        }
                    ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nombre">Nombre de la persona:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" required minlength="8">
                            <small id="passwordHelp" class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";?>
