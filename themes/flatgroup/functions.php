<?php 

function my_theme_enqueue_styles() 
{
  wp_enqueue_style('tailwindcss', 'https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function load_css()
{
    wp_register_style('main', get_template_directory_uri() . '/scss/main.css', array(), false, 'all');
    wp_enqueue_style('main');

    wp_register_style('swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), false, 'all');
    wp_enqueue_style('swiper');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('swiperjs', get_template_directory_uri() . '/js/swiper-bundle.min.js', 'jquery', false, false);
    wp_enqueue_script('swiperjs');
}
add_action('wp_enqueue_scripts', 'load_js');

function load_nouislider() 
{
  wp_enqueue_script('nouislider', 'https://cdn.jsdelivr.net/npm/nouislider@14.6.3/distribute/nouislider.min.js', array('jquery'), null, true);
  wp_enqueue_style('nouislider-css', 'https://cdn.jsdelivr.net/npm/nouislider@14.6.3/distribute/nouislider.min.css');
}
add_action('wp_enqueue_scripts', 'load_nouislider');

function mieszkania_post_type()
{
  $args = array(
    'labels' => array(
      'name' => 'Mieszkania',
      'singular_name' => 'Mieszkanie',
    ),
    'hierarchical' => true,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-network',
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'oferta'),
  );
  register_post_type('mieszkania', $args);

}
add_action('init', 'mieszkania_post_type');

function map_floor_to_value($floor) 
{
  if ($floor == 0) {
      return 'parter';
  } else {
      return $floor;
  }
}

function filter_mieszkania() 
{
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = [
      'post_type' => 'mieszkania',
      'posts_per_page' => -1,
      'paged' => $paged,
      'tax_query' => [],
      'meta_query' => [
          'relation' => 'AND',
      ],
  ];

  if (isset($_GET['size_from']) && !empty($_GET['size_from'])) {
      $args['meta_query'][] = array(
          'key' => 'metraz',
          'value' => sanitize_text_field($_GET['size_from']),
          'type' => 'numeric',
          'compare' => '>='
      );
  }

  if (isset($_GET['size_to']) && !empty($_GET['size_to'])) {
    $args['meta_query'][] = array(
        'key' => 'metraz',
        'value' => sanitize_text_field($_GET['size_to']),
        'type' => 'numeric',
        'compare' => '<='
    );
  }

  if (isset($_GET['investment']) && !empty($_GET['investment'])) {
    $investments = array_map('sanitize_text_field', explode(',', $_GET['investment']));
    $investments_decoded = array_map('urldecode', $investments);
    $args['meta_query'][] = array(
        'key' => 'inwestycja',
        'value' => $investments_decoded,
        'compare' => 'IN'
    );
  }

  if (isset($_GET['rooms']) && !empty($_GET['rooms'])) {
    $rooms = array_map('sanitize_text_field', explode(',', $_GET['rooms']));
    $args['meta_query'][] = array(
        'key' => 'pokoje',
        'value' => $rooms,
        'compare' => 'IN'
    );
  }

  if (isset($_GET['features']) && !empty($_GET['features'])) {
      $features = array_map('sanitize_text_field', explode(',', $_GET['features']));
      
      $meta_query = array('relation' => 'AND');
      
      foreach ($features as $feature) {
          $meta_query[] = array(
              'key' => 'informacje_dodatkowe',
              'value' => '"' . $feature . '"',
              'compare' => 'LIKE'
          );
      }

      $args['meta_query'][] = $meta_query;
  }

  if (isset($_GET['floors']) && !empty($_GET['floors'])) {
      $floors = array_map('sanitize_text_field', explode(',', $_GET['floors']));
      $floors_mapped = array_map('map_floor_to_value', $floors);
      $args['meta_query'][] = array(
          'key' => 'pietro',
          'value' => $floors_mapped,
          'compare' => 'IN'
      );
  }

  if (isset($_GET['status']) && !empty($_GET['status'])) {
      $status = sanitize_text_field($_GET['status']);
      $args['meta_query'][] = array(
          'key' => 'status',
          'value' => $status,
          'compare' => 'IN'
      );
  }

  if (isset($_GET['sort_by']) && !empty($_GET['sort_by'])) {
      $sort_by = sanitize_text_field($_GET['sort_by']);
      switch ($sort_by) {
          case 'metraz':
              $args['orderby'] = 'meta_value_num';
              $args['meta_key'] = 'metraz';
              $args['order'] = 'ASC';
              break;
          case 'pokoje':
              $args['orderby'] = 'meta_value_num';
              $args['meta_key'] = 'pokoje';
              $args['order'] = 'ASC';
              break;
          case 'pietro':
              $args['orderby'] = 'meta_value_num';
              $args['meta_key'] = 'pietro';
              $args['order'] = 'ASC';
              break;
          default:
              $args['orderby'] = 'date';
              $args['order'] = 'DESC';
              break;
      }
  }

  if (isset($_GET['view']) && ($_GET['view'] === 'grid' || $_GET['view'] === 'table')) {
    $view = sanitize_text_field($_GET['view']);
    } else {
        $view = 'table';
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
          <div class="flat-item__element" data-url="<?php the_permalink(); ?>">
              <!-- <div class="item flat-item view-table">
                  <div class="atts">
                      <div class="flat-investment"><?php echo get_field('inwestycja'); ?></div>
                      <div class="flat-num"><?php the_title(); ?></div>
                      <div class="flat-status 
                      <?php 
                          $status = get_field('status');
                          if ($status == 'Wolne') {
                              echo 'status-wolne';
                          } elseif ($status == 'Zarezerwowane') {
                              echo 'status-zarezerwowane';
                          } elseif ($status == 'Sprzedane') {
                              echo 'status-sprzedane';
                          }?>"><span><?php echo $status; ?></span>
                      </div>
                      <div class="flat-size"><?php echo get_field('metraz'); ?> m²</div>
                      <div class="flat-floor"><?php echo get_field('pietro'); ?></div>
                      <div class="flat-rooms"><span><?php echo get_field('pokoje'); ?></span></div>
                      <div class="flat-option">
                        <button
                            class="open-modal-btn btn--dark_filled"
                            data-contact-property="<?php echo get_field('inwestycja') . '/' . get_field('numer_budynku') . '/' . get_field('pietro') . '/' . get_field('numer_lokalu'); ?>"
                        >
                        Zapytaj o cenę
                        </button>
                        </div>
                  </div>
              </div> -->
              <div class="item property-grid__view">
                <div class="property-grid__container">
                  <div class="property-grid__header">
                    <div class="property-grid__status <?php echo get_flat_status_class(get_field('status')); ?>">
                        <span><?php echo get_field('status'); ?></span>
                    </div>
                  </div>
                  <div class="property-grid__thumbnail">
                    <img src="<?php echo get_field('thumbnail_grid'); ?>" alt="Rzut mieszkania deweloperskiego o numerze <?php the_title(); ?>">
                  </div>
                  <div class="property-grid__content">
                    <div class="property-grid__investment">
                      <span><?php echo get_field('inwestycja'); ?></span>
                    </div>
                    <div class="property-grid__num">
                      <span><?php the_title(); ?></span>
                    </div>
                    <div class="property-grid__details">
                      <div class="property-grid__size">
                        <div class="property-grid__sub--heading">Metraż:</div>
                        <div class="property-grid__sub--value"><?php echo get_field('metraz'); ?> m²</div>
                      </div>
                      <div class="property-grid__floor">
                        <div class="property-grid__sub--heading">Piętro:</div>
                        <div class="property-grid__sub--value"><?php echo get_field('pietro'); ?></div>
                      </div>
                      <div class="property-grid__rooms">
                        <div class="property-grid__sub--heading">Pokoje:</div>
                        <div class="property-grid__sub--value"><?php echo get_field('pokoje'); ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="property-grid__footer">
                      <button
                          class="open-contact-modal-btn"
                          data-contact-property="<?php echo get_field('inwestycja') . '/' . get_field('numer_budynku') . '/' . get_field('pietro') . '/' . get_field('numer_lokalu'); ?>"
                      >
                        Zapytaj o cenę
                      </button>
                  </div>
                </div>
              </div>
          </div>
      <?php endwhile; ?>
  <?php else: ?>
    <div class="no-results-container">
        <p class="no-results-title">Nie znaleźliśmy żadnych wyników</p>
        <p class="no-results-message">
            W tej chwili w naszej ofercie nie mamy ogłoszeń, które spełniają twoje kryteria.
        </p>
    </div>
  <?php endif;

  wp_reset_postdata();

  die();
}

function get_flat_status_class($status) {
  switch ($status) {
      case 'Wolne':
          return 'status-wolne';
      case 'Zarezerwowane':
          return 'status-zarezerwowane';
      case 'Sprzedane':
          return 'status-sprzedane';
      default:
          return '';
  }
}
add_action('wp_ajax_filter_mieszkania', 'filter_mieszkania');
add_action('wp_ajax_nopriv_filter_mieszkania', 'filter_mieszkania');
