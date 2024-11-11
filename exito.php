<?php 
include "header.php";
?>
<body class="bg-light">
    <div class="container-fluid d-flex flex-column min-vh-100 bg-primary text-dark justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <!-- Tarjeta de éxito -->
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h4 class="card-title text-center mb-4">¡Formulario de Reservación Enviado con Éxito!</h4>
                        <p class="card-text">Gracias por enviar tu formulario de reservación. Hemos recibido tu solicitud y estamos procesándola. Por favor, espera nuestra confirmación.</p>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            echo "Su folio de segumiento es: F-" . $id;
                        }
                        ?>
                        <hr>
                        <p class="card-text mb-0">Tu reserva está en proceso. ¡Gracias por elegirnos!</p>
                        <p class="card-text">Redirigiendo en <span id="countdown">10</span> segundos...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/redireccionExito.js"></script>

    <?php include "footer.php";?>
</body>

