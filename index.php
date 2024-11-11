<?php 
include "header.php";
?>
<body class="bg-light">
    <div class="container-fluid d-flex flex-column min-vh-100 bg-primary text-white">
      <?php include "navbar.php";?>
        <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center text-center">
            <!-- Título con el efecto de máquina de escribir -->
            <h1 class="display-3">
                <span id="text1" class="typing"></span>
            </h1>
            <?php include "escritura.php"; ?>
            <!-- Párrafo estático -->
            <p class="lead">
                Haz clic en el siguiente botón para iniciar tu reserva en el sistema. 
                <br>Una vez procesada, recibirás un mensaje de confirmación a través de WhatsApp.
            </p>

            <?php include "modal_reserva.php"; ?>
        </main>

<?php include "footer.php";?>

