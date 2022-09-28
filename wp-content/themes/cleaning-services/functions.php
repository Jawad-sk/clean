<?php
/**
 * Cleaning-services Services functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cleaning_Services
 */
define('CLEANING_SERVICES_THEME_URI', get_template_directory_uri());
define('CLEANING_SERVICES_THEME_DIR', get_template_directory());
define('CLEANING_SERVICES_CSS_URL', get_template_directory_uri() . '/css');
define('CLEANING_SERVICES_JS_URL', get_template_directory_uri() . '/js');
define('CLEANING_SERVICES_IMG_URL', CLEANING_SERVICES_THEME_URI . '/images/');
define('CLEANING_SERVICES_FREAMWORK_DIRECTORY', CLEANING_SERVICES_THEME_DIR . '/framework/');
define('CLEANING_SERVICES_INC_DIRECTORY', CLEANING_SERVICES_THEME_DIR . '/inc/');
define('CLEANING_SERVICES_VC_MAP', CLEANING_SERVICES_THEME_DIR . '/vc_element/');

/*
 * plugin.php has to load to know which plugin is active
 */
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/*
 * Enable support TGM features.
 */
require_once(CLEANING_SERVICES_FREAMWORK_DIRECTORY . "class-tgm-plugin-activation.php");

/*
 * Load Theme Customizer.
 */
require_once(CLEANING_SERVICES_FREAMWORK_DIRECTORY . "framework_customizer.php");

/*
 * Redux framework configuration
 */
require_once(CLEANING_SERVICES_FREAMWORK_DIRECTORY . "redux.fallback.php");
require_once(CLEANING_SERVICES_FREAMWORK_DIRECTORY . "redux.config.php");

/*
 * Enable support TGM configuration.
 */
require_once(CLEANING_SERVICES_FREAMWORK_DIRECTORY . "config.tgm.php");

/*
 * Load Menu Walker
 */
require_once(CLEANING_SERVICES_FREAMWORK_DIRECTORY . "nav_menu_walker.php");


/**
 * Implement the post meta.
 */
require get_template_directory() . '/inc/post_meta.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * comment walker.
 */
require get_template_directory() . '/inc/class-walker-comment.php';

