<?php

class Cleaning_Services_SlickSlider extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('cleaning_services_slick_slider', array($this, 'cleaning_services_slick_slider_func'));
        add_shortcode('cleaning_services_slick_slider_item', array($this, 'cleaning_services_slick_slider_item_func'));
    }

    public function cleaning_services_slick_slider_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts(array(
            'autoplay' => 'true',
            'autoplay_speed' => '3000',
            'arrows' => 'true',
            'dots' => 'true',
            'fade' => 'true',
            'pause_on_hover' => 'true',
            'pause_on_dots_hover' => 'true'
        ), $atts);

        wp_localize_script( 'cleaning-services-custom', 'ajax_slickslider', $changed_atts);

        ob_start();
        ?>
        <!-- Slider -->
        <div id="mainSliderWrapper"  class="<?php
        if ($extra_class != '') {
            echo esc_attr($extra_class);
        }
        ?>">
            <div class="loading-content">
                <div class="loading-dots dark-gray">
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>
            <div id="mainSlider" >
                <?php echo do_shortcode($content); ?>
            </div>  
        </div>  
        <?php
        $output = ob_get_clean();
        return $output;
    }

    public function cleaning_services_slick_slider_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'image' => '',
            'extra_class' => '',
            'unqid' => '',
            'call_action' => '',
            'first_title' => '',
            'second_title' => '',
                        ), $atts));
        $unqid = $unqid . rand(1, 999);
        $attachement = wp_get_attachment_image_src((int) $image, 'full');
        $href = vc_build_link($call_action);
        //now we assing anmation style wise animation in different element
        ob_start();
        ?>
        <div class="slide">
            <div class="img--holder" <?php if ($attachement != array()) { ?>  style="background-image: url(<?php echo esc_url($attachement[0]); ?>);" <?php } ?>></div>
            <div class="slide-content center">
                <div class="vert-wrap container">
                    <div class="vert">
                        <div class="container">
                            <h1 class="" data-animation="zoomIn" data-animation-delay="0.5s"><?php  echo wp_kses_post($first_title) ?></h1>
                            <h1 class="" data-animation="zoomIn" data-animation-delay="0.5s"><?php  echo wp_kses_post($second_title) ?></h1>
                            <?php 
                                echo wp_kses_post($content); 
                            ?>
                            <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                                <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>    class="btn" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href['rel']; ?>"  >   
                                    <?php echo $href['title']; ?>   
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}

new Cleaning_Services_SlickSlider();
