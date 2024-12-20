<?php 
/*
Template Name: Znajdź mieszkanie
*/
?>

<?php get_header();?>
<!-- <div id="headingPageContent">
  <div class="container mx-auto px-5">
    <div class="flex breadcrumbs">
      <p>Home</p>
      <p>/</p>
      <p class="active">Znajdz mieszkanie</p>
    </div>
  </div>
</div> -->
<div id="searchBarWrapper">
  <div class="container mx-auto px-5">
    <div class="flex flex-row gap-5">
      <div class="filters-trigger">
        <button id="advancedFilters__open">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 15H21M3 15H5M5 15C5 16.3807 6.11929 17.5 7.5 17.5C8.88071 17.5 10 16.3807 10 15C10 13.6193 8.88071 12.5 7.5 12.5C6.11929 12.5 5 13.6193 5 15ZM20 9H21M3 9H10M16.5 11.5C15.1193 11.5 14 10.3807 14 9C14 7.61929 15.1193 6.5 16.5 6.5C17.8807 6.5 19 7.61929 19 9C19 10.3807 17.8807 11.5 16.5 11.5Z" stroke="#212121" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
          </svg>
          Filtruj wyniki
          <span id="advancedFilters__count" style="display:none;">0</span>
        </button>
        <!-- <button id="viewDrawer__open">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 18C17.5228 18 22 12 22 12C22 12 17.5228 6 12 6C6.47715 6 2 12 2 12C2 12 6.47715 18 12 18Z" stroke="#212121" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round"/>
            <path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" stroke="#212121" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
          </svg>
          Widok
        </button> -->
        <button id="sortDrawer__open">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 16L8 19M8 19L5 16M8 19V5M13 8L16 5M16 5L19 8M16 5V19" stroke="#212121" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round"/>
          </svg>
          Sortowanie
        </button>
      </div>
    </div>
  </div>
