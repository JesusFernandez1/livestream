document.addEventListener("DOMContentLoaded", function() {
Snipcart.events.on('snipcart.ready', function() {
    Snipcart.api.modal.events.on('shown', function() {
      document.querySelector('.snipcart-cart-summary .snipcart-cart-bottom .snipcart-base-button--checkout').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = '/mostrarEmpleados'; // Aquí debes cambiar '/mostrarEmpleados' por la URL a la que quieres redirigir al usuario.
      });
    });
  });
});