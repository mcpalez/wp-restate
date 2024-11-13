<?php 
/*
Template Name: Znajdź mieszkanie
*/

$default_size_from = isset($_GET['size_from']) ? $_GET['size_from'] : 20;
$default_size_to = isset($_GET['size_to']) ? $_GET['size_to'] : 120;

$flat_sizes = [
  20 => 0,
  22 => 3,
  24 => 6,
  26 => 9,
  28 => 15,   // Skok o 6
  30 => 13,   // Spadek o 2
  32 => 20,   // Skok o 7
  34 => 17,   // Spadek o 3
  36 => 25,   // Skok o 8
  38 => 22,   // Spadek o 3
  40 => 30,   // Skok o 8
  42 => 35,   // Skok o 5
  44 => 33,   // Spadek o 2
  46 => 40,   // Skok o 7
  48 => 45,   // Skok o 5
  50 => 43,   // Spadek o 2
  52 => 47,   // Szczyt fali, maksymalna wartość
  54 => 44,   // Spadek o 3
  56 => 46,   // Wzrost o 2
  58 => 41,   // Spadek o 5
  60 => 37,   // Spadek o 4
  62 => 43,   // Nagły wzrost o 6
  64 => 38,   // Spadek o 5
  66 => 33,   // Spadek o 5
  68 => 28,   // Spadek o 5
  70 => 35,   // Wzrost o 7
  72 => 25,   // Spadek o 10
  74 => 30,   // Wzrost o 5
  76 => 22,   // Spadek o 8
  78 => 15,   // Spadek o 7
  80 => 18,   // Wzrost o 3
  82 => 12,   // Spadek o 6
  84 => 20,   // Wzrost o 8
  86 => 10,   // Spadek o 10
  88 => 5,    // Spadek o 5
  90 => 9,    // Wzrost o 4
  92 => 4,    // Spadek o 5
  94 => 8,    // Wzrost o 4
  96 => 3,    // Spadek o 5
  98 => 0,    // Spadek o 3
  100 => 5,   // Wzrost o 5
  102 => 0,   // Spadek o 5
  104 => 2,   // Wzrost o 2
  106 => 6,   // Wzrost o 4
  108 => 1,   // Spadek o 5
  110 => 3,   // Wzrost o 2
  112 => 0,   // Spadek o 3
  114 => 0,   // Stała wartość
  116 => 0,   // Stała wartość
  118 => 0,   // Stała wartość
  120 => 0    // Stała wartość
];

?>

<?php get_header();?>
<div id="search-bar-wrapper">
  <div class="container mx-auto px-5">
    <div class="flex flex-row gap-5">
      <div class="filters-trigger">
        <button id="advancedFilters__open">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 15H21M3 15H5M5 15C5 16.3807 6.11929 17.5 7.5 17.5C8.88071 17.5 10 16.3807 10 15C10 13.6193 8.88071 12.5 7.5 12.5C6.11929 12.5 5 13.6193 5 15ZM20 9H21M3 9H10M16.5 11.5C15.1193 11.5 14 10.3807 14 9C14 7.61929 15.1193 6.5 16.5 6.5C17.8807 6.5 19 7.61929 19 9C19 10.3807 17.8807 11.5 16.5 11.5Z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Filtry
          <span id="advancedFilters__count" style="display:none;">0</span>
        </button>
        <button id="viewDrawer__open">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 18C17.5228 18 22 12 22 12C22 12 17.5228 6 12 6C6.47715 6 2 12 2 12C2 12 6.47715 18 12 18Z" stroke="#212121" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Widok
        </button>
        <button id="sortDrawer__open">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 16L8 19M8 19L5 16M8 19V5M13 8L16 5M16 5L19 8M16 5V19" stroke="#212121" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Sortowanie
        </button>
      </div>
    </div>
  </div>
</div>
<div id="listing-wrapper">
  <div class="container mx-auto px-5 py-2">
    <div id="listing-view">
      <div class="grid grid-cols-1">
        <h1>Znaleziono <span id="resultListing-number__count__view"></span> wyników</h1>
        <p>Wybierz sortowanie wyników</p>
      </div>
    </div>
    <div id="results">
      <div class="container">
        <div id="results-container"></div>
      </div>
    </div>
  </div>