</div>
<div id="listingWrapper">
  <div class="container mx-auto px-5 py-2">
    <div id="listing-view">
      <div class="grid grid-cols-1">
        <h3>Znaleźliśmy: <span id="resultListing-number__count__view"></span> wyników</h3>
      </div>
      <div class="drawerSortView">
        <div class="viewDrawer__content">
          <div class="viewDrawer__rows">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 15V16.8002C4 17.9203 4 18.4801 4.21799 18.9079C4.40973 19.2842 4.71547 19.5905 5.0918 19.7822C5.5192 20 6.07899 20 7.19691 20H12M4 15V9M4 15H12M4 9V7.2002C4 6.08009 4 5.51962 4.21799 5.0918C4.40973 4.71547 4.71547 4.40973 5.0918 4.21799C5.51962 4 6.08009 4 7.2002 4H12M4 9H12M12 4H16.8002C17.9203 4 18.4801 4 18.9079 4.21799C19.2842 4.40973 19.5905 4.71547 19.7822 5.0918C20 5.5192 20 6.07899 20 7.19691V9M12 4V9M12 9V15M12 9H20M12 15V20M12 15H20M12 20H16.8036C17.9215 20 18.4805 20 18.9079 19.7822C19.2842 19.5905 19.5905 19.2842 19.7822 18.9079C20 18.4805 20 17.9215 20 16.8036V15M20 15V9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
        </div>
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
            <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#212121" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
          </svg>
        </button>
        <p>Filtry</p>
        <button class="advancedFilters__clear" id="advancedFilters__clear-btn">Wyczyść filtry</button>
      </div>
      <div class="container mx-auto px-5">
        <div class="advancedFilters__parameters">
          <form id="search-form__filter">
            <div class="advancedFilters__parameters__container">
                <div class="advancedFilters__parameters__heading">Piętro</div>
                <div class="advancedFilters__parameters__dropdown">
                    <button type="button" id="advancedFilters__floorDropdownButton" class="advancedFilters__dropdown-button">
                      <span id="advancedFilters__selectedFloors">Dowolne</span>
                      <div class="selectedFloors__indicator">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M19 9L12 16L5 9" stroke="#1D2128" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="round"/>
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
                <div class="advancedFilters__parameters__heading">Powierzchnia</div>
                <div class="advancedFilters__parameters__double-dropdown">
                  <div class="advancedFilters__parameters__dropdown">
                    <p class="price-field__title">Od</p>
                    <button type="button" id="advancedFilters__sizeFromDropdownButton" class="advancedFilters__dropdown-button">
                        <span id="advancedFilters__selectedSizeFrom">Dowolne</span>
                        <div class="selectedSize__indicator">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 16L5 9" stroke="#1D2128" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </button>
                    <div id="advancedFilters__sizeFromDropdownContent" class="advancedFilters__dropdown-content">
                        <label class="advancedFilters__dropdown-item" data-value="">Dowolne</label>
                        <?php for ($i = 20; $i <= 120; $i += 10): ?>
                            <label class="advancedFilters__dropdown-item" data-value="<?php echo $i; ?>">
                              <?php echo $i; ?> m²
                            </label>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" id="size_from" name="size_from" value="">
                  </div>
                  <div class="advancedFilters__parameters__dropdown">
                    <p class="price-field__title">Do</p>
                    <button type="button" id="advancedFilters__sizeToDropdownButton" class="advancedFilters__dropdown-button">
                        <span id="advancedFilters__selectedSizeTo">Dowolne</span>
                        <div class="selectedSize__indicator">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 16L5 9" stroke="#1D2128" stroke-width="1.8" stroke-linecap="square" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </button>
                    <div id="advancedFilters__sizeToDropdownContent" class="advancedFilters__dropdown-content">
                        <label class="advancedFilters__dropdown-item" data-value="">Dowolne</label>
                        <?php for ($i = 20; $i <= 120; $i += 10): ?>
                            <label class="advancedFilters__dropdown-item" data-value="<?php echo $i; ?>">
                              <?php echo $i; ?> m²
                            </label>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" id="size_to" name="size_to" value="">
                  </div>
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
            <!-- <hr class="mt-5">
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
            </div> -->
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
                <path d="M13 13L19 19M8 15C4.13401 15 1 11.866 1 8C1 4.13401 4.13401 1 8 1C11.866 1 15 4.13401 15 8C15 11.866 11.866 15 8 15Z" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
              </svg>
              Pokaż wyniki
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
              <path d="M21 21L12 12M12 12L3 3M12 12L21.0001 3M12 12L3 21.0001" stroke="#212121" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="round"/>
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

    // --- Pobranie parametrów `size_from` i `size_to` z URL ---
    var sizeFromParam = urlParams.get('size_from');
    var sizeToParam = urlParams.get('size_to');

    if (sizeFromParam) {
        $('#size_from').val(sizeFromParam);
    }

    if (sizeToParam) {
        $('#size_to').val(sizeToParam);
    }

    // --- Event Listener dla pól size_from i size_to ---
    $('#size_from, #size_to').on('change', function() {
        updateSizeParams();
        fetchResults();
    });

    function updateSizeParams() {
        var sizeFrom = $('#size_from').val();
        var sizeTo = $('#size_to').val();

        if (sizeFrom) {
            urlParams.set('size_from', sizeFrom);
        } else {
            urlParams.delete('size_from');
        }

        if (sizeTo) {
            urlParams.set('size_to', sizeTo);
        } else {
            urlParams.delete('size_to');
        }

        // Aktualizacja URL w przeglądarce
        var newURL = '<?php echo home_url("/znajdz-mieszkanie/"); ?>?' + urlParams.toString();
        history.replaceState(null, '', newURL);
    }

    function toggleDropdown(buttonSelector, contentSelector, closeOthers = true) {
    if (closeOthers) {
        $('.advancedFilters__parameters__dropdown-content').hide();
        $('.advancedFilters__dropdown-button').removeClass('is-open');
    }
    var isOpen = $(contentSelector).is(':visible');
    $(contentSelector).toggle();
    $(buttonSelector).toggleClass('is-open', !isOpen);
}

