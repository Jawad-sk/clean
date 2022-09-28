<?php
/*
 * print css with cheking value is empty or not
 *
 */

function cleaning_services_print_css($props = '', $values = array(), $vkey = '', $pre_fix = '', $post_fix = '') {

    if (isset($values[$vkey]) && !empty($values[$vkey])) {
        print wp_kses_post($props . ":" . $pre_fix . $values[$vkey] . $post_fix . ";\n");
    }
}

function cleaning_services_color_brightness($colourstr, $steps, $darken = false) {
    $colourstr = str_replace('#', '', $colourstr);
    $rhex = substr($colourstr, 0, 2);
    $ghex = substr($colourstr, 2, 2);
    $bhex = substr($colourstr, 4, 2);

    $r = hexdec($rhex);
    $g = hexdec($ghex);
    $b = hexdec($bhex);

    if ($darken) {
        $steps = $steps * -1;
    }

    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));

    $hex = "#";
    $hex .= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);

    return $hex;
}

function cleaning_services_get_custom_styles() {
    global $cleaning_services_opt;
    $opt_prefix = 'cleaning_services';
    $cleaning_services_colors = get_theme_mod('cleaning_services_colors', array());
    $cleaning_services_css = get_theme_mod('cleaning_services_css', array());
    ob_start();
    ?>
    body{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-body_typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-body_typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-body_typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-body_typography'], 'line-height');
    ?>
    }
    a{ <?php cleaning_services_print_css('color', $cleaning_services_colors, 'lnk_color'); ?> }
    a:hover{ <?php cleaning_services_print_css('color', $cleaning_services_colors, 'lnk_color_hover'); ?> }

    .cleaning_services_wc_products_tab.vc_tta.vc_tta-style-classic .vc_tta-tab a{ <?php cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-body_typography'], 'font-family'); ?> }

    .widget-title, .title-contact-info, .widgettitle{
    <?php cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-widget_title_typography'], 'font-family'); ?>
    <?php cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-widget_title_typography'], 'font-weight'); ?>
    <?php cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-widget_title_typography'], 'font-size'); ?>
    }

    body {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'body_color'); ?>
    }

    h1, h2.h-lg{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-heading-1-2-lg-typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-heading-1-2-lg-typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-heading-1-2-lg-typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-heading-1-2-lg-typography'], 'line-height');
    ?>
    }

    h2, h1.h-sm{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-heading-2-1-sm-typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-heading-2-1-sm-typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-heading-2-1-sm-typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-heading-2-1-sm-typography'], 'line-height');
    ?>
    }

    h3{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-heading-3-typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-heading-3-typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-heading-3-typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-heading-3-typography'], 'line-height');
    ?>
    }

    h4{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-heading-4-typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-heading-4-typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-heading-4-typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-heading-4-typography'], 'line-height');
    ?>
    }

    h5{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-heading-5-typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-heading-5-typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-heading-5-typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-heading-5-typography'], 'line-height');
    ?>
    }

    h6{
    <?php
    cleaning_services_print_css('font-family', $cleaning_services_opt[$opt_prefix . '-heading-6-typography'], 'font-family');
    cleaning_services_print_css('font-weight', $cleaning_services_opt[$opt_prefix . '-heading-6-typography'], 'font-weight');
    cleaning_services_print_css('font-size', $cleaning_services_opt[$opt_prefix . '-heading-6-typography'], 'font-size');
    cleaning_services_print_css('line-height', $cleaning_services_opt[$opt_prefix . '-heading-6-typography'], 'line-height');
    ?>
    }

    h1, h2, h3, h4, h5, h6, h2.h-lg, h1.h-sm{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'heading_color'); ?>
    }

    .get-banner h2,
    .get-banner-2 h2, 
    .get-banner-2 h3, 
    .get-banner-2 h4, 
    .get-banner-2 h5, 
    .get-banner-2 p,
    .fact-item-text-wrap,
    .block-testimonials-bg .testimonial-item h2, 
    .block-testimonials-bg .testimonial-item h3, 
    .block-testimonials-bg .testimonial-item h4, 
    .block-testimonials-bg .testimonial-item h5, 
    .block-testimonials-bg .testimonial-item h6,
    .block-testimonials-bg .testimonial-item-inside:after,
    .coupon-ribbon,
    .block-testimonials-bg .testimonial-item p,
    .get-banner,
    .banner-text-2u .bg-gradient i,
    .banner-text-2u .bg-gradient p{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'white_heading_color'); ?>
    }
    .page-footer .backToTop{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'preloader_color'); ?>
    }

    .page-footer .backToTop:hover{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'preloader_hover_color'); ?>
    }
    .text-icon-hor-icon .icon,
    .text-icon-icon .icon,
    .page-header-shedule .icon,
    .page-footer-shedule .icon,
    .prices-box-price b,
    .cleaning-faq-text .vc_toggle_title>h4,
    .contact-info-sm > .icon,.contact-info > .icon{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'theme_icon_color'); ?>
    }
    .marker-list > li:after,
    .how-works-title span,
    .filters-by-category ul li a:hover, 
    .filters-by-category ul li a.selected,
    .coupon-text-2 span,
    .news-prw-date,
    .service-box-link{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'theme_active_color'); ?>
    }
    .person-divider,
    .cleaning-faq-text .vc_toggle_default .vc_toggle_icon::after, 
    .cleaning-faq-text .vc_toggle_default .vc_toggle_icon::before{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'theme_active_bg_color'); ?>
    }

    .slick-dots li button{
    <?php cleaning_services_print_css('background', $cleaning_services_colors, 'pagi_color'); ?>
    }

    .slick-dots li.slick-active button, 
    .slick-dots li.slick-active button:hover{
    <?php cleaning_services_print_css('background', $cleaning_services_colors, 'pagi_active_color'); ?>
    }

    /*Menu Color*/
    .page-header .menu li a,
    .page-header .menu li.menu-item-has-children:hover ul.sub-menu li a{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'menu_color'); ?>
    }
    .page-header .menu li a:hover, 
    .page-header .menu li.menu-item-has-children:hover a, 
    .page-header .menu li.current-menu-item > a,
    .page-header .menu li.current-menu-parent > a,
    .page-header .menu ul li a:hover,
    .page-header .menu li.menu-item-has-children:hover ul.sub-menu li a:hover{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'menu_active_color'); ?>
    }

    .page-header-menu{
    <?php cleaning_services_print_css('border-top', $cleaning_services_colors, 'menu_border_color', '3px solid'); ?>
    }

    .page-header-menu.doubletap {
     <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'main_menu_bg_color'); ?>
    }

    .breadcrumbs,
    .breadcrumb{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'breadcrums_bg_color'); ?>
    }

    .breadcrumbs .breadcrumb, .breadcrumbs .breadcrumb li, .breadcrumbs .breadcrumb a{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'breadcrums_a_color'); ?>
    }

    .breadcrumbs .breadcrumb a:hover {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'breadcrums_a_hover_color'); ?>
    }


    /*Slider Color*/
    #mainSlider .slide-content h1 {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'slider_color'); ?>
    }

    #mainSlider .slide-content .btn, 
    #mainSlider .slide-content .btn:focus, 
    #mainSlider .slide-content .btn.focus {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'slider_btn_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'slider_btn_bg_color'); ?>
    <?php cleaning_services_print_css('border', $cleaning_services_colors, 'slider_btn_border_color', '1px solid'); ?>
    }

    #mainSlider .slide-content .btn:hover, 
    #mainSlider .slide-content .btn.active{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'slider_btn_hover_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'slider_btn_bg_hover_color'); ?>
    <?php cleaning_services_print_css('border', $cleaning_services_colors, 'slider_btn_border_hover_color', '1px solid'); ?>
    }

    #mainSlider .slick-prev:before, 
    #mainSlider .slick-next:before{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'slider_navigation_color'); ?>
    }
    #mainSlider .slick-prev:hover:before,
    #mainSlider .slick-next:hover:before{
    <?php //cleaning_services_print_css('color', $cleaning_services_colors, 'slider_navigation_hover_color'); ?>
    }
    #mainSlider .slick-prev:before, 
    #mainSlider .slick-next:before{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'slider_navigation_color', '', '!important'); ?>
    }

    /*Button Color*/
    .btn, .more-link{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'btn_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'btn_bg_color'); ?>
    }
    .btn:hover{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'btn_hover_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'btn_bg_hover_color'); ?>
    }
    .btn-white:hover [class*='icon']{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'btn_hover_color'); ?>
    }
    .btn-white, .btn-white.focus, .btn-white:focus {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'btn_white_hover_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'btn_white_bg_color'); ?>
    }

    /*Other Color Section*/

    .how-works-number,.discount-box{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'work_round_color'); ?>
    }
    .how-works-number--color1,.discount-box--color1{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'work_one'); ?>
    }
    .how-works-number--color2,.discount-box--color2{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'work_two'); ?>
    }
    .how-works-number--color3,.discount-box--color3{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'work_three'); ?>
    }

    .news-prw-link {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'blog_link_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'blog_link_bg_color'); ?>
    }

    .news-prw-link:hover {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'blog_link_hover_color'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'blog_link_bg_hover_color'); ?>
    }

    .gallery-item-caption,
    .gallery-item-zoom,
    .gallery-item-zoom:hover{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'gallery_caption_color'); ?>
    }
    .gallery-item-zoom:before,
    .gallery-item-caption:before{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'gallery_overly_color'); ?> 
    }

    .coupon-print{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'copun_icon_bg_color'); ?> 
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'copun_icon_color'); ?> 
    }

    .coupon-print:hover{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'copun_icon_bg_hover_color'); ?> }

    .services-list li.active, 
    #menu-service-menu.menu li.current-menu-item{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'service_menu_bg_color'); ?>
    }

    /*Footer Color Section*/
    .page-footer-menu{
    background-image: -webkit-gradient(linear, left top, right top, from(<?php echo $cleaning_services_colors['footer_gradient_first_color'] ?>), to(<?php echo $cleaning_services_colors['footer_gradient_second_color'] ?>));
    background-image: -webkit-linear-gradient(left, <?php echo $cleaning_services_colors['footer_gradient_first_color'] ?>, <?php echo $cleaning_services_colors['footer_gradient_second_color'] ?>);
    background-image: -o-linear-gradient(left, <?php echo $cleaning_services_colors['footer_gradient_first_color'] ?>, <?php echo $cleaning_services_colors['footer_gradient_second_color'] ?>);
    background-image: linear-gradient(90deg, <?php echo $cleaning_services_colors['footer_gradient_first_color'] ?>,  <?php echo $cleaning_services_colors['footer_gradient_second_color'] ?>);
    }
    .page-footer .menu li a {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'footer_menu_color'); ?>
    }

    .page-footer .menu li a:hover, 
    .page-footer .menu li:hover > a, 
    .page-footer .menu li.active > a{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'footer_menu_hover_color'); ?>
    }

    /*Shop Color*/
    .title-aside::after{
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'shop_active_bg_icon', '', '!important'); ?>
    }
    .woocommerce .category-list > li:after,
    .woocommerce .star-rating span::before{
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'shop_active_icon', '', '!important'); ?>
    }
    .page-header .header-cart a.icon{
    <?php
    cleaning_services_print_css('color', $cleaning_services_colors, 'cart_icon');
    ?>
    }

    .page-header .header-cart:hover a.icon,
    .page-header .header-cart.opened a.icon {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'cart_icon_hover'); ?>
    }

    .page-header .header-cart .badge{
    <?php cleaning_services_print_css(' background-color', $cleaning_services_colors, 'cart_icon_bg'); ?>
    }

    .page-header .header-cart:hover .badge, 
    .page-header .header-cart.opened .badge{
    <?php //cleaning_services_print_css('color', $cleaning_services_colors, 'cart_icon_hover'); ?>
    <?php cleaning_services_print_css('background-color', $cleaning_services_colors, 'cart_icon_bg_hover'); ?>
    }
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range {
    <?php cleaning_services_print_css(' background-color', $cleaning_services_colors, 'shop_filter_color'); ?>
    }
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
    <?php cleaning_services_print_css(' background-color', $cleaning_services_colors, 'shop_filter_color'); ?>
    }
    .woocommerce span.onsale{
    <?php cleaning_services_print_css('background', $cleaning_services_colors, 'shop_sale_color'); ?>
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'shop_sale_text_color'); ?>
    }
    .woocommerce .star-rating span::before {
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'shop_rateing_color', '', '!important'); ?>
    }
    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover, 
    .woocommerce nav.woocommerce-pagination ul li span.current{
    <?php cleaning_services_print_css('background', $cleaning_services_colors, 'shop_pagination_bg_color', '', '!important'); ?>
    <?php cleaning_services_print_css('color', $cleaning_services_colors, 'shop_pagination_text_color', '', '!important'); ?>
    <?php cleaning_services_print_css('border', $cleaning_services_colors, 'shop_pagination_border_color', '1px solid', '', '!important'); ?>
    }

    <?php
    if (isset($cleaning_services_opt['extra_css'])) {
        print $cleaning_services_opt['extra_css'];
    }

    $cleaning_services_custom_css = ob_get_clean();
    return $cleaning_services_custom_css;
}
