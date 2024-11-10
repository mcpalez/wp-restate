document.addEventListener('DOMContentLoaded', function () {
  const showMap = document.getElementById('advancedFilters__map-toggle');
  const closeMap = document.getElementById('advancedFilters__map-close');

  if (showMap) {
    showMap.addEventListener('click', function () {
      const mapElement = document.getElementById('google-map');
      if (mapElement.style.display === 'none' || mapElement.style.display === '') {
        mapElement.style.display = 'block';
      } else {
        mapElement.style.display = 'none';
      }
    });
  }

  if (closeMap) {
    closeMap.addEventListener('click', function () {
      const mapElement = document.getElementById('google-map');
      if (mapElement) {
        mapElement.style.display = 'none';
      }
    });
  }
});