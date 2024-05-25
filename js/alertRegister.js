document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    if (status === 'success') {
        alert("Usuario registrado");
    } else if (status === 'error') {
        alert("Error al registrar el usuario");
    }
});