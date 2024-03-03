document.addEventListener('DOMContentLoaded', function () {
    // Obtén el botón "Jugar" y el pop-up de registro
    const playButton = document.getElementById('playButton');
    const registerPopup = document.getElementById('registerPopup');

    // Agrega un evento al botón "Jugar"
    playButton.addEventListener('click', function () {
        // Verifica si el usuario está autenticado (puedes personalizar esto según tu lógica de autenticación)
        const isAuthenticated = @auth
        // Muestra el pop-up solo si el usuario no está autenticado
        if (!isAuthenticated) {
            Swal.fire({
                html: registerPopup.innerHTML,
                confirmButtonText: 'Cerrar',
                showCloseButton: true,
                customClass: {
                    popup: 'custom-popup-class', // Agrega una clase personalizada si es necesario
                },
            });
        } else {
            // Si el usuario está autenticado, realiza la acción deseada (puede ser redirigir a otra página, etc.)
            // Aquí puedes personalizar la acción cuando el usuario ya está autenticado
            alert('Ya estás autenticado. Puedes realizar la acción deseada.');
        }
    });
});
