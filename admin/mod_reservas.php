<?php
include("header.php");
include("navbar.php");
#conexion de db
include 'model/conexion.php';
#select
$sentencia = $db->query("SELECT * FROM reservas;");
$dato = $sentencia->fetchAll(PDO::FETCH_OBJ);
#print_r ($dato);
?>

    <div class="container"><!--Comienza Container-->
    <br><br>
        <div class="row"><!--Comienza Row-->

                <div class="container">
                    <br><br>
                    <div class="text-center">
                        <h3>AGENDA DE CITAS</h3>
                    </div><br>

                    <table class="table table-striped" id="tablaReservas">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>APELLIDOS</th>
                                <th>TELEFONO</th>
                                <th>SERVICIO</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dato as $registro) { ?>
                                <tr>
                                    <td> <?php echo $registro->nombre; ?> </td>
                                    <td> <?php echo $registro->apellidos; ?> </td>
                                    <td> <?php echo $registro->telefono; ?> </td>
                                    <td> <?php echo $registro->servicio; ?> </td>
                                    <td> <?php echo $registro->fecha; ?> </td>
                                    <td> <?php echo $registro->hora; ?> </td>
                                    <td>
                                        <?php
                                        $estado = $registro->estado;
                                        $clase_color = '';

                                        switch ($estado) {
                                            case 'Pendiente':
                                                $clase_color = 'text-warning'; // Amarillo para Pendiente
                                                break;
                                            case 'Cancelado':
                                                $clase_color = 'text-danger'; // Rojo para Cancelado
                                                break;
                                            case 'Confirmado':
                                                $clase_color = 'text-success'; // Verde para Confirmado
                                                break;
                                            default:
                                                $clase_color = ''; // Sin clase de color por defecto
                                                break;
                                        }
                                        ?>

                                        <b class="<?php echo $clase_color; ?>"><?php echo $estado; ?></b>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                        <a href="#" class="btn btn-sm btn-danger mr-1" onclick="confirmDelete(<?php echo $registro->id; ?>)">Eliminar</a>
                                        <a href="update/form_update.php?id=<?php echo $registro->id;?>" class="btn btn-sm btn-info mr-1">Editar</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


        </div><!--Finaliza Row-->

    </div><!--Finaliza Container-->
                     
    <?php 
    include("footer.php");
    ?>



    <script>
    $(document).ready(function() {
        $('#tablaReservas').DataTable({
            "scrollX": true,
            "scrollCollapse": true,
            "columnDefs": [
                { "width": "15%", "targets": 0 }, // NOMBRE
                { "width": "15%", "targets": 1 }, // APELLIDOS
                { "width": "10%", "targets": 2 }, // TELEFONO
                { "width": "10%", "targets": 3 }, // SERVICIO
                { "width": "10%", "targets": 4 }, // FECHA
                { "width": "10%", "targets": 5 }, // HORA
                { "width": "5%", "targets": 6 }, // ESTADO
                { "width": "10%", "targets": 7 }  // ACCIONES
            ]
        });
    });

    function confirmDelete(id) {
        if (confirm('¿Estás seguro de eliminar esta cita?')) {
            window.location.href = 'delete/delete.php?id=' + id;
        }
    }
    </script>


    