<?php 
include "header.php";
?>

<body class="bg-light">
    <div class="container-fluid d-flex flex-column min-vh-100 bg-primary text-dark justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <!-- Alerta de error -->
                <div class="alert alert-danger text-center" role="alert">
                    <h4 class="alert-heading">¡Ya existe una cita programada para la misma fecha y hora!</h4>
                    <a href="index.php" class="btn btn-primary mt-3">Elegir otra hora y fecha</a>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php";?>
</body>
