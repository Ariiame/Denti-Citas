// Redirección después de 15 segundos (15000 milisegundos)
let countdown = 20;
let countdownElement = document.getElementById('countdown');

// Mostrar el valor inicial del contador inmediatamente
countdownElement.textContent = countdown;

function updateCountdown() {
    countdown -= 1;
    countdownElement.textContent = countdown;
    
    if (countdown <= 0) {
        window.location.href = "./"; // Cambia la URL de redirección
    } else {
        setTimeout(updateCountdown, 1000); // Actualiza cada 1 segundo
    }
}

setTimeout(updateCountdown, 1000);


// Previene que el usuario recargue o abandone la página
window.addEventListener('beforeunload', function (event) {
    event.preventDefault();
        event.returnValue = '';  
    });