if (!function_exists('cleaning_services_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cleaning_services_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Pool Services, use a find and replace
         * to change 'cleaning-services' to the name of your theme in all the template files.
         */
        load_theme_textdomain('cleaning-services', get_template_directory() . '/languages');

        add_editor_style(CLEANING_SERVICES_CSS_URL . '/editor-style.css');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'cleaning-services'),
            'footer-menu' => esc_html__('Footer Menu', 'cleaning-services'),
        ));

        $defaults = array(
            'default-image' => '',
            'width' => 0,
            'height' => 0,
            'flex-height' => false,
            'flex-width' => false,
            'uploads' => true,
            'random-default' => false,
            'header-text' => true,
            'default-text-color' => '',
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        );

        add_theme_support('custom-header', $defaults);

        /*
         * Enable support for custom-background.
         */
        $defaults = array(
            'default-color' => '',
            'default-image' => '',
            'default-repeat' => '',
            'default-position-x' => '',
            'default-attachment' => '',
            'wp-head-callback' => '_custom_background_cb',
            'admin-head-callback' => '',
            'admin-preview-callback' => ''
        );
        add_theme_support('custom-background', $defaults);

        /*
         * Enable support for Post Formats.
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'gallery',
            'audio',
            'video',
            'link',
            'quote',
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        //Add custom thumb size
        set_post_thumbnail_size(870, 483, false);
        add_image_size('cleaning-services-thumbnail-carousel', 309, 309, true);
        add_image_size('cleaning-services-thumbnail', 357, 242, true);
        add_image_size('cleaning-services-coupon', 570, 310, true);
        add_image_size('cleaning-services-gallery-thumbnail', 369, 369, true);
        add_image_size('cleaning-services-testimonial', 653, 235, true);
        add_image_size('cleaning-services-service-full', 870, 500, true);
        add_image_size('cleaning-services-blog_post_featured_image', 270, 150, true);
    }

endif;

add_action('after_setup_theme', 'cleaning_services_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!function_exists('cleaning_services_content_width')) :

    function cleaning_services_content_width() {
        $GLOBALS['content_width'] = apply_filters('cleaning_services_content_width', 640);
    }

endif;

add_action('after_setup_theme', 'cleaning_services_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if (!function_exists('cleaning_services_widgets_init')) :

    function cleaning_services_widgets_init() {

        register_sidebar(array(
            'name' => esc_html__('Services Sidebar', 'cleaning-services'),
            'id' => 'servicesidebar',
            'description' => esc_html__('Service sidebar area', 'cleaning-services'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Contact Info', 'cleaning-services'),
            'id' => 'contact_list',
            'description' => esc_html__('Contacts Area', 'cleaning-services'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Blog Sidebar', 'cleaning-services'),
            'id' => 'blog_sideber',
            'description' => esc_html__('Blog sidebar area', 'cleaning-services'),
            'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="title-aside">',
            'after_title' => '</h3>',
        ));
        // add by tanvir
        register_sidebar(array(
            'name' => esc_html__('Woo Shop Sidebar', 'cleaning-services'),
            'id' => 'woo_shop_sideber',
            'description' => esc_html__('Shop sidebar area', 'cleaning-services'),
            'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
            'after_widget' => "</div>",
            'before_title' => '<h4 class="title-aside">',
            'after_title' => '</h4>',
        ));
        // end add by tanvir
    }

endif;

add_action('widgets_init', 'cleaning_services_widgets_init');



if (!function_exists('cleaning_services_loop_columns')) :

    function cleaning_services_loop_columns() {
        if (is_product()) 
            return 4;
        return 3;
    }

endif;

add_filter('loop_shop_columns', 'cleaning_services_loop_columns');

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('cleaning_services_front_init_js_var')) :

    function cleaning_services_front_init_js_var() {
        global $yith_wcwl, $post, $product;
        wp_localize_script('cleaning-services-custom', 'THEMEURL', CLEANING_SERVICES_THEME_URI);
        wp_localize_script('cleaning-services-custom', 'IMAGEURL', CLEANING_SERVICES_THEME_URI . '/images');
        wp_localize_script('cleaning-services-custom', 'CSSURL', CLEANING_SERVICES_THEME_URI . '/css');
    }

endif;

add_action('wp_enqueue_scripts', 'cleaning_services_front_init_js_var', 1001);

/*
  default config variable
 */
$fonts_areas = array(
    'cleaning_services-body_typography',
    'cleaning_services-heading-1-typography',
    'cleaning_services-heading-2-typography',
    'cleaning_services-heading-3-typography',
    'cleaning_services-heading-4-typography',
    'cleaning_services-heading-5-typography',
    'cleaning_services-heading-6-typography',
    'cleaning_services-widget_title_typography',
);




if ( ! function_exists( 'cleaning_services_fonts_url' ) ) :

function cleaning_services_fonts_url() {

    $cleaning_services_opt = cleaning_services_options();
    global $fonts_areas;
    $protocol = is_ssl() ? 'https' : 'http';
    $subsets = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
    $variants = ':100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';
    $font_families = array();
    $font_families_name = array();

    if (!is_plugin_active('redux-framework/redux-framework.php')) {
        $open_sans = _x( 'on', 'Open Sans font: on or off', 'cleaning-services' ); 
        if ( 'off' !== $open_sans ) {
         $font_families[] = 'Open Sans'.$variants ;
         $font_families_name[]='Open Sans';
        }
    }
    foreach ($fonts_areas as $option) {
        if (isset($cleaning_services_opt[$option]['font-family']) && $cleaning_services_opt[$option]['font-family'] && !in_array($cleaning_services_opt[$option]['font-family'], $font_families_name)
        ) {
            $font_families_name[]=$cleaning_services_opt[$option]['font-family'];
            foreach (explode(',', $cleaning_services_opt[$option]['font-family']) as  $fontvalue) {
                $fontvalue=str_replace("'", "", $fontvalue);
                $fontvalue=trim($fontvalue);
                $font_families[] = $fontvalue.$variants;
            } 
        }
    }
    
    if (!empty($font_families)) {
       $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( $subsets ),
        ),  $protocol.'://fonts.googleapis.com/css' );
    }
    return esc_url_raw( $fonts_url );
}