</div>
<div id="advancedFilters">
  <div class="advancedFilters__box">
    <div id="advancedFilters__backdrop"></div>
    <div id="advancedFilters__content">
      <div class="advancedFilters__nav">
        <button id="advancedFilters__close">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 19L8 12L15 5" stroke="white" stroke-width="2" stroke-linecap="square"/>
          </svg>
        </button>
        <p>Filtry</p>
        <button class="advancedFilters__clear" id="advancedFilters__clear-btn">Wyczyść</button>
      </div>
      <div class="container mx-auto px-5">
        <div class="advancedFilters__parameters">
          <form id="search-form__filter">
            <div class="advancedFilters__parameters__container">
                <div class="advancedFilters__parameters__heading">Piętro</div>
                <div class="advancedFilters__parameters__dropdown">
                    <button type="button" id="advancedFilters__floorDropdownButton" class="advancedFilters__dropdown-button">
                      <span id="advancedFilters__selectedFloors">dowolne</span>
                      <div class="selectedFloors__indicator">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M19 9L12 16L5 9" stroke="#1D2128" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </div>
                    </button>
                    <div id="advancedFilters__floorDropdownContent" class="advancedFilters__dropdown-content">
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <label class="advancedFilters__dropdown-item">
                                <input type="checkbox" class="advancedFilters__floor-checkbox-input" data-value="<?php echo $i; ?>">
                                <?php echo $i === 0 ? 'Parter' : $i; ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" id="floors" name="floors" value="<?php echo $default_floors; ?>">
                </div>
            </div>
            <div class="advancedFilters__parameters__container">
              <div class="advancedFilters__parameters__heading">Liczba pokoi</div>
              <div class="advancedFilters__parameters__buttons">
                <?php for ($i = 1; $i <= 6; $i++): ?>
                  <button type="button" class="room-button" data-value="<?php echo $i; ?>"><?php echo $i; ?></button>
                <?php endfor; ?>
                <input type="hidden" id="rooms" name="rooms" value="<?php echo $default_rooms; ?>">
              </div>
            </div>
            <div class="advancedFilters__parameters__container">
              <div class="advancedFilters__parameters__heading">Aktualność oferty</div>
              <div class="advancedFilters__parameters__buttons">
                <label class="status-checkbox">
                  <input type="checkbox" class="status-checkbox-input" name="status" value="wolne">
                  <span class="status-checkbox-box"></span> Wolne
                </label>
                <label class="status-checkbox">
                  <input type="checkbox" class="status-checkbox-input" name="status" value="zarezerwowane">
                  <span class="status-checkbox-box"></span> Zarezerwowane
                </label>
                <input type="hidden" id="status" name="status" value="<?php echo $default_status; ?>">
              </div>
            </div>
            <div class="advancedFilters__parameters__container">
              <div class="advancedFilters__parameters__heading">Dostępne inwestycje</div>
              <div class="advancedFilters__parameters__buttons">
                <button type="button" class="investment-button" data-value="zeran+riverside">Żerań Riverside</button>
                <button type="button" class="investment-button" data-value="wisla+residence">Wisła Residence II</button>
                <button type="button" class="investment-button" data-value="praga+vita">Praga Vita</button>
                <button type="button" class="investment-button" data-value="ostoja+ursus">Ostoja Ursus</button>
                <input type="hidden" id="investment" name="investment" value="<?php echo $default_investment; ?>">
              </div>
            </div>
            <hr class="mt-5">
            
            <div class="advancedFilters__parameters__container">
              <div class="advancedFilters__parameters__heading">Informacje dodatkowe</div>
              <div class="advancedFilters__parameters__buttons">
                <button type="button" class="features-button" data-value="ogród">Ogród</button>
                <button type="button" class="features-button" data-value="komórka+lokatorska">Komórka lokatorska</button>
                <button type="button" class="features-button" data-value="balkon">Balkon</button>
                <button type="button" class="features-button" data-value="winda">Winda</button>
                <button type="button" class="features-button" data-value="taras">Garaż</button>
                <input type="hidden" id="features" name="features" value="<?php echo $default_features; ?>">
              </div>
            </div>
            <div class="advancedFilters__parameters__container hidden">
              <div class="advancedFilters__parameters__heading">
                Size range
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 9V14M10 19C5.02944 19 1 14.9706 1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10C19 14.9706 14.9706 19 10 19ZM10.0498 6V6.1L9.9502 6.1002V6H10.0498Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="advancedFilters__parameters__noUi--size-amount">
                <div id="amount"> 
                  <div id="amount_flat_size_container">
                    <div id="noui_size_from">
                      <?php echo number_format($default_size_from, 2); ?> m²
                    </div>
                  </div>
                  <span> – </span>
                  <div id="amount_flat_size_container">
                    <div id="noui_size_to">
                      <?php echo number_format($default_size_to, 2); ?> m²
                    </div>
                  </div>
                </div>
              </div>
              <div class="advancedFilters__parameters__noUi">
                <div class="slider-content-size">
                  <div id="histogram">
                  </div>
                  <div id="slider-range"></div>
                  <input type="hidden" id="size_from" name="size_from" value="<?php echo $default_size_from; ?>">
                  <input type="hidden" id="size_to" name="size_to" value="<?php echo $default_size_to; ?>">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="advancedFilters__footer">
        <div class="advancedFilters__buttons__container container mx-auto px-4">
          <button class="advancedFilters__search__button" id="advancedFilters__submit">
            <span id="loading-animation" class="dots hidden">
              <span class="dot"></span><span class="dot"></span><span class="dot"></span>
            </span>
            <span id="resultListing-number__text">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 13L19 19M8 15C4.13401 15 1 11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Wyniki
              <span id="resultListing-number__count__btn"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="sortDrawer">
  <div class="sortDrawer__box">
    <div id="sortDrawer__backdrop"></div>
    <div id="sortDrawer__content">
      <div class="sortDrawer__nav">
          <button id="sortDrawer__close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#212121" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
          <p>Sortowanie</p>
      </div>
      <div class="container mx-auto px-5">
        <div class="sortDrawer__parameters">
          <form id="search-form__sort">
            <select id="sort" name="sort">
              <option value="default">Domyślnie</option>
              <option value="price_asc">Cena rosnąco</option>
              <option value="price_desc">Cena malejąco</option>
              <option value="size_asc">Powierzchnia rosnąco</option>
              <option value="size_desc">Powierzchnia malejąco</option>
            </select>
          </form>
        </div>
      </div>
      <div class="sortDrawer__footer"></div>
    </div>
  </div>
