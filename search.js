// Esperar a que el DOM se cargue
document.addEventListener('DOMContentLoaded', function() {
    // Obtener los elementos de entrada y botón de búsqueda
    var searchInput = document.getElementById('searchInput');
    var searchButton = document.getElementById('searchButton');
    var productList = document.getElementById('productList');
  
    // Agregar un evento de clic al botón de búsqueda
    searchButton.addEventListener('click', function() {
      // Obtener el valor de búsqueda
      var searchQuery = searchInput.value.trim();
  
      // Redirigir a una nueva página para mostrar los resultados de búsqueda
      window.location.href = 'productos.php?query=' + encodeURIComponent(searchQuery);
    });
  });
  