function closeAllDropdowns() {
    $('.advancedFilters__parameters__dropdown-content').hide();
    $('.advancedFilters__dropdown-button').removeClass('is-open');
}

function handleDropdownSelection(itemSelector, displaySelector, inputSelector, dropdownSelector, buttonSelector, valueFormat = (v) => v) {
    $(itemSelector).on('click', function () {
        var value = $(this).data('value');
        var text = value ? valueFormat(value) : 'Dowolne';

        $(displaySelector).text(text);
        $(inputSelector).val(value);
        $(itemSelector).removeClass('selected');
        $(this).addClass('selected');

        $(dropdownSelector).hide();
        $(buttonSelector).removeClass('is-open'); // Zamknij wskaźnik po wyborze
        fetchResults();
    });
}

$('#advancedFilters__sizeFromDropdownButton').on('click', function () {
    toggleDropdown('#advancedFilters__sizeFromDropdownButton', '#advancedFilters__sizeFromDropdownContent');
});
handleDropdownSelection(
    '#advancedFilters__sizeFromDropdownContent .advancedFilters__dropdown-item',
    '#advancedFilters__selectedSizeFrom',
    '#size_from',
    '#advancedFilters__sizeFromDropdownContent',
    '#advancedFilters__sizeFromDropdownButton',
    (value) => `${value} m²`
);

$('#advancedFilters__sizeToDropdownButton').on('click', function () {
    toggleDropdown('#advancedFilters__sizeToDropdownButton', '#advancedFilters__sizeToDropdownContent');
});
handleDropdownSelection(
    '#advancedFilters__sizeToDropdownContent .advancedFilters__dropdown-item',
    '#advancedFilters__selectedSizeTo',
    '#size_to',
    '#advancedFilters__sizeToDropdownContent',
    '#advancedFilters__sizeToDropdownButton',
    (value) => `${value} m²`
);

$(document).on('click', function (event) {
    if (!$(event.target).closest('.advancedFilters__parameters__dropdown').length) {
        closeAllDropdowns();
    }
});


    // Zamknięcie dropdownów po kliknięciu poza
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.advancedFilters__parameters__dropdown').length) {
            $('#advancedFilters__sizeFromDropdownContent').hide();
            $('#advancedFilters__sizeToDropdownContent').hide();
        }
    });

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
      if ($('#features').val()) activeFilters++;
      if ($('#size_from').val()) activeFilters++;
      if ($('#size_to').val()) activeFilters++;
      
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

        var uniqueStatuses = [];
        $('.status-checkbox-input:checked').each(function() {
            var value = $(this).val();
            if (!uniqueStatuses.includes(value)) {
                uniqueStatuses.push(value);
            }
        });

        urlParams.delete('status'); 
        uniqueStatuses.forEach(status => {
            urlParams.append('status', status);
        });

        ['size_from', 'size_to', 'rooms', 'floors', 'investment', 'features', 'view'].forEach(param => {
            if (!urlParams.get(param)) {
                urlParams.delete(param);
            }
        });

        var newURL = '<?php echo home_url('/znajdz-mieszkanie/'); ?>?' + urlParams.toString();
        history.replaceState(null, '', newURL);
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
      $('#advancedFilters__sizeFromDropdownContent .advancedFilters__dropdown-item').removeClass('selected');
      $('#advancedFilters__sizeToDropdownContent .advancedFilters__dropdown-item').removeClass('selected');

      $('#rooms').val('');
      $('#floors').val('');
      $('#status').val('');
      $('#investment').val('');
      $('#features').val('');
      $('#size_from, #size_to').val('');

      $('#advancedFilters__selectedSizeFrom').text('Dowolne');
      $('#advancedFilters__selectedSizeTo').text('Dowolne');
      $('#advancedFilters__selectedFloors').text('Dowolne');
      
      fetchResults();
      updateActiveFiltersCount();
    });

    $(document).ready(function() {
        updateActiveFiltersCount();
    });

    fetchResults();
  });

  document.addEventListener("DOMContentLoaded", function() {
    const searchBar = document.getElementById("searchBarWrapper");
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