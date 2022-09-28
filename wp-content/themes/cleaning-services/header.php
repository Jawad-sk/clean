<?php
$cleaning_services = cleaning_services_options();
?>
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cleaning_Services
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if (isset($cleaning_services['cleaning_services-site-favicon']['url']) && !empty($cleaning_services['cleaning_services-site-favicon']['url'])) { ?>
            <link rel="shortcut icon" href="<?php echo esc_url($cleaning_services['cleaning_services-site-favicon']['url']) ?>" type="image/x-icon"/>
        <?php
        }
        ?>
        <?php wp_head(); ?>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53493967-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-53493967-1');
</script>

    </head>

    <body  <?php body_class(); ?>>
        <?php do_action('cleaning_services_header_loader'); ?>
        <!-- Header -->
        <?php if ((isset($cleaning_services['cleaning_services-is_sticky_header']) && $cleaning_services['cleaning_services-is_sticky_header'] == 1)) { ?>
            <header class="page-header header-sticky">
            <?php } else { ?>
                <header class="page-header">
                <?php } ?>
                <?php if (class_exists('ReduxFrameworkPlugin')){ ?>
                    <?php
                        if (isset($cleaning_services['cleaning_services-page-header-mobile']) && $cleaning_services['cleaning_services-page-header-mobile'] == 1) {
                            ?>

                            <div class="page-header-mobile-info">
                                <div class="page-header-mobile-info-content">
                                    <div class="page-header-info"><i class="icon icon-map-marker"></i>
                                        <?php
                                            if (isset($cleaning_services['cleaning_services-page-header-mobile-location']) && $cleaning_services['cleaning_services-page-header-mobile-location'] != '') {
                                                echo wp_kses_post($cleaning_services['cleaning_services-page-header-mobile-location']);
                                            }
                                        ?>
                                    </div>
                                    <div class="page-header-info"><i class="icon icon-technology"></i>
                                        <?php
                                            if (isset($cleaning_services['cleaning_services-page-header-mobile-phone']) && $cleaning_services['cleaning_services-page-header-mobile-phone'] != '') {
                                                echo wp_kses_post($cleaning_services['cleaning_services-page-header-mobile-phone']);
                                            }
                                        ?>
                                    </div>
                                    <div class="page-header-info"><i class="icon icon-clock"></i>
                                        <?php
                                        if (isset($cleaning_services['cleaning_services-page-header-mobile-hour']) && $cleaning_services['cleaning_services-page-header-mobile-hour'] != '') {
                                            echo wp_kses_post($cleaning_services['cleaning_services-page-header-mobile-hour']);
                                        }
                                        ?>
                                    </div>
                                    <div class="page-header-info"><i class="icon icon-speech-bubble"></i>
                                        <?php
                                        if (isset($cleaning_services['cleaning_services-page-header-mobile-email']) && $cleaning_services['cleaning_services-page-header-mobile-email'] != '') {
                                            echo wp_kses_post($cleaning_services['cleaning_services-page-header-mobile-email']);
                                        }
                                        ?>
                                    </div>
                                    <ul class="social-list">
                                        <?php if (isset($cleaning_services['cleaning_services-header-google-plus']) && !empty($cleaning_services['cleaning_services-header-google-plus'])) { ?>
                                            <li> 
                                                <a class="icon icon-google-plus-logo" href="<?php echo wp_kses_post($cleaning_services['cleaning_services-header-google-plus']); ?>"></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (isset($cleaning_services['cleaning_services-header-facebook']) && !empty($cleaning_services['cleaning_services-header-facebook'])) { ?>
                                            <li> 
                                                <a class="icon icon-facebook-logo" href="<?php echo wp_kses_post($cleaning_services['cleaning_services-header-facebook']); ?>"></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (isset($cleaning_services['cleaning_services-header-twitter']) && !empty($cleaning_services['cleaning_services-header-twitter'])) { ?>
                                            <li> 
                                                <a class="icon icon-twitter-logo" href="<?php echo wp_kses_post($cleaning_services['cleaning_services-header-twitter']); ?>"></a>
                                            </li>
                                        <?php } ?>
                                        <?php if (isset($cleaning_services['cleaning_services-header-instagram']) && !empty($cleaning_services['cleaning_services-header-instagram'])) { ?>
                                            <li> 
                                                <a class="icon icon-instagram-logo" href="<?php echo wp_kses_post($cleaning_services['cleaning_services-header-instagram']); ?>"></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                  
                        <?php } ?>
                    <div class="page-header-top">
                    <?php } else { ?>
                        <div class="page-header-top-off">
                    <?php } ?>
                
                    <div class="container">
                        <div class="page-header-mobile-info-toggle"></div>
                        <?php if (isset($cleaning_services['cleaning_services-logo']['url']) && $cleaning_services['cleaning_services-logo']['url']) { ?>
                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($cleaning_services['cleaning_services-logo']['url']) ?>" alt="<?php esc_html_e('Logo', 'cleaning-services') ?>">
                                </a>
                            </div>
                            <div class="shine"></div>
                        <?php } ?>
                    
                        <?php
                        if (isset($cleaning_services['cleaning_services-page-header-top-middle']) && $cleaning_services['cleaning_services-page-header-top-middle'] == 1) {
                            ?>

                            <div class="page-header-top-middle hidden-xs">
                                <div class="page-header-slogan visible-lg">
                                    <?php
                                    if (isset($cleaning_services['cleaning_services-page-header-slogan']) && $cleaning_services['cleaning_services-page-header-slogan'] != '') {
                                        echo wp_kses_post($cleaning_services['cleaning_services-page-header-slogan']);
                                    }
                                    ?>
                                </div>

                                <div class="page-header-shedule hidden-xs"><i class="icon icon-clock"></i>
                                    <?php
                                    if (isset($cleaning_services['cleaning_services-page-header-shedule-header']) && $cleaning_services['cleaning_services-page-header-shedule-header'] != '') {
                                        echo wp_kses_post($cleaning_services['cleaning_services-page-header-shedule-header']);
                                    }
                                    ?>
                                </div>

                                <div class="page-header-phone text-right">
                                    <span class="visible-lg visible-md visible-sm">
                                        <?php
                                        if (isset($cleaning_services['cleaning_services-phone-caption-header']) && $cleaning_services['cleaning_services-phone-caption-header'] != '') {
                                            echo wp_kses_post($cleaning_services['cleaning_services-phone-caption-header']);
                                        }
                                        ?>
                                    </span>
                                    <span class="phone-number">
                                        <?php
                                        if (isset($cleaning_services['cleaning_services-phone-number-header']) && $cleaning_services['cleaning_services-phone-number-header'] != '') {
                                            echo wp_kses_post($cleaning_services['cleaning_services-phone-number-header']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        <?php
                        if (isset($cleaning_services['cleaning_services-quote-url']) && $cleaning_services['cleaning_services-quote-url'] != '') {
                            $url = wp_kses_post($cleaning_services['cleaning_services-quote-url']);
                        } else {
                            $url = '#';
                        }
                        ?>
                        <div class="quote-button-wrap"><a href="<?php echo esc_url($url); ?>" class="btn"><i class="icon icon-bell"></i> <?php
                                if (isset($cleaning_services['cleaning_services-get-a-quote']) && $cleaning_services['cleaning_services-get-a-quote'] != '') {
                                    echo wp_kses_post($cleaning_services['cleaning_services-get-a-quote']);
                                }
                                ?></a></div>

                        <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                          ?>  
                       
                         <div class="header-cart">
                                <?php
                                $count = WC()->cart->cart_contents_count;
                                $conditionarray=array();
                                $conditionarray[]= ($count > 0);
                                $conditionarray[]=is_shop () ;
                                $conditionarray[]=is_product_category();
                                $conditionarray[]=is_product();
                                $conditionarray[]=is_cart();
                                if(cleaning_services_isMobile() &&  count(array_unique($conditionarray)) === 1){

                                }else{
                                ?>
                                <a class="cart-contents icon icon-market" href="javascript:void(0)" title="<?php _e( 'View your shopping cart' ,'cleaning-services'); ?>"><?php
                                if ( $count > 0 ) {
                                    ?>
                                    <span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
                                    <?php            
                                }
                                    ?></a>
                                <div class="header-cart-dropdown">
                                <?php get_template_part('woocommerce/cart/mini','cart');?>
                                </div>
                        </div>
                         <?php } }
                    } ?>
                    </div>
                </div>
                </div>
                 <a href="#" class="menu-toggle"><i class="icon-line-menu"></i><i class="icon-cancel"></i></a>
                <div class="page-header-menu doubletap">
                    <div class="container">
                        
                        <?php
                        wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'menu navbar-nav',
                                    'container' => 'ul',
                                    'walker' => new Walker_Cleaning_Services_Menu() //use our custom walker
                                )
                        );
                        ?>
                    </div>
                </div>
            </header>