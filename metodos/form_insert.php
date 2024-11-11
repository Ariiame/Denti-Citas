<form action="metodos/insert.php" method="post">
    <p class="text-danger"><b>Los datos con (*) son obligatorios.</b></p>

    <!-- Sección de campos -->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombre" class="text-dark">Nombre *</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tus nombres" required>
            <small class="form-text text-muted">Si tienes dos nombres, colócalos aquí.</small>
        </div>

        <div class="form-group col-md-6">
            <label for="apellidos" class="text-dark">Apellidos *</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escribe tu apellido paterno y materno" required>
            <small class="form-text text-muted">Coloca tus apellidos.</small>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="telefono" class="text-dark">Telefono con Whatsapp *</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="000-000-0000" pattern="(\d{3})-(\d{3})-(\d{4})" required>
            <small class="form-text text-muted">Por favor, ingresa tu teléfono en el formato 000-000-0000.</small>
        </div>

        <div class="form-group col-md-6">
            <label for="servicio" class="text-dark">Selecciona una Especialidad *</label>
            <select class="custom-select" id="servicio" name="servicio" required>
                <option value="" selected>Elige...</option>
                <option value="Retina">Retina</option>
                <option value="Ortodoncia">Ortodoncia</option>
                <option value="Cirugia Maxilofacial">Cirugia Maxilofacial</option>
                <option value="Protesis Bucales">Protesis Bucales</option>
                <option value="Blanqueamiento Dental">Blanqueamiento Dental</option>
                <option value="Periondincia">Periondincia</option>
                <option value="Trauma">Trauma</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fecha" class="text-dark">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
            <div id="mensaje-error" style="color: red;"></div>
        </div>

        <div class="form-group col-md-6">
            <label for="hora" class="text-dark">Hora:</label>
            <select class="form-control" id="hora" name="hora" required>
                <option value="" selected>Elige la hora</option>
                <option value="09:00">09:00 AM</option>
                <option value="10:00">10:00 AM</option>
                <option value="11:00">11:00 AM</option>
                <option value="14:00">02:00 PM</option>
                <option value="15:00">03:00 PM</option>
                <option value="16:00">04:00 PM</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="mensaje" class="text-dark">Mensaje adicional:</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
    </div>

    <!-- Campos ocultos -->
    <input type="hidden" name="estado" value="Pendiente">
    <input type="hidden" name="oculto" value="1">

    <!-- Botones -->
    <div class="form-row">
        <div class="col-md-6">
            <button type="reset" class="btn btn-secondary btn-block">Limpiar</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success btn-block">Enviar</button>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Función para validar si la fecha es válida
    function esFechaValida(fecha) {
        return fecha instanceof Date && !isNaN(fecha);  // Retorna true si es una fecha válida
    }

    // Función para validar la fecha seleccionada
    function validarFecha() {
        var fechaInput = document.getElementById("fecha"); // Obtiene el input de la fecha
        var partesFecha = fechaInput.value.split('-'); // Divide la fecha en partes: año, mes, día
        var fechaSeleccionada = new Date(Date.UTC(partesFecha[0], partesFecha[1] - 1, partesFecha[2])); // Crea una fecha UTC
        var mensajeError = document.getElementById("mensaje-error"); // Elemento para mostrar el mensaje de error

        // Verifica si la fecha es válida
        if (!esFechaValida(fechaSeleccionada)) {
            mensajeError.textContent = "Por favor, introduce una fecha válida.";  // Muestra mensaje de error si la fecha no es válida
            fechaInput.value = "";  // Limpia el valor del input
            return;
        }

        var diaSemana = fechaSeleccionada.getUTCDay();  // Obtiene el día de la semana en formato UTC

        /*
            0: Domingo
            1: Lunes
            2: Martes
            3: Miércoles
            4: Jueves
            5: Viernes
            6: Sábado
        */

        // Solo habilita los días de lunes a viernes
        if (diaSemana !== 1 && diaSemana !== 2 && diaSemana !== 3 && diaSemana !== 4 && diaSemana !== 5) {
            fechaInput.value = "";  // Limpia el valor del input si el día no es habilitado
            mensajeError.textContent = "Este día no se cuenta con servicio, selecciona uno distinto."; // Muestra el mensaje de error
        } else {
            mensajeError.textContent = "";  // Borra cualquier mensaje de error si el día es válido
        }
    }

    // Agrega un evento 'change' al campo de fecha para validar cuando cambie
    document.getElementById("fecha").addEventListener("change", validarFecha);

    // Función para formatear el número de teléfono
    function formatearTelefono(telefono) {
        // Elimina caracteres no numéricos
        telefono = telefono.replace(/\D/g, '');
        // Formatea a (XXX) XXX-XXXX
        if (telefono.length > 6) {
            telefono = telefono.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
        } else if (telefono.length > 3) {
            telefono = telefono.replace(/(\d{3})(\d{3})/, '$1-$2');
        }
        return telefono;
    }

    // Agregar un evento para formatear el teléfono en tiempo real
    document.getElementById("telefono").addEventListener("input", function() {
        this.value = formatearTelefono(this.value);
    });
});
</script>
