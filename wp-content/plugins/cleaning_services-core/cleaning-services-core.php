<?php
/*
  Plugin Name: Cleaning Services Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the SmartDataSoft  theme.
  Author: SmartDataSoft Team
  Version: 1.3
  Author URI: http://smartdatasoft.com/
 */

/**
 *
 */
if (!defined('CLEANING_SERVICE_THEME_URI')) {
    define('CLEANING_SERVICE_THEME_URI', get_template_directory_uri());
}
if (!defined('ULTIMA_NAME'))
    define('ULTIMA_NAME', 'cleaning_services');

add_action('wp_enqueue_scripts', 'cleaning_services_core_enqueue', 1001);


function cleaning_services_core_enqueue() {
    wp_enqueue_style('cleaning-services-forms',plugin_dir_url( __FILE__ ) . '/js/forms.js',1001);
   
}


add_action('admin_enqueue_scripts', 'cleaning_services_core_admin_enqueue');

function cleaning_services_core_admin_enqueue($hook) {
    wp_enqueue_style('iconfont-style', get_template_directory_uri() . '/fonts/style.css', '', null);
//laod custom post type js
    if ($hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php')
        return;
}

/* ============================================================
 * Visual Composer shorrtcode config
 * ============================================================ */

define('PLUGIN_DIR', dirname(__FILE__) . '/');

$classesDir = array(
    PLUGIN_DIR . 'shortcode/',
    PLUGIN_DIR . 'vc_element/'
);

function __autoloadShortCode() {
    global $classesDir;
    foreach ($classesDir as $directory) {

        foreach (glob($directory . '*.php') as $filename) {
            if (file_exists($filename)) {
                include_once ($filename);
            }
        }
    }
}

function __autoloadVcMap() {
    __autoloadShortCode();
}

add_action('vc_before_init', '__autoloadVcMap');


$classesPostTypeDir = PLUGIN_DIR . 'post_type/';

function __autoloadPostType($directory) {

    foreach (glob($directory . '*.php') as $filename) {
        if (file_exists($filename)) {
            include_once ($filename);
        }
    }
}

__autoloadPostType($classesPostTypeDir);


/*
 * widgets auto load
 */


$classesWidgetsDir = PLUGIN_DIR . 'widgets/';

function __autoloadWidgets($directory) {
    foreach (glob($directory . '*.php') as $filename) {
        if (file_exists($filename)) {
            include_once ($filename);
        }
    }
}

__autoloadWidgets($classesWidgetsDir);


add_action('cleaning_services_after_footer', 'cleaning_services_after_footer_function');

function cleaning_services_after_footer_function() {

    if (!function_exists('cleaning_services_options'))
        return;
    $cleaning_services_option = cleaning_services_options();
    $gmap_latitude = (isset($cleaning_services_option['cleaning_services-gmap_latitude']) && !empty($cleaning_services_option['cleaning_services-gmap_latitude'])) ? $cleaning_services_option['cleaning_services-gmap_latitude'] : '';
    $gmap_longitude = (isset($cleaning_services_option['cleaning_services-gmap_longitude']) && !empty($cleaning_services_option['cleaning_services-gmap_longitude'])) ? $cleaning_services_option['cleaning_services-gmap_longitude'] : '';

    //footer_map
    $mapkey = '';
    if (isset($cleaning_services_option['cleaning_services-gmap_api_key']) && !empty($cleaning_services_option['cleaning_services-gmap_api_key'])) {
        $mapkey .= '&key=' . $cleaning_services_option['cleaning_services-gmap_api_key'];
    }
    ?>

    <!-- map -->
    <div id="footer-map" class="footer-map"></div>
    <!-- /map -->  
    <!-- Google map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false<?php echo $mapkey; ?>"></script>
    <script type="text/javascript">

        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 14,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(<?php echo esc_html($gmap_latitude); ?>, <?php echo esc_html($gmap_longitude); ?>), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            }, {
                                "lightness": 17
                            }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            }, {
                                "lightness": 20
                            }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 17
                            }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 29
                            }, {
                                "weight": 0.2
                            }]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 18
                            }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 16
                            }]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            }, {
                                "lightness": 21
                            }]
                    }, {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            }, {
                                "lightness": 21
                            }]
                    }, {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            }, {
                                "color": "#ffffff"
                            }, {
                                "lightness": 16
                            }]
                    }, {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            }, {
                                "color": "#333333"
                            }, {
                                "lightness": 40
                            }]
                    }, {
                        "elementType": "labels.icon",
                        "stylers": [{
                                "visibility": "off"
                            }]
                    }, {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            }, {
                                "lightness": 19
                            }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            }, {
                                "lightness": 20
                            }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            }, {
                                "lightness": 17
                            }, {
                                "weight": 1.2
                            }]
                    }]
            };
            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('footer-map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            var image = "<?php if (isset($cleaning_services_option['cleaning_services-gmap_marker']) && !empty($cleaning_services_option['cleaning_services-gmap_marker'])) echo $cleaning_services_option['cleaning_services-gmap_marker']['url']; ?>";
            // Let's also add a marker while we're at it
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo esc_html($gmap_latitude); ?>, <?php echo esc_html($gmap_longitude); ?>),
                map: map,
                //title: '<?php esc_html_e('Snazzy!', 'cleaning_services') ?>'
                icon: image
            });
        }
    </script>

    <?php
}

/*
 * fonts auto load
 */

require_once( PLUGIN_DIR . 'fonts-loader.php');

/*
 * Gallery load
 */

require_once( PLUGIN_DIR . "/lib/sds_cpt_gallery.php" );
/*
 * sidebar load
 */
require_once( PLUGIN_DIR . "/lib/sidebar_generator.php" );

/*
 * Meta Box Configuration Post Meta Option
 */
require_once(PLUGIN_DIR . "/lib/config.meta.box.php");
