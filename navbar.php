<header class="masthead py-3 mb-auto">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <img src="img/logo_transparente.png" alt="Logo" class="logo-img me-2" style="max-height: 50px;">
            <a href="./"><h3 class="masthead-brand mb-0 d-none d-md-inline-block text-white" style="cursor: pointer;">Denti Fácil</h3></a>
        </div>

        <nav class="navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="consultarEstatus.php" class="btn btn-primary nav-link text-white">
                          <i class="fas fa-clock"></i> CONSULTAR ESTATUS
                        </a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary nav-link text-white" data-toggle="modal" data-target="#modalFaqs">
                            <i class="fas fa-question-circle"></i> PREGUNTAS FRECUENTES
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary nav-link text-white" data-toggle="modal" data-target="#modalAcercaDe">
                            <i class="fas fa-address-book"></i> ACERCA DE DENTI FACIL
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary nav-link text-white" data-toggle="modal" data-target="#modalContacto">
                            <i class="fas fa-envelope"></i> CONTACTO
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>




<!-- Modal Contacto -->
<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Te atenderemos con gusto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php
        include "admin/model/conexion.php";
        $query = "SELECT * FROM contacto";
        $result = $db->query($query);
        ?>

        <div class="container text-dark" style="margin-top: 30px;">
          <div class="row">
            <div class="col">
              <?php
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<p>" . htmlspecialchars($row['descripcion'], ENT_QUOTES, 'UTF-8') . "</p>";
              }
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal FAQS -->
<div class="modal fade" id="modalFaqs" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">

        <div id="faq-section">

          <!-- Accordion FAQ -->
          <div class="accordion text-center" id="faqAccordion">

            <!-- FAQ 1 -->
            <div class="card">
              <div class="card-header" id="faq1">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    <strong>¿Cómo reservo una cita?</strong>
                  </button>
                </h5>
              </div>
              <div id="collapse1" class="collapse show" aria-labelledby="faq1" data-parent="#faqAccordion">
                <div class="card-body">
                  Haz clic en el botón "Iniciar Reserva" y completa el formulario con tus datos. Una vez realizada la reserva, recibirás una confirmación por WhatsApp.
                </div>
              </div>
            </div>

            <!-- FAQ 2 -->
            <div class="card">
              <div class="card-header" id="faq2">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <strong>¿Cómo verifico el estado de mi cita?</strong>
                  </button>
                </h5>
              </div>
              <div id="collapse2" class="collapse" aria-labelledby="faq2" data-parent="#faqAccordion">
                <div class="card-body">
                  Ingresa a la sección "Consultar Estatus" en nuestra página web y proporciona tu numero de whatsapp y número de reserva para ver el estado actual de tu cita.
                </div>
              </div>
            </div>

            <!-- FAQ 3 -->
            <div class="card">
              <div class="card-header" id="faq3">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    <strong>¿Qué hago si no recibo la confirmación por WhatsApp?</strong>
                  </button>
                </h5>
              </div>
              <div id="collapse3" class="collapse" aria-labelledby="faq3" data-parent="#faqAccordion">
                <div class="card-body">
                  Si no recibes el mensaje de confirmación por WhatsApp, asegúrate de que tu número esté correctamente ingresado y revisa tu conexión. Si el problema persiste, contacta con soporte pulsando la sección "CONTACTO".
                </div>
              </div>
            </div>

            <!-- FAQ 4 -->
            <div class="card">
              <div class="card-header" id="faq4">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    <strong>¿Puedo cancelar o modificar mi cita?</strong>
                  </button>
                </h5>
              </div>
              <div id="collapse4" class="collapse" aria-labelledby="faq4" data-parent="#faqAccordion">
                <div class="card-body">
                  Sí, puedes cancelar o modificar tu cita contactando a nuestro equipo de soporte. Recibirás instrucciones para realizar el cambio o la cancelación según tu solicitud.
                </div>
              </div>
            </div>

          </div> <!-- End Accordion -->
        </div> <!-- End FAQ Section -->

      </div>
    </div>
  </div>
</div>


<!-- Modal Contacto -->
<div class="modal fade" id="modalAcercaDe" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark text-justify">
        <p><strong>Dentifacil</strong> es una plataforma innovadora diseñada para mejorar el acceso a servicios dentales de calidad. A través de nuestra plataforma, facilitamos la conexión entre pacientes y profesionales de la odontología, brindando una experiencia personalizada y eficiente.</p>
        <p>Nuestra misión es hacer que el cuidado dental sea más accesible, conveniente y confiable para todos. Con Dentifacil, puedes encontrar el dentista adecuado, hacer citas en línea y llevar un control detallado de tu salud bucal desde la comodidad de tu hogar.</p>
        <p>Creemos en la importancia de la prevención y en ofrecer servicios de alta calidad para mantener sonrisas saludables y duraderas.</p> 
      </div>
    </div>
  </div>
</div>