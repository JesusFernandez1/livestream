document.addEventListener('snipcart.ready', function() {
  document.querySelector('.snipcart-checkout').addEventListener('click', function() {
    handleCheckout();
  });
});

function handleCheckout() {
  snipcart.api.modal.show();
  // Redirige al usuario a tu vista después de que se complete la transacción
  document.addEventListener('snipcart.complete', function() {
    window.location.href = 'empleados';
  });
}