</div>
<?php get_footer();?>

<script>
  jQuery(document).ready(function($) {
    var urlParams = new URLSearchParams(window.location.search);
    var viewParam = urlParams.get('view');

    var roomsParam = urlParams.get('rooms');
    if (roomsParam) {
        var selectedRooms = roomsParam.split(',');
        selectedRooms.forEach(room => {
            $(`.room-button[data-value="${room}"]`).addClass('selected');
        });
        $('#rooms').val(roomsParam);
    }

    var floorsParam = urlParams.get('floors');
    if (floorsParam) {
        var selectedFloors = floorsParam.split(',');
        selectedFloors.forEach(function(floor) {
            var value = (floor === 'parter') ? '0' : floor;
            document.querySelector(`.advancedFilters__floor-checkbox-input[data-value="${value}"]`).checked = true;
        });
        document.getElementById('floors').value = floorsParam;
    }

    var investmentParam = urlParams.get('investment');
    if (investmentParam) {
        var selectedInvestments = investmentParam.split(',');
        selectedInvestments.forEach(investment => {
            $(`.investment-button[data-value="${investment}"]`).addClass('selected');
        });
        $('#investment').val(investmentParam);
    }

    var featuresParam = urlParams.get('features');
    if (featuresParam) {
      var selectedFeatures = featuresParam.split(',');
      selectedFeatures.forEach(feature => {
        $(`.features-button[data-value="${feature}"]`).addClass('selected');
      });
      $('#features').val(featuresParam);
    }

    var flatSizes = <?php echo json_encode($flat_sizes); ?>;

    var slider = document.getElementById('slider-range');
    noUiSlider.create(slider, {
        start: [<?php echo $default_size_from; ?>, <?php echo $default_size_to; ?>],
        connect: true,
        range: {
            'min': 20,
            'max': 120
        },
        step: 2,
        tooltips: [true, true],
        format: {
            to: function (value) {
                return Math.round(value) + ' m²';
            },
            from: function (value) {
                return Number(value.replace(' m²', ''));
            }
        }
    });

    slider.noUiSlider.on('update', function(values, handle) {
        var sizeFrom = values[0].replace(' m²', '');
        var sizeTo = values[1].replace(' m²', '');
        $("#size_from").val(sizeFrom);
        $("#size_to").val(sizeTo);
        $("#noui_size_from").text(values[0]);
        $("#noui_size_to").text(values[1]);
        updateHistogram(flatSizes, sizeFrom, sizeTo);
        updateActiveFiltersCount();
        fetchResults();
    });

    function updateHistogram(flatSizes, minSize, maxSize) {
      if (!flatSizes || typeof flatSizes !== 'object') {
          console.error('Invalid flatSizes data:', flatSizes);
          return;
      }

      var histogram = document.getElementById('histogram');
      histogram.innerHTML = '';
      var maxFrequency = Math.max(...Object.values(flatSizes));

      Object.keys(flatSizes).forEach(size => {
        var numericSize = Number(size);
        var frequency = flatSizes[size];
        var bar = document.createElement('div');
        bar.className = 'bar';
        bar.style.height = (frequency / maxFrequency * 100) + '%';
        bar.style.width = '2%';
        bar.style.borderRadius = '5px 5px 0 0';
        bar.style.marginRight = '1px'; 

        if (numericSize >= minSize && numericSize <= maxSize) {
            bar.style.backgroundColor = '#eeeeee';
        } else {
            bar.style.backgroundColor = '#eeeeee'; 
        }
        histogram.appendChild(bar);
        });
    }

    if (flatSizes) {
        updateHistogram(flatSizes, <?php echo $default_size_from; ?>, <?php echo $default_size_to; ?>);
    }

    $('.room-button').on('click', function() {
        $(this).toggleClass('selected');
        updateRoomsInput();
        fetchResults();
    });

    function updateRoomsInput() {
        var selectedRooms = [];
        $('.room-button.selected').each(function() {
            selectedRooms.push($(this).data('value'));
        });
        $('#rooms').val(selectedRooms.join(','));
        updateActiveFiltersCount();
    }

    // $('.floor-button').on('click', function() {
    //     var value = $(this).data('value');
    //     value = (value === 0) ? 'parter' : value;
    //     $(this).toggleClass('selected');
    //     updateFloorsInput();
    //     fetchResults();
    // });

    $('#advancedFilters__floorDropdownButton').on('click', function() {
        $('#advancedFilters__floorDropdownContent').toggle();
        $(this).toggleClass('is-open');
    });

    $('.advancedFilters__floor-checkbox-input').on('change', function() {
        updateSelectedFloors();
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.advancedFilters__parameters__dropdown').length) {
            $('#advancedFilters__floorDropdownContent').hide();
        }
    });

    document.querySelectorAll('.advancedFilters__floor-checkbox-input').forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
          updateFloorsInput();
          fetchResults();
      });
    });

    function updateFloorsInput() {
      var selectedFloors = [];
      document.querySelectorAll('.advancedFilters__floor-checkbox-input:checked').forEach(function(checkbox) {
          var value = checkbox.getAttribute('data-value');
          value = (value === '0') ? 'parter' : value;
          selectedFloors.push(value);
      });
      document.getElementById('floors').value = selectedFloors.join(',');
      updateActiveFiltersCount();
    }

    function updateSelectedFloors() {
        var selectedFloors = [];
        
        // Pobiera zaznaczone piętra
        $('.advancedFilters__floor-checkbox-input:checked').each(function() {
            var value = $(this).data('value');
            selectedFloors.push(value === 0 ? 'Parter' : value);
        });

        // Wyświetla wybrane piętra lub tekst "dowolne", jeśli brak zaznaczeń
        $('#advancedFilters__selectedFloors').text(
            selectedFloors.length > 0 ? selectedFloors.join(', ') : 'dowolne'
        );
    }

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.advancedFilters__dropdown').length) {
            $('#advancedFilters__floorDropdownContent').removeClass('show');
        }
    });

    $('.investment-button').on('click', function() {
        $(this).toggleClass('selected');
        updateInvestmentInput();
        fetchResults();
    });

    function updateInvestmentInput() {
        var selectedInvestments = [];
        $('.investment-button.selected').each(function() {
            selectedInvestments.push($(this).data('value'));
        });
        $('#investment').val(selectedInvestments.join(','));
        updateActiveFiltersCount();
    }

    $('.status-checkbox-input').on('change', function() {
    var selectedStatus = [];

    // Zbieramy wszystkie zaznaczone statusy
    $('.status-checkbox-input:checked').each(function() {
        selectedStatus.push($(this).val());
    });

    // Ustawiamy zebrane statusy w ukrytym polu input
    $('#status').val(selectedStatus.join(',')); 

    // Wywołujemy aktualizację wyników
    fetchResults();
    });

    function updateStatusInput() {
      var selectedStatus = [];
      $('.status-checkbox-input:checked').each(function() {
        selectedStatus.push($(this).val()); 
      });

      $('#status').val(selectedStatus.join(','));
      
      updateActiveFiltersCount(); // Zaktualizowanie liczby aktywnych filtrów
    }

    $('.features-button').on('click', function() {
      $(this).toggleClass('selected');
      updateFeaturesInput();
      fetchResults();
    });

    function updateFeaturesInput() {
      var selectedFeatures = [];
      $('.features-button.selected').each(function() {
          selectedFeatures.push($(this).data('value'));
      });
      $('#features').val(selectedFeatures.join(','));
      updateActiveFiltersCount();
    }

    function updateActiveFiltersCount() {
      var activeFilters = 0;

      if ($('#rooms').val()) activeFilters++;
      if ($('#floors').val()) activeFilters++;
      if ($('#investment').val()) activeFilters++;
      if ($('#status').val()) activeFilters++;
      if ($('#size_from').val() > 20 || $('#size_to').val() < 120) activeFilters++;
      
      if ($('#features').val()) activeFilters++;
      
      var $activeFiltersCount = $('#advancedFilters__count');
      if (activeFilters > 0) {
          $activeFiltersCount.text(`${activeFilters}`);
          $activeFiltersCount.show();
      } else {
          $activeFiltersCount.hide();
      }
    }

    function fetchResults() {
        var formData = $('#search-form__filter').serialize();
        var $loadingAnimation = $('#loading-animation');
        var $resultsText = $('#resultListing-number__text');
        var $resultsContainer = $('#results-container');
        var $resultListingNumber__btn = $('#resultListing-number__count__btn');
        var $resultListingNumber__view = $('#resultListing-number__count__view');

        $loadingAnimation.removeClass('hidden');
        $resultsText.addClass('hidden');

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'GET',
            data: formData + '&action=filter_mieszkania',
            success: function(data) {
                $loadingAnimation.addClass('hidden');
                $resultsText.removeClass('hidden');
                $resultsContainer.html(data);

                updateURL(formData); // Aktualizacja URL po wczytaniu wyników
                updateActiveFiltersCount();

                var updateNumberOfResults = $('.flat-item__element:visible').length;
                $resultListingNumber__btn.html(`<span id="result-number">${updateNumberOfResults}</span>`);
                $resultListingNumber__view.html(`<span id="result-number">${updateNumberOfResults}</span>`);
            },
            error: function(xhr, status, error) {
                alert('An error occurred while fetching results. Please try again.');
            },
            complete: function() {
                $loadingAnimation.addClass('hidden');
                $resultsText.removeClass('hidden');
            }
        });
    }

    function updateURL(formData) {
        var urlParams = new URLSearchParams(formData);

        // Zbieramy wartości statusów i eliminujemy duplikaty
        var uniqueStatuses = [];
        $('.status-checkbox-input:checked').each(function() {
            var value = $(this).val();
            if (!uniqueStatuses.includes(value)) {
                uniqueStatuses.push(value);
            }
        });

        // Ustawiamy unikalne statusy
        urlParams.delete('status'); // Usuwamy istniejące parametry status
        uniqueStatuses.forEach(status => {
            urlParams.append('status', status);
        });

        // Upewnij się, że usuwasz puste parametry
        ['size_from', 'size_to', 'rooms', 'floors', 'investment', 'features', 'view'].forEach(param => {
            if (!urlParams.get(param)) {
                urlParams.delete(param);
            }
        });

        // Tworzenie nowego URL
        var newURL = '<?php echo home_url('/znajdz-mieszkanie/'); ?>?' + urlParams.toString();
        history.replaceState(null, '', newURL); // Aktualizacja URL bez przeładowania strony
    }

    $('#search-form input, #search-form select').on('change', function() {
        fetchResults();
    });

    $('#advancedFilters__clear-btn').on('click', function() {
      $('.status-checkbox-input').prop('checked', false);
      $('.room-button').removeClass('selected');
      $('.floor-button').removeClass('selected');
      $('.investment-button').removeClass('selected');
      $('.features-button').removeClass('selected');
      $('.advancedFilters__floor-checkbox-input').prop('checked', false);

      $('#rooms').val('');
      $('#floors').val('');
      $('#status').val('');
      $('#investment').val('');
      $('#features').val('');

      $('#advancedFilters__selectedFloors').text('dowolne');
      
      var slider = document.getElementById('slider-range');
      slider.noUiSlider.set([20, 120]);
      
      fetchResults();
      updateActiveFiltersCount();
    });

    $(document).ready(function() {
        updateActiveFiltersCount();
    });

    fetchResults();
  });

  document.addEventListener("DOMContentLoaded", function() {
    const searchBar = document.getElementById("search-bar-wrapper");
    let lastScrollTop = 0;
    let isHidden = false;

    window.addEventListener("scroll", function() {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      if (scrollTop > lastScrollTop) {
        if (!isHidden) {
          searchBar.style.top = "-80px";
          isHidden = true;
        }
      } else {
        if (isHidden) {
          searchBar.style.top = "0";
          isHidden = false;
        }
      }

      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
  });

  const advancedFilters_openButton = document.getElementById('advancedFilters__open');
  const advancedFilters_closeButton = document.getElementById('advancedFilters__close');
  const advancedFilters_submitButton = document.getElementById('advancedFilters__submit');
  const advancedFilters_content = document.getElementById('advancedFilters__content');
  const bodyTag = document.body;

  advancedFilters_openButton.addEventListener('click', () => {
    advancedFilters_content.style.display = 'block';
    advancedFilters_content.classList.add('opened');
    advancedFilters_content.classList.remove('closing');
    document.getElementById('advancedFilters__backdrop').style.display = 'block';
    bodyTag.classList.add('filters-opened');
  });

  function closeAdvancedFilters() {
    advancedFilters_content.classList.remove('opened');
    advancedFilters_content.classList.add('closing');
    document.getElementById('advancedFilters__backdrop').style.display = 'none';
    bodyTag.classList.remove('filters-opened');

    advancedFilters_content.addEventListener('animationend', () => {
        if (advancedFilters_content.classList.contains('closing')) {
            advancedFilters_content.style.display = 'none';
            advancedFilters_content.classList.remove('closing');
        }
    }, { once: true });
  }
  advancedFilters_closeButton.addEventListener('click', closeAdvancedFilters);
  advancedFilters_submitButton.addEventListener('click', closeAdvancedFilters);

  const sortDrawer_openButton = document.getElementById('sortDrawer__open');
  const sortDrawer_closeButton = document.getElementById('sortDrawer__close');
  const sortDrawer_content = document.getElementById('sortDrawer__content');

  function openSortDrawer() {
    sortDrawer_content.style.display = 'block';
    sortDrawer_content.classList.add('opened');
    sortDrawer_content.classList.remove('closing');
    document.getElementById('sortDrawer__backdrop').style.display = 'block';
    bodyTag.classList.add('sort-opened');
  }
  sortDrawer_openButton.addEventListener('click', openSortDrawer);

  function closeSortDrawer() {
    sortDrawer_content.classList.remove('opened');
    sortDrawer_content.classList.add('closing');
    document.getElementById('sortDrawer__backdrop').style.display = 'none';
    bodyTag.classList.remove('sort-opened');

    sortDrawer_content.addEventListener('animationend', ()=> {
      if (sortDrawer_content.classList.contains('closing')) {
        sortDrawer_content.style.display = 'none';
        sortDrawer_content.classList.remove('closing');
      }
    }, { once: true});
  }
  sortDrawer_closeButton.addEventListener('click', closeSortDrawer)

  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('results-container').addEventListener('click', function (event) {

      var item = event.target.closest('.flat-item__element');


      if (item && event.target.tagName.toLowerCase() !== 'button') {

        var url = item.getAttribute("data-url");

        window.location.href = url;
      }
    });
  });

</script>