endif;




function cleaning_services_scripts_styles() {
    wp_enqueue_style( 'cleaning-services-fonts', cleaning_services_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'cleaning_services_scripts_styles' );



/**
 * Enqueue scripts and styles.
 */
if (!function_exists('cleaning_services_scripts')) :

    function cleaning_services_scripts() {
        $cleaning_services_opt = cleaning_services_options();
        /* ===============================================================
         * CSS Files 
         * --------------------------------------------------------------- */

        /* BOOTSTRAP  ------------------------- */
        wp_enqueue_style('bootstrap', CLEANING_SERVICES_CSS_URL . '/vendor/bootstrap.min.css', '', null);
        wp_enqueue_style('animate', CLEANING_SERVICES_CSS_URL . '/vendor/animate.min.css', '', null);
        wp_enqueue_style('slick', CLEANING_SERVICES_CSS_URL . '/vendor/slick.css', '', null);
        wp_enqueue_style('light', CLEANING_SERVICES_CSS_URL . '/vendor/lightbox.css', '', null);
        wp_enqueue_style('cleaning-services-shop', CLEANING_SERVICES_CSS_URL . '/shop.css', '', null );
        wp_enqueue_style('cleaning-services-style', get_stylesheet_uri());
        wp_enqueue_style('cleaning-services-wp-default-norm', CLEANING_SERVICES_CSS_URL . '/wp-default-norm.css', '', null);
        wp_enqueue_style('bootstrap-datetimepicker', CLEANING_SERVICES_CSS_URL . '/vendor/bootstrap-datetimepicker.css', '', null);
        wp_enqueue_style('nouislider', CLEANING_SERVICES_CSS_URL . '/vendor/nouislider.css', '', null);
        wp_enqueue_style('icomoon', CLEANING_SERVICES_THEME_URI . '/fonts/style.css', '', null); 

        require_once(CLEANING_SERVICES_THEME_DIR.'/css/custom_style.php');
        
        $cleaning_services_custom_inline_style = '';
        if (function_exists('cleaning_services_get_custom_styles')) {
            $cleaning_services_custom_inline_style = cleaning_services_get_custom_styles();
        }

        wp_add_inline_style('cleaning-services-style', $cleaning_services_custom_inline_style);

        /* ===============================================================
         * JS Files 
         * --------------------------------------------------------------- */
        wp_enqueue_script('bootstrap', CLEANING_SERVICES_JS_URL . '/vendor/bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('slick', CLEANING_SERVICES_JS_URL . '/vendor/slick.min.js', array('jquery'), '', true);
        wp_enqueue_script('isotope-pkgd', CLEANING_SERVICES_JS_URL . '/vendor/isotope.pkgd.min.js', array('jquery','imagesloaded'), '', true);
        wp_enqueue_script('lightbox', CLEANING_SERVICES_JS_URL . '/vendor/lightbox.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-form', CLEANING_SERVICES_JS_URL . '/vendor/jquery.form.js', array('jquery'), '', true);
        wp_enqueue_script('doubletaptogo', CLEANING_SERVICES_JS_URL . '/vendor/jquery.doubletaptogo.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-validate', CLEANING_SERVICES_JS_URL . '/vendor/jquery.validate.min.js', array('jquery'), '', true);
        wp_enqueue_script('moment', CLEANING_SERVICES_JS_URL . '/vendor/moment.js', array('jquery'), '', true);
        wp_enqueue_script('bootstrap-datetimepicker', CLEANING_SERVICES_JS_URL . '/vendor/bootstrap-datetimepicker.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-waypoints', CLEANING_SERVICES_JS_URL . '/vendor/jquery.waypoints.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-countTo', CLEANING_SERVICES_JS_URL . '/vendor/jquery.countTo.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-print', CLEANING_SERVICES_JS_URL . '/vendor/jquery.print.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-dotdotdot', CLEANING_SERVICES_JS_URL . '/vendor/jquery.dotdotdot.min.js', array('jquery'), '', true);
        wp_enqueue_script('nouislider', CLEANING_SERVICES_JS_URL . '/vendor/nouislider.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-elevateZoom', CLEANING_SERVICES_JS_URL . '/vendor/jquery.elevateZoom-3.0.8.min.js', array('jquery'), '', true);
        /* ====================== Custom JavaScripts -- */
       
        wp_enqueue_script('cleaning-services-custom', CLEANING_SERVICES_JS_URL . '/custom.js', array('jquery', 'jquery-ui-spinner'), '', true);
        wp_localize_script('cleaning-services-custom', 'cleaning_services_ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'loader_img' => CLEANING_SERVICES_IMG_URL . 'ajax-loader.gif'));

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;

add_action('wp_enqueue_scripts', 'cleaning_services_scripts', 10000);



if (!function_exists('cleaning_services_breadcrumb')) :

    function cleaning_services_breadcrumb() {
        global $post, $cleaning_services_opt;
        if (!isset($post->ID)) {
            return false;
        }
        if (!is_front_page() || is_home()) {
            if ((isset($post->post_type) && is_page()) || is_search() || is_home() || is_single() || is_archive() || is_category()) {
                $show_breadcrumb = 'on';
                if ($show_breadcrumb == 'on' || !$show_breadcrumb) {
                    ?>
                    <div class="block breadcrumbs">
                        <div class="container">
                            <div class="breadcrumb">
                                <?php
                                if (is_plugin_active('wordpress-seo/wp-seo.php') && function_exists('yoast_breadcrumb')) {
                                    yoast_breadcrumb('', '');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    }

endif;

add_action('cleaning_services_breadcrumb', 'cleaning_services_breadcrumb');



if (!function_exists('cleaning_services_comment_nav')) :

    function cleaning_services_comment_nav() {
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'cleaning-services'); ?></h2>
                <div class="nav-links">
                    <?php
                    if ($prev_link = get_previous_comments_link(esc_html__('Older Comments', 'cleaning-services'))) :
                        printf('<div class="nav-previous">%s</div>', $prev_link);
                    endif;

                    if ($next_link = get_next_comments_link(esc_html__('Newer Comments', 'cleaning-services'))) :
                        printf('<div class="nav-next">%s</div>', $next_link);
                    endif;
                    ?>
                </div>
            </nav>
            <?php
        endif;
    }

endif;


/* * ****************************************************************
 * Ajax Posts loading
 * ***************************************************************** */
if (!function_exists('cleaning_services_testimonial_more_post_ajax')) :

    function cleaning_services_testimonial_more_post_ajax() {
        // WP_Query arguments
        $args = array(
            'posts_per_page' => $_POST['post_per_page'],
            'post_type' => 'cleaning-testimonial',
            'orderby' => 'DESC',
            'paged' => $_POST['paged'],
            'no_found_rows' => true,
        );
        $style = $_POST['grid_style'];
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                global $post;
                $post->style = $style;
                get_template_part('template-parts/testimonial', get_post_format());
            }
        } else {
        }
        wp_reset_postdata();
        die();
    }

endif;

add_action('wp_ajax_testimonial_more_post_ajax', 'cleaning_services_testimonial_more_post_ajax');
add_action('wp_ajax_nopriv_testimonial_more_post_ajax', 'cleaning_services_testimonial_more_post_ajax');



if (!function_exists('cleaning_services_coupon_popup_ajax')) :

    function cleaning_services_coupon_popup_ajax() {

        $post_id = $_POST['post_id'];
        $coupon_top_left = get_post_meta($post_id, 'framework-coupon-top-left', true);
        $coupon_top_right = get_post_meta($post_id, 'framework-coupon-top-right', true);
        $coupon_bottom_left = get_post_meta($post_id, 'framework-coupon-bottom-left', true);
        $coupon_bottom_right = get_post_meta($post_id, 'framework-coupon-bottom-right', true);
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo esc_html__('Coupon', 'cleaning-services'); ?></h4>
                    </div>
                    <div class="modal-body" id="modal-coupon">
                        <div>
                            <div class="coupon-print">
                                <div class="coupon-print-inside">
                                    <div class="coupon-print-row-top">
                                        <div class="coupon-print-col-left">
                                            <i><?php echo esc_html($coupon_top_left); ?> </i>
                                        </div>
                                        <div class="coupon-print-col-right">
                                            <div class="contact-info"><i class="icon icon-locate"></i>
                                                <?php echo esc_html($coupon_top_right); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo get_the_post_thumbnail($post_id, 'cleaning-services-coupon', array('class' => 'img-responsive-inline')); ?>
                                    <div class="coupon-print-row-bot">
                                        <div class="coupon-print-col-left">
                                            <?php echo esc_html($coupon_bottom_left); ?>
                                        </div>
                                        <div class="coupon-print-col-right text-right">
                                            <?php echo esc_html($coupon_bottom_right); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn_save_close" class="btn btn-default" data-dismiss="modal"><?php echo esc_html__('Close', 'cleaning-services') ?></button>
                        <button id="btn_save_and_close" type="button" class="btn btn-primary"><?php echo esc_html__('Print', 'cleaning-services') ?> </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        exit();
    }

endif;

add_action('wp_ajax_coupon_popup_ajax', 'cleaning_services_coupon_popup_ajax');
add_action('wp_ajax_nopriv_coupon_popup_ajax', 'cleaning_services_coupon_popup_ajax');



if (!function_exists('woocommerce_output_upsells')):

    function woocommerce_output_upsells() {
        woocommerce_upsell_display(4, 4);
    }

endif;

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15);



if (!function_exists('woocommerce_output_cross_sell_display')):

    function woocommerce_output_cross_sell_display() {
        woocommerce_cross_sell_display(2, 2);
    }

endif;

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('woocommerce_cart_collaterals', 'woocommerce_output_cross_sell_display', 15);



if (!function_exists('cleaning_services_view_product_design')):

    function cleaning_services_view_product_design() {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

endif;

add_action('after_setup_theme', 'cleaning_services_view_product_design');


if (!function_exists('cleaning_services_add_to_cart_fragment')):

    function cleaning_services_add_to_cart_fragment($fragments) {
        ob_start();
        $count = WC()->cart->cart_contents_count;
        $conditionarray=array();
        $conditionarray[]=$count > 0;
        $conditionarray[]=is_shop () ;
        $conditionarray[]=is_product_category();
        $conditionarray[]=is_product();
        $conditionarray[]=is_cart();
         if(cleaning_services_isMobile() &&  count(array_unique($conditionarray)) === 1){}else{ 
        ?>
        <a class="cart-contents icon icon-market" href="javascript:void(0);" title="<?php _e('View your shopping cart', 'cleaning-services'); ?>"><?php
            if ($count > 0) {
                ?>
                <span class="badge cart-contents-count"><?php echo esc_html($count); ?></span>
        <?php
            }
        ?>
        </a>
        <?php
        }
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }

endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'cleaning_services_add_to_cart_fragment' );



if (!function_exists('cleaning_services_add_to_cart_fragment_details')):

    function cleaning_services_add_to_cart_fragment_details($fragments) {
        ob_start();
        ?>
        <div class="header-cart-dropdown">
            <?php get_template_part('woocommerce/cart/mini', 'cart'); ?>
        </div>
        <?php
        $fragments['div.header-cart-dropdown'] = ob_get_clean();
        return $fragments;
    }

endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'cleaning_services_add_to_cart_fragment_details' );



if (!function_exists('cleaning_services_remove_item_from_cart')):

    function cleaning_services_remove_item_from_cart() {
        $cart = WC()->instance()->cart;
        $id = $_POST['product_id'];
        $cart_id = $cart->generate_cart_id($id);
        $cart_item_id = $cart->find_product_in_cart($cart_id);
        $array = array();
        if ($cart_item_id) {
            $cart->set_quantity($cart_item_id, 0);
            WC_AJAX::get_refreshed_fragments();
        } else {
            $array['error'] = true;
            echo json_encode($array);
        }

        exit();
    }

endif;

add_action('wp_ajax_remove_item_from_cart', 'cleaning_services_remove_item_from_cart');
add_action('wp_ajax_nopriv_remove_item_from_cart', 'cleaning_services_remove_item_from_cart');



if (!function_exists('wc_add_to_cart_message_html_func')):

function wc_add_to_cart_message_html_func($message, $product_id) {
    $message = preg_replace('#<a.*?>([^>]*)</a>#i', '<a href="' . esc_url(wc_get_cart_url()) . '" class="btn btn-invert wc-forward">' . esc_html__('View cart', 'cleaning-services') . '</a>', $message);
    return $message;
}

endif;

add_filter('wc_add_to_cart_message_html', 'wc_add_to_cart_message_html_func', 10, 2);



if (!function_exists('my_woocommerce_add_error')):

function my_woocommerce_add_error($error) {
    $error = preg_replace('#<a.*?>([^>]*)</a>#i', '<a href="' . esc_url(wc_get_cart_url()) . '" class="btn btn-invert wc-forward">' . esc_html__('View cart', 'cleaning-services') . '</a>', $error);
    return $error;
}

endif;

add_filter('woocommerce_add_error', 'my_woocommerce_add_error');



if (!function_exists('woocommerce_widget_shopping_cart_button_view_cart')):

    function woocommerce_widget_shopping_cart_button_view_cart() {
        echo '<a href="' . esc_url(wc_get_cart_url()) . '" class="btn wc-forward">' . esc_html__('View cart', 'cleaning-services') . '</a>';
    }

endif;



if (!function_exists('woocommerce_widget_shopping_cart_proceed_to_checkout')):

    function woocommerce_widget_shopping_cart_proceed_to_checkout() {
        echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="btn btn-invert checkout wc-forward">' . esc_html__('Checkout', 'cleaning-services') . '</a>';
    }

endif;



if (!function_exists('woocommerce_template_loop_add_to_cart')):

    function woocommerce_template_loop_add_to_cart($args = array()) {
        global $product;
        if ($product) {
            $defaults = array(
                'quantity' => 1,
                'class' => implode(' ', array_filter(array(
                    'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
                ))),
            );
            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);
            wc_get_template('loop/add-to-cart.php', $args);
        }
    }

endif;



if (!function_exists('woocommerce_template_loop_product_title')):

    function woocommerce_template_loop_product_title() {
        echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
    }

endif;



if (!function_exists('woocommerce_get_sidebar')) :

    function woocommerce_get_sidebar() {
        if (!is_product())
            dynamic_sidebar('woo_shop_sideber');
    }

endif;



if (!function_exists('woocommerce_pagination')) :

    function woocommerce_pagination($a = false) {
        if (!$a) {
            wc_get_template('loop/pagination.php');
        } else {
            wc_get_template('loop/pagination-top.php');
        }
    }

endif;



if (!function_exists('cleaning_services_options')) :

    function cleaning_services_options() {
        global $cleaning_services_opt;
        return $cleaning_services_opt;
    }

endif;



add_filter('loop_shop_per_page', create_function('$cols', 'return 9;'), 20);



if (!function_exists('cleaning_services_modify_read_more_link')) :

    function cleaning_services_modify_read_more_link() {
        return '<div class="post-read-more"><a href="'.get_permalink().'" class="btn">'. esc_html__('Read Post', 'cleaning-services') .'</a></div>';
    }

endif;

add_filter( 'the_content_more_link', 'cleaning_services_modify_read_more_link' );

function cleaning_services_isMobile() {
    if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
        return true;
    }else{
        return false;
    }
}

