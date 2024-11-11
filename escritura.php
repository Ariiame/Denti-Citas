<style>
    .typing {
        display: inline-block;
        border-right: 3px solid black;
        padding-right: 5px;
        white-space: nowrap;
        overflow: hidden;
    }
</style>

<script>
    // Efecto de máquina de escribir
    function escribirTexto(elementId, texto, velocidad, callback) {
        let index = 0;
        const element = document.getElementById(elementId);
        const interval = setInterval(() => {
            element.textContent += texto[index];
            index++;
            if (index === texto.length) {
                clearInterval(interval);
                if (callback) callback();
            }
        }, velocidad);
    }

    // Función para borrar el texto
    function borrarTexto(elementId, velocidad, callback) {
        const element = document.getElementById(elementId);
        let textContent = element.textContent;
        let index = textContent.length;
        const interval = setInterval(() => {
            element.textContent = textContent.substring(0, index - 1);
            index--;
            if (index === 0) {
                clearInterval(interval);
                if (callback) callback();
            }
        }, velocidad);
    }

    // Ciclo infinito de escritura y borrado
    function cicloEscribirBorrar() {
        escribirTexto("text1", "RESERVA TU CITA AHORA.", 150, () => {
            borrarTexto("text1", 100, () => {
                escribirTexto("text1", "¡Comienza tu proceso ahora YA!", 150, () => {
                    borrarTexto("text1", 100, () => {
                        escribirTexto("text1", "DENTI FÁCIL A TU SERVICIO", 150, () => {
                            borrarTexto("text1", 100, cicloEscribirBorrar); // Reiniciar el ciclo
                        });
                    });
                });
            });
        });
    }

    // Iniciar el ciclo
    cicloEscribirBorrar();
</script>
