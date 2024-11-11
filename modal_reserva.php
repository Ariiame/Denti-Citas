<div class="text-center">
    <button type="button" class="btn btn-lg btn-success text-uppercase py-3 px-5" data-toggle="modal" data-target="#modalReserva">
      <i class="fas fa-calendar"></i> Iniciar reserva
    </button>
</div>

<div class="modal fade" id="modalReserva" tabindex="-1" role="dialog" aria-labelledby="modalReservaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark text-center" id="modalReservaLabel">Ingresa los datos correspondientes por favor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <?php include "metodos/form_insert.php";?>

      </div>
      <div class="modal-footer">
        <p class="text-center text-primary"> <b>Recuerda que una vez enviado el fomulario tu información sera procesada y no podras modificarla</b></p>
        <p class="text-center text-danger"><b>Al enviar tu formulario se te brindara un numero de cita por favor guarda ese numero o toma captura de pantalla, asi podras consultar el estatus</b></p>
      </div>
    </div>
  </div>